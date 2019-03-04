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
                        <span class="pull-right"> <a href="{{route('approval-setup.create')}}" class="btn btn-success "><i class="icon-plus"></i> @lang('Add')</a> </span>
                    </div>

                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>@lang('Approval Setup') </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table" id="dataList">
                                <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    <th>@lang("Approved by")</th>
                                    <th>@lang("Approved by (Bangla)")</th>
                                    <th>@lang('Description')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>

                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $status_array=$commonclass->common_Array('status');
                                @endphp


                                @foreach($approval_info as $approvalInfo)

                                    <tr>
                                        <td> {{$sl++}}</td>
                                        <td>{{$approvalInfo->approved_by}}</td>
                                        <td>{{$approvalInfo->approved_by_bn}}</td>
                                        <td>{{$approvalInfo->description}}</td>
                                        <td>{{ $status_array[$approvalInfo->status]}}</td>

                                        <td>

                                          {{$commonclass->access_button('1',__('Edit'),route('approval-setup.edit',$approvalInfo->id))}}


                                         {{$commonclass->access_button('2',__('Delete'),route('approval-setup.destroy',$approvalInfo->id))}}

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
