<table class="table table-responsive" id="categories-table"
    data-confirm-content="{{ trans('label.confirm_delete_category') }}"
    data-confirm-title="{{ trans('label.confirm_delete_category_title')
}}">
    <thead>
        <th>{{ trans('category.id') }}</th>
        <th>{{ trans('category.name') }}</th>
        <th>{{ trans('category.description') }}</th>
        <th>{{ trans('category.action') }}</th>
    </thead>
    <tbody>
    @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                <div class='btn-group'>
                    {!! Form::open([
                        'route' => ['category.destroy', $category->id],
                        'class' => 'form-delete-category',
                        'method' => 'delete'
                    ]) !!}
                    <i class="glyphicon glyphicon-trash btn-delete-category"></i>
                    {!! Form::close() !!}
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
