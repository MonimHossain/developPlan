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
                  <div id="showun_A_P_Modal">

        </div>  

                   {{--  <div class="clearfix">
                        <span class="pull-right"> <a href="{{route('newproject.create')}}" class="btn btn-success "><i class="icon-plus"></i> @lang('Add')</a> </span>
                    </div> --}}


                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>@lang('Approaved Projects') </h5>
                        </div>
                        <div class="widget-content nopadding">
                            
                            <table class="table table-bordered table-striped with-check" id="dataList">
                                <thead>
                                    <tr>
                                        <th>@lang('Serial No')</th>
                                        <th>@lang("Project Code")</th>
                                        <th>@lang("Project Type")</th>
                                        <th>@lang("Project Name English")</th>
                                        <th>@lang("Project Name Bangla")</th>
                                        <th>@lang('Date OF Commencement')</th>
                                        <th>@lang('Date OF Completion')</th>
                                        <th>@lang('Action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach($approved_project as $project)
                                    <?php
                                     $route=route('show_approved_project');
                                     ?>
                                    <tr>
                                        <td>{{$project->unapprove_project_id}}=={{$i++}}</td>
                                        <td>{{$project->project_code}}</td>
                                        <td>{{$project->project_type}}</td>
                                        <td>{{$project->project_title}}</td>
                                        <td>{{$project->project_tiltle_bn}}</td>
                                        <td>{{ $commonclass->dateToview($project->date_of_commencement) }}</td>
                                        <td>{{ $commonclass->dateToview($project->date_of_completion) }}</td>
                                        <td>
                                             <a onclick='click_project_view("{{$project->unapprove_project_id}}","{{$route}}","showun_A_P_Modal","approved_modal")' class="btn btn-success pull-left"><i class="icon-eye-open"></i>@lang('View') </a>
                                            {{$commonclass->access_button('1',__('Edit'),route('approaved_project.edit',$project->unapprove_project_id))}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection