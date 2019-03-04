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
<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
<h5>@lang('New Projects Summary') </h5>
<div id="commentModal">
</div>
<div id="showun_P_Modal">
</div></div>
<form method="get" action="{{route('summarysearch')}}">
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
	<div  class="span2 m-wrap">
        <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;"  class="control-label">@lang('Approval Status')</label>
        <div class="controls">
            <select name="approval_status">
                              <option></option>
                              @foreach ($new_project_status as $key => $v) 
                              <option value="{{$key}}">{{__($v)}}</option>
                              @endforeach
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
<div id="1">
  <hr/>
 
<div class="widget-content nopadding">
    <!--                <form action="{{route('summary.store')}}" method="post" class="form-horizontal">-->
    <!--                    @csrf-->
	
	<table class="table table-bordered table-striped with-check" style="background-color: lightblue;">
        <thead>
            <tr><th style="color:black">@lang('Government of the Peoples Republic of Bangladesh')</th></tr>
            <tr><th style="color:black">@lang('Planning Commission')</th></tr>
            <tr><th style="color:black">@lang('Department of activities')</th></tr>
            <tr><th style="color:black">@lang('Sher-E-Bangla Nagar, Dhaka')</th></tr>
		</thead>	 
	  </table>	  
<!--	   <div class="">
	  <table class="table table-bordered table-striped with-check">
        <thead>
            <tr>
			<th></th>
			<th >@lang('Ministry Name:') {{$commonclass->getValue($min,'ministry','ministry_name')}}</th>
			<th>@lang('Agency Name:') {{$commonclass->getValue($agen,'agency','agency_name')}} </th>
			<th>@lang('Sector Name:') {{$commonclass->getValue($sec,'Sector','sector_name')}}</th>
			<th>@lang('Sub Sector Name:') {{$commonclass->getValue($sub_sec,'SubSector','sub_sector_name')}}</th>
			</tr>	
		</thead>	 
	  </table>
	  </div>-->

	  <div class="row-fluid">
            <div  class="span3 m-wrap">       
                <div class="controls">
               @lang('Ministry Name:')  {{$commonclass->getValue($min,'ministry','ministry_name')}}
            </div>
        </div>
		 <div  class="span3 m-wrap">         
                <div class="controls">
                 @lang('Agency Name:') {{$commonclass->getValue($agen,'agency','agency_name')}}
            </div>
        </div>
		 <div  class="span3 m-wrap">  
                <div class="controls">
                 @lang('Sector Name:') {{$commonclass->getValue($sec,'Sector','sector_name')}}
            </div>
        </div>
		 <div  class="span3 m-wrap">
                <div class="controls">
                 @lang('Sub Sector Name:') {{$commonclass->getValue($sub_sec,'SubSector','sub_sector_name')}}
            </div>
        </div>
        </div>
	<table class="table table-bordered table-striped with-check" >
        <thead>
            <tr>
                <th rowspan="2">@lang('Serial No')</th>
                <th rowspan="2">@lang('Project Code(PD)')</th>
                <th rowspan="2">@lang('Project Name And Implementaion Preiod')</th>
                <th colspan="3">@lang("Project Cost")</th>
                <th rowspan="2" >@lang("Project Aid Source")</th>
                <th rowspan="2">@lang("Ministry Comment")</th>
                <th rowspan="2">@lang("Sub Sector Comment")</th>
                <th rowspan="2">@lang("Sector Comment")</th>
                <th rowspan="2">@lang("Programming Division Comment")</th>
                <th rowspan="2">@lang("Approval Status")</th>

            </tr>
            <tr>
                <th>@lang('Total FE')</th>
                <th>@lang('Total Taka')</th>
                <th>@lang('Project Aid')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($unapproved_project_list as $un_p_list)
            @php
            $route=route('show_unapproved_project');
            @endphp
            <tr class="">
                <td>{{$loop->iteration}}</td>
                <td >{{$un_p_list->project_code_pd}}</td>
                {{--<td class="span2">{{$un_p_list->project_code_pd}}</td>--}}
                <td style="text-align: center">{{$un_p_list->project_tiltle_bn}}<br/>({{$un_p_list->date_of_commencement}} To {{$un_p_list->date_of_completion}})</td>
                <td>{{$un_p_list->fe}} ৳ </td>
                <td>{{$un_p_list->total }} ৳</td>
                <td>{{$un_p_list->pa}} ৳ </td>
                <td>
                    @foreach($un_p_list->unapproved_source_details as $source)
                    {{$commonclass->getValue($source->finanacing_source,'ProjectSource','source_name')}}<br/>
                    {{--{{$source->finanacing_source}}--}}
                    @endforeach
                </td>
                <td>
                    @foreach($un_p_list->unapproved_comments as $comment)
                    @if($comment->comment_level==12)
                    {{$comment->comments}}<br/><br/>
                    @else
                    @endif
                    @endforeach
                </td>
                <td>
                    @foreach($un_p_list->unapproved_comments as $comment)
                    @if($comment->comment_level==11)
                    {{$comment->comments}}<br/><br/>
                    @else
                    @endif
                    @endforeach
                </td>
                <td>
                    @foreach($un_p_list->unapproved_comments as $comment)
                    @if($comment->comment_level==9)
                    {{$comment->comments}}<br/><br/>
                    @else
                    @endif
                    @endforeach
                </td>
                <td>
                    @foreach($un_p_list->unapproved_comments as $comment)
                    @if($comment->comment_level==16)
                    {{$comment->comments}}<br/><br/>
                    @else
                    @endif
                    @endforeach
                </td>
                {{--<td> @if($un_p_list->isdraft==0) {{ "Submited" }} @else {{ "Drafted" }} @endif </td>--}}
				
                <td> @if($un_p_list->approval_status==1) {{ "DPP Not Found" }} @elseif($un_p_list->approval_status==2) {{ "DPP Found" }} @elseif($un_p_list->approval_status==3) {{ "PEC Done" }} @else {{ "Not Found" }} @endif </td>
                {{--<td>--}}
                {{--<a href="#" style="text-align: center; color: #009900;" onclick="clickcomment('{{$un_p_list->id}}')"  class=" pull-left"> @lang('Comments') </a>--}}
                {{--</td>--}}
            </tr>
            @endforeach
        </tbody>
    </table>
   
    <!--</form>-->
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

