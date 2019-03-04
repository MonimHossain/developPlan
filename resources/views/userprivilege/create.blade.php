@extends('layouts.adminLayout.admin_design')
@section('additionalCSS')
<style>
    li {
        list-style-type: none;
    }
</style>

@endsection
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
                            <h5>@lang('Add User Privilege')</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{ route('userprivilege.store') }}" method="post" class="form-horizontal">
                                {{--<input type="hidden" name="menu_with_actions[]">--}}
                                <div class="control-group">
                                    @csrf
                                    <label  class="control-label ">@lang('User Group')</label>
                                    <div class="controls">
                                        <select name="user_group" id="user_group">
                                            <option value=""> -- Select --</option>
                                            @foreach($usergroups as $ausergroup)
                                                <option value="{{ $ausergroup->id }}">{{ $ausergroup->group_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <ul class="main-navigation">
                                          <h5>{!! $commonClass->get_menu_tree(0) !!}</h5>
                                        </ul>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">@lang('Save')</button>
                                    <a href="{{ route('userprivilege.index')}}" class="btn btn-danger">@lang('Close')</a>
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
    <script>

        $(document).ready(function(){
            var elements = document.getElementsByClassName('user_menu_check');

            for(var i = 0; i < elements.length; i++)
            {
                let element_id = elements[i].id;

                $("#"+element_id).on('click', function(){
                    if(this.checked)
                    {
                        var menu_id = $(this).val();
                        $("#user_save_"+menu_id).attr('checked', true);
                        $("#user_edit_"+menu_id).attr('checked', true);
                        $("#user_delete_"+menu_id).attr('checked', true);
                        $("#user_approve_"+menu_id).attr('checked', true);
                    }
                    else
                    {
                        let menu_id = $( this ).val();

                        $("#user_save_"+menu_id).attr('checked', false);
                        $("#user_edit_"+menu_id).attr('checked', false);
                        $("#user_delete_"+menu_id).attr('checked', false);
                        $("#user_approve_"+menu_id).attr('checked', false);
                    }

                });

            }
          //  $('[name=menu_with_actions]').val(menuWithAction);
        })

        $('#user_group').on('change', function () {
            var user_group = this.value;
            //alert(user_group);
            $.ajax({
                url: 'userprivilege/' + user_group,
                method: "get",
                data: {user_group:user_group},
            }).done(function (data) {

                //  alert(data);
                //   var dataArray = Object.keys(data);
                console.log(typeof data);
                console.log(data);
                Object.size = function(obj) {
                    var size = 0, key;
                    for (key in obj) {
                        if (obj.hasOwnProperty(key)) size++;
                    }
                    return size;
                };

                var size = Object.size(data);
                // alert(size);
                $("input[type='checkbox']").attr("checked", false);

                if (data != "")
                {

                    for (var j=0; j<size;j++)
                    {
                        //console.log(data[i].menu_id);

                        var user_menu_id = data[j].menu_id;

                        $("#user_menu_"+user_menu_id).attr('checked', true);
                        var user_action_string = data[j].actions;
                        if(user_action_string)
                        {
                            var user_action = data[j].actions.split(',');
                            //alert(user_action.length);
                            for (var k = 0; k < user_action.length; k++)
                            {
                                if(user_action[k]==0)
                                {
                                    $('#user_save_' + user_menu_id).attr('checked', true);
                                }
                                if(user_action[k]==1)
                                {
                                    $('#user_edit_' + user_menu_id).attr('checked', true);
                                }
                                if(user_action[k]==2)
                                {
                                    $('#user_delete_' + user_menu_id).attr('checked', true);
                                }
                                if(user_action[k]==3)
                                {
                                    $('#user_approve_' + user_menu_id).attr('checked', true);
                                }

                            }
                        }


                    }
                }

            });
            event.preventDefault();
        });

    </script>
@endsection