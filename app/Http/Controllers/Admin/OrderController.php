<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Models\Order;
use App\Services\OrderService;
use wataridori\ChatworkSDK\ChatworkSDK;
use wataridori\ChatworkSDK\ChatworkRoom;
use App\Services\ChatworkService;

class OrderController extends Controller
{
    private $orderRepository;
    private $orderService;
    private $chatworkService;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        OrderService $orderService
    )
    {
        $this->orderRepository = $orderRepository;
        $this->orderService = $orderService;
    }

    public function index()
    {
        $orders = $this->orderRepository
            ->paginate(config('paginate.order.normal'));

        return view('admin.order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = $this->orderRepository->find($id);

        if (!$order) {
            return redirect()->action('Admin\OrderController@index')
                ->withErrors(trans('order.order_not_found'));
        }

        return view('admin.order.show', compact('order'));
    }

    public function edit($id)
    {
        $order = $this->orderRepository->find($id);
        $optionStatus = $this->orderService->getOptions();

        return view('admin.order.edit', compact('order', 'optionStatus'));
    }

    public function update(Request $request, $id)
    {
        $status = $request->status;
        $order = $this->orderRepository->update([
            'status' => $status
        ], $id);

        if ($order) {
            return redirect()->action('Admin\OrderController@index')
                ->withSuccess(trans('order.update_success'));
        }

        return redirect()->action('Admin\OrderController@index')
                ->withErrors(trans('order.update_fail'));
    }
}
