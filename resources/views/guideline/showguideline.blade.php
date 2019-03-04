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
                
                {{-- <div class="clearfix">
                    <span class="pull-right"> <a href="{{ route('guideline.create')}}" class="btn btn-success "><i class="icon-plus"></i> @lang('Add')</a> </span>
                </div> --}}


                {{-- <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>@lang('Guideline History') </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table" id="dataList">
                            <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    <th>@lang("Fiscal Year")</th>
                                    <th>@lang('Send Date')</th>
                                    <th>@lang('Action')</th>

                                </tr>
                            </thead>
                            <tbody>
                               {{--  @php
                                $status_array=$commonclass->common_Array('status');


                                @endphp


                            </tbody>
                        </table> --}}
                    </div>
                </div>
                <div class="span8">
                  <div class="pull-right mb-4">
                    <a href="{{route('guideline.edit',$guideline->id)}}" class="btn btn-success"><i class="icon icon-edit"></i>@lang('Edit')</a>
                    <a href="{{route('guideline.showguideline')}}" class="btn btn-success"><i class="icon icon-chevron-left"></i>@lang('Back to List')</a>
                  </div>
                  <center>
                      <div class="widget-box">

                          <div class="widget-title">

                                 <span class="icon">
                                     <i class="icon-user"></i>
                                 </span>
                                 <h5 >@lang('YOUR GUIDELINE INFORMATION DETAIL\'S')</h5>



                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered">
                                <tr><td>@lang('Guideline For'):</td><td>{{$guideline->guideline_for==0?"ADP":"RADP"}}</td></tr>
                                <tr><td>@lang('Call Notice Type'):</td><td>{{$guideline->call_notice_type==0?"Call notice 1":"Call notice 2"}}</td></tr>
                                <tr><td>@lang('Guideline Status'):</td><td>{{$guideline->guideline_status==0?"Inactive":"Active"}}</td></tr>
                                <tr><td>@lang('Fiscal Year'):</td><td>{!!$commonclass->datetoyear($commonclass->getvalue($guideline->fiscal_year,'FiscalYear','start_date'))."-".$commonclass->datetoyear($commonclass->getvalue($guideline->fiscal_year,'FiscalYear','end_date')) !!}</td></tr>
                                <tr><td>@lang('Agency Submission Date'):</td><td>{{$commonclass->dateToview($guideline->agency_date)}}</td></tr>
                                <tr><td>@lang('Ministry Submission Date'):</td><td>{{$commonclass->dateToview($guideline->ministry_date)}}</td></tr>
                                <tr><td>@lang('Sector Division Submisson Date'):</td><td>{{$commonclass->dateToview($guideline->sector_division_date)}}</td></tr>
                                <tr><td>@lang('Comments'):</td><td>{{$guideline->comment}}</td></tr>
                                <tr><td>@lang('Guideline Status'):</td><td>{{$guideline->guideline_status==0?"Completed":"In progress"}}</td></tr>

                                <tr><td>@lang('Guidelne Creation Date'):</td> <td>{{$guideline->created_at}}</td></tr>
                            </table>
                        </div>

                      </div>




                  </center> </div>
            </div>
        </div>
    </div>

</div>

@endsection
