<table class="table table-responsive" id="products-table"
    data-confirm-content="{{ trans('label.confirm_delete_product') }}"
    data-confirm-title="{{ trans('label.confirm_delete_product_title')
}}">
    <thead>
        <th>{{ trans('product.id') }}</th>
        <th>{{ trans('product.name') }}</th>
        <th>{{ trans('product.category') }}</th>
        <th>{{ trans('product.description') }}</th>
        <th>{{ trans('product.image') }}</th>
        <th>{{ trans('product.price') }}</th>
        <th>{{ trans('product.quantity') }}</th>
        <th>{{ trans('product.status') }}</th>
        <th>{{ trans('product.rate_average') }}</th>
        <th>{{ trans('product.rate_count') }}</th>
        <th>{{ trans('product.view_count') }}</th>
        <th>{{ trans('category.action') }}</th>
    </thead>
    <tbody>
    @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>
                <a href="{{ action('Admin\CategoriesController@show', ['id' => $product->category_id]) }}">
                    {{ $product->category->name }}
                </a>
            </td>
            <td>{{ $product->description }}</td>
            <td>
                <img src="{{ $product->image }}" class="img-product">
            </td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->status ? trans('product.active') : trans('product.disable') }}</td>
            <td>{{ empty($product->rate_average) ? config('common.default_rate_average') : $product->rate_average }}</td>
            <td>{{ empty($product->rate_count) ? config('common.default_rate_count') : $product->rate_count }}</td>
            <td>{{ empty($product->view_count) ? config('common.default_view_count') : $product->view_count }}</td>
            <td>
                {!! Form::open([
                        'route' => ['product.destroy', $product->id],
                        'class' => 'form-delete-product',
                        'method' => 'delete'
                    ]) !!}
                        <i class="btn btn-success btn-task-product" data-product-id="{{ $product->id }}">
                            {{ trans('admin/users.show_task') }}
                        </i>
                    {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="modal fade modal-product-task">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">{{ trans('admin/users.modal_task_title') }}</h4>
                </div>
                <div class="modal-body text-center">
                    <button class="btn btn-primary btn-product-detail">
                        {{ trans('admin/users.view_details') }}
                    </button>
                    <button class="btn btn-success btn-product-edit">
                        {{ trans('admin/users.edit_product') }}
                    </button>
                    <button class="btn btn-danger btn-product-delete">
                        {{ trans('admin/users.delete') }}
                    </button>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin/users.close') }}</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
