@extends('layouts.adminLayout.admin_design')

@section('content')
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        <div class="quick-actions_homepage">
            <ul class="quick-actions">

                <li class="bg_lb"> <a href="{{ route('adp_allocation.index') }}"> <i class="icon-dashboard"></i> <span class="label label-important">{{ $draftplistCount }}</span> ADP / RADP Preparation </a> </li>
                <li class="bg_ly"> <a href="{{ route('newproject.index') }}"> <i class="icon-inbox"></i><span class="label label-success">{{ $newprojectCount }}</span> UnApprove Project List </a> </li>
                <li class="bg_lo"> <a href="{{ route('approaved_project.index') }}"> <i class="icon-inbox"></i><span class="label label-success">{{ $approveprojectCount }}</span> Approve Project List </a> </li>
                <li class="bg_ly"> <a href="{{ route('newprojectlist.create') }}"> <i class="icon-th"></i><span class="label label-success">{{ $totalProjectCount }}</span> Total Project List</a> </li>
                <li class="bg_ls"> <a href="{{ route('allocated_project.index') }}"> <i class="icon-fullscreen"></i><span class="label label-success">{{ $demandslistCount }}</span> Allocated Project List </a> </li>

                <li class="bg_lg"> <a href="form-common.html"> <i class="icon-th-list"></i> Pending Project List </a> </li>
                <li class="bg_lb"> <a href="buttons.html"> <i class="icon-tint"></i> Rejected Project List </a> </li>
                <li class="bg_lr"> <a href="interface.html"> <i class="icon-pencil"></i>Project Approval Information</a> </li>

            </ul>
        </div>
        <!--End-Action boxes-->    

        <!--Chart-box-->    
        <!--        <div class="row-fluid">
                    <div class="widget-box">
                        <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
                            <h5>Site Analytics</h5>
                        </div>
                        <div class="widget-content" >
                            <div class="row-fluid">
                                <div class="span9">
                                    <div class="chart"></div>
                                </div>
                                <div class="span3">
                                    <ul class="site-stats">
                                        <li class="bg_lh"><i class="icon-user"></i> <strong>2540</strong> <small>No. of Project</small></li>
                                        <li class="bg_lh"><i class="icon-plus"></i> <strong>120</strong> <small>ADP Amount </small></li>
                                        <li class="bg_lh"><i class="icon-shopping-cart"></i> <strong>656</strong> <small>  Amount</small></li>
                                        <li class="bg_lh"><i class="icon-tag"></i> <strong>9540</strong> <small> Reveneu Amount</small></li>
                                        <li class="bg_lh"><i class="icon-repeat"></i> <strong>10</strong> <small>Pending Orders</small></li>
                                        <li class="bg_lh"><i class="icon-globe"></i> <strong>8540</strong> <small>Online Orders</small></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
        <!--End-Chart-box--> 
        <hr/>
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
                        <h5>Latest Submission</h5>
                    </div>
                    <div class="widget-content nopadding collapse in" id="collapseG2">
                        <ul class="recent-posts">
                            <li>
                                <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{ asset('images/backend_images/demo/av1.jpg') }}"> </div>
                                <div class="article-post"> 
                                    <span class="user-info"> &nbsp;
                                        <!--By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM--> 
                                    </span>
                                    <p><a href="{{ route('adp_allocation.index') }}">Submitted project list for allocation.</a><span class="label label-success">{{ $approveprojectCount }}</span> </p>
                                </div>
                            </li>
                            <li>
                                <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{ asset('images/backend_images/demo/av2.jpg') }}"> </div>
                                <div class="article-post"> 
                                    <span class="user-info"> &nbsp;
                                        <!--By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM--> 
                                    </span>
                                    <p><a href="{{ route('newproject.index') }}">Submitted project list for selection.</a><span class="label label-success">{{ $demandslistCount }}</span> </p>
                                </div>
                            </li>
                            <li>
                                <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{ asset('images/backend_images/demo/av4.jpg') }}"> </div>
                                <div class="article-post"> <span class="user-info"> &nbsp;
                                        <!--By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM--> 
                                    </span>
                                    <p><a href="#">Submitted project list for re appropriation.</a> </p>
                                </div>
                            </li>
                            <li>
                                <!--<button class="btn btn-warning btn-mini">View All</button>-->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG4"><span class="icon"><i class="icon-chevron-down"></i></span>
                        <h5>Guidline Time Schedule</h5>
                    </div>
                    <div class="widget-content nopadding collapse in" id="collapseG4">
                        <table class="table table-bordered data-table dtable" id="dataList">
                            <thead>
                                <tr>
                                    <th>@lang('Guideline For')</th>
                                    <th>@lang('Call Notice Type')</th>
                                    <th>@lang("Fiscal Year")</th>
                                    <th>@lang("Agency Date")</th>
                                    <th>@lang("Ministry Date")</th>
                                    <th>@lang("Sector Division Date")</th>
                                    <th>@lang('Send Date')</th>
                                    <!--<th>@lang('Guideline Status')</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                {{--  @php
                                $status_array=$commonclass->common_Array('status');


                                @endphp --}}
                                @foreach($guidelinelist as $guideline)
                                <tr>
                                    <td>{{$guideline->guideline_for==0?"ADP":"RADP"}} </td>
                                    <td>{{$guideline->call_notice_type==0?"Call notice 1":"Call notice 2"}} </td>
                                    <td>{!!$commonclass->datetoyear($commonclass->getvalue($guideline->fiscal_year,'FiscalYear','start_date'))."-".$commonclass->datetoyear($commonclass->getvalue($guideline->fiscal_year,'FiscalYear','end_date')) !!}</td>
                                    <td>
                                        {{$commonclass->dateToview($guideline->agency_date)}}
                                    </td>
                                    <td>
                                        {{$commonclass->dateToview($guideline->ministry_date)}}
                                    </td>
                                    <td>
                                        {{$commonclass->dateToview($guideline->sector_division_date)}}
                                    </td>
                                    <td>
                                        {{$commonclass->dateToview($guideline->created_at)}}
                                    </td>
                                    <!--<td>{{$guideline->guideline_status==0?"Completed":"In progress"}} </td>-->
                                </tr>


                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">


                    <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG23"><span class="icon"><i class="icon-chevron-down"></i></span>
                        <h5>Latest Updates</h5>
                    </div>
                    <div class="widget-content nopadding collapse in" id="collapseG23">


                        <table class="table table-bordered table-striped with-check dtable" id="dataList">
                            <thead>
                                <tr>
                                    <th style="width: 70%;">@lang('Project Name And Implementaion Preiod')</th>
                                    <th>@lang("Project Cost")</th>
                                    <th>@lang("Updates")</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($newprojectlist as $un_p_list)
                                <tr>
                                    <td style="text-align: center">{{$un_p_list->project_tiltle_bn}}<br/>({{$un_p_list->date_of_commencement}} To {{$un_p_list->date_of_completion}})</td>
                                    <td> {{$un_p_list->project_code}} </td>
                                    <td style=" text-align: center"> @if($un_p_list->project_status==0 || $un_p_list->project_status==null) {{ "Pending" }} @else {{ "Approved" }} @endif </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <ul class="recent-posts">
                            <li>
                                <!--<button class="btn btn-warning btn-mini">View All</button>-->
                                <a class="btn btn-warning btn-mini" href="{{ route('newproject.index') }}">  Load More  </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>


        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG25"><span class="icon"><i class="icon-chevron-down"></i></span>
                        <h5>Project implementation period is about to end</h5>
                    </div>
                    <div class="widget-content nopadding collapse in" id="collapseG25">

                        <table class="table table-bordered table-striped with-check dtable" id="dataList">
                            <thead>
                                <tr>
                                    <th style="width: 70%;">@lang('Project Name')</th>
                                    <th>@lang("Implementation Deadline")</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($newprojectlist as $un_p_list)
                                <tr>
                                    <td style="text-align: center">{{$un_p_list->project_tiltle_bn}}</td>
                                    <td style=" text-align: center"> {{date('Y',strtotime($un_p_list->date_of_commencement)) }} To {{ date('Y',strtotime($un_p_list->date_of_completion)) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <ul class="recent-posts">
                            <li>
                                <!--<button class="btn btn-warning btn-mini">View All</button>-->
                                <a class="btn btn-warning btn-mini" href="{{ route('newproject.index') }}">  Load More  </a>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>


<!--end-main-container-part-->

@endsection
