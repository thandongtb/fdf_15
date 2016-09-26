@extends('layouts.admin')

@section('title')
    {{ trans('admin/users.edit_category') }}
@endsection
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">{{ trans('admin/users.edit_category') }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
       <div class="panel-body col-lg-8 col-lg-offset-2">
            {{ Form::model($category, [
                'route' => ['category.update', $category->id],
                'method' => 'PUT'])
            }}
                <div class="form-group">
                    {!! Form::label('name', trans('category.name')) !!}
                    {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}
                    <hr>
                    {!! Form::label('description', trans('category.description')) !!}
                    {!! Form::textarea('description', $category->description, ['class' => 'form-control']) !!}
                    <hr>
                    <div class="text-center">
                        {!! Form::submit(trans('category.update'), ['class' => 'btn btn-success btn-edit-category-submit']) !!}
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
<!-- /#page-wrapper -->
@endsection

@section('js')
    {!! Html::script('js/admin/category.js') !!}
@endsection
