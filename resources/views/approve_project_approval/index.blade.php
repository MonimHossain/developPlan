@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{route('dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> @lang("Home") </a></div>
    </div>
    <!--End-breadcrumbs-->

    <div id="showun_P_Modal">

    </div>

    <div class="container-fluid">

        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>@lang('Approved Projects Approval History') </h5>
            </div>
            <div class="widget-content nopadding">
              <form method="get" action="{{route('approaved_project_approval.index')}}" class="allocation_form">

                <div class="controls controls-row">
                    <div  class="span2 m-wrap">
                        <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;" class="control-label">@lang('Select Ministry') </label>
                        <div class="controls">
                           @php
                           if($user_group == 13 || $user_group == 15)
                           {
                              $agency_id=auth()->user()->department_id;
                          }
                          elseif($user_group == 12 || $user_group == 14 ) {
                           $ministry_id=auth()->user()->department_id;

                       }

                       @endphp
                       <select name="min">
                        <option></option>
                        @foreach($ministry as $a_ministry)
                        <option {{selected($a_ministry->id,$_GET['min'] ?? $ministry_id ?? 0)}} value="{{$a_ministry->id}}">{{$a_ministry->ministry_name}}</option>
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
                        <option {{selected($a_agency->id,$_GET['agen'] ??$agency_id ?? 0)}} value="{{$a_agency->id}}"> {{$a_agency->agency_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div  class="span2 m-wrap">
                <label style="color:#4D739D; font-family: Verdana,Arial, Helvetica, sans-serif;"   class="control-label">@lang('Select Sector') </label>
                <div class="controls">
                    <select name="sec" onchange="sector_to_subsector(this)">
                        <option></option>
                        @foreach($sector as $a_sector)
                        <option {{selected($a_sector->id,$_GET['sec'] ?? 0)}} value="{{$a_sector->id}}">{{$a_sector->sector_name}} </option>
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
                        <option {{selected($a_subsector->id,$_GET['sub_sec'] ?? 0)}} value="{{$a_subsector->id}}">{{$a_subsector->sub_sector_name}} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!--                 style="float:right"-->
            <div  class="span2 m-wrap">
                <label style=" padding-top: 20px" class="control-label"> </label>
                <div class="controls">
                    <button name="search" value="search" type="submit" class="btn btn-warning"><i class="icon-search icon-white"></i></button>
                </div>
            </div>




        </div>
    </form>
    <hr/>

    <table class="table table-bordered table-striped with-check">
        <thead>
            <tr>
                <th >@lang('SL') </th>
                <th >@lang('Project Code(PD)') </th>
                <th >@lang('Project Name') </th>
                <th >@lang('Approve By') </th>
                <th >@lang('Approve Date') </th>
                <th>@lang('Approval go no')</th>
                <th>@lang('Approval Level')</th>
                <th>@lang('Administrative By')</th>
                <th>@lang('Administrative Date')</th>
                <th>@lang('Administrative go no')</th>
                <th>@lang('Administrative Level')</th>
                <th>@lang('File')</th>

            </tr>

        </thead>
        <tbody>

         @forelse($approved_project as $aphistory)
         <tr id="tr">
           <td style="text-align: center">
            {{$loop->iteration}}
        </td> 
        <td style="text-align: center">
            {{$aphistory->project_code}}
        </td>
        <td style="text-align: center">
            {{$aphistory->project_title}}
        </td>
        <td style="text-align: center">
            {{$commonclass->getValue($aphistory->approve_by,'user','name')}}
        </td> 
        <td style="text-align: center">
            {{$commonclass->dateToview($aphistory->approve_date)}}
        </td>
        <td style="text-align: center">
            {{$aphistory->approval_go_no}}
        </td>
        <td style="text-align: center">
            {{$commonclass->getValue($aphistory->approval_level,'Usergroup','group_name')}}
        </td>
        <td style="text-align: center">
            {{$commonclass->getValue($aphistory->administrative_by,'user','name')}}
        </td> 
        <td style="text-align: center">
            {{$commonclass->dateToview($aphistory->administrative_date)}}
        </td>
        <td style="text-align: center">
            {{$aphistory->administrative_go_no}}
        </td>
        <td style="text-align: center">
            {{$commonclass->getValue($aphistory->administrative_level,'Usergroup','group_name')}}
        </td>
        <td style="text-align: center">
            @if($aphistory->file_name!=null)
            {{ download($aphistory->file_name)}}
            @endif
        </td>
    </tr>
    @empty
    <tr>
     <td colspan="9" style="text-align: center">No Approval History Available</td>
 </tr>
 @endforelse
</tbody>
</table>

</div>
</div>
</div>
</div>
</div>

</div>

@endsection