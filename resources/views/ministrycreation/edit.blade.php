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
                            <h5>@lang("Edit Ministry") </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{ route('ministry.update',$show_editministry->id)}}" method="post" class="form-horizontal">

                                @method('PATCH')
                                @csrf
                                <div class="control-group">

                                    <label class="control-label"> @lang("Keyword"){{required()}} :</label>
                                    <div class="controls">
                                        <input type="text" name="keyword"  value="{{$show_editministry->keyword}}"class="span11" placeholder=" @lang("Keyword")" pattern=".{2,2}" title="Please insert atleast 2 character keyword" maxlength="2" required />
                                    </div>
                                </div>
                                <div class="control-group">

                                    <label class="control-label"> @lang("Ministry Name"){{required()}} :</label>
                                    <div class="controls">
                                        <input type="text" value="{{$show_editministry->ministry_name}}" name="ministry_name" class="span11" placeholder=" @lang("Ministry Name")" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"> @lang("Ministry Name (Bangla)"):</label>
                                    <div class="controls">
                                        <input type="text" value="{{$show_editministry->ministry_name_bn}}" name="ministry_name_bn" class="span11" placeholder=" @lang("Ministry Name (Bangla)")" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">@lang("Sector")</label>
                                    <div class="controls">
                                        <select name="sector_id" onchange="sector_to_subsector(this)">
                                            <option></option>
                                            @foreach($sector as $sector)
                                            <option value="{{ $sector->id }}" @if($sector->id == $show_editministry->sector_id) selected @endif >{{ $sector->sector_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">@lang("Sub-Sector")</label>
                                    <div class="controls">
                                        <select name="subsector_id" id="sub_sector">
                                            <option></option>
                                            @foreach($subsector as $subsector)
                                            <option value="{{ $subsector->id }}" @if($subsector->id == $show_editministry->subsector_id) selected @endif  >{{ $subsector->sub_sector_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">@lang('Description') :</label>
                                    <div class="controls">
                                        <textarea  name="ministry_description" class="span11" placeholder="@lang('Ministry Description') "> {{$show_editministry->ministry_description}}</textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">@lang('Status') :</label>
                                    <div class="controls">

                                        <select name="status">
                                            <option> @lang('Select')</option>

                                            <option value="1"@if($show_editministry->status==1) selected @endif>@lang('Active') </option>

                                            <option value="0" @if($show_editministry->status==0) selected @endif>@lang('Inactive')</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">@lang("Update")</button>
                                    <a href="{{route('ministry.index')}}" class="btn btn-danger">@lang("Close Update")</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
