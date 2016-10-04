<table class="table table-responsive" id="suggest-table"
    data-confirm-content="{{ trans('label.confirm_delete_product') }}"
    data-confirm-title="{{ trans('label.confirm_delete_product_title')
}}">
    <thead>
        <th>{{ trans('product.id') }}</th>
        <th>{{ trans('product.name') }}</th>
        <th>{{ trans('product.image') }}</th>
        <th>{{ trans('product.category') }}</th>
        <th>{{ trans('product.description') }}</th>
        <th>{{ trans('product.user_suggest') }}</th>
    </thead>
    <tbody>
    @foreach ($suggests as $suggest)
        <tr>
            <td>{{ $suggest->id }}</td>
            <td>{{ $suggest->name }}</td>
            <td>
                <img src="{{ $suggest->image }}" class="img-product">
            </td>
            <td>
                <a href="{{ action('Admin\CategoriesController@show',
                    ['id' => $suggest->category_id]) }}">
                    {{ $suggest->category->name }}
                </a>
            </td>
            <td>{{ $suggest->description }}</td>
            <td>
                <a href="{!! action('Admin\UsersController@show', [$suggest->user->id]) !!}">
                    {{ $suggest->user->name }}
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
