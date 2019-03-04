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
                            <h5>@lang("Edit Sector") </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{ route('sector.update',
                            $sector->id)}}" method="post" class="form-horizontal">

                                @method('PATCH')
                                @csrf
                                <div class="control-group">

                                    <label class="control-label"> @lang("Keyword"){{required()}} :</label>
                                    <div class="controls">
                                        <input type="text" name="keyword"  value="{{$sector->keyword}}"class="span11" placeholder=" @lang("Keyword")" pattern=".{2,2}" title="Please insert atleast 2 character keyword" maxlength="2" required />
                                    </div>
                                </div>
                                <div class="control-group">

                                    <label class="control-label"> @lang("Sector Name"){{required()}} :</label>
                                    <div class="controls">
                                        <input type="text" value="{{$sector->sector_name}}" name="sector_name" class="span11" placeholder=" @lang("Sector Name")" />
                                    </div>
                                </div>
                                <div class="control-group">

                                    <label class="control-label"> @lang("Sector Name (Bangla)") :</label>
                                    <div class="controls">
                                        <input type="text" value="{{$sector->sector_name_bn}}" name="sector_name_bn" class="span11" placeholder=" @lang("Sector Name (Bangla)")" />
                                    </div>
                                </div>



                                <div class="control-group">
                                    <label class="control-label">@lang('Sector Description') :</label>
                                    <div class="controls">
                                        <textarea  name="sector_description" class="span11" placeholder="@lang('Sector Description') "> {{$sector->sector_description}}</textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">@lang('Status') :</label>
                                    <div class="controls">

                                        <select name="status" >
                                            <option value=""> @lang('Select')</option>

                                            <option
                                                @if($sector->status==1)
                                                {{'selected'}}
                                                @endif
                                             value="1">@lang('Active')</option>
                                            <option
                                             @if($sector->status==0)
                                                {{'selected'}}
                                                @endif
                                            value="0">@lang('Inactive')</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">@lang("Update")</button>
                                    <a href="{{route('sector.index')}}" class="btn btn-danger">@lang("Close Update")</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
