@extends('layouts.admin')

@section('title')
    {{ trans('admin/users.admin_title') }}
@endsection

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center">{{ trans('admin/users.admin_title') }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2">
                            <i class="fa fa-users fa-3x"></i>
                        </div>
                        <div class="col-xs-10 text-right">
                            <div class="huge">111</div>
                            <div>{{ trans('admin/users.manage_users') }}</div>
                        </div>
                    </div>
                </div>
                <a href="">
                    <div class="panel-footer">
                        <span class="pull-left">{{ trans('admin/users.view_details') }}</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2">
                            <i class="fa fa-tasks fa-3x"></i>
                        </div>
                        <div class="col-xs-10 text-right">
                            <div class="huge">115</div>
                            <div>{{ trans('admin/users.manage_categories') }}</div>
                        </div>
                    </div>
                </div>
                <a href="">
                    <div class="panel-footer">
                        <span class="pull-left">{{ trans('admin/users.view_details') }}</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2">
                            <i class="fa fa-file-text-o fa-3x"></i>
                        </div>
                        <div class="col-xs-10 text-right">
                            <div class="huge">112</div>
                            <div>{{ trans('admin/users.manage_product') }}</div>
                        </div>
                    </div>
                </div>
                <a href="">
                    <div class="panel-footer">
                        <span class="pull-left">{{ trans('admin/users.view_details') }}</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2">
                            <i class="fa fa-font fa-3x"></i>
                        </div>
                        <div class="col-xs-10 text-right">
                            <div class="huge">113</div>
                            <div>{{ trans('admin/users.manage_orders') }}</div>
                        </div>
                    </div>
                </div>
                <a href="">
                    <div class="panel-footer">
                        <span class="pull-left">{{ trans('admin/users.view_details') }}</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->
@endsection
