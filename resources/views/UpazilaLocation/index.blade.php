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
                        <span class="pull-right"> <a href="{{route('upazila-location.create')}}" class="btn btn-success "><i class="icon-plus"></i> @lang('Add Location')</a> </span>
                    </div>

                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>@lang('Upazila/Location Information') </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table" id="dataList">
                                <thead>
                                <tr>
                                    <th>@lang('ID')</th>
                                    <th>@lang("Upazila/Location Name")</th>
                                    <th>@lang("Upazila/Location Name (Bangla)")</th>
                                    <th>@lang('Upazila/Location Description')</th>
                                    <th>@lang('District')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>

                                </tr>
                                </thead>
                                <tbody>
                               {{--  @php
                                    $status_array=$commonclass->common_Array('status');
                                @endphp --}}
@foreach($locations as $location)
                                    <tr>
                                        <td>{{$location->id}}</td>
                                        <td>{{$location->upazila_location_name}}</td>
                                        <td>{{$location->upazila_location_name_bn}}</td>
                                        <td>{{$location->upazila_location_description}} </td>
                                        <td>{{$location->district_name->district_name}} </td>
                                        <td> {{$commonclass->common_Array('status')[$location->status]}}</td>

                                        <td>
                                            

                                            <form action="{{route('upazila-location.destroy',$location->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger pull-right" type="submit"> <i class="icon-trash"></i>   @lang('Delete')</button>
                                            </form>
                                            <a href="{{route('upazila-location.edit',$location->id)}}" class="btn btn-success pull-right"><i class="icon-edit"></i>@lang('Edit')</a>


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
