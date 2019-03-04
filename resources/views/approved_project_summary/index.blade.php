@extends('layouts.adminLayout.admin_design')

@section('content')

<style>
    input[type=checkbox]{
        opacity:1 !important;
    }
</style>
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{route('dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> @lang("Home") </a></div>
    </div>
    <!--End-breadcrumbs-->

    <div class="container-fluid">
        <div id="showun_A_P_Modal">
        </div>
        
<form method="get" action="{{route('approvedsummarysearch')}}">
@csrf
<div class="controls controls-row">
    <div  class="span2 m-wrap">
        <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;" class="control-label">@lang('Select Ministry') </label>
        <div class="controls">
            <select name="min">
                <option></option>
                @if($user_group == 12 || $user_group == 14)
                @foreach($ministry as $aministry)
                <option value="{{$aministry->id}}"@if( $user_department==$aministry->id) selected @endif> {{$aministry->ministry_name}}</option>
                @endforeach
                @else
                @foreach($ministry as $aministry)
                <option value="{{$aministry->id}}"@if( $user_ministry==$aministry->id) selected @endif> {{$aministry->ministry_name}}</option>
                @endforeach

                @endif

            </select>   
        </div>
    </div>
    <div  class="span2 m-wrap">
        <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;"  class="control-label">@lang('Select Agency') </label>
        <div class="controls">
            <select name="agen">
                <option></option>
                @if($user_group == 13 || $user_group == 15)
                @foreach($agency as $a_agency)
                <option value="{{$a_agency->id}}" @if($user_department==$a_agency->id) selected @endif>{{$a_agency->agency_name}}</option>
                @endforeach
                @else
                @foreach($agency as $a_agency)
                <option value="{{$a_agency->id}}">{{$a_agency->agency_name}}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="span2 m-wrap">
        <label style="color:#4D739D; font-family: Verdana,Arial, Helvetica, sans-serif;"   class="control-label">@lang('Select Sector') </label>
        <div class="controls">
            <select name="sec" onchange="sector_to_subsector(this)">
                <option></option>
                @if($user_group == 9 || $user_group == 10)
                @foreach($sector as $asector)
                <option value="{{$asector->id}}"@if($user_department==$asector->id) selected @endif> {{$asector->sector_name}}</option>
                @endforeach
                @else
                @foreach($sector as $asector)
                <option value="{{$asector->id}}"> {{$asector->sector_name}}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>              
    <div  class="span2 m-wrap">
        <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;"  class="control-label">@lang('Select SubSector')</label>
        <div class="controls">
            <select id='sub_sector' name="sub_sec">
                <option></option>
                @if($user_group == 19 || $user_group == 11)
                @foreach($subsector as $a_subsector)
                <option value="{{$a_subsector->id}}" @if($user_department==$a_subsector->id) selected @endif> {{$a_subsector->sub_sector_name}}</option>
                @endforeach
                @else
                @foreach($subsector as $a_subsector)
                <option value="{{$a_subsector->id}}"> {{$a_subsector->sub_sector_name}}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>
    <!--                 style="float:right"-->
    <div  class="span2 m-wrap">
        <label style=" padding-top: 20px" class="control-label"> </label>
        <div class="controls">
            <button name="search" value="search" class="btn btn-warning"  type="submit" ><i class="icon-search icon-white"></i></button>
        </div>
    </div>

</div>
</form>
<hr/>     
        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>@lang('Approaved Projects Summary') </h5>
                    </div>
                    <div class="widget-content nopadding">
                        
                        <div id="1">
                        
                        <table class="table table-bordered table-striped with-check">
                                <thead>
                                    <tr>
                                       <th rowspan="2">@lang('Serial No')</th>
                                        <th rowspan="2">@lang('Project Code (PD)')</th>
                                        <th rowspan="2">@lang('Project Name And Implementaion Preiod')</th>
                                        <th colspan="3">@lang("Project Cost")</th>
                                        <th rowspan="2" >@lang("Project Aid Source")</th>
                                        <th rowspan="2">@lang("Ministry Comment")</th>
                                        <th rowspan="2">@lang("Sub Sector Comment")</th>
                                        <th rowspan="2">@lang("Sector Comment")</th>
                                        <th rowspan="2">@lang("Programming Division Comment")</th>
                                        <th rowspan="2">@lang("Status")</th>                 
                                    </tr>
                                    <tr>
                                        <th>Total FE</th>
                                        <th>Total Taka</th>
                                        <th>Project Aid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach($approved_project as $project)
                                    <?php
                                    $route = route('show_approved_project');
                                    ?>
                                    <tr>
                                       
                                        <td>{{$loop->iteration}}</td>
                                        <td >{{$project->project_code_pd}}</td>
                                        <td style="text-align: center">{{$project->project_tiltle_bn}}<br/>({{$project->date_of_commencement}} To {{$project->date_of_completion}})</td>
                                        <td>{{$project->fe}} ৳ </td>
                                        <td>{{$project->total }} ৳</td>
                                        <td>{{$project->pa}} ৳ </td>
                                        <td>
                                            @foreach($project->approved_project_source as $source)
                                            {{$commonclass->getValue($source->finanacing_source,'ProjectSource','source_name')}}<br/>
                                            {{--{{$source->finanacing_source}}--}}
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($project->approved_project_comments as $comment)
                                            @if($comment->comment_level==12)
                                            {{$comment->comments}}<br/><br/>
                                            @else
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($project->approved_project_comments as $comment)
                                            @if($comment->comment_level==11)
                                            {{$comment->comments}}<br/><br/>
                                            @else
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($project->approved_project_comments as $comment)
                                            @if($comment->comment_level==9)
                                            {{$comment->comments}}<br/><br/>
                                            @else
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($project->approved_project_comments as $comment)
                                            @if($comment->comment_level==16)
                                            {{$comment->comments}}<br/><br/>
                                            @else
                                            @endif
                                            @endforeach
                                        </td>
                                        <td> Approved </td>
                                   </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                  </div>
                <div class="form-actions pull-right span12"><hr/>
                {{custome_print('1',false,__('Print Summary'))}}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('additionalJS')
<script src="{{asset('js/backend_js/matrix.tables.js')}}"></script>
@endsection
