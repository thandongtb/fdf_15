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
            <td>
                <a href="{!! route('category.show', [$category->id]) !!}">
                   {{ $category->name }}
                </a>
            </td>
            <td>{{ $category->description }}</td>
            <td>
                <div class='btn-group'>
                    {!! Form::open([
                        'route' => ['category.destroy', $category->id],
                        'class' => 'form-delete-category',
                        'method' => 'delete'
                    ]) !!}
                    <a href="{!! route('category.show', [$category->id]) !!}" class='btn btn-default btn-xs'>
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                    <a href="{!! route('category.edit', [$category->id]) !!}" class='btn btn-default btn-xs'>
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>
                    <i class="glyphicon glyphicon-trash btn-delete-category"></i>
                    {!! Form::close() !!}
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
