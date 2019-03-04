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
                            <h5>@lang("Create Project Source") </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{route('project-source.store')}}" method="post" class="form-horizontal">
                                <div class="control-group">
                                    @csrf
                                    <label class="control-label"> @lang('Source Name'){{required()}} :</label>
                                    <div class="controls">
                                        <input type="text" name="source_name" class="span11" placeholder=" @lang("Source Name")"  value="{{old('source_name')}}" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"> @lang('Source Name (Bangla)') :</label>
                                    <div class="controls">
                                        <input type="text" name="source_name_bn" class="span11" placeholder=" @lang("Source Name Bangla")"  value="{{old('source_name_bn')}}" />
                                    </div>
                                </div>



                                <div class="control-group">
                                    <label class="control-label">@lang('Source Description') :</label>
                                    <div class="controls">
                                        <textarea name="source_description" class="span11" placeholder="@lang('Source Description') ">{{old('source_description')}}</textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">@lang('Status') :</label>
                                    <div class="controls">

                                        <select name="status">
                                            <option selected  value=""> @lang('Select')</option>

                                            <option  selected value="1">@lang('Active')</option>
                                            <option value="0">@lang('Inactive')</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">@lang("Save")</button>
                                    <a href="{{route('project-source.index')}} " class="btn btn-danger">@lang("Close")</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
