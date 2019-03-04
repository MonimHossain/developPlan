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
                    <span class="pull-right"> <a href="{{ route('pa-source.create')}}" class="btn btn-success "><i class="icon-plus"></i> @lang('Add')</a> </span>
                </div>


                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>@lang('Pa Source') </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table" id="dataList">
                            <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    <th>@lang("Pa Source Name")</th>
                                    <th>@lang("Pa Source Name (Bangla)")</th>
                                    <th>@lang('Description')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $status_array=$commonclass->common_Array('status');
                               
                                @endphp
                                @foreach($pasources as $pasource)
                                <tr>
                                    <td>{{$sl++}}</td>
                                    <td>{{$pasource->pa_source_name}}</td>
                                    <td>{{$pasource->pa_source_name_bn}}</td>
                                    <td>{{$pasource->pa_source_description}} </td>
                                    <td>{{ $status_array[$pasource->status] }} </td>

                                    <td>
                                        {{-- <a href="{{route('pa_source.edit',$pasource->id)}}" class="btn btn-success pull-left"><i class="icon-edit"></i>@lang('Edit')</a> --}}

                                        {{$commonclass->access_button('1',__('Edit'),route('pa-source.edit',$pasource->id))}}

                                        {{--    <form action="{{route('pa_source.destroy',$pasource->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger pull-left" type="submit"> <i class="icon-trash"></i>   @lang('Delete')</button>
                                        </form> --}}
                                        {{$commonclass->access_button('2',__('Delete'),route('pa-source.destroy',$pasource->id))}}


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