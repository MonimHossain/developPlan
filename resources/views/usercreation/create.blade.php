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
                @if ($errors->any())
                <div class="alert alert-error alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif

                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon icon-user"></i> </span>
                        <h5>@lang("User Creation")  {{isset($data)?$data:''}}</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="{{ route('usercreation.store') }}" method="post" class="form-horizontal"  enctype="multipart/form-data">
                            <div class="control-group">
                                @csrf
                                <label class="control-label">@lang("User Name") {{required()}} </label>
                                <div class="controls">
                                    <input type="text" name="name" class="span11" placeholder="@lang("User Name")" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">@lang("User Email") {{required()}}</label>
                                <div class="controls">
                                    <input type="email" name="email" class="span11" placeholder="@lang("User Email")" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">@lang("User Password") {{required()}}</label>
                                <div class="controls">
                                    <input type="password" name="password" class="span11" placeholder="@lang("User Password")" />
                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label">@lang("User Group")</label>
                                <div class="controls">
                                    <select name="user_group">
                                        <option value=""> -- @lang("Select") --</option>
                                        @foreach($usergroups as $usergroup)
                                        <option value="{{ $usergroup->id }}">{{ $usergroup->group_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- optional filed --}}

                            <div class="control-group" id="department">
                                <label class="control-label" id='label_department'>@lang("Department")</label>
                                <div class="controls">
                                    <select name="department_id" id="department_id">

                                    </select>
                                </div>
                            </div>
                           
                            {{-- end optional field --}}

                            <div class="control-group">
                                <label class="control-label">@lang("Parent User")</label>
                                <div class="controls">
                                    <select name="parent_user">
                                        <option value=""> -- @lang("Select") --</option>
                                        @foreach($user as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">@lang("Expiration Date") </label>
                                <div class="controls">
                                    <input type="text" id="datepicker" class="span11 datepicker" name="expiration_date">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" style="margin-top: 10px;font-family: cursive"> @lang('Attach Image') : </label>
                                <div class="controls" style="margin-top: 10px">
                                    <input type="file" name="user_img_file" accept="image/*">
                                </div>

                            </div>


                            {{--<div class="control-group">
                                <label class="control-label">@lang("Expiration Date")</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="icon icon-calendar" id="basic-addon1"></span>
                                </div>
                                <input type="text" id="datepicker" class="span4 datepicker" name="expiration_date">
                            </div>
                            </div>--}}
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">@lang("Save")</button>
                                <a href="{{ route('usercreation.index')}}" class="btn btn-danger">@lang("Close")</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
@section('additionalJS')

<script type="text/javascript">
    $(function () {
        $("#department").hide();

        // $("select[name=['department_id']]").select2("destroy");

        $("select[name='user_group']").on('change', function () {

            $('select[name="department_id"]').empty();

            $('select[name="department_id"]').select2();

            var groupdata = $(this).val();



            if (groupdata == 9 || groupdata == 10 || groupdata == 11 || groupdata == 19 || groupdata == 12 || groupdata == 14 || groupdata == 13 || groupdata == 15 || groupdata == 18) {
                if (groupdata == 9 || groupdata == 10) {//Sector Divition
                    $("#label_department").text("Sector Name");

                    $("#department").show();


                } else if (groupdata == 11 || groupdata == 19) {//Sub Sector
                    $("#label_department").text("Sub Sector Name");

                    $("#department").show();


                } else if (groupdata == 12 || groupdata == 14) {//Ministry
                    $("#label_department").text("Ministry Name");

                    $("#department").show();


                } else if (groupdata == 18) {
                     $("#label_department").text("Wings Name");

                    $("#department").show();

                } else {
                    $("#label_department").text("Agency Name");
                    $("#department").show();

                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('user-group-department')}}",
                    type: 'GET',
                    data: {groupdata: groupdata},
                    success: function (data) {

                        $('select[name="department_id"]').empty();

                        $('select[name="department_id"]').select2();
                        $.each(data, function (key, value) {

                            $('select[name="department_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                }



                );


            } else {

                $("#department").hide();

            }


        });
    });
</script>
@endsection
