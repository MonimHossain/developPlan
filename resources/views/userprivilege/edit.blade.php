@extends('layouts.adminLayout.admin_design')

@section('content')
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{route('dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
        </div>
        <!--End-breadcrumbs-->

        <div class="container-fluid">

            <div class="row-fluid">
                <div class="span12">
                   
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>User Group </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{ route('usercreation.update', $user->id) }}" method="post" class="form-horizontal">
                                @method('PATCH')
                                @csrf
                                <div class="control-group">
                                    @csrf
                                    <label class="control-label">User Name :</label>
                                    <div class="controls">
                                        <input type="text" name="name" class="span11" placeholder="User Name" value={{ $user->name }} />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">User Email</label>
                                    <div class="controls">
                                        <input type="email" name="email" class="span11" placeholder="User Name" value={{ $user->email }} />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">User Password</label>
                                    <div class="controls">
                                        <input type="password" name="password" class="span11" placeholder="User Password" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">User Group</label>
                                    <div class="controls">
                                        <select name="user_group">
                                            <option> -- Select --</option>
                                            @foreach($usergroups as $ausergroups)
                                                <option value="{{ $ausergroups->id }}"
                                                        @if($ausergroups->id == $user->user_group)
                                                        selected
                                                        @endif >{{ $ausergroups->group_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Parent User</label>
                                    <div class="controls">
                                        <select name="parent_user">
                                            <option> -- Select --</option>
                                            @foreach($all_user as $a_user)
                                                <option value="{{ $a_user->id }}" @if($a_user->id == $user->parent_user)
                                                selected
                                                        @endif >{{ $a_user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Expiration Date</label>
                                    <div class="controls">
                                        <input id="datepicker" name="expiration_date" class="span11 datepicker"  value={{ $commonClass->getTimeFormat($user->expiration_date) }}>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="{{ route('usercreation.index')}}" class="btn btn-danger">Close</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
