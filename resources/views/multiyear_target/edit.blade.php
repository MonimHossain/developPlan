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
                            <h5>@lang("EDIT MULTI-YEAR TARGETS") </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{ route('multiyear-target.update',$multiyear_targets->id)}}" method="post" class="form-horizontal">
                                @method('PATCH')
                                @csrf
                                <div class="control-group">
                                    <label class="control-label"> @lang("Gole Name") :{{ required() }} </label>
                                    <div class="controls">
                                        <select name="gole_id">
                                            <option> @lang('Select Gole')</option>
                                            @foreach($multiyear_goals as $pppgoles)
                                            <option value="{{$pppgoles->id}}" @if($multiyear_targets->gole_id==$pppgoles->id) selected @endif > {{$pppgoles->gole_name}}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"> @lang("Targets") : {{ required() }} </label>
                                    <div class="controls">
                                        <textarea name="targets" class="span11" placeholder="@lang('Targets') "> {{$multiyear_targets->targets}} </textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">@lang('Description') :</label>
                                    <div class="controls">
                                        <textarea  name="description" class="span11" placeholder="@lang('Description') "> {{$multiyear_targets->description}}</textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">@lang('Status') :</label>
                                    <div class="controls">
                                        <select name="status">
                                            <option> @lang('Select')</option>
                                            <option value="1" @if($multiyear_targets->status==1) selected @endif>@lang('Active') </option>
                                            <option value="0" @if($multiyear_targets->status==0) selected @endif>@lang('Inactive')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">@lang("Update")</button>
                                    <a href="{{route('multiyear-target.index')}}" class="btn btn-danger">@lang("Close Update")</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection