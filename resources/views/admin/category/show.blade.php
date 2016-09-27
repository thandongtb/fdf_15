@extends('layouts.admin')

@section('title')
    {{ trans('admin/users.category_detail') }}
@endsection
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">{{ trans('admin/users.category_detail') }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel-body col-lg-8 col-lg-offset-2">
                <div class="form-group">
                    <div class="form-group col-sm-12">
                        {!! Form::label('id', trans('category.id')) !!}
                        <p>{!! $category->id !!}</p>
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('name', trans('category.name')) !!}
                        <p>{!! $category->name !!}</p>
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('description', trans('category.description')) !!}
                        <p>{!! $category->description !!}</p>
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('created_at', trans('category.created_at')) !!}
                        <p>{!! $category->created_at !!}</p>
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('updated_at', trans('category.updated_at')) !!}
                        <p>{!! $category->updated_at !!}</p>
                    </div>
                    <hr>
                    <div class="text-center">
                        <a href="{!! route('category.edit', [$category->id]) !!}" class="btn btn-success">
                            {{ trans('category.edit_category') }}
                        </a>
                        <a href="{!! route('category.index') !!}" class="btn btn-default">
                            {{ trans('category.back') }}
                        </a>
                    </div>
                </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->
@endsection

@section('js')
    {!! Html::script('js/admin/category.js') !!}
@endsection
