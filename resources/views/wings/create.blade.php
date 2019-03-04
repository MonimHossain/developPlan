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
                            <h5>@lang("Wings Type Create") </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{route('wings.store')}}" method="post" class="form-horizontal">
                                <div class="control-group">
                                    @csrf
                                    <label class="control-label"> @lang("Wings Type") :</label>
                                    <div class="controls">
                                        <input type="text" name="wings_type" class="span11" placeholder=" @lang("Wings Type")" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"> @lang("Wings Type (Bangla)") :</label>
                                    <div class="controls">
                                        <input type="text" name="wings_type_bn" class="span11" placeholder=" @lang("Wings Type Bangla")" />
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">@lang('Wings Type Description') :</label>
                                    <div class="controls">
                                        <textarea name="wings_type_description" class="span11" rows="4" placeholder="@lang('Wings Type Description') "></textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">@lang('Status') :</label>
                                    <div class="controls">
                                        <select name="status">
                                            <option  selected value=""> @lang('Select')</option>
                                            <option   value="1">@lang('Active')</option>
                                            <option value="0">@lang('Inactive')</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">@lang("Save")</button>
                                    <a href="{{route('wings.index')}} " class="btn btn-danger">@lang("Close")</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
