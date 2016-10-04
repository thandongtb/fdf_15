<table class="table table-responsive">
    <thead>
        <tr>
            <th>
                {{ trans('order.id') }}
            </th>
            <th>
                {{ trans('order.user') }}
            </th>
            <th>
                {{ trans('order.price') }}
            </th>
            <th>
                {{ trans('order.shipping_address') }}
            </th>
            <th>
                {{ trans('order.status') }}
            </th>
            <th> {{ trans('order.edit') }} </th>
            <th> {{ trans('order.show') }} </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user_id }}</td>
                <td>{{ $order->price }}</td>
                <td>{{ $order->shipping_address }}</td>
                <td class="value-order">
                    @if ($order->isUnpaid())
                        <button class="btn btn-default btn-sm">
                            {{ trans('order.unpaid') }}
                        </button>
                    @elseif ($order->isPaid())
                        <button class="btn btn-success btn-sm">
                            {{ trans('order.paid') }}
                        </button>
                    @else
                        <button class="btn btn-danger btn-sm">
                            {{ trans('order.destroy') }}
                        </button>
                    @endif
                </td>
                <td>
                    <a href="{{ action('Admin\OrderController@edit', [
                            'id' => $order->id
                        ]) }}"
                        class="btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ action('Admin\OrderController@show', [
                            'id' => $order->id
                        ]) }}"
                        class="btn btn-success btn-sm">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
