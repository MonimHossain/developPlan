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

                <div class="clearfix">
                    <span class="pull-right"> <a href="{{ route('guideline.create')}}" class="btn btn-success "><i class="icon-plus"></i> @lang('Add')</a> </span>
                </div>


                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>@lang('Guideline History') </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table" id="dataList">
                            <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    <th>@lang('Guideline For')</th>
                                    <th>@lang('Call Notice Type')</th>
                                    <th>@lang("Fiscal Year")</th>
                                    <th>@lang("Agency Date")</th>
                                    <th>@lang("Ministry Date")</th>
                                    <th>@lang("Sector Division Date")</th>
                                    <th>@lang('Send Date')</th>
                                    <th>@lang('Guideline Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{--  @php
                                $status_array=$commonclass->common_Array('status');
                                @endphp --}}
                                @foreach($guidelines as $guideline)
                                <tr>
                                    <td>{{$sl++}}</td>
                                    <td>{{$guideline->guileline_for==0?"ADP":"RADP"}} </td>
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
                                    <td>{{$guideline->guideline_status==0?"Completed":"In progress"}} </td>
                                    <td>
                                        @if($guideline->guideline_status==0)
                                            <a href="{{route('guideline.show',$guideline->id)}}" class="btn btn-success "> <i class="icon icon-eye-open"></i> @lang('VIEW')</a>
                                        @else
                                            {{$commonclass->access_button('1',__('Edit'),route('guideline.edit',$guideline->id))}}
                                        @endif
                                        <!--{{$commonclass->access_button('2',__('Delete'),route('guideline.destroy',$guideline->id))}}-->
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
