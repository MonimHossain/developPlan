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
                            <h5>@lang("Approval Setup Edit") </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{route('approval-setup.update',$approval_info->id)}}" method="post" class="form-horizontal">
                                <div class="control-group">
                                    @csrf
                                    @method('PATCH')
                                    <label class="control-label"> @lang("Approved By") :</label>
                                    <div class="controls">
                                        <input type="text" value="{{$approval_info->approved_by}}" name="approved_by" class="span11" placeholder=" @lang("Project Type")" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    @csrf
                                    @method('PATCH')
                                    <label class="control-label"> @lang("Approved by (Bangla)") :</label>
                                    <div class="controls">
                                        <input type="text" value="{{$approval_info->approved_by_bn}}" name="approved_by_bn" class="span11" placeholder=" @lang("Approved by (Bangla)")" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">@lang('Description') :</label>
                                    <div class="controls">
                                        <textarea name="description" class="span11" placeholder="@lang('Description') "> {{$approval_info->description}}</textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">@lang('Status') :</label>
                                    <div class="controls">

                                        <select name="status">
                                            <option value=""> @lang('Select')</option>

                                            <option value="0" @if($approval_info->status == 0)
                                            selected
                                          @endif>@lang('Inactive')</option>
                                            <option value="1" @if($approval_info->status == 1)
                                            selected
                                          @endif>@lang('Active')</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">@lang("Update")</button>

                                    <a href="{{route('approval-setup.index')}} " class="btn btn-danger">@lang("Close")</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
