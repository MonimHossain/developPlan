@php
$col_data=[];
$row_total=[];
$col_total=[];
$all_total=[];

@endphp

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
<h5>@lang('New Project Status Summary') </h5>
<div id="commentModal">
</div>
<div id="showun_P_Modal">
</div></div>
<form method="get" action="{{route('new-project-status-summary.index')}}">

<div class="controls controls-row">
    <div  class="span2 m-wrap">
        <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;" class="control-label">@lang('Select Ministry') </label>
        <div class="controls">
            <select name="min">
                <option></option>
               
                @foreach($ministry as $aministry)
                <option {{selected($aministry->id,$_GET['min']  ?? 0)}} value="{{$aministry->id}}"> {{$aministry->ministry_name}}</option>
                @endforeach

            </select>   
        </div>
    </div>
    <div  class="span2 m-wrap">
        <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;"  class="control-label">@lang('Select Agency') </label>
        <div class="controls">
            <select name="agen">
                <option></option>
                
                @foreach($agency as $a_agency)
                <option {{selected($a_agency->id,$_GET['agen'] ?? 0)}} value="{{$a_agency->id}}">{{$a_agency->agency_name}}</option>
                @endforeach
               
               
               
            </select>
        </div>
    </div>
    <div class="span2 m-wrap">
        <label style="color:#4D739D; font-family: Verdana,Arial, Helvetica, sans-serif;"   class="control-label">@lang('Select Sector') </label>
        <div class="controls">
            <select name="sec" onchange="sector_to_subsector(this)">
                <option></option>
                
                @foreach($sector as $asector)
                <option {{selected($asector->id,$_GET['sec'] ?? 0)}} value="{{$asector->id}}"> {{$asector->sector_name}}</option>
                @endforeach
            </select>
        </div>
    </div>              
    <div  class="span2 m-wrap">
        <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;"  class="control-label">@lang('Select SubSector')</label>
        <div class="controls">
            <select id='sub_sector' name="sub_sec">
                <option></option>
             
                @foreach($subsector as $a_subsector)
                <option {{selected($a_subsector->id,$_GET['sub_sec'] ?? 0)}} value="{{$a_subsector->id}}"> {{$a_subsector->sub_sector_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
	<div  class=" m-wrap">
        {{-- <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;"  class="control-label">@lang('Approval Status')</label>
        <div class="controls">
            <select name="approval_status">
                              <option></option>
                              <option value="1">DPP Not Found</option>
                              <option value="2">DPP Found</option>
                              <option value="3">PEC Done</option>
                    </select>
        </div> --}}
    </div>
    <!--                 style="float:right"-->
    <div  class="span4 m-wrap">
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
    {{-- <!--                <form action="{{route('summary.store')}}" method="post" class="form-horizontal">--> --}}
   {{--  <!--                    @csrf--> --}}
    
     {{-- <table class="table table-bordered table-striped with-check" style="background-color: lightblue;">
        <thead>
            <tr><th style="color:black">@lang('Government of the Peoples Republic of Bangladesh')</th>       </tr>
            <tr><th style="color:black">@lang('Planning Commission')</th></tr>
            <tr><th style="color:black">@lang('Department of activities')</th></tr>
            <tr><th style="color:black">@lang('Sher-E-Bangla Nagar, Dhaka')</th></tr>
            
        </thead>     
      </table> --}}
    <table class="table table-bordered table-striped with-check" >
        <thead>
            <tr>
                <th>@lang('Serial No')</th>
                <th>@lang('Agency Name')</th>
                
                @foreach($new_project_status as $status)
                <th >{{__($status)}}</th>
               @endforeach
               <th>@lang('Total Project')</th> 


            </tr>
            
        </thead>
      <tbody>
      
        @forelse($agency_group as $agencykey=>$m)
<tr>
   
 
    <td>{{$loop->iteration}}</td>
    <td>{{$commonclass->getValue($m->agency,'agency','agency_name')}}</td>
    {{-- <td>{{ $a=$commonclass->count_approval_project_via_agency($m->agency,1)}}
        @php
                $total_a[]=$a;
        @endphp</td>
    <td>{{ $b=$commonclass->count_approval_project_via_agency($m->agency,2)}}
        @php
                $total_b[]=$b;
        @endphp
    </td>
    <td>{{ $c=$commonclass->count_approval_project_via_agency($m->agency,3)}}
        @php
                $total_c[]=$c;
        @endphp
    </td> --}}
        @foreach($new_project_status as $key=>$status)
        <td >
            {{$row_total[$key]=$commonclass->count_approval_project_via_agency($m->agency,$key)}}
            
        </td>
        @php
       
        $col_data[$agencykey][$key]=$row_total[$key];

        
        @endphp
        @endforeach
                     
  
      
    <td >
       {{array_sum($row_total)}}
    </td>
            
</tr>
@empty
@endforelse
  
    <tr> 
    <td></td>
    <td>@lang('Total'):</td>

    {{-- raw --}}
    {{-- <td> {{array_sum($total_a)}}</td>
     <td>{{array_sum($total_b)}}</td>
     <td>{{array_sum($total_c)}}</td>
     <td>{{array_sum($total_a)+array_sum($total_b)+array_sum($total_c)}}</td>  --}}
    @foreach($new_project_status as $skey=>$status)
       <td >
          @foreach($col_data as $mycolkey=>$mycolvalue)
            @php
                 $col_total[$mycolkey]=$col_data[$mycolkey][$skey];
            @endphp
             @endforeach
             
            {{ $all_total[]=array_sum($col_total)}}


       </td>
       @endforeach


       <td >{{array_sum($all_total)}}</td>
        </tr>
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
<script src="{{asset('js/backend_js/matrix.tables.js')}}">
    

</script>
@endsection

