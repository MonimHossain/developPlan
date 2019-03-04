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
                        <h5>@lang("User Group") </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="{{ route('usergroup.store') }}" method="post" class="form-horizontal">
                            <div class="control-group">
                                @csrf
                                <label class="control-label">@lang("Group Name") :</label>
                                <div class="controls">
                                    <input type="text" name="group_name" class="span11" placeholder="@lang("Group Name") " />
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">@lang('Parent Group') :</label>
                                <div class="controls">
                                    <select name="sub_group">
                                        <option value=""> @lang('Select')</option>
                                        @foreach($usergroups as $ausergroup)
                                            <option value="{{ $ausergroup->id }}">{{ $ausergroup->group_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">@lang('Description') :</label>
                                <div class="controls">
                                    <textarea name="description" class="span11" placeholder="@lang('Description') "></textarea>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">@lang("Save")</button>
                                <a href="{{ route('usergroup.index')}}" class="btn btn-danger">@lang("Close")</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection