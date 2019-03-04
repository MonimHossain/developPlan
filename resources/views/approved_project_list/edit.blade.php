@extends('layouts.adminLayout.admin_design')

@section('content')
<style> 
    .tables {

        width:90%;
        margin: 0px auto;
        float: none;
    }
    td input[type=checkbox]{
        opacity:1 !important;
    }
  
    .modal{
        width:60% !important;
        left:0 !important;
        top: 5% !important;
        right: 0 !important;
        margin:0 auto!important;
    }

    .modal-body {
        max-height: 600px !important;
        overflow-y: auto !important;
    }

    fieldset {
        display: block;
        margin-inline-start: 2px;
        margin-inline-end: 2px;
        border: 1px solid #2E363F;
        padding-block-start: 0.35em;
        padding-inline-end: 0.75em;
        padding-block-end: 0.625em;
        padding-inline-start: 0.75em;
        min-inline-size: min-content;
    }

    legend {
        padding-inline-start: 2px; padding-inline-end: 2px;
        color:#B27D66;
        font-weight: lighter;
        font-size: 18px;
        border-bottom: 0px !important
    }
    fieldset input {
        margin-right: 0.20em;
    }
    fieldset label{
        display:inline;
    }fieldset div{
        display:inline;
    }
    
</style>

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{route('dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> @lang("Home") </a></div>
    </div>
    <!--End-breadcrumbs-->

    <div class="container-fluid">

        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title">
                        <ul class="nav nav-tabs">
                            <li class="tab-pane active span1 m-wrap"><a data-toggle="tab" href="#tab1">P Info</a></li>
                            <li class="tab-pane span2 m-wrap"><a data-toggle="tab" href="#tab2">Type of Finance</a></li>
                            <li class="tab-pane span2 m-wrap"><a data-toggle="tab" href="#tab3">Year wise Cost</a></li>
                            <li class="tab-pane span2 m-wrap"><a data-toggle="tab" href="#tab4">Location wise Cost</a></li>
                            <li class="tab-pane span2 m-wrap"><a data-toggle="tab" href="#tab5">Component wise Cost</a></li>
                            <li class="tab-pane span2 m-wrap"><a data-toggle="tab" href="#tab6">Comments</a></li>

                            <li style =""class="tab-pane span1 m-wrap"><a data-toggle="tab" href="#tab7">History</a></li>
                        </ul>
                    </div>

                    <div class="widget-content tab-content">

                        {{--@php--}}


                        {{--if( $_POST['submit_1'] ) {--}}
                        {{--return "d";--}}

                        {{--}--}}



                        {{--@endphp--}}

                        {{--//...............................................tab one start...........................................//--}}

                        <div id="tab1" class="tab-pane active">







                            @include('approaved_projects.partials._project_info')

                        </div>


                        {{--//.................................tab2 start ............................................--}}


                        <div id="tab2" class="tab-pane">

                            @include('approaved_projects.partials._type_of_finance')

                            <div id="type_of_finance_divshow"></div>

                          

                        </div>


                        {{--//.......................................................tab3 start.............................................................//--}}
                        <div id="tab3" class="tab-pane">
                            

                            @include('approaved_projects.partials._year_wise_cost')
                            
                            <div id="year_wise_divshow"></div>

                            </div>


                        <div id="tab4" class="tab-pane">

                            @include('approaved_projects.partials._location_wise_cost')

                        </div>
                        <div id="tab5" class="tab-pane">

                            @include('approaved_projects.partials._component_wise_cost')

                        </div>
                        <div id="tab6" class="tab-pane">

                            @include('approaved_projects.partials._comments')

                        </div>

                        <div id="tab7" class="tab-pane">

                            @include('approaved_projects.partials._approval_history')

                        </div>
                    </div>
                </div>
                
        </div>
    </div>
</div>
</div>

@endsection


    @section('additionalJS')
        <script src="{{asset('js/backend_js/matrix.tables.js')}}"></script>

        <script  type="text/javascript">
            

            function add_row_location(i)
            {

                var rowCount = $('#table_body_location tr').length;
                // rowCount++;

                if ($('#division_id_' + rowCount).val() == "")
                {
                    alert('Division Field Can not be empty.');
                    $('#division_id_' + rowCount).focus();
                }
                else if ($('#amountlocation_' + rowCount).val() == "")
                {
                    alert('Amount Field Can not be empty.');

                    $('#amount_' + rowCount).focus();

                }

                else
                {

                    var $x = rowCount++;
                    $('#location_table').append(
                        '<tr id="tr_' + rowCount + '">'



                        + '<td>' + $x + '</td>'

                        + '<td><select name="division[]" id="division_id_' + rowCount + '" >'

                        + '<option> @lang('Select One') </option>'
                        + '</select></td>'


                        + '<td><select name="rmo[]" id="rmo_id_' + rowCount + '" >'

                        + '<option> @lang('Select One') </option>'
                        + '</select></td>'


                        + '<td><select name="district[]" id="district_id__' + rowCount + '" >'

                        + '<option> @lang('Select One') </option>'

                            + '<option value="1"> @lang('Kushtia') </option>'
                        + '</select></td>'

                        + '<td><select name="upazila[]" id="upazila_id_' + rowCount + '" >'

                        + '<option> @lang('Select One') </option>'
                        + '</select></td>'

                        + '<td><input type="number" name="amount[]" id="amountlocation_' + rowCount + '" class="span11" placeholder="@lang('Amount')"  /></td>'

                        + '<td>\n\
                    <a class="btn btn-success" id="add_' + rowCount + '" title="@lang('Add')" onclick="add_row_location(' + rowCount + ');"><i class="icon-plus" ></i></a>\n\
                    <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row_location(' + rowCount + ');"><i class="icon-minus" ></i> </a>\n\
                </td>'
                        + '</tr>'

                    );
                    get_division_data(rowCount);
                    $('select').select2();
                    get_upazila_data(rowCount);
                    $('select').select2();

                    get_rmo_data(rowCount);
                    $('select').select2();

                    get_district_data(rowCount);
                    $('select').select2();
                }
            }

            //..........................................remove****row..........................//
            function remove_row_location(i) {
                alert("Delete Successfully");
                var rowCount = $('#table_body_location tr').length;
                if (rowCount != 1)
                {

                    $("#table_body_location tr:last").remove();
                }
            }

            //..........................................getdivision*******data.....................................//
            function get_division_data(rowCount)
            {

                $.ajax({
                    url: "{{ route('division_data') }}",
                    type: "get",
                    success: function (data)
                    {
                        console.log('success');
                        $('#division_id_' + rowCount).html("");
                        $('#division_id_' + rowCount).html(data);
                    },
                });
            }

            function add_row_source(i)
            {
                var rowCount = $('#table_body tr').length;

//alert($('#source_id_' + rowCount).val())


                if ($('#source_id_' + rowCount).val() == "")
                {
                    alert('Source Field Can not be empty.');
                    $('#source_id_' + rowCount).focus();
                }
                else if ($('#amount_' + rowCount).val() == "")
                {
                    alert('Amount Field Can not be empty.');
                    $('#amount_' + rowCount).focus();
                }
                else
                {
                    rowCount++;

                    $('#source_table').append(
                        '<tr id="tr_' + rowCount + '">'
                        + '<td><select name="source[]" id="source_id_' + rowCount + '" >'

                        + '<option> @lang('Select One') </option>'

                        + '</select></td>'

                        + '<td><input type="number" name="amount[]" id="amount_' + rowCount + '" class="span11" placeholder="@lang('amount')"  /></td>'

                        + '<td>\n\
                        <a class="btn btn-success" id="add_' + rowCount + '" title="@lang('Add')" onclick="add_row_source(' + rowCount + ');"><i class="icon-plus" ></i></a>\n\
                        <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row_source(' + rowCount + ');"><i class="icon-minus" ></i> </a>\n\
                    </td>'
                        + '</tr>'

                    );
                    get_source_data(rowCount);
                    $('select').select2();
                }

            }

            //..........................................getsource*******data.....................................//
            function get_source_data(rowCount)
            {
                $.ajax({
                    url: "{{ route('source_data') }}",
                    type: "get",
                    success: function (data)
                    {
                        $('#source_id_' + rowCount).html("");
                        $('#source_id_' + rowCount).html(data);
                    },
                });
            }


            //..........................................remove****row..........................//
            function remove_row_source(i) {

                var rowCount = $('#table_body tr').length;
                if (rowCount != 1)
                {

                    $("#table_body tr:last").remove();
                }
            }

            // $(document).ready(function() {
            //     if (location.hash) {
            //         $("a[href='" + location.hash + "']").tab("show");
            //     }
            //     $(document.body).on("click", "a[data-toggle]", function(event) {
            //         location.hash = this.getAttribute("href");
            //     });
            // });
            // $(window).on("popstate", function() {
            //     var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
            //     $("a[href='" + anchor + "']").tab("show");
            // });



        </script>


@endsection