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
                    <span class="pull-right"> <a href="{{ route('sdgstargets.create')}}" class="btn btn-success "><i class="icon-plus"></i> @lang('Add')</a> </span>
                </div>
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>@lang('SDGS TARGETS LIST') </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table" id="dataList">
                            <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    <th>@lang('Gole Name')</th>
                                    <th>@lang('Targets')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $status_array=$commonclass->common_Array('status');
                                @endphp
                                @foreach($sdgstargets as $sdgstargets)
                                <tr>
                                    <td>{{$sdgstargets->id}}</td>
                                    <td>{{ $commonClass->getValue($sdgstargets->gole_id,'sdgsgole','gole_name') }}</td>
                                    <td>{{$sdgstargets->targets}} </td>
                                    <td>{{ $status_array[$sdgstargets->status] }} </td>
                                    <td>
                                        {{ $commonclass->access_button('1',__('Edit'),route('sdgstargets.edit',$sdgstargets->id)) }}
                                        {{ $commonclass->access_button('2',__('Delete'),route('sdgstargets.destroy',$sdgstargets->id)) }}
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