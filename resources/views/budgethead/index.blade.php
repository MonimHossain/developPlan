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
                    <span class="pull-right"> <a href="{{ route('budget-head.create')}}" class="btn btn-success "><i class="icon-plus"></i> @lang('Add')</a> </span>
                </div>

                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>@lang('Budget Head') </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table" id="dataList">
                            <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    <th>@lang("Budget head Name")</th>
                                    <th>@lang("Budget head Name (Bangla)")</th>
                                    <th>@lang('Description')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $status_array=$commonclass->common_Array('status');
                               
                                @endphp
                                @foreach($budgetheads as $showbudget_head)
                                <tr>
                                    <td>{{$sl++}}</td>
                                    <td>{{$showbudget_head->budget_head_name}}</td>
                                    <td>{{$showbudget_head->budget_head_name_bn}}</td>
                                    <td>{{$showbudget_head->budget_head_description}} </td>
                                    <td>{{ $status_array[$showbudget_head->status] }} </td>

                                    <td>
                                        {{-- <a href="{{route('budget_head.edit',$showbudget_head->id)}}" class="btn btn-success pull-left"><i class="icon-edit"></i>@lang('Edit')</a> --}}

                                        {{$commonclass->access_button('1',__('Edit'),route('budget-head.edit',$showbudget_head->id))}}

                                        {{--    <form action="{{route('budget_head.destroy',$showbudget_head->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger pull-left" type="submit"> <i class="icon-trash"></i>   @lang('Delete')</button>
                                        </form> --}}
                                        {{$commonclass->access_button('2',__('Delete'),route('budget-head.destroy',$showbudget_head->id))}}


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