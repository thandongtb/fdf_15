@extends('layouts.app')

@section('css')
    {!! Html::style('css/user.css') !!}
@endsection()

@section('content')

@include('home.header')

<div id="page-wrapper">
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>{{ trans('admin/users.all_categories') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area <--></-->
    @include('layouts.message')
    <hr>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-responsive shop_table"
                                data-confirm-content="{{ trans('label.confirm_delete_category') }}"
                                data-confirm-title="{{ trans('label.confirm_delete_category_title')
                            }}">
                                <thead>
                                    <th>{{ trans('category.id') }}</th>
                                    <th>{{ trans('category.name') }}</th>
                                    <th>{{ trans('category.description') }}</th>
                                </thead>
                                <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>
                                            <a href="{!! action('Home\CategoriesController@show',
                                                ['id'=> $category->id]) !!}">
                                               {{ $category->name }}
                                            </a>
                                        </td>
                                        <td>{{ $category->description }}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            {!! $categories->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    {!! Html::script('js/category.js') !!}
@endsection
