
<!DOCTYPE html>
<html lang="en">
<head>
        <link rel="icon" href="/adp/public/images/backend_images/logo_3.png" type="image/ico">
<title>ADP Budget & Management System</title>
<meta charset="UTF-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">

@php
    $action = app('request')->route()->getAction();
    $controller = class_basename($action['controller']); //AdminController@dashboard


@endphp

@if($controller =='AdminController@dashboard')

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-responsive.min.css') }}" />
        <link rel="stylesheet" href="{{asset('css/backend_css/colorpicker.css')}}"/>
        <link rel="stylesheet" href="{{ asset('css/backend_css/fullcalendar.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/backend_css/matrix-style.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/backend_css/matrix-media.css') }}"/>
        <link rel="stylesheet" href="{{ asset('fonts/backend_fonts/css/font-awesome.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/backend_css/jquery.gritter.css') }}"/>
        <link rel="stylesheet" href="{{ asset('foundation-icons/foundation-icons.css')}}"/>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

@else

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-responsive.min.css') }}" />
        <link rel="stylesheet" href="{{asset('css/backend_css/colorpicker.css')}}" />
        <link rel="stylesheet" href="{{ asset('css/backend_css/datepicker.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/backend_css/uniform.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/backend_css/select2.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/backend_css/matrix-style.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/backend_css/matrix-media.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-wysihtml5.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/backend_css/font-awesome.css') }}" />
        <link rel="stylesheet" href="{{ asset('fonts/backend_fonts/css/font-awesome.css') }}"  />
        <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' >
        <link rel="stylesheet" href="{{ asset('foundation-icons/foundation-icons.css')}}"/>
@endif
        @yield('additionalCSS')
 

    

</head>
<body>

@include('layouts.adminLayout.admin_header')

@include('layouts.adminLayout.admin_sidebar')

@yield('content')


@include('layouts.adminLayout.admin_footer')

@if($controller =='AdminController@dashboard')

        <script src="{{ asset('js/backend_js/excanvas.min.js') }}"></script>
        <script src="{{ asset('js/backend_js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/backend_js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('js/backend_js/jquery.ui.custom.js') }}"></script>
        <script src="{{ asset('js/backend_js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/backend_js/jquery.flot.min.js') }}"></script>
        <script src="{{ asset('js/backend_js/jquery.flot.resize.min.js') }}"></script>
        <script src="{{ asset('js/backend_js/jquery.peity.min.js') }}"></script>
        <script src="{{ asset('js/backend_js/fullcalendar.min.js') }}"></script>
        <script src="{{ asset('js/backend_js/matrix.js') }}"></script>
        <script src="{{ asset('js/backend_js/matrix.dashboard.js') }}"></script>
        <script src="{{ asset('js/backend_js/jquery.gritter.min.js') }}"></script>
        <script src="{{ asset('js/backend_js/matrix.interface.js') }}"></script>
        <script src="{{ asset('js/backend_js/matrix.chat.js') }}"></script>
        <script src="{{ asset('js/backend_js/jquery.validate.js') }}"></script>
        <script src="{{ asset('js/backend_js/matrix.form_validation.js') }}"></script>
        <script src="{{ asset('js/backend_js/jquery.wizard.js') }}"></script>
        <script src="{{ asset('js/backend_js/jquery.uniform.js') }}"></script>
        <script src="{{ asset('js/backend_js/select2.min.js') }}"></script>
        <script src="{{ asset('js/backend_js/matrix.popover.js') }}"></script>
        <script src="{{ asset('js/backend_js/jquery.dataTables.min.js') }}"></script>
        <!--<script src="{{ asset('js/backend_js/matrix.tables.js') }}"></script>-->

@else

        <script src="{{ asset('js/backend_js/excanvas.min.js') }}"></script>
        <script src="{{ asset('js/backend_js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/backend_js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('js/backend_js/jquery.ui.custom.js') }}"></script>
        <script src="{{ asset('js/backend_js/bootstrap.min.js') }}"></script>
        {{--<script src="{{ asset('js/backend_js/jquery.flot.min.js') }}"></script>--}}
        {{--<script src="{{ asset('js/backend_js/jquery.flot.resize.min.js') }}"></script>--}}
        <script src="{{ asset('js/backend_js/jquery.peity.min.js') }}"></script>
        <script src="{{ asset('js/backend_js/fullcalendar.min.js') }}"></script>
        <script src="{{ asset('js/backend_js/matrix.js') }}"></script>
        <script src="{{ asset('js/backend_js/jquery.gritter.min.js') }}"></script>
        {{--<script src="{{ asset('js/backend_js/matrix.dashboard.js') }}"></script>--}}
        {{--<script src="{{ asset('js/backend_js/matrix.interface.js') }}"></script>--}}
        {{--<script src="{{ asset('js/backend_js/matrix.chat.js') }}"></script>--}}
        <script src="{{ asset('js/backend_js/jquery.validate.js') }}"></script>
        {{--<script src="{{ asset('js/backend_js/matrix.form_validation.js') }}"></script>--}}
        <script src="{{ asset('js/backend_js/jquery.wizard.js') }}"></script>
        <script src="{{ asset('js/backend_js/jquery.uniform.js') }}"></script>
        <script src="{{ asset('js/backend_js/select2.min.js') }}"></script>
        <script src="{{ asset('js/backend_js/matrix.popover.js') }}"></script>
        {{--<script src="{{ asset('js/backend_js/matrix.tables.js') }}"></script>--}}
        <script src="{{ asset('js/backend_js/jquery.dataTables.min.js') }}"></script>

        <script type="text/javascript"  src="{{ asset('js/test.js') }}"></script>
        

@endif
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>

@yield('additionalJS')

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:

  //Message alert----------------------//
  
    @if(session()->get('success'))
    var message= "{{ session()->get('success') }}";
    swal({
        title: "Success",
        text: message,
        html: true,
        icon:'success'
    });
    @endif
    
    @if ($errors->count()>0)
    message='';
        @foreach ($errors->all() as $error)
        message+="{{$error."\\n"}}";
        @endforeach
        swal({
            title: "Error",
            text: message,
            html: true,
            icon:'error'
        });
    @endif

    @if (session()->get('fa-error'))
    var message= "{{ session()->get('fa-error') }}"+". you can edit only for this ministry project.Click outside to select Other ministry Project ";
      var element=document.createElement('div');      
      var link=document.createElement('a');
      link.setAttribute('href',"{{route('fa-budget-accounts.create')}}");
      link.setAttribute('id',"edit-button");  
      link.setAttribute('style',"border-radius:15px;background:#506BB1;color:#fff;padding-x:10px;padding-y:10px;margin-left:10px");
      link.text="Go to Edit";
      link.classList.add('btn','btn-primary','btn-lg');
      
      element.append(message);
    
      element.append(link);
     
        swal({
            title: "Exist Already!",
            content: element,
            icon:'error',
            buttons:false

        }


        );
    @endif


    @if (session()->get('fa-error-edit'))
    var message= "{{ session()->get('fa-error-edit') }}"+" under this ministry. Click outside to Stay on this page..!";
      var element=document.createElement('div');      
      var link=document.createElement('a');
      link.setAttribute('href',"{{route('fa-budget-accounts.index')}}");
      link.setAttribute('id',"edit-button");  
      link.setAttribute('style',"border-radius:15px;background:#506BB1;color:#fff;padding-x:10px;padding-y:10px;margin-left:10px");
      link.text="Go to index ";
      link.classList.add('btn','btn-primary','btn-lg');
      
      element.append(message);
    
      element.append(link);
     
        swal({
            title: "No data for Editing!",
            content: element,
            icon:'warning',
            buttons:false

        }


        );
    @endif

  //delete confirm 

    $(document).on('click','.delete', function(e) {
        var form=$(this).closest('form');
        e.preventDefault(); // <--- prevent form from submitting
        swal({
            title: "Are you sure?",
            text: "Your data will be deleted from the database server!",
            icon: "warning",
            buttons: [
              'No, cancel it!',
              'Yes, I am sure!'
            ],
            dangerMode: true,
          }).then(function(isConfirm){
                if(isConfirm){
                  form.submit();
                }
          });
    });

    function goPage (newURL) {
        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {
            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-" ) {
                resetMenu();
            }
            // else, send page to designated URL
            else {
              document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
       document.gomenu.selector.selectedIndex = 2;
    }
    
</script>
<script type="text/javascript">
                                            
function multiyear_relation(id)
{
    if(id.value==1)
    {
        $('#multi_year').show();    
    }
    else
    {
        $('#multi_year').hide();
    }
} 

function sdgd_relation(id)
{
    if(id.value==1)
    {
        $('#sd').show();    
    }
    else
    {
        $('#sd').hide();
    }
}  
function climate_relation(id)
{
    if(id.value==1)
    {
        $('#climate').show();    
    }
    else
    {
        $('#climate').hide();
    }
}  
function poverty_relation(id)
{
    if(id.value==1)
    {
        $('#poverty').show();    
    }
    else
    {
        $('#poverty').hide();
    }
}  
function gender_relation(id)
{
    if(id.value==1)
    {
        $('#gender').show();    
    }
    else
    {
        $('#gender').hide();
    }
}  

$(document).ready(function() {
 $('#multi_year').hide();
 $('#sd').hide();
 $('#climate').hide();
 $('#poverty').hide();
 $('#gender').hide();
  $selectElement = $('select').select2({
    placeholder: "Select One",
    allowClear: true
  });
});

//    $( document ).ready(function(){


//        $('select').select2();
//        // $.fn.dataTable.ext.errMode = 'none';
//
//        table = $("#dataList").DataTable({
//            "bJQueryUI": true,
//            "sPaginationType": "full_numbers",
//            "sDom": '<""l>t<"F"fp>',
//            // "bPaginate":true,
//            // "sPaginationType":"full_numbers",
//        });
//
//    });

//    $(function () {
//        $('.datepicker').datepicker({
//            format:'dd-mm-yyyy',
//            todayHighlight: true,
//            autoclose: true
//        });
//    });
//    
</script>
<script>
 

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function changeLocale(sel)
    {
        alert (sel);
        //var language = sel.value;
        var language = sel;
        $.ajax({
            url:  "{{ route('change_language') }}",
            type: 'post',
            data: { lang: language},
            success: function(response)
            {
                location.reload();
            }
        });
    }
</script>

                    <!--Multiyaer linkage targets cart-->
<script>
 function show_m_target(val)
        {
                var goal = val.value;
                $.ajax({
                        url: "{{ route('get_m_target') }}",
                        type: 'get',
                        data: {
                                goal_id: goal,
                        },
                        success: function (data) {
                                console.log(data);
                                $('#m_target').html("");
                                $('#m_target').html(data);
                        }
                });
        }
        
        function add_row_multiyear(i)
        {
               var rowCount = $('#m_table_body tr').length;
                rowCount++;
                if ($('#m_goal').val() == "")
                {
                        alert('Goal should be selected!!')
                }
                else
                {
                rowCount++;
               $('#m_table').append(

                '<tr id="tr_' + rowCount + '">'
                + '<td><select onchange="show_m_target_cart(this)" name="m_goals[]" id="m_goal_' + rowCount + '"  >'
                + '<option></option>'
                +'</select></td>'
                + '<td><select name="m_target[]" id="m_target_' + rowCount + '">'
                + '<option></option>'
                +'</select></td>'
                + '<td style="text-align: center">\n\
                <a class="btn btn-success" id="add_' + rowCount + '" title="" onclick="add_row_multiyear(' + rowCount + ');"><i class="icon-plus" ></i></a>\n\
                <a class="btn btn-danger"  title=""  onclick="remove_row_m(' + rowCount + ');"><i class="icon-minus" ></i> </a>\n\
                </td>'
                + '</tr>'

                );

               get_m_goal(rowCount);
               // $('select').select2();

                        $("select").select2({
                                placeholder: "Select One",
                                allowClear: true
                        });

                }
        }
        
         function get_m_goal(rowCount)
        {
                $.ajax({
                        url: "{{ route('get_m_goal') }}",
                        type: "get",
                        success: function (data)
                        {
                                console.log('success');
                                $('#m_goal_'+rowCount).html("");
                                $('#m_goal_'+rowCount).html(data);
                        },
                });
        }
        
         function show_m_target_cart(val) {
                var goal = val.value;
                var rowCount = $('#m_table_body tr').length;
                rowCount++;
                $.ajax({
                        url: "{{ route('get_m_target') }}",
                        type: 'get',
                        data: {
                                goal_id: goal,
                        },
                        success: function (data) {
                                console.log(data);
                                $('#m_target_'+rowCount).html("");
                                $('#m_target_'+rowCount).html(data);
                        }
                });
        }
        
    function remove_row_m(i) {
        var rowCount = $('#m_table_body tr').length;
        if (rowCount != 1)
        {
            $("#m_table_body tr:last").remove();
        }
    }
</script>
                                  <!--GENDER linkage targets cart-->
<script>
    function gender_target(val)
        {
                var goal = val.value;
                $.ajax({
                        url: "{{ route('get_gender_target') }}",
                        type: 'get',
                        data: {
                                goal_id: goal,
                        },
                        success: function (data) {
                                console.log(data);
                                 $('#gendertarget').html('');
                                $('#gendertarget').html(data);
                        }
                });
        }
    
   function add_gender_row(i)
        {
               var rowCount = $('#gender_table_body tr').length;
                rowCount++;
                if ($('#gendergoal').val() == "")
                {
                        alert('Goal should be selected!!')
                }
                else
                {
                rowCount++;
               $('#gender_table').append(

                '<tr id="tr_' + rowCount + '">'
                + '<td><select onchange="gender_target_cart(this)" name="gendergoal[]" id="gendergoal_' + rowCount + '"  >'
                + '<option></option>'
                +'</select></td>'
                + '<td><select name="gendertarget[]" id="gendertarget_' + rowCount + '">'
                + '<option></option>'
                +'</select></td>'
                + '<td><select name="scale[]" id="scale_' + rowCount + '">'
                + '<option></option>'
                +'<option value="0-20">0-20 %</option>'
                +'<option value="21-40">21-40 %</option>'
                +'<option value="41-60">41-60 %</option>'
                +'<option value="61-80">61-80 %</option>'
                +'<option value="81-100">81-100 %</option>'
                +'</select></td>'
                + '<td style="text-align: center">\n\
                <a class="btn btn-success" id="add_' + rowCount + '" title="" onclick="add_gender_row(' + rowCount + ');"><i class="icon-plus" ></i></a>\n\
                <a class="btn btn-danger"  title=""  onclick="remove_row_gender(' + rowCount + ');"><i class="icon-minus" ></i> </a>\n\
                </td>'
                + '</tr>'

                );
               get_gender_goal(rowCount);
               // $('select').select2();

                        $("select").select2({
                                placeholder: "Select One",
                                allowClear: true
                        });

                }
        }  
         function get_gender_goal(rowCount)
        {
                $.ajax({
                        url: "{{ route('gendergoal') }}",
                        type: "get",
                        success: function (data)
                        {
                                console.log('success');
                                $('#gendergoal_'+rowCount).html("");
                                $('#gendergoal_'+rowCount).html(data);
                        },
                });
        }
      function gender_target_cart(val) {
     
                var goal = val.value;
              var rowCount = $('#gender_table_body tr').length;
                rowCount++;
                $.ajax({
                        url: "{{ route('get_gender_target') }}",
                        type: 'get',
                        data: {
                                goal_id: goal,
                        },
                        success: function (data) {
                                console.log(data);
                                $('#gendertarget_'+rowCount).html("");
                                $('#gendertarget_'+rowCount).html(data);
                        }
                });
        }
       function remove_row_gender(i) {
       var rowCount = $('#gender_table_body tr').length;
        if (rowCount != 1)
        {
            $("#gender_table_body tr:last").remove();
        }
    }
      
</script>
        

{{--//......................................................sdgs cart..................................//--}}
<script>
        function add_row(i)
        {
               var rowCount = $('#sdgs_table_body tr').length;
                rowCount++;
                if ($('#sdgs_goal').val() == "")
                {
                        alert('Goal should be selected!!')
                }
                else
                {
                rowCount++;
               $('#sdgs_goal_table').append(

                '<tr id="tr_' + rowCount + '">'
                + '<td><select onchange="showsdgsgoalstargetforcart(this)" name="sdgsgoal[]" id="sdgs_goal_' + rowCount + '"  >'
                + '<option></option>'
                +'</select></td>'
                + '<td><select name="sdgstarget[]" id="sdgs_traget_' + rowCount + '">'
                + '<option></option>'
                +'</select></td>'
                + '<td style="text-align: center">\n\
                <a class="btn btn-success" id="add_' + rowCount + '" title="" onclick="add_row(' + rowCount + ');"><i class="icon-plus" ></i></a>\n\
                <a class="btn btn-danger"  title=""  onclick="remove_row(' + rowCount + ');"><i class="icon-minus" ></i> </a>\n\
                </td>'
                + '</tr>'

                );

               get_sdgs_data(rowCount);
               // $('select').select2();

                        $("select").select2({
                                placeholder: "Select One",
                                allowClear: true
                        });

                }
        }
</script>


<script  type="text/javascript">
        //..........................................remove****row***sdgs..........................//
        function remove_row(i) {

                var rowCount = $('#sdgs_table_body tr').length;
                if (rowCount != 1)
                {
                        $("#sdgs_table_body tr:last").remove();
                }
        }
        function showsdgsgoalstargetforcart(val) {
                var goal = val.value;
                var rowCount = $('#sdgs_table_body tr').length;
                rowCount++;
                $.ajax({
                        url: "{{ route('getting_the_target') }}",
                        type: 'get',
                        data: {
                                goal_id: goal,
                        },
                        success: function (data) {
                                console.log(data);
                                $('#sdgs_traget_'+rowCount).html("");
                                $('#sdgs_traget_'+rowCount).html(data);
                        }
                });
        }

        {{--//..........................................getting sdgs goal targets normal.....................................//--}}
        function get_sdgs_data(rowCount)
        {
                $.ajax({
                        url: "{{ route('get_sdgs_goal') }}",
                        type: "get",
                        success: function (data)
                        {
                                console.log('success');
                                $('#sdgs_goal_'+rowCount).html("");
                                $('#sdgs_goal_'+rowCount).html(data);
                        },
                });
        }
        {{--//..........................................getting sdgs goal targets by filter.....................................//--}}
        function showsdgsgoalstarget(val)
        {
                var goal = val.value;
                $.ajax({
                        url: "{{ route('getting_the_target') }}",
                        type: 'get',
                        data: {
                                goal_id: goal,
                        },
                        success: function (data) {
                                console.log(data);
                                $('#target').html("");

                                $('#target').html(data);
                        }
                });
        }

</script>
{{--//...........................................comment section..............................//--}}
<script type="text/javascript">
                function  clickcomment(id)
                {
                        // alert(id);
                         $.ajax({
                    url: "{{ route('showcomment') }}",
                    type: 'get',

                    data: {
                        id: id,
                    },
                    success: function (result) {
                        console.log(result);
                        $('#commentModal').html(result);
                        $('#commentModalshow').modal('show');
                    }
                });

                }
                function addcommentonmodal(id)
                {
                        var comment = document.getElementById('cmt').value;

                        $.ajax({
                                url: "{{ route('send_modal_add_comment_data') }}",
                                type: 'get',
                                data: 'id='+id +'&cmt='+comment,
                                success: function (result) {
                                        console.log(result);
                                        //$('#comment_modal').html("");
                                        //$('#comment_modal').html(result);
                                        $('#commentModalshow').modal('hide');
                                        clickcomment(result)
                                }
                        });
                }

                function showcoment_on_Edit()
                {
                  var id = document.getElementById('showcomment').value;

                  $.ajax({
                  url: "{{ route('show_comment_data') }}",
                   type: 'get',
                    data: {
                     id: id,
                     },
                     success: function (result) {
                      console.log(result);//
                      $('#comment_id').html("");
                      $('#comment_id').html(result);
                    }
                   });

                }
</script>
<script type="text/javascript">

        function  click_project_view(id,url,showp,show_p_m)
        {
                // alert(id)
                $.ajax({
                        {{--url: "{{ route('show_unapproved_project') }}",--}}
                        url: url,
                        type: 'get',
                        data: {
                                id: id,
                        },
                        success: function (result) {
                                console.log(result);
                                $('#'+showp).html(result);
                                $('#'+showp).modal('show');
                        }
                });
        }

</script>

{{--//...................................................climate cart......................................//--}}
<script>
    function add_climate_row(i)
    {
        var rowCount = $('#climate_table_body tr').length;
        rowCount++;
        if ($('#climate_goal').val() == "")
        {
                alert('Goal should be select')
        }
        else
        {
            rowCount++;
            $('#climate_goal_table').append(

                '<tr id="tr_' + rowCount + '">'
                + '<td><select onchange="show_climate_goals_target_forcart(this)" name="climategoal[]" id="climate_goal_' + rowCount + '"  >'
                + '<option></option>'
                +'</select></td>'
                + '<td><select name="climatetarget[]" id="climate_traget_' + rowCount + '">'
                + '<option></option>'
                +'</select></td>'
                + '<td style="text-align: center">\n\
                        <a class="btn btn-success" id="add_' + rowCount + '" title="" onclick="add_climate_row(' + rowCount + ');"><i class="icon-plus" ></i></a>\n\
                        <a class="btn btn-danger"  title=""  onclick="remove_climate_row(' + rowCount + ');"><i class="icon-minus" ></i> </a>\n\
                    </td>'
                + '</tr>'
            );
            get_cliamate_goal_data(rowCount);
            $("select").select2({
    placeholder: "Select One",
    allowClear: true
});
        }
    }

    function remove_climate_row(i) {
        var rowCount = $('#climate_table_body tr').length;
        if (rowCount != 1)
        {
            $("#climate_table_body tr:last").remove();
        }
    }

    function get_cliamate_goal_data (rowCount) {
        $.ajax({
            url: "{{ route('get_climate_goal') }}",
            type: "get",
            success: function (data)
            {
                console.log('success');
                $('#climate_goal_'+rowCount).html("");
                $('#climate_goal_'+rowCount).html(data);
            },
        });
    }

    function climate_target(val) {
        var goal = val.value;
        $.ajax({
            url: "{{ route('getting_the_climate_target') }}",
            type: 'get',
            data: {
                goal_id: goal,
            },
            success: function (data) {
                console.log(data);
                $('#climatetarget').html("");
                $('#climatetarget').html(data);
            }
        });
    }

    function show_climate_goals_target_forcart(val) {
            var goal = val.value;
            var rowCount = $('#climate_table_body tr').length;
            rowCount++;
            $.ajax({
                    url: "{{ route('getting_the_climate_target') }}",
                    type: 'get',
                    data: {
                            goal_id: goal,
                    },
                    success: function (data) {
                            console.log(data);
                            $('#climate_traget_'+rowCount).html("");
                            $('#climate_traget_'+rowCount).html(data);
                    }
            });
    }

</script>

{{--//..................povery..cart.....................//--}}
<script>
    function add_poverty_row(i)
    {
        var rowCount = $('#poverty_table_body tr').length;
        rowCount++;
        if ($('#').val() == "")
        {
        }
        else
        {
            rowCount++;
            $('#proverty_table').append(

                '<tr id="tr_' + rowCount + '">'
                + '<td><select onchange="show_poverty_goals_target_forcart(this)" name="povertygoal[]" id="poverty_goal_' + rowCount + '"  >'
                + '<option></option>'
                +'</select></td>'
                + '<td><select name="povertytarget[]" id="poverty_traget_' + rowCount + '">'
                + '<option></option>'
                +'</select></td>'
                + '<td style="text-align: center">\n\
                        <a class="btn btn-success" id="add_' + rowCount + '" title="" onclick="add_poverty_row(' + rowCount + ');"><i class="icon-plus" ></i></a>\n\
                        <a class="btn btn-danger"  title=""  onclick="remove_poverty_row(' + rowCount + ');"><i class="icon-minus" ></i> </a>\n\
                    </td>'
                + '</tr>'
            );
            get_poverty_goal_data(rowCount);
           $("select").select2({

           placeholder: "Select One",
            allowClear: true
             });
        }
    }

    function remove_poverty_row(i) {
        var rowCount = $('#poverty_table_body tr').length;
        if (rowCount != 1)
        {
            $("#poverty_table_body tr:last").remove();
        }
    }

    function get_poverty_goal_data (rowCount) {
        $.ajax({
            url: "{{ route('get_poverty_goal') }}",
            type: "get",
            success: function (data)
            {
                console.log('success');
                $('#poverty_goal_'+rowCount).html("");
                $('#poverty_goal_'+rowCount).html(data);
            },
        });

    }
    function poverty_target(val) {
        var goal = val.value;
        $.ajax({
            url: "{{ route('poverty_target') }}",
            type: 'get',
            data: {
                goal_id: goal,
            },
            success: function (data) {
                console.log(data);
                $('#povertytarget').html("");

                $('#povertytarget').html(data);

            }
        });
    }

    function show_poverty_goals_target_forcart(val) {
        var goal = val.value;
        var rowCount = $('#poverty_table_body tr').length;
        rowCount++;
        $.ajax({
            url: "{{ route('poverty_target') }}",
            type: 'get',
            data: {
                goal_id: goal,
            },
            success: function (data) {
                console.log(data);
                $('#poverty_traget_'+rowCount).html("");
                $('#poverty_traget_'+rowCount).html(data);

            }
        });
    }

</script>

<script>
        function checkdatevalidation() {
                var str1 = $("input[name=date_of_commencement]").val();
                var str2 = $("input[name=date_of_completion]").val();
                var dt1  = parseInt(str1.substring(0,2),10);
                var mon1 = parseInt(str1.substring(3,5),10);
                var yr1  = parseInt(str1.substring(6,10),10);
                var dt2  = parseInt(str2.substring(0,2),10);
                var mon2 = parseInt(str2.substring(3,5),10);
                var yr2  = parseInt(str2.substring(6,10),10);
                var date1 = new Date(yr1, mon1, dt1);
                var date2 = new Date(yr2, mon2, dt2);
                if(date2 < date1)
                {
                        alert("Date of Completion Should Gretter Than Date of Commencement!!");
                        return false;
                }
                else
                {

                }
        }

    function checkAmountValidation() {
            var total = document.getElementById('total').value;
            var gob = document.getElementById('gob').value;
            var fe = document.getElementById('fe').value;
            var pa = document.getElementById('pa').value;
            var rpa = document.getElementById('rpa').value;
            var own_fund = document.getElementById('own_fund').value;
            toatlc = parseInt(total);
            gobc = parseInt(gob);
            fec = parseInt(fe);
            pac = parseInt(pa);
            rpac = parseInt(rpa);
            own_fundc = parseInt(own_fund);
            var sum=gobc+fec+pac+rpac+own_fundc;
            if(toatlc<sum)
            {
                    alert("Total Value is Less!!");
            }
            else
            {
            }

    }

    // ........................................................Row_component...............................................

    function add_row_component(i)
    {
            var rowCount = $('#component_table_body tr').length;
            rowCount++;

            if ($('#source_id_' + rowCount).val() == "")
            {

            }
            else
            {
                    var $x= rowCount++;
                    $('#component_table').append(
                            '<tr id="tr_' + rowCount + '">'
                            + '<td><input type="text"  name="components_name[]"    class="span11" placeholder=" @lang("Component Name")"  /></td>'
                            + '<td><input type="number"  name="quantity[]"         class="span11" placeholder=" @lang("Quantity")"  /></td>'
                            + '<td><input type="number"   name="unit_cost[]"       class="span11" placeholder=" @lang("Unit Cost")"  /></td>'
                            + '<td><input type="number"   name="estimated_cost[]"  class="span11" placeholder=" @lang("Estimated Cost")"  /></td>'
                            + '<td>\n\
                        <a class="btn btn-success" id="add_' + rowCount + '" title="@lang('Add')" onclick="add_row_component(' + rowCount + ');"><i class="icon-plus" ></i></a>\n\
                        <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row_component(' + rowCount + ');"><i class="icon-minus" ></i> </a>\n\
                    </td>'
                            + '</tr>'

                    );


            }
    }

    //..........................................remove****row..........................//
    function remove_row_component(i) {

            var rowCount = $('#component_table tr').length;
            if (rowCount != 1)
            {

                    $("#component_table tr:last").remove();

            }
    }


   function sector_to_subsector(val)
   {       
           var id= val.value;
           $.ajax({
                   url: "{{ route('getting_sub_sector') }}",
                   type: 'get',
                   data: {
                           id: id,
                   },
                   success: function (data) {
                           console.log(data);
                           $('#sub_sector').html("");
                           $('#sub_sector').html(data);
                   }
           });
   }
   
   function subsec_to_ministry(val)
   {
 
           var id= val.value;
           $.ajax({
                   url: "{{ route('getting_ministry') }}",
                   type: 'get',
                   data: {
                           id: id,
                   },
                   success: function (data) {
                           console.log(data);
                           $('#showministry').html("");
                           $('#showministry').html(data);
                   }
           });
   }

   // sector to ministry

   function sector_to_ministry(val)
   {
            var parsing=parseInt(val);
             if(Number.isInteger(parsing)){
                var id= val;
             }
             else{
              var id= val.value;  
             }
           
          
           $.ajax({
                   url: "{{url('sector-to-ministry')}}",
                   type: 'get',
                   data: {
                           id: id,
                   },
                   success: function (data) {
                           console.log(data);
                          
                        $('#showministry').html(data);
                   },
                   error:function(xhr,errortext,errorthrow){
                        console.log(xhr.responseText);
                   }
           });
   }
   

   //ministry to project getting

   function ministry_to_project(val)
   {
        var form_data=$('#upper_data').find("[name]").serialize();
        
            var parsing=parseInt(val);
             if(Number.isInteger(parsing)){
                var id= val;
             }
             else{
              var id= val.value;  
             }
           
          
           $.ajax({
                   url: "{{url('ministry-to-project')}}",
                   type: 'get',
                   data: form_data,
                   success: function (response) {
                         
                         console.log(response);
                         if(response=='reload-page'){
                            location.reload();
                         }else{
                                $('#table-body').html(''); 
                                $('#table-body').html(response);
                         }
                        
                   },
                   error:function(xhr,errortext,errorthrow){
                        console.log(xhr.responseText);
                        $('#table-body').html(''); 

                   }
           });
   }


//gettting ministry to project for fa budget account 


function ministry_to_project_edit(val)
   {
            var form_data=$('#upper_data').find("[name]").serialize();
           
            var parsing=parseInt(val);
             if(Number.isInteger(parsing)){
                var id= val;
             }
             else{
              var id= val.value;  
             }
           
          
           $.ajax({
                   url: "{{url('ministry-to-project_edit')}}",
                   type: 'get',
                   data: form_data,
                   
                   success: function (response) {
                         
                        
                         if(response=='reload-page'){
                            location.reload();
                         }else{
                                $('#table-body').html(''); 
                                $('#table-body').html(response);
                         }
                        
                   },
                   error:function(xhr,errortext,errorthrow){
                        console.log(xhr.responseText);
                        $('#table-body').html(''); 

                   }
                   
                   
           });
   }








   
   
   
 function printDiv(divId,orientasion=false) {
    if(orientasion){
    var css = '@page { size: landscape;left: 0px;top: 10px;position:absolute; }',
    head = document.head || document.getElementsByTagName('head')[0],
    style = document.createElement('style');

    style.type = 'text/css';
    style.media = 'print';

    if (style.styleSheet){
      style.styleSheet.cssText = css;
  } else {
      style.appendChild(document.createTextNode(css));
  }

  head.appendChild(style);
}

  var printContents = document.getElementById(divId).innerHTML;
  var originalContents = document.body.innerHTML;
  console.log(originalContents);
  document.body.innerHTML = "<html><head><title></title></head><body>" + printContents + "</body>";
  window.print();
  document.body.innerHTML = originalContents;
  window.location.reload(true)
 
}

</script>

</body>
</html>
