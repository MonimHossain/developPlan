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
                            <h5>@lang("Edit Budget Head Information") </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{ route('budget-head.update',$budgethead->id)}}" method="post" class="form-horizontal">

                                @method('PATCH')
                                @csrf
                                <div class="control-group">

                                    <label class="control-label"> @lang("Budget Head") :</label>
                                    <div class="controls">
                                        <input type="text" value="{{$budgethead->budget_head_name}}" name="budget_head_name" class="span11" placeholder=" @lang("Budget Head")" />
                                    </div>
                                </div>
                                <div class="control-group">

                                    <label class="control-label"> @lang("Budget Head (Bangla)") :</label>
                                    <div class="controls">
                                        <input type="text" value="{{$budgethead->budget_head_name_bn}}" name="budget_head_name_bn" class="span11" placeholder=" @lang("Budget Head Bangla")" />
                                    </div>
                                </div>



                                <div class="control-group">
                                    <label class="control-label">@lang('Description') :</label>
                                    <div class="controls">
                                        <textarea  name="budget_head_description" class="span11" placeholder="@lang('Description') "> {{$budgethead->budget_head_description}}</textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">@lang('Status') :</label>
                                    <div class="controls">

                                        <select name="status">
                                            <option value=""> @lang('Select')</option>

                                            <option value="1"@if($budgethead->status==1) selected @endif>@lang('Active') </option>

                                            <option value="0" @if($budgethead->status==0) selected @endif>@lang('Inactive')</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">@lang("Update")</button>
                                    <a href="{{route('budget-head.index')}}" class="btn btn-danger">@lang("Close Update")</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection