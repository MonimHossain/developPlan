@extends('layouts.adminLayout.admin_design')

@section('content')
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
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>@lang("Sector Division Dashboard") </h5>
    </div>
    <hr/>
    <div class="widget-content nopadding">
       <form action="{{route('project_celings.update',$celling_mst->id)}}" method="post"  > 
           @method('PATCH')
           @csrf              
             <div class="row-fluid">
           <div class="span2 m-wrap">
                <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;" class="control-label">@lang("Sector") :</label>
                <div class="controls">
                    <select name="sector_id" onchange="sector_to_subsector(this)">
                        <option></option>
                        @foreach($sector as $sector)
                        <option value="{{ $sector->id }}" {{selected($sector->id,$_GET['sector_id'] ?? $celling_mst->sector_id ?? 0)}}>{{ $sector->sector_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
               <div class="span2 m-wrap">
                <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;" class="control-label">@lang("Subsector") :</label>
                <div class="controls">
                    <select name="subsector_id"  id='sub_sector' onchange="subsec_to_ministry(this)">
                        <option></option>
                        @foreach($subsector as $subsector)
                        <option value="{{ $subsector->id }}" {{selected($subsector->id,$_GET['subsector_id'] ?? 0)}}>{{ $subsector->sub_sector_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="span2 m-wrap">
                <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;" class="control-label">@lang("Ministry") :</label>
                <div class="controls">
                    <select name="ministry_id" id="showministry">
                        <option></option>
                        @foreach($ministry as $a_ministry)
                        <option value="{{ $a_ministry->id }}" {{selected($a_ministry->id,$_GET['ministry_id'] ??$celling_mst->ministry_id?? 0)}} >{{ $a_ministry->ministry_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        <div class="span2 m-wrap">
            <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;" class="control-label">@lang("Distribution") :</label>
            <div class="controls">
                <select name="celling_for">
                    <option></option>
                    <option value="1" @if($celling_mst->ceiling_for==1) selected @else @endif>ADP</option>
                    <option value="2" @if($celling_mst->ceiling_for==2) selected @else @endif>RADP</option>

                </select>
            </div>
        </div>
                 
        <div class="span2 m-wrap">
            <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;" class="control-label">Select Fiscal Year</label>
            <div class="controls">
           <select name="fiscal_year" >
               <option></option>
               @foreach($fiscal as $fiscal)   
               <option value="{{$fiscal->id}}" {{selected($fiscal->id,$_GET['fiscal_year'] ??$celling_mst->fiscal_year?? 0)}}>{{$fiscal->start_date}}-{{ $fiscal->end_date}}</option>
                @endforeach
           </select>
            </div>
            </div>               
             <div class="span2 m-wrap">
<!--                 style="margin-left: 850px;margin-top: 10px " -->
            <label class="control-label"> </label>
<!--            <div class="controls">
                <button  style="margin-top: 20px "name="search" value="search" class="btn btn-warning" type="submit"><i class="icon-search icon-white"></i>
                </button>
            </div>-->
            </div>    
            </div>
         <hr/>                 
         <div class="row-fluid">    
      <div style="" class="span4 m-wrap">
            <div class="controls">
                <input type="hidden" readonly   id="block_allocationww"  name="hide">
            </div>
           </div>

       <div style="" class="span4 m-wrap">
            <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;" class="control-label">@lang("Balance") :</label>
            <div class="controls">
                <input type="number" readonly value="{{$celling_mst->balance}}"  id="block_allocation"  name="balance">
            </div>
           </div>

         <div class="span4 m-wrap">
            <div>
             <a class="btn btn-success" style="margin-top: 20px" href="{{route('special_acount',$celling_mst->id)}}">Convert To Special Amount</a>
            </div>
           </div>     
        </div>
         <div style="" class="span4 m-wrap">            
            <div class="controls">
                <input type="hidden"  name="hide">
                <input type="hidden"  id="is_special_account" value="{{$celling_mst->is_special_account}}">
            </div>
           </div>

<!--  //2nd-->
       <div class="row-fluid">
       <div class="span4 m-wrap">
           <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;" class="control-label">@lang("Block Allocation") :</label>
            <div class="controls">
                <input type="number"  id="balance" value="{{$celling_mst->block_allocation}}" readonly name="block_allocation">
            </div>
        </div> 
           
        @if($celling_mst->is_special_account==1)
        <input type="hidden" value="{{$celling_mst->block_allocation-$celling_mst->balance}}" id="b_balance"> 
        @else
        @endif
        </div>
<!--3rd-->
        <table   class="table table-bordered data-table" > 
                          <tr>
                              <th style="color: #000;background: #0000;border: 1px solid">@lang('Project Wise Resource Distribution')</th>
                          </tr>
                        </table>             
                     <div class="span7 m-wrap">      
                        <table  id="celling_distri" class="table table-bordered data-table" >
                            
                          <tr>
                                   <th>@lang('SL')</th>
                                   <th>@lang('Project Name')</th>
                                   <th>@lang('Amount')</th>
<!--                                   <th>Action</th>-->
                          </tr>
                          @forelse($celing_dtls as $a_celing_dtls)
                          <tr>
                                  <td>{{ $loop->iteration }}</td>         
                                  <td ><input type="hidden" name="project_id[]" value="{{ $a_celing_dtls->project_id}}">{{$commonclass->getValue($a_celing_dtls->project_id,'approved_project_info','project_title','unapprove_project_id')}}</td>
                                  <td><input v-on:blur="submitForm()" type="text" class='amount' value="{{ $a_celing_dtls->amount}}" id="distribution" name='distribution[]'></td>
<!--                                  <td><input class="btn btn-success" type="button" value="EDIT" ></td>-->                       
                          </tr>
                          @empty
                          <tr>
                            <td colspan="4"></td>
                          </tr>
                          @endif
                        </table>
                         
                     </div>
      <div class="span12 m-wrap">   
      <div  style=" float: right;" class="form-actions span12 m-wrap ">
          <button name="btn" value="1" style=" float: right;" type="submit" class="btn btn-success">@lang("Save")</button>
<!--                <a  style=" float: right;" href="#" class="btn btn-success">@lang("Submit")</a>-->
            </div>
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
  $(".amount").keyup(function(){
       var balance = document.getElementById('balance').value;
       var is_special_account = document.getElementById('is_special_account').value;    
       if (document.getElementById('b_balance')) {
      var b_balance = document.getElementById('b_balance').value;  
        } else {
        }
       t_balance = parseInt(balance);
       br_balance = parseInt(b_balance);
      if(is_special_account==1)
      {
          var tr_balence=br_balance;
     }else{
          var tr_balence=t_balance;
      } 
       var sum=0;
      $('.amount').each(function(i, obj) {   
            sum+=parseFloat(obj.value=='' ?0 :obj.value); 
            if(sum>tr_balence)
            {
                alert('false');    
                sum=sum-obj.value;
                obj.value=0;
                return false;
            }
      });
     console.log(sum);  
     var substrac=t_balance-sum;
     $("#block_allocation").val(substrac);
  });

</script>
@endsection
