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
                    <span class="pull-right"> <a href="{{ route('poverty-target.create')}}" class="btn btn-success "><i class="icon-plus"></i> @lang('Add')</a> </span>
                </div>
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>@lang('POVERTY TARGETS LIST') </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table" id="dataList">
                            <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    <th>@lang('Goal Name')</th>
                                    <th>@lang('Targets')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $status_array=$commonclass->common_Array('status');
                                @endphp
                                @foreach($povertytargets as $povertytarget)
                                <tr>
                                    <td>{{$povertytarget->id}}</td>
                                    <td>{{ $commonclass->getValue($povertytarget->goal_name_id,'PovertyGoal','goal_name') }}</td>
                                    <td>{{$povertytarget->target}} </td>
                                    <td>{{ $status_array[$povertytarget->status] }} </td>
                                    <td>
                                        {{ $commonclass->access_button('1',__('Edit'),route('poverty-target.edit',$povertytarget->id)) }}
                                        {{ $commonclass->access_button('2',__('Delete'),route('poverty-target.destroy',$povertytarget->id)) }}
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
