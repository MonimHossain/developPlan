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
                    <div class="widget-title"> <span class="icon"> <i class="icon-group"></i> </span>
                        <h5> @lang("User Creation")</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="{{ route('usercreation.update', $user->id) }}" method="post" class="form-horizontal"  enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="control-group">
                                @csrf
                                <label class="control-label">@lang("User Name") :</label>
                                <div class="controls">
                                    <input type="text" name="name" class="span11" placeholder="@lang("User Name")" value="{{ $user->name }}" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">@lang("User Email")</label>
                                <div class="controls">
                                    <input type="email" name="email" class="span11" placeholder="@lang("User Email")" value={{ $user->email }} />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">@lang("User Password")  </label>
                                <div class="controls">
                                    <input type="password" name="password" class="span11" placeholder="@lang("User Password")" />
                                    <input type="hidden" name="password_old" class="span11" placeholder="@lang("User Password")" value="{{$user->password}}" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">@lang("User Group")</label>
                                <div class="controls">
                                    <select name="user_group">
                                        <option value=""> -- @lang("Select") --</option>
                                        @foreach($usergroups as $ausergroups)
                                            <option value="{{ $ausergroups->id }}"
                                                    @if($ausergroups->id == $user->user_group)
                                                    selected
                                                    @endif >{{ $ausergroups->group_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="hidden" value="{{$user->department_id}}">

                            <div class="control-group" id="department">
                                <label class="control-label" id='label_department'>@lang("Department")</label>
                                <div class="controls">
                                    <select name="department_id">

                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">@lang("Parent User")</label>
                                <div class="controls">
                                    <select name="parent_user">
                                        <option value=""> -- @lang("Select") --</option>
                                        @foreach($all_user as $a_user)
                                            <option value="{{ $a_user->id }}" @if($a_user->id == $user->parent_user)
                                            selected
                                                    @endif >{{ $a_user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">@lang("Expiration Date")</label>
                                <div class="controls">
                                    <input id="datepicker" name="expiration_date" class="span11 datepicker"  value="{{ $commonClass->getTimeFormat($user->expiration_date) }}">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" style="margin-top: 10px;font-family: cursive"> @lang('Attach Image') : </label>
                                <div class="controls" style="margin-top: 10px">
                                    <input type="file" name="user_img_file" accept="image/*" >
                                    <input type="hidden" name="hidden_img" value="{{ $user->user_image }}" >

                                    <img src="{{asset($user->user_image)}}" height="70" width="70"  alt="user image not aviliable"/>
                                </div>

                            </div>


                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">@lang("Update")</button>
                                <a href="{{ route('usercreation.index')}}" class="btn btn-danger">@lang("Close Update")</a>
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
$('select[name="department_id"]').select2();

   var department_id=$('input[name=hidden]').val();


  $(function(){
    //=======function for ajax calling and checking selecetiong group ========/
        function myselectfunc(department_id,key){
            if(department_id==key){

              return "selected=\"selected\"";
            }
            else{

                 return "";
            }
    }
    var ajaxfunc=function(groupdata){
      if(groupdata == 9 || groupdata == 10 || groupdata == 11 || groupdata == 19 || groupdata == 12 || groupdata == 14 || groupdata == 13 || groupdata == 15 || groupdata == 18){

           if(groupdata == 9 || groupdata == 10){ //Sector Divition
             $("#label_department").text("Sector Name");

             $("#department").show();


           }
           else if(groupdata == 11 || groupdata == 19){//Sub Sector
             $("#label_department").text("Sub Sector Name");

             $("#department").show();


           }
           else if(groupdata == 12 || groupdata == 14){//Ministry
             $("#label_department").text("Ministry Name");

             $("#department").show();


           }
            else if(groupdata==18){
             $("#label_department").text("Wings");

             $("#department").show();


           }
           else  {
             $("#label_department").text("Agency Name");

             $("#department").show();


           }

        $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
      }
  });
        $.ajax({
          url:"{{url('user-group-department')}}",
          type:'GET',

          data:{groupdata:groupdata},
          success:function(data){

                 $('select[name="department_id"]').empty();

                 $('select[name="department_id"]').select2();
                 $('select[name="department_id"]').append("<option value=''>Select here</option>");

                   $.each(data,function(key,value){

                        $('select[name="department_id"]').append('<option value="'+ key +'"'+myselectfunc(department_id,key)+'>'+ value +'</option>');
                   });
                   $('select[name="department_id"]').select2();
             }
          }



        );


      }
      else{

        $("#department").hide();

      }
    };

    //================end ajax function==========================//
    $("#department").hide();

   var data=$("select[name='user_group']").val();
         ajaxfunc(data);

    // $("select[name=['department_id']]").select2("destroy");

   $("select[name='user_group']").on('change',function(){

     $('select[name="department_id"]').empty();

     $('select[name="department_id"]').select2();

        var groupdata=$(this).val();
        ajaxfunc(groupdata);






   });
  });
</script>
@endsection
