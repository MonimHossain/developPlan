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
              <span class="pull-right"> <a href="{{ route('usercreation.create')}}" class="btn btn-success "><i class="icon-plus"></i> @lang('Add')</a> </span>
            </div>
              
            <div class="widget-box">
                <div class="widget-title"><span class="icon "> <i class="icon icon-th"></i></span>
                    <h5> @lang("User Creation")</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table" id="dataList">
                        <thead>
                            <tr>
                                <th>@lang("ID")</th>
                                <th>@lang("User Name")</th>
                                <th>@lang("User Image")</th>
                                <th>@lang("Email")</th>
                                <th>@lang("User Group")</th>
                                <th>@lang("Parent User")</th>
                                <th>@lang("Status")</th>
                                <th>@lang("Action")</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @php
                                $status_array=$commonClass->common_Array('status');
                                $i=0;
                            @endphp

                            @foreach($usercreation as $user)
                            
                            <tr>
                                 @php
                                    $i++;
                                @endphp
                                <td>{{$i}}</td>
                                <td>{{$user->name}}</td>
                                <td>
                                    <img src="{{asset($user->user_image)}}" height="70" width="70" alt="user image not aviliable"/>
                                </td>

                                <td>{{$user->email}}</td>
                                <td>{{ $commonClass->getValue($user->user_group,'Usergroup','group_name') }}</td>
                                <td>{{ $commonClass->getValue($user->parent_user,'User','name') }}</td>
                                <td>{{ $status_array[$user->isactive] }}</td>
                                <td>
                                    <a href="{{ route('usercreation.edit',$user->id)}}" class="btn btn-success pull-left"> <i class="icon-edit"></i>@lang("Edit")</a>

                                    <form action="{{ route('usercreation.destroy', $user->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger pull-left" type="submit"> <i class="icon-trash"></i> @lang("Delete")</button>
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