@extends('layouts.adminLayout.admin_design')

@section('content')
<style>
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

    .margin-bottom{

        margin-bottom: 20px;
    }
    .inline{
        display:inline !important;
    }
    .width{
        width:75%;
    }
    .margin-right{
        margin-right:6px;
    }
    .padding-left{
        padding-left:-2px;
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
    select {
        all:none;
    }



</style>
<div id="content" class="" >

    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{route('dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> @lang("Home") </a></div>
    </div>
    <!--End-breadcrumbs-->

    <div class="container-fluid">
        
        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">

                    <div class="widget-content">
                        <form action="" method="post" class="form-horizontal">
                            @csrf
                            <div class="span12 margin-bottom">
                                    <div  class="span12">
                                        <div class="span2">
                                        </div>
                                        <div class="span6">
                                            <div class="span12">
                                                <label class="control-label"> @lang("Select Projects") :</label>
                                                <div class="controls">
                                                    <select name="call_notice_type" onchange="get_demand_data()" id="proj_name" class="span8">
                                                    <option></option>
                                                    @foreach($projects as $key => $pro)
                                                    <option value="{{$pro->project_name->unapprove_project_id}}">{{$pro->project_name->project_title}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <hr/>
                            </div>
                            <hr/>
                            <br>
                        </form>
                            <fieldset>
                                <legend>@lang('ADP Allocation for 2017-2018')</legend>
                                <div class="span12">
                                    <div class="span12 margin-bottom" >
                                        <div class="span4">
                                            <label for="" class="span5" >@lang('Project Name'):</label>
                                            <input type="text" class="span6" name="project_name" id="project_name" >
                                        </div>
                                        <div class="span4">
                                            <div class="span12">
                                                <label for="" class="span3 ">@lang('Total'): </label>
                                                <input type="text" name="original_total" id='original_total' value="" class="span8">
                                            </div>
                                        </div>
                                        <div class="span4">
                                            <div class="span12">
                                                <label for="" class="span3">@lang('Taka'): </label>
                                                <input type="text" name="original_taka" id="original_taka" class="span8 padding-left">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span12 margin-bottom">
                                        <div class="span5" style="margin-left:-28px">
                                            <label for="" class="span4" >@lang('Implementation Period'):</label>
                                            <input type="text" class="span6" name="implementation_period" id="implementation_period" >
                                        </div>
                                        <div class="span3">
                                            <div class="span12">
                                            </div>
                                        </div>
                                        <div class="span4">
                                            <div class="span12">
                                                <label for="" class="span3">(@lang('Revenue')): </label>
                                                <input type="text"  name="original_revenue" id="original_revenue" class="span8 padding-left">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span7">

                                        {{-- <h5 style="margin-top:-5px">Head of Expenditure</h5> --}}
                                        <div class="span12" style="margin-top:-12px">
                                            <h5>@lang('Head of Expenditure')</h5>
                                        </div>
                                        <div class="span12">
                                            <div class="span5">
                                                <div class="span12">
                                                    <label for=""class="span4" style="margin-left:4px">@lang('Capital'):</label>
                                                    <input type="text" name="original_capital" id="original_capital" class="span6" value="">
                                                </div>
                                                <div class="span12">
                                                    <label for=""class="span4">@lang('(RPA)'):</label>
                                                    <input type="text" name="original_capital_rpa" id="original_capital_rpa" class="span6" value="">
                                                </div>
                                                <div class="span12">
                                                    <label for=""class="span4">@lang('Revenue'):</label>
                                                    <input type="text" name="original_capital_revenue" id="original_capital_revenue" class="span6" value="">
                                                </div>
                                            </div>
                                            <div class="span6">
                                                <div class="span12">
                                                    <div class="span12">
                                                        <label for=""class="span4" style="margin-left:8px">@lang('CD/VAT'):</label>
                                                        <input type="text" name="original_cdvat" id="original_cdvat" class="span6" value="">
                                                    </div>
                                                    <div class="span12">
                                                        <label for=""class="span4">@lang('PA'):</label>
                                                        <input type="text" name="original_cdvat_pa" id="original_cdvat_pa" class="span6" value="">
                                                    </div>
                                                    <div class="span12">
                                                        <label for=""class="span4">@lang('(RPA)'):</label>
                                                        <input type="text" name="original_cdvat_rpa" id="original_cdvat_rpa" class="span6" value="">
                                                    </div>
                                                    <div class="span12">
                                                        <label for=""class="span4">@lang('Others'):</label>
                                                        <input type="text" name="original_other" id="original_other" class="span6" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <form action="" method="post" class="form-horizontal">
                                @csrf
                                <input type="hidden" id="project_id" value="" name="project_id">
                            <br/>
                            <fieldset>
                                <legend>@lang('Re-Allocation')</legend>
                                <div class="span12">
                                    <div class="span12 margin-bottom" >
                                        <div class="span4">
                                            <label for="" class="span5" >@lang('Project Name'):</label>
                                            <input type="text" class="span7" name="re_project_name" id="re_project_name" >
                                        </div>
                                        <div class="span4">
                                            <div class="span12">
                                                <label for="" class="span3 ">@lang('Total') : </label>
                                                <input type="text" name="re_total" id="re_total" class="span8">
                                            </div>
                                        </div>
                                        <div class="span4">
                                            <div class="span12">
                                                <label for="" class="span3">@lang('Taka') : </label>
                                                <input type="text" name="re_taka" id="re_taka" class="span8 padding-left">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span12 margin-bottom">
                                        <div class="span5" style="margin-left:-28px">
                                            <label for="" class="span4" >@lang('Implementation Period') :</label>
                                            <input type="text" class="span6" name="re_implementation_period" id="re_implementation_period" >
                                        </div>
                                        <div class="span3">
                                            <div class="span12">
                                            </div>
                                        </div>
                                        <div class="span4">
                                            <div class="span12">
                                                <label for="" class="span3">(@lang('Revenue')): </label>
                                                <input type="text"  name="re_revenue" id="re_revenue" class="span8 padding-left">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span7">

                                        {{-- <h5 style="margin-top:-5px">Head of Expenditure</h5> --}}
                                        <div class="span12" style="margin-top:-12px">
                                            <h5>@lang('Head of Expenditure')</h5>
                                        </div>
                                        <div class="span12">
                                            <div class="span5">
                                                <div class="span12">
                                                    <label for=""class="span4" style="margin-left:4px">@lang('Capital') :</label>
                                                    <input type="text" name="re_capital" id="re_capital" class="span6" value="">
                                                </div>
                                                <div class="span12">
                                                    <label for=""class="span4">@lang('(RPA)') :</label>
                                                    <input type="text" name="re_capital_rpa" id="re_capital_rpa" class="span6" value="">
                                                </div>
                                                <div class="span12">
                                                    <label for=""class="span4">@lang('Revenue') :</label>
                                                    <input type="text" name="re_capital_revenue" id="re_capital_revenue" class="span6" value="">
                                                </div>
                                            </div>
                                            <div class="span6">
                                                <div class="span12">
                                                    <div class="span12">
                                                        <label for=""class="span4" style="margin-left:8px">@lang('CD/VAT') :</label>
                                                        <input type="text" name="re_cdvat" id="re_cdvat" class="span6" value="">
                                                    </div>
                                                    <div class="span12">
                                                        <label for=""class="span4">@lang('PA') :</label>
                                                        <input type="text" name="re_cdvat_pa" id="re_cdvat_pa" class="span6" value="">
                                                    </div>
                                                    <div class="span12">
                                                        <label for=""class="span4">@lang('(RPA)') :</label>
                                                        <input type="text" name="re_cdvat_rpa" id="re_cdvat_rpa" class="span6" value="">
                                                    </div>
                                                    <div class="span12">
                                                        <label for=""class="span4">@lang('Others') :</label>
                                                        <input type="text" name="re_other" id="re_other" class="span6" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                            
                            <div class="row-fluid">
                                <div class="controls" align="center" style="margin-left:-50px">
                                    <input type="button" onclick="get_reallocation_data()" id="btnSendData" name="btnSendData" value="@lang('Add More')"  />
                                </div>
                            </div>
                            </form>
                            </div>

                            </div>
                            </div>
            
            <table class="table table-bordered table-striped" id="source_table">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th colspan="6">@lang('ADP Allocation')</th>
                                <th colspan="2">@lang("Adjust amount of money")</th>
                                <th colspan="6">@lang("Revised Allocation")</th>
                            </tr>
                            <tr>
                                <!--<th rowspan="2">@lang('Serial No')</th>-->
                                <th rowspan="2">@lang('Project Name')<br>(@lang('Implementation Period'))</th>
                                <th rowspan="2">@lang('Total')</th>
                                <th rowspan="2">@lang("Taka")<br>(@lang("Revenue"))</th>
                                <th colspan="2">@lang("Head of Expenditure")</th>
                                <th rowspan="2">@lang("CD/VAT")</th>
                                <th rowspan="2">@lang("PA")<br>(@lang("RPA"))</th>
                                <th rowspan="2">@lang("Increase")</th>
                                <th rowspan="2">@lang("Decrease")</th>
                                <th rowspan="2">@lang("Total")</th>
                                <th rowspan="2">@lang("Taka")<br>(@lang("Revenue"))</th>
                                <th colspan="2">@lang("Head of Expenditure")</th>
                                <th rowspan="2">@lang("CD/VAT")</th>
                                <th rowspan="2">@lang("PA")<br>(@lang("RPA"))</th>
                                <th rowspan="2">@lang("Action")</th>
                            </tr>
                            <tr>
                                <th rowspan="2">@lang('Capital')<br>@lang('(RPA)')</th>
                                <th rowspan="2">@lang('Revenue')</th>
                                <th rowspan="2">@lang('Capital')<br>@lang('(RPA)')</th>
                                <th rowspan="2">@lang('Revenue')</th>
                            </tr>
                        </thead>
                        <tbody id="alloc_realloc">
                            <tr id="tr_1">
<!--                                <td id="sl_no_1"></td>-->
                                <td id="pr_name_1"></td>
                                <td id="alloc_total_1"></td>
                                <td id="alloc_taka_revenue_1"></td>
                                <td id="alloc_capital_rpa_1"></td>
                                <td id="alloc_capital_revenue_1"></td>
                                <td id="alloc_cdvat_1"></td>
                                <td id="alloc_pa_rpa_1"></td>
                                <td id="increase_1"></td>
                                <td id="decrease_1"></td>
                                <td id="realloc_total_1"></td>
                                <td id="realloc_taka_revenue_1"></td>
                                <td id="realloc_capital_rpa_1"></td>
                                <td id="realloc_capital_revenue_1"></td>
                                <td id="realloc_cdvat_1"></td>
                                <td id="realloc_pa_rpa_1"></td>
                                <td id="delete_row_1"></td>
                            </tr>
                        </tbody>
                    </table>
                        <!--<p align='center'>@lang('Balance')</p>-->
                            <div align='center'>
                                <button type="button" onclick="get_table_data()" class="btn btn-success">@lang("Save")</button>
                                <!--<button type="submit"  class="btn btn-danger">@lang("Edit")</button>-->    
                            </div>
                    </div>
                </div>   
</div>

@endsection
@section('additionalJS')
<script  type="text/javascript">
    
    var reAllocation = new Array();
    var rowCount;
    
    function get_demand_data(flag=0){
    
    if(flag == 0)
        var pro_name = $('#proj_name').val();
    else{   
        pro_name = flag;
        $('#proj_name').val(pro_name);
    }
    $.ajax({
    url: "{{url('demand_data')}}",
            type: "get",
            data: {id:pro_name},
            success: function (data)
            {
              console.log(data);
              $('#project_name').val(data.project_name.project_title);
              $('input#project_name').attr('readonly',true);
              $('#original_total').val(data.allocation_total);
              $('input#original_total').attr('readonly',true);
              $('#original_taka').val(data.allocation_taka);
              $('input#original_taka').attr('readonly',true);
              $('#original_revenue').val(data.allocation_revenue);
              $('input#original_revenue').attr('readonly',true);
              $('#implementation_period').val(data.project_name.date_of_commencement +" - "+data.project_name.date_of_completion);
              $('input#implementation_period').attr('readonly',true);
              $('#original_capital').val(data.capital);
              $('input#original_capital').attr('readonly',true);
              $('#original_capital_rpa').val(data.capital_rpa);
              $('input#original_capital_rpa').attr('readonly',true);
              $('#original_capital_revenue').val(data.capital_revenue);
              $('input#original_capital_revenue').attr('readonly',true);
              $('#original_cdvat').val(data.cdvat);
              $('input#original_cdvat').attr('readonly',true);
              $('#original_cdvat_pa').val(data.cdvat_pa);
              $('input#original_cdvat_pa').attr('readonly',true);
              $('#original_cdvat_rpa').val(data.cdvat_rpa);
              $('input#original_cdvat_rpa').attr('readonly',true);
              $('#original_other').val(data.allocation_others);
              $('input#original_other').attr('readonly',true);
              $('#re_project_name').val(data.project_name.project_title);
              $('input#re_project_name').attr('readonly',true);
              $('#re_implementation_period').val(data.project_name.date_of_commencement +" - "+data.project_name.date_of_completion);
              $('input#re_implementation_period').attr('readonly',true);
              $('#project_id').val(data.project_id);
            },
    });
    }
    
    function get_reallocation_data(){
        
        
        var deleteFlag = 0;
        var pro_name = $('#proj_name').val();
        if($('#delete_row_1').html()==""){
            rowCount = $('#alloc_realloc tr').length;
        }
    
        if($('#proj_name').val()==""){
            alert("Can't process with empty target row.");
            return $('#proj_name').focus();
        }
        
        if($('#re_total').val()==""){
            alert("Can't process with empty Total field.");
            return $('#re_total').focus();
        }
        
        if($('#re_taka').val()==""){
            alert("Can't process with empty Taka field.");
            return $('#re_taka').focus();
        }
        
        if($('#re_revenue').val()==""){
            alert("Can't process with empty Revenue field.");
            return $('#re_revenue').focus();
        }

        var pro_name = $('#proj_name').val();
        var originalTotal = $('#original_total').val();
        var originalRevenue = $('#original_revenue').val();
        var originalCapitalRpa = $('#original_capital_rpa').val();
        var originalCapitalRevenue = $('#original_capital_revenue').val();
        var originalCdvat = $('#original_cdvat').val();
        var originalCdvatRpa = $('#original_cdvat_rpa').val();
        var originalCapital = $('#re_capital').val() == "" ? 0 : $('#re_capital').val();
        var reAllocTotal = $('#re_total').val() == "" ? 0 : $('#re_total').val();
        var reAllocTaka = $('#re_taka').val()== "" ? 0 : $('#re_taka').val();
        var reAllocRevenue = $('#re_revenue').val()== "" ? 0 : $('#re_revenue').val();
        var reCapitalRpa = $('#re_capital_rpa').val()== "" ? 0 : $('#re_capital_rpa').val();
        var reCapitalRevenue = $('#re_capital_revenue').val()== "" ? 0 : $('#re_capital_revenue').val();
        var reCdvat = $('#re_cdvat').val()== "" ? 0 : $('#re_cdvat').val();
        var reCdvatPa = $('#re_cdvat_pa').val()== "" ? 0 : $('#re_cdvat_pa').val();
        var reCdvatRpa = $('#re_cdvat_rpa').val()== "" ? 0 : $('#re_cdvat_rpa').val();
        var reOthers = $('#re_other').val()== "" ? 0 : $('#re_other').val();
        
        originalRevenue = parseFloat(originalRevenue);
        reAllocRevenue = parseFloat(reAllocRevenue);
        
        if(originalRevenue < reAllocRevenue){
            var increase = reAllocRevenue - originalRevenue;
            var decrease = 0;
        }
        else{
            var decrease = originalRevenue - reAllocRevenue;
            var increase = 0;
        }
        
        
        
        reAllocation[rowCount-1] = [pro_name, reAllocTotal, reAllocTaka, reAllocRevenue,
                                   originalCapital,reCapitalRpa, reCapitalRevenue, 
                                   reCdvat, reCdvatPa, reCdvatRpa, reOthers, deleteFlag];
        var flag = 0;
        if(rowCount>1){
            var i = 0;
            while(i < rowCount-1){
                if(reAllocation[i][0] == pro_name && reAllocation[i][11] == 0){
                    reAllocation = reAllocation.slice(0);
                    reAllocation.splice(rowCount-1, 1);
                    flag = 1;
                    console.log(reAllocation);
                    alert("This data is already existed in the list. ");
                    break;
                }
                else{
                    i++;
                }
            }
        }
    
    if(flag == 0){
//        $('#sl_no_'+rowCount).append($('#alloc_realloc tr').length);
        $('#pr_name_'+rowCount).append($('#project_name').val());
        $('#alloc_total_'+rowCount).append($('#original_total').val());
        $('#alloc_taka_revenue_'+rowCount).append($('#original_taka').val()+'<br>( '+$('#original_revenue').val()+' )');
        $('#alloc_capital_rpa_'+rowCount).append($('#original_capital').val()+'<br>( '+$('#original_capital_rpa').val()+' )');
        $('#alloc_capital_revenue_'+rowCount).append($('#original_capital_revenue').val());
        $('#alloc_cdvat_'+rowCount).append($('#original_cdvat').val());
        $('#alloc_pa_rpa_'+rowCount).append($('#original_capital').val() +'<br>( '+$('#original_cdvat_rpa').val()+' )');
        $('#realloc_total_'+rowCount).append($('#re_total').val());
        $('#realloc_taka_revenue_'+rowCount).append($('#re_taka').val()+'<br>( '+$('#re_revenue').val()+' )');
        $('#realloc_capital_rpa_'+rowCount).append($('#re_capital').val()+'<br>( '+$('#re_capital_rpa').val()+' )');
        $('#realloc_capital_revenue_'+rowCount).append($('#re_capital_revenue').val());
        $('#realloc_cdvat_'+rowCount).append($('#re_cdvat').val());
        $('#realloc_pa_rpa_'+rowCount).append($('#re_cdvat_pa').val()+'<br>( '+$('#re_cdvat_rpa').val()+' )');
        $('#delete_row_'+rowCount).append('<input class="btn btn-danger" id="delete_row_'+rowCount+'" onclick="delete_row('+rowCount+')" title="@lang('Delete')" type="button" value="@lang('Delete')" />');
        $('#increase_'+rowCount).append(increase);
        $('#decrease_'+rowCount).append(decrease);
        
        rowCount++;
        $('#source_table').append(
                '<tr id="tr_' + rowCount + '">'
//                    +'<td id="sl_no_'+ rowCount + '"></td>'
                    +'<td id="pr_name_'+ rowCount + '"></td>'
                    +'<td id="alloc_total_'+ rowCount + '"></td>'
                    +'<td id="alloc_taka_revenue_'+ rowCount + '"></td>'
                    +'<td id="alloc_capital_rpa_'+ rowCount + '"></td>'
                    +'<td id="alloc_capital_revenue_'+ rowCount + '"></td>'
                    +'<td id="alloc_cdvat_'+ rowCount + '"></td>'
                    +'<td id="alloc_pa_rpa_'+ rowCount + '"></td>'
                    +'<td id="increase_'+ rowCount + '"></td>'
                    +'<td id="decrease_'+ rowCount + '"></td>'
                    +'<td id="realloc_total_'+ rowCount + '"></td>'
                    +'<td id="realloc_taka_revenue_'+ rowCount + '"></td>'
                    +'<td id="realloc_capital_rpa_'+ rowCount + '"></td>'
                    +'<td id="realloc_capital_revenue_'+ rowCount + '"></td>'
                    +'<td id="realloc_cdvat_'+ rowCount + '"></td>'
                    +'<td id="realloc_pa_rpa_'+ rowCount + '"></td>'
                    +'<td id="delete_row_' + rowCount + '"></td>'
        );  
    }
        $(".widget-content").load(location.href + " .widget-content");
        
    }
    
    function get_table_data(){
    
        if($('#alloc_realloc tr').length > 1){
            rowCount = $('#alloc_realloc tr').length;
            $.ajax({
            url: "{{url('reAllocationDataSet')}}",
                type: "get",
                data: {value : reAllocation},
                success: function (data){
                 console.log(data);
                },
            });
            location.reload();
        }else{
            alert("You have to add atleast one row!");
        }
    }
    
//    function edit_row($row){
//        get_demand_data(reAllocation[$row - 1][0]);
//        $('#re_total').val(reAllocation[$row - 1][1]);
//        $('#re_taka').val(reAllocation[$row - 1][2]);
//        $('#re_revenue').val(reAllocation[$row - 1][3]);
//        $('#re_capital').val(reAllocation[$row - 1][4]);
//        $('#re_capital_rpa').val(reAllocation[$row - 1][5]);
//        $('#re_capital_revenue').val(reAllocation[$row - 1][6]);
//        $('#re_cdvat').val(reAllocation[$row - 1][7]);
//        $('#re_cdvat_pa').val(reAllocation[$row - 1][8]);
//        $('#re_cdvat_rpa').val(reAllocation[$row - 1][9]);
//        $('#re_other').val(reAllocation[$row - 1][10]);
//        reAllocation[$row - 1] = 0;
//        editAble = $row;
//    }
    
    function delete_row($row){
        $('#tr_'+$row).remove();
        reAllocation[$row-1][11] = 1; 
        
    }
</script>
@endsection