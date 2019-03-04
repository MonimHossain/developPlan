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
                        <span class="pull-right"> <a href="{{route('agency.create')}}" class="btn btn-success "><i class="icon-plus"></i> @lang('Add')</a> </span>
                    </div>

                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                          <h5 class="" style=" width:50%;margin:0 auto;">@lang('Agency List') </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table" id="dataList">
                                <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    <th>@lang('Keywords')</th>
                                    <th>@lang("Agency Name")</th>
                                    <th>@lang("Agency Name (Bangla)")</th>
                                    <th>@lang('Agency Description')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>

                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $status_array=$commonclass->common_Array_agency('status');
                                @endphp


                                @foreach($showagency as $showagency)

                                    <tr>
                                        <td> {{$sl++}}</td>
                                        <td> {{$showagency->keyword}}</td>
                                        <td>{{$showagency->agency_name}}</td>
                                        <td>{{$showagency->agency_name_bn}}</td>
                                        <td>{{$showagency->agency_description}}</td>
                                        <td>{{ $status_array[$showagency->status]}}</td>

                                        <td>
                                          {{$commonclass->access_button('1',__('Edit'),route('agency.edit',$showagency->id))}}


                                         {{$commonclass->access_button('2',__('Delete'),route('agency.destroy',$showagency->id))}}


                                        </td>

                                    </tr>
                                    @endforeach




                                </tbody>
                            </table>
                        </div>

                    </div>



                    {{-- <div class="">
                         @php

                         @endphp
                         @foreach($pages as $p)
                           @foreach($p as $a)
                            {{$loop->remaining}}.-
                           @endforeach
                         @endforeach
</ul>
                    </div> --}}
                </div>
            </div>
        </div>

    </div>

@endsection
