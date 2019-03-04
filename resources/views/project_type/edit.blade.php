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
                            <h5>@lang("Project Type Edit") </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{route('project-type.update',$projecttype->id)}}" method="post" class="form-horizontal">
                              @csrf
                              @method('PATCH')
                              <div class="control-group">

                                  <label class="control-label"> @lang("Keyword"){{required()}} :</label>
                                  <div class="controls">
                                      <input type="text" name="keyword"  value="{{$projecttype->keyword}}"class="span11" placeholder=" @lang("Keyword")" pattern=".{2,2}" title="Please insert atleast 2 character keyword" maxlength="2" required />
                                  </div>
                              </div>
                                <div class="control-group">
                                    <label class="control-label"> @lang("Project Type") :</label>
                                    <div class="controls">
                                        <input type="text" value="{{$projecttype->project_type}}" name="project_type" class="span11" placeholder=" @lang("Project Type")" />
                                    </div>
                                </div>
                              <div class="control-group">
                                  <label class="control-label"> @lang("Project Type (Bangla)") :</label>
                                  <div class="controls">
                                      <input type="text" value="{{$projecttype->project_type_bn}}" name="project_type_bn" class="span11" placeholder=" @lang("Project Type Bangla")" />
                                  </div>
                              </div>


                                <div class="control-group">
                                    <label class="control-label">@lang('Project Type Description') :</label>
                                    <div class="controls">
                                        <textarea name="project_type_description" class="span11" placeholder="@lang('Project Type Description') "> {{$projecttype->	project_type_description}}</textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">@lang('Status') :</label>
                                    <div class="controls">

                                        <select name="status">
                                            <option value=""> @lang('Select')</option>

                                            <option value="0" @if($projecttype->status == 0)
                                            selected
                                          @endif>@lang('Inactive')</option>
                                            <option value="1" @if($projecttype->status == 1)
                                            selected
                                          @endif>@lang('Active')</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">@lang("Update")</button>

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
