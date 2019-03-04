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
                   
                    {{-- <div class="">
                      {{$povertytarget->id}}
                    </div> --}}

                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>@lang("POVERTY TARGETS EDIT") </h5>

                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{route('poverty-target.update',$povertytarget->id)}}" method="post" class="form-horizontal">
                                @method('PATCH')
                                <div class="control-group">
                                    @csrf
                                    <label class="control-label"> @lang("Goal Name") : {{ required() }}</label>
                                    <div class="controls">
                                        <select name="goal_name_id">
                                            <option value=""> @lang('Select Poverty Goal')</option>
                                            @foreach($povertygoals as $povertygoal)

                                            <option @if ($povertygoal->id==$povertytarget->goal_name_id)
                                              {{'selected'}}
                                            @endif value="{{$povertygoal->id}}"> {{$povertygoal->goal_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                 <div class="control-group">
                                    @csrf
                                    <label class="control-label"> @lang("Targets") : {{ required() }}</label>
                                    <div class="controls">
                                        <textarea name="target" class="span11" placeholder="@lang('Targets') ">{{$povertytarget->target}}</textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">@lang('Description') :</label>
                                    <div class="controls">
                                        <textarea name="target_description" class="span11" placeholder="@lang('Description') ">{{$povertytarget->target_description}}</textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">@lang('Status') :</label>
                                    <div class="controls">
                                        <select name="status">
                                            <option value=""> @lang('Select')</option>
                                            <option  @if ($povertytarget->status==1)
                                              {{'selected'}}
                                            @endif  value="1">@lang('Active')</option>
                                            <option
                                            @if ($povertytarget->status==0)
                                              {{'selected'}}
                                            @endif
                                             value="0">@lang('Inactive')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">@lang("Save")</button>
                                    <a href="{{route('poverty-target.index')}} " class="btn btn-danger">@lang("Close")</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
