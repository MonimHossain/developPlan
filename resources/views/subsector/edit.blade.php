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
                            <h5>@lang("Edit Sub Sector") </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{ route('sub-sector.update',
                            $subsector->id)}}" method="post" class="form-horizontal">

                                @method('PATCH')
                                @csrf


                                {{-- sector --}}
                                <div class="control-group">

                                    <label class="control-label"> @lang("Keyword"){{required()}} :</label>
                                    <div class="controls">
                                        <input type="text" name="keyword"  value="{{$subsector->keyword}}"class="span11" placeholder=" @lang("Keyword")" pattern=".{2,2}" title="Please insert atleast 2 character keyword" maxlength="2" required />
                                    </div>
                                </div>

                                 <div class="control-group">
                                    <label class="control-label">@lang('Select Sector'){{required()}}:</label>
                                    <div class="controls">

                                        <select name="sector_name">
                                            <option selected value="">@lang('select sector')</option>
                                            @foreach($sectors as $sector)
                                            <option  @if($subsector->sector_name==$sector->id) {{'selected'}} @endif value="{{$sector->id}}">{{$sector->sector_name}}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>

                                {{-- sector end --}}
                                <div class="control-group">

                                    <label class="control-label"> @lang("Sub Sector Name"){{required()}}:</label>
                                    <div class="controls">
                                        <input type="text" value="{{$subsector->sub_sector_name}}" name="sub_sector_name" class="span11" placeholder=" @lang("Sub Sector Name")" />
                                    </div>
                                </div>
                                <div class="control-group">

                                    <label class="control-label"> @lang("Sub Sector Name (Bangla)"):</label>
                                    <div class="controls">
                                        <input type="text" value="{{$subsector->sub_sector_name_bn}}" name="sub_sector_name_bn" class="span11" placeholder=" @lang("Sub Sector Name (Bangla)")" />
                                    </div>
                                </div>



                                <div class="control-group">
                                    <label class="control-label">@lang('Sub Sector Description') :</label>
                                    <div class="controls">
                                        <textarea  name="sub_sector_description" class="span11" placeholder="@lang('Sub Sector Description') "> {{$subsector->sub_sector_description}}</textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">@lang('Status') :</label>
                                    <div class="controls">

                                        <select name="status" >
                                            <option value=""> @lang('Select')</option>

                                            <option
                                                @if($subsector->status==1)
                                                {{'selected'}}
                                                @endif
                                             value="1">@lang('Active')</option>
                                            <option
                                             @if($subsector->status==0)
                                                {{'selected'}}
                                                @endif
                                            value="0">@lang('Inactive')</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">@lang("Update")</button>
                                    <a href="{{route('sub-sector.index')}}" class="btn btn-danger">@lang("Close Update")</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
