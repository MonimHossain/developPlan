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
                            <h5>@lang("PPP GOLE") </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{route('pppgole.store')}}" method="post" class="form-horizontal">
                                <div class="control-group">
                                    @csrf
                                    <label class="control-label"> @lang("Gole NO") : {{ required() }} </label>
                                    <div class="controls">
                                        <input type="text" name="gole_no" class="span11" placeholder="@lang("Gole No")" />  
                                    </div>
                                </div>
                                <div class="control-group">
                                    @csrf
                                    <label class="control-label"> @lang("Gole Name") : {{ required() }}</label>
                                    <div class="controls">
                                        <input type="text" name="gole_name" class="span11"  placeholder="@lang("Gole Name")"  /> 
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">@lang('Description') :</label>
                                    <div class="controls">
                                        <textarea name="description" class="span11" placeholder="@lang('Description') "></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">@lang('Status') :</label>
                                    <div class="controls">

                                        <select name="status">
                                            <option> @lang('Select')</option>
                                            <option  selected="" value="1">@lang('Active')</option>
                                            <option value="0">@lang('Inactive')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">@lang("Save")</button>
                                    <a href="{{route('pppgole.index')}} " class="btn btn-danger">@lang("Close")</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection