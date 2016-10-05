<table class="table table-responsive" id="users-table">
    <thead>
        <th>{{ trans('user.id') }}</th>
        <th>{{ trans('user.avatar') }}</th>
        <th>{{ trans('user.name') }}</th>
        <th>{{ trans('user.email') }}</th>
        <th>{{ trans('user.phone') }}</th>
        <th>{{ trans('user.address') }}</th>
        <th>{{ trans('user.role') }}</th>
        <th>{{ trans('user.action') }}</th>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>
                <img alt="{{ $user->name }}"
                    src="{{ is_null($user->avatar) ?
                        config('user.avatar.default_url') : $user->avatar }}"
                    class="img-circle img-responsive img-user-avatar">
            </td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->address }}</td>
            <td>
                @if ($user->isAdmin())
                    {{ trans('admin/users.admin') }}
                @else
                    {{ trans('admin/users.user') }}
                @endif
            </td>
            <td>
                {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('user.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @if ($user->isCurrent()|| !$user->isAdmin())
                        <a href="{!! route('user.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    @endif
                    @if ($user->isCurrent() && !$user->isAdmin())
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("' . trans('label.confirm_delete') . '")']) !!}
                    @endif
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
