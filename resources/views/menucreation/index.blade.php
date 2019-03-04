@extends('layouts.adminLayout.admin_design')

@section('content')

    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{route('dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>  @lang('BackTohome') </a></div>
        </div>
        <!--End-breadcrumbs-->

        <div class="container-fluid">

            <div class="row-fluid">
                <div class="span12">
                   
                    <div class="clearfix">
                        <span class="pull-right"> <a href="{{ route('menucreation.create')}}" class="btn btn-success "><i class="icon-plus"></i> @lang('Add')</a> </span>
                    </div>

                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>@lang('Data table')</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table" id="dataList">
                                <thead>
                                <tr>
                                    <th>@lang('ID')</th>
                                    <th>@lang('Name')</th>
                                    <th>@lang('Parent Menu')</th>
                                    <th>@lang('Sequence')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                                </thead>
                                <tbody>

                                @php
                                    $status_array=$commonClass->common_Array('status');
                                @endphp
                                @foreach($all_menus as $amenu)
                                    <tr>
                                        <td>{{$amenu->id}}</td>
                                        <td>{{$amenu->name}}</td>
                                        <td>{{ $commonClass->getValue($amenu->parent_menu,'menu','name') }}</td>
                                        <td>{{ $amenu->sequence }}</td>
                                        <td>{{ $status_array[$amenu->status] }} </td>
                                        <td>
                                            <a href="{{ route('menucreation.edit',$amenu->id)}}" class="btn btn-success pull-left"> <i class="icon-edit"></i> @lang('Edit')</a>
                                            <form action="{{ route('menucreation.destroy', $amenu->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger pull-left" type="submit"> <i class="icon-trash"></i> @lang('Delete')</button>
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