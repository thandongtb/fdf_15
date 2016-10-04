<?php

namespace App\Services;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\Item\ItemRepositoryInterface;
use Cart;
use Session;

class PaypalService
{
    private $apiContext;
    private $productRepository;
    private $orderRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        OrderRepositoryInterface $orderRepository,
        ItemRepositoryInterface $itemRepository
    ) {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('paypal.client_id'),
                config('paypal.secret')
            )
        );
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
        $this->itemRepository = $itemRepository;
        $this->apiContext->setConfig(config('paypal.settings'));
    }

    public function storeOrder($data)
    {
        $itemLists = [];

        $order = $this->orderRepository->storeOrderPaypal($data);
        $orderId = $order->id;
        Session::put('order_id', $orderId);
        $items = $this->itemRepository->save($orderId);

        foreach ($items as $key => $item) {
            $itemTemp = new Item();
            $product = $this->productRepository->find($item->product_id);
            $itemTemp->setName($product->name)
                ->setCurrency(config('paypal.curency'))
                ->setQuantity($item->quantity)
                ->setSku("123123")
                ->setPrice($product->price);
            array_push($itemLists, $itemTemp);
        }

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $itemList = new ItemList();
        $itemList->setItems($itemLists);

        $details = new Details();
        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal(Cart::subtotal());

        $amount = new Amount();
        $amount->setCurrency(config('paypal.curency'))
            ->setTotal(Cart::subtotal())
            ->setDetails($details);

        $transaction = new Transaction();

        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription(trans('homepage.payment_description'))
            ->setInvoiceNumber(uniqid());

        $redirectUrls = new RedirectUrls();
        $redirectUrls
            ->setReturnUrl(action('Home\PaypalController@create'))
            ->setCancelUrl(action('Home\OrderController@index'));

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        $request = clone $payment;

        try {
            $payment->create($this->apiContext);
        } catch (Exception $ex) {
            \Log::error($e->getMessage());

            exit(1);
        }

        $approvalUrl = $payment->getApprovalLink();
        Session::put('payment_id', $payment->id);

        return $approvalUrl;
    }

    public function excutePayment($request){
        $paymentId = $request['paymentId'];

        $payment = Payment::get($paymentId, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($request['PayerID']);

        try {
            $result = $payment->execute($execution, $this->apiContext);

            if ($result->getState() == 'approved') {
                return true;
            }

            return false;
        } catch (Exception $e) {
            exit(1);
        }
    }
}
