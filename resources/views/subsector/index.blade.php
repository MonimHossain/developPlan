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
                        <span class="pull-right"> <a href="{{route('sub-sector.create')}}" class="btn btn-success "><i class="icon-plus"></i> @lang('Add Sub Sector')</a> </span>
                    </div>

                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>@lang('Sub Sector List') </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table" id="dataList">
                                <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    <th>@lang('Keywords')</th>
                                    <th>@lang("Sector Name")</th>
                                    <th>@lang("Sub Sector Name")</th>
                                    <th>@lang("Sub Sector Name (Bangla)")</th>
                                    <th>@lang('Sub Sector Description')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                                </thead>
                                <tbody>
                               {{--  @php
                                    $status_array=$commonclass->common_Array('status');
                                @endphp --}}
@foreach($subsectors as $subsector)
                                    <tr>
                                        <td>{{$sl++}}</td>
                                            <td>{{$subsector->keyword}} </td>
                                        <td>{{$commonclass->getValue($subsector->sector_name,'sector','sector_name')}}</td>
                                        <td>{{$subsector->sub_sector_name}} </td>
                                        <td>{{$subsector->sub_sector_name_bn}} </td>
                                        <td>{{$subsector->sub_sector_description}} </td>
                                        <td> {{$commonclass->common_Array('status')[$subsector->status]}}</td>

                                        <td >



                                            {{$commonclass->access_button('1',__('Edit'),route('sub-sector.edit',$subsector->id))}}


                                            {{$commonclass->access_button('2',__('Delete'),route('sub-sector.destroy',$subsector->id))}}

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
