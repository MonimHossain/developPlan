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

                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>@lang("Add Division") </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{route('division.store')}}" method="post" class="form-horizontal">
                                <div class="control-group">
                                    @csrf
                                    <label class="control-label"> @lang("Division Name"){{required()}} :</label>
                                    <div class="controls">
                                        <input type="text" name="division_name" class="span11" placeholder=" @lang("Division Name")" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    @csrf
                                    <label class="control-label"> @lang("Division Name (Bangla)"):</label>
                                    <div class="controls">
                                        <input type="text" name="division_name_bn" class="span11" placeholder=" @lang("Division Name (Bangla)")" />
                                    </div>
                                </div>



                                <div class="control-group">
                                    <label class="control-label">@lang('Division Description') :</label>
                                    <div class="controls">
                                        <textarea name="division_description" class="span11" placeholder="@lang('Division Description') "></textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">@lang('Status') :</label>
                                    <div class="controls">

                                        <select name="status">
                                            <option value="1"> @lang('Select')</option>

                                            <option selected  value="1">@lang('Active')</option>
                                            <option value="0">@lang('Inactive')</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">@lang("Save")</button>
                                    <a href="{{route('division.index')}} " class="btn btn-danger">@lang("Close")</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
