@extends('layouts.adminLayout.admin_design')
@section('title','RMO')
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
                        <span class="pull-right"> <a href="{{route('rmo_setup.create')}}" class="btn btn-success "><i class="icon-plus"></i> @lang('Add Rmo')</a> </span>
                    </div>
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>@lang('Rmo List')</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table" id="dataList">
                                <thead>
                                    <tr>
                                        <th>@lang('Serial No')</th>
                                        <th>@lang("Rmo Name")</th>
                                        <th>@lang("Name (Bangla)")</th>
                                        <th>@lang('Rmo Description')</th>
                                        <th>@lang('Status')</th>
                                        <th>@lang('Action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $status_array=$commonclass->common_Array('status');
                                    @endphp

                                    @php($i=1)

                                    @foreach($rmo_all as $rmoVal)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$rmoVal->rmo_name}} </td>
                                        <td>{{$rmoVal->rmo_name_bn}} </td>
                                        <td>{{$rmoVal->rmo_description}}</td>
                                        <td>{{$status_array[$rmoVal->status]}}</td>
                                        <td>
                                            <a href="{{route('rmo_setup.edit',$rmoVal->id)}}" class="btn btn-success pull-left"><i class="icon-edit"></i>@lang('Edit')</a>

                                            <form action="{{route('rmo_setup.destroy',$rmoVal->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger pull-left" type="submit"> <i class="icon-trash"></i>   @lang('Delete')</button>
                                            </form>


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