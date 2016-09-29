@extends('layouts.admin')

@section('title')
    {{ trans('admin/users.create_categories') }}
@endsection

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">{{ trans('admin/users.create_categories') }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel-body col-lg-8 col-lg-offset-2">
            {!! Form::open([
                'route' => 'category.store',
                'method' => 'POST',
                'class' => 'form-horizontal'
            ]) !!}
                <div class="form-group">
                    {!! Form::label('name', trans('category.name')) !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    <hr>
                    {!! Form::label('description', trans('category.description')) !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                    <hr>
                    <div class="text-center">
                        {!! Form::submit(trans('category.save'), ['class' => 'btn btn-primary btn-edit-category-submit']) !!}
                        <a href="{!! route('category.index') !!}" class="btn btn-default">
                            {{ trans('category.back') }}
                        </a>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <!-- /.row -->
</div>

@endsection

@section('js')
    {!! Html::script('js/admin/category.js') !!}
@endsection
