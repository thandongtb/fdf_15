<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Session;
use App\Services\PaypalService;
use App\Services\ChatworkService;
use Cart;

class PaypalController extends Controller
{
    private $paypalService;
    private $chatworkService;

    public function __construct(
        PaypalService $paypalService,
        ChatworkService $chatworkService
    ) {
        $this->paypalService = $paypalService;
        $this->chatworkService = $chatworkService;
    }

    public function create(Request $request)
    {
        $paymentId = Session::get('payment_id');
        Session::forget($paymentId);
        $result = $this->paypalService->excutePayment($request->all());

        if ($result) {
            Cart::destroy();
            $orderId = Session::get('order_id');
            Session::forget($orderId);

            $this->chatworkService->sendMessageToRoom(trans('homepage.buy_success'));

            return redirect()->action('Home\OrderController@show', [$orderId]);
        }

        return redirect()->action('Home\OrderController@index')
            ->withErrors(trans('homepage.message.payment_paypal_fail'));
    }
}
