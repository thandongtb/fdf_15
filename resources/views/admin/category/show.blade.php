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
                    <table class="table table-category-information">
                        <tbody>
                            <tr>
                                <td>{{ trans('category.id') }}:</td>
                                <td>{{ $category->id }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('category.name') }}:</td>
                                <td>{{ $category->name }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('category.description') }}:</td>
                                <td>{{ $category->description }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('category.created_at') }}:</td>
                                <td>{{ $category->created_at }}</td>
                            </tr>
                            <tr>
                                <td>{{ trans('category.updated_at') }}:</td>
                                <td>{{ $category->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
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
    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->
@endsection

@section('js')
    {!! Html::script('js/admin/category.js') !!}
@endsection
