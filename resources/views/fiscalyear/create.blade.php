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
                            <h5>@lang("Create Fiscal Year") </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{route('fiscal-year.store')}}" method="post" class="form-horizontal">
                                <div class="control-group">
                                    @csrf
                                    <label class="control-label"> @lang("Start Date") :</label>
                                    <div class="controls">

                                        <input type="text" id="datepicker" name="start_date" class="span5 datepicker" placeholder=" @lang("Start date")"  autocomplete="off" />
                                    </div>
                                </div>



                                <div class="control-group">
                                    <label class="control-label"> @lang("End Date") :</label>
                                    <div class="controls">
                                        <input type="text" id="datepicker" name="end_date" class="span5 datepicker" placeholder=" @lang("End date")" autocomplete="off"  />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">@lang('Year Status') :</label>
                                    <div class="controls">

                                        <select name="year_status" class="span5">
                                            <option  selected="selected" value=""> @lang('Select')</option>

                                            <option value="1">@lang('Active')</option>
                                            <option value="0">@lang('Inactive')</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">@lang('Status') :</label>
                                    <div class="controls">

                                        <select name="status" class="span5">
                                            <option  selected="selected" value=""> @lang('Select')</option>

                                            <option value="1">@lang('Active')</option>
                                            <option value="0">@lang('Inactive')</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">@lang("Save")</button>
                                    <a href="{{route('fiscal-year.index')}} " class="btn btn-danger">@lang("Close")</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
