@extends('layouts.admin')

@section('title')
    {{ trans('admin/users.edit_order') }}
@endsection

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">{{ trans('admin/users.edit_order') }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="panel-body col-lg-8 col-lg-offset-2">
            <div class="col-lg-6 col-lg-offset-3">
                {!! Form::model($order, [
                    'method' => 'PUT',
                    'action' => ['Admin\OrderController@update', $order['id']],
                    'class' => 'form-horizontal',
                ]) !!}
                    <div class="form-group">
                        {!! Form::label('status', trans('order.status'), [
                            'class' => 'control-label',
                        ]) !!}
                        {!! Form::select('status',
                            $optionStatus,
                            $order['status'],
                            ['class' => 'form-control'])
                        !!}
                    </div>
                    <div class="form-group">
                        {!! Form::button('<i class="fa fa-edit"></i>&nbsp;' . trans('order.update'), [
                            'type' => 'submit',
                            'class' => 'btn btn-success btn-md',
                        ]) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
