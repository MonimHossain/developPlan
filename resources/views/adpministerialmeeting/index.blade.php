@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{route('dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> @lang("Home") </a></div>
    </div>
    <!--End-breadcrumbs-->

    <div class="container-fluid">

        <div class="row-fluid">
            <div class="span12">
               
                <div class="clearfix">
                    <!--<span class="pull-right"> <a href="{{route('newproject.create')}}" class="btn btn-success "><i class="icon-plus"></i> @lang('Add')</a> </span>-->
                </div>

                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>@lang('Data table') </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="{{route('newprojectlist.store')}}" method="post" class="form-horizontal">
                            <table class="table table-bordered data-table" id="dataList">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="chkprojectall" value=""></th>
                                        <th>@lang('Serial No')</th>
                                        <th>@lang("Project Name English")</th>
                                        <th>@lang("Project Name Bangla")</th>
                                        <th>@lang('Action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach($unapproved_project as $un_p_list)
                                    <tr>
                                        <td><input type="checkbox" name="chkproject" value="{{$un_p_list->id}}"> </td>
                                        <td>{{$i++}}</td>
                                        <td>{{$un_p_list->project_title}}</td>
                                        <td>{{$un_p_list->project_tiltle_bn}}</td>
                                        <td>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">@lang("Send TO Ministry")</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection