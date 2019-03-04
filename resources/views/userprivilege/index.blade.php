@extends('layouts.adminLayout.admin_design')

@section('content')

    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{route('dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> @lang("Home")</a></div>
        </div>
        <!--End-breadcrumbs-->

        <div class="container-fluid">

            <div class="row-fluid">
                <div class="span12">
                  
                    <div class="clearfix">
                        <span class="pull-right"> <a href="{{ route('userprivilege.create')}}" class="btn btn-success "><i class="icon-plus"></i> Add</a> </span>
                    </div>

                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>Data table</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Root Menu</th>
                                    <th>Sub Root Menu</th>
                                    <th>Status</th>
                                    <th>Action</th>
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
                                        <td>{{ $commonClass->getValue($amenu->root_menu,'menus','name') }}</td>
                                        <td>{{ $commonClass->getValue($amenu->sub_root_menu,'menus','name') }}</td>
                                        <td>{{ $status_array[$amenu->status] }} </td>
                                        <td>
                                            <a href="{{ route('userprivilege.edit',$amenu->id)}}" class="btn btn-success pull-left"> <i class="icon-edit"></i> Edit</a>
                                            <form action="{{ route('userprivilege.destroy', $amenu->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger pull-left" type="submit"> <i class="icon-trash"></i> Delete</button>
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