@extends('layouts.adminLayout.admin_design')
@section('title','District')
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
                        <span class="pull-right"> <a href="{{route('district.create')}}" class="btn btn-success "><i class="icon-plus"></i> @lang('Add District')</a> </span>
                    </div>

                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>@lang('District List')</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table" id="dataList">
                                <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    <th>@lang("District Name")</th>
                                    <th>@lang("District Name (Bangla)")</th>
                                    <th>@lang('District Description')</th>

                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>

                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $status_array=$commonclass->common_Array('status');
                                @endphp



                                 @foreach($district_all as $adistrict)
                                    <tr>
                                        <td>{{$sl++}}</td>
                                        <td>{{$adistrict->district_name}} </td>
                                        <td>{{$adistrict->district_name_bn}} </td>
                                        <td>{{$adistrict->district_description}}</td>
                                        <td>{{ $status_array[$adistrict->status]}}</td>




                                        <td>

                                            {{$commonclass->access_button('1',__('Edit'),route('district.edit',$adistrict->id))}}


                                           {{$commonclass->access_button('2',__('Delete'),route('district.destroy',$adistrict->id))}}

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
