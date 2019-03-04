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
                            <h5>@lang("Edit Gender TARGETS") </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{ route('genderGoalTarget.update',$genderTarget->id)}}" method="post" class="form-horizontal">
                                @method('PATCH')
                                @csrf
                                <div class="control-group">
                                    <label class="control-label"> @lang("Goal Name") :{{ required() }} </label>
                                    <div class="controls">
                                        <select name="goal_id">
                                            <option> @lang('Select Goal')</option>
                                            @foreach($genderGoal as $val)
                                            <option value="{{$val->id}}" @if($genderTarget->goal_id==$val->id) selected @endif > {{$val->goal_name}}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"> @lang("Targets") : {{ required() }} </label>
                                    <div class="controls">
                                        <textarea name="targets" class="span11" placeholder="@lang('Targets') "> {{$genderTarget->targets}} </textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">@lang('Description') :</label>
                                    <div class="controls">
                                        <textarea  name="description" class="span11" placeholder="@lang('Description') "> {{$genderTarget->description}}</textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">@lang('Status') :</label>
                                    <div class="controls">
                                        <select name="status">
                                            <option> @lang('Select')</option>
                                            <option value="1" @if($genderTarget->status==1) selected @endif>@lang('Active') </option>
                                            <option value="0" @if($genderTarget->status==0) selected @endif>@lang('Inactive')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">@lang("Update")</button>
                                    <a href="{{route('genderGoalTarget.index')}}" class="btn btn-danger">@lang("Close Update")</a>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection