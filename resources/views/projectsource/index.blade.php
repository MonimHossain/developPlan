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
                        <span class="pull-right"> <a href="{{route('project-source.create')}}" class="btn btn-success "><i class="icon-plus"></i> @lang('Add Source')</a> </span>
                    </div>

                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>@lang('Project Source List') </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table" id="dataList">
                                <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    <th>@lang("Source Name")</th>
                                    <th>@lang("Source Name (Bangla)")</th>
                                    <th>@lang('Source Description')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>

                                </tr>
                                </thead>
                                <tbody>
                                {{-- @php
                                    $status_array=$commonclass->common_Array('status');
                                @endphp --}}
@foreach($sources as $source)
                                    <tr>
                                        <td>{{$sl++}}</td>
                                        <td>{{$source->source_name}}</td>
                                        <td>{{$source->source_name_bn}}</td>
                                        <td>{{$source->source_description}} </td>
                                        <td> {{$commonclass->common_Array('status')[$source->status]}}</td>

                                        <td>



                                            {{$commonclass->access_button('1',__('Edit'),route('project-source.edit',$source->id))}}


                                            {{$commonclass->access_button('2',__('Delete'),route('project-source.destroy',$source->id))}}



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