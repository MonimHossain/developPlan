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
                            <h5>@lang("Project Type Create") </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{route('project-type.store')}}" method="post" class="form-horizontal">
                              <div class="control-group">

                                  <label class="control-label"> @lang("Keyword"){{required()}} :</label>
                                  <div class="controls">
                                      <input type="text" name="keyword"  value="{{old('keyword')}}"class="span11" placeholder=" @lang("Keyword")" pattern=".{2,2}" title="Please insert atleast 2 character keyword" maxlength="2" required />
                                  </div>
                              </div>
                                <div class="control-group">
                                    @csrf
                                    <label class="control-label"> @lang("Project Type") :</label>
                                    <div class="controls">
                                        <input type="text" name="project_type" value="{{old('project_type')}}" class="span11" placeholder=" @lang("Project Type")" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"> @lang("Project Type (Bangla)") :</label>
                                    <div class="controls">
                                        <input type="text" name="project_type_bn" value="{{old('project_type_bn')}}" class="span11" placeholder=" @lang("Project Type Bangla")" />
                                    </div>
                                </div>



                                <div class="control-group">
                                    <label class="control-label">@lang('Project Type Description') :</label>
                                    <div class="controls">
                                        <textarea name="project_type_description" class="span11" rows="4" placeholder="@lang('Project Type Description') ">{{old('project_type_description')}}</textarea>
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
                                    <a href="{{route('project-type.index')}} " class="btn btn-danger">@lang("Close")</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
