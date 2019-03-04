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
                            <h5>@lang("Add Agency") </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{route('agency.store')}}" method="post" class="form-horizontal">
                                @csrf
                              <div class="control-group">

                                  <label class="control-label"> @lang("Keyword"){{required()}} :</label>
                                  <div class="controls">
                                      <input type="text" name="keyword"  value="{{old('keyword')}}"class="span11" placeholder=" @lang("Keyword")" pattern=".{2,2}" title="Please insert atleast 2 character keyword" maxlength="2" required />
                                  </div>
                              </div>
                                <div class="control-group">

                                    <label class="control-label"> @lang("Agency Name"){{required()}} :</label>
                                    <div class="controls">
                                        <input type="text" name="agency_name" class="span11" placeholder=" @lang("Agency Name")" value="{{old('agency_name')}}" />
                                    </div>
                                </div>
                                <div class="control-group">

                                    <label class="control-label"> @lang("Agency Name (Bangla)"):</label>
                                    <div class="controls">
                                        <input type="text" name="agency_name_bn" class="span11" placeholder=" @lang("Agency Name (Bangla)")" value="{{old('agency_name_bn')}}" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">@lang('Ministry name') :</label>
                                    <div class="controls">
                                        <select name="ministry_id" >
                                            <option value=""  selected> @lang('Select Ministry')</option>
                                            @foreach($ministry as $data)
                                            <option value="{{$data->id}}">{{$data->ministry_name}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>



                                <div class="control-group">
                                    <label class="control-label">@lang('Agency Description'):</label>
                                    <div class="controls">
                                        <textarea name="agency_description" class="span11" placeholder="@lang('Agency Description') ">{{old('agency_description')}}</textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">@lang('Status'):</label>
                                    <div class="controls">
                                        <select name="status">
                                            <option></option>
                                            <option selected="" value="1">@lang('Active')</option>
                                            <option value="0">@lang('InActive')</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">@lang("Save")</button>
                                    <a href="{{route('agency.index')}} " class="btn btn-danger">@lang("Close")</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
