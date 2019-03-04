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
                    <span class="pull-right"> <a href="{{ route('ministry.create')}}" class="btn btn-success "><i class="icon-plus"></i> @lang('Add')</a> </span>
                </div>


                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>@lang('Ministry List') </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table" id="dataList">
                            <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    <th>@lang('Keywords')</th>
                                    <th>@lang("Ministry Name")</th>
                                    <th>@lang("Ministry Name (Bangla)")</th>
                                    <th>@lang("Sector")</th>
                                    <th>@lang("Sub-Sector")</th>
                                    <!--<th>@lang('Description')</th>-->
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $status_array=$commonclass->common_Array('status');
                                @endphp
                                @foreach($showministry as $showministry)
                                <tr>
                                    <td>{{$sl++}}</td>
                                    <td>{{$showministry->keyword}}</td>
                                    <td>{{$showministry->ministry_name}}</td>
                                    <td>{{$showministry->ministry_name_bn}}</td>
                                    <td>{{$commonclass->getValue($showministry->sector_id,'Sector','sector_name')}}</td>
                                    <td>{{$commonclass->getValue($showministry->subsector_id,'SubSector','sub_sector_name')}}</td>
                                    <!--<td>{{$showministry->ministry_description}} </td>-->
                                    <td>{{ $status_array[$showministry->status] }} </td>

                                    <td>
                                        {{-- <a href="{{route('ministry.edit',$showministry->id)}}" class="btn btn-success pull-left"><i class="icon-edit"></i>@lang('Edit')</a> --}}

                                        {{$commonclass->access_button('1',__('Edit'),route('ministry.edit',$showministry->id))}}


                                        {{$commonclass->access_button('2',__('Delete'),route('ministry.destroy',$showministry->id))}}


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
