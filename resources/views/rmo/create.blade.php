@extends('layouts.adminLayout.admin_design')
@section('title','Add Rmo')
@section('content')
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{route('dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
        </div>
        <!--End-breadcrumbs-->

        <div class="container-fluid">

            <div class="row-fluid">
                <div class="span12">
                  
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>@lang('Add Rmo')</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{ route('rmo_setup.store') }}" method="post" class="form-horizontal">
                                <div class="control-group">
                                    @csrf
                                    <label class="control-label">@lang('Name') :</label>
                                    <div class="controls">
                                        <input type="text" name="rmo_name" class="span11" placeholder="@lang('Rmo Name')" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">@lang('Name (Bangla)') :</label>
                                    <div class="controls">
                                        <input type="text" name="rmo_name_bn" class="span11" placeholder="@lang('Name (Bangla)')" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">@lang("Description") :</label>
                                    <div class="controls">
                                        <textarea name="rmo_description" class="span11 textarea_editor" rows="5" placeholder="@lang("Rmo Description")"></textarea>
                                    </div>
                                </div>
                            <div class="control-group">
                                    <label class="control-label">@lang('Status') :</label>
                                    <div class="controls">
                                        <select name="status">
                                            <option value="">@lang('Select')</option>
                                            <option value="0">@lang('Inactive')</option>
                                            <option selected="" value="1">@lang('Active')</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">@lang("Save")</button>
                                    <a href="{{ route('rmo_setup.index')}}" class="btn btn-danger">@lang("Close")</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
