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
                            <h5>@lang("Update Fiscal Year") </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{route('fiscal-year.update',$fiscalyear->id)}}" method="post" class="form-horizontal">
                                <div class="control-group">
                                    @method('PATCH')
                                    @csrf
                                    <label class="control-label"> @lang("Start Date") :</label>
                                    <div class="controls">
                                        <input type="text" name="start_date" id="datepicker" class="span4 datepicker" placeholder=" @lang("Start date")" value="{{$commonclass->dateToView($fiscalyear->start_date)}}" autocomplete="off" />
                                    </div>
                                </div>



                                <div class="control-group">
                                    <label class="control-label"> @lang("End Date") :</label>
                                    <div class="controls">
                                        <input type="text" name="end_date" id="datepicker" class="span4 datepicker" placeholder=" @lang("End date")"  value="{{$commonclass->dateToView($fiscalyear->end_date)}}" autocomplete="off"/>
                                    </div>
                                </div>

                                <div class="control-group ">
                                    <label class="control-label">@lang('Year Status') :</label>
                                    <div class="controls ">

                                        <select name="year_status" class="span4">
                                            <option value=""> @lang('Select')</option>

                                            <option value="1"@if($fiscalyear->year_status==1) selected @endif>@lang('Active') </option>

                                            <option value="0" @if($fiscalyear->year_status==0) selected @endif>@lang('Inactive')</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">@lang('Status') :</label>
                                    <div class="controls">

                                        <select name="status" class="span4">
                                            <option value=""> @lang('Select')</option>

                                            <option value="1"@if($fiscalyear->status==1) selected @endif>@lang('Active') </option>

                                            <option value="0" @if($fiscalyear->status==0) selected @endif>@lang('Inactive')</option>
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
