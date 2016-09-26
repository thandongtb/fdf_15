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
                        <i class="btn btn-success btn-task-category" data-category-id="{{ $category->id }}">
                            {{ trans('admin/users.show_task') }}
                        </i>
                    {!! Form::close() !!}
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="modal fade modal-category-task">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">{{ trans('admin/users.modal_task_title') }}</h4>
                </div>
                <div class="modal-body text-center">
                    <button class="btn btn-primary btn-category-detail">
                        trans('admin/users.view_details')
                    </button>
                    <button class="btn btn-success btn-category-edit">
                        trans('admin/users.edit_category')
                    </button>
                    <button class="btn btn-danger btn-category-delete">
                        trans('admin/users.delete')
                    </button>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin/users.close') }}</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
