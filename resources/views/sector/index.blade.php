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
                        <span class="pull-right"> <a href="{{route('sector.create')}}" class="btn btn-success "><i class="icon-plus"></i> @lang('Add Sector')</a> </span>
                    </div>

                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>@lang('Sector List') </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table" id="dataList">
                                <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    <th>@lang('Keywords')</th>
                                    <th>@lang("Sector Name")</th>
                                    <th>@lang("Sector Name (Bangla)")</th>
                                    <th>@lang('Sector Description')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>

                                </tr>
                                </thead>
                                <tbody>
                               {{--  @php
                                    $status_array=$commonclass->common_Array('status');
                                @endphp --}}
@foreach($sectors as $sector)
                                    <tr>
                                        <td>{{$sl++}}</td>
                                          <td>{{$sector->keyword}}</td>
                                        <td>{{$sector->sector_name}}</td>
                                        <td>{{$sector->sector_name_bn}}</td>
                                        <td>{{$sector->sector_description}} </td>
                                        <td> {{$commonclass->common_Array('status')[$sector->status]}}</td>

                                        <td>



                                            {{$commonclass->access_button('1',__('Edit'),route('sector.edit',$sector->id))}}


                                           {{$commonclass->access_button('2',__('Delete'),route('sector.destroy',$sector->id))}}




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
