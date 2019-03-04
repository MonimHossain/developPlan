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
                    <span class="pull-right"> <a href="{{ route('fiscal-year.create')}}" class="btn btn-success "><i class="icon-plus"></i> @lang('Add')</a> </span>
                </div>


                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>@lang('Fiscal Year') </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table" id="dataList">
                            <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    <th>@lang("Start Date")</th>
                                    <th>@lang('End Date')</th>
                                    <th>@lang('Year Status')</th>
                                    {{-- <th>@lang('Status')</th> --}}
                                    <th>@lang('Action')</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $status_array=$commonclass->common_Array('status');


                                @endphp
                                @foreach($fiscalyears as $fiscalyear)
                                <tr>
                                    <td>{{$sl++}}</td>
                                    <td>{{$commonclass->dateToView($fiscalyear->start_date)}}</td>
                                    <td>{{$commonclass->dateToView($fiscalyear->end_date)}} </td>
                                    <td>{{ $status_array[$fiscalyear->year_status] }} </td>
                                    {{-- <td>{{ $status_array[$fiscalyear->status] }}</td> --}}

                                    <td>
                                        {{-- <a href="{{route('budget_head.edit',$fiscalyear->id)}}" class="btn btn-success pull-left"><i class="icon-edit"></i>@lang('Edit')</a> --}}

                                        {{$commonclass->access_button('1',__('Edit'),route('fiscal-year.edit',$fiscalyear->id))}}

                                        {{--    <form action="{{route('budget_head.destroy',$fiscalyear->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger pull-left" type="submit"> <i class="icon-trash"></i>   @lang('Delete')</button>
                                        </form> --}}
                                        {{$commonclass->access_button('2',__('Delete'),route('fiscal-year.destroy',$fiscalyear->id))}}


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
