@extends('layouts.adminLayout.admin_design')

@section('content')
<style>
input[type=checkbox]{
    opacity:1 !important;
}
.trbgcolor{
    //background-color: #dbc59e !important;
    color: #82ad2b !important;
}
table {
    display: block;
    overflow-x: auto !important;


}
table th,td{
    vertical-align: middle !important;
}

.allocation_form{
    padding: 20px;
}
h5{
    padding-left:20px;
}
.inline{
    display: inline !important;
}

</style>

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{route('dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> @lang("Home") </a></div>
    </div>
    <!--End-breadcrumbs-->

    <div class="container-fluid" id='app'>

        <div class="dynamic_view" style="width: 100%"> </div>

        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>@lang("Programming Division Dashboard") </h5>
                    </div>

                    <div class="widget-content nopadding">
                              <div class="controls controls-row">
                              <form method="get" action="{{route('pd_distribution.index')}}" class="allocation_form">
                                 <div  class="span3 m-wrap">
                                    <label style="color:#4D739D; font-family: Verdana,Arial, Helvetica, sans-serif;"   class="">@lang('Ceilling For') </label>
                                    <div class="controls">
                                        <select name="ceiling_for">
                                            <option value=""></option>
                                            <option {{ selected($_GET['fiscal_year'] ?? null,0) }} value="0">ADP</option>
                                            <option {{ selected($_GET['fiscal_year'] ?? null,1) }} value="1">RADP</option>
                                           
                                        </select>
                                    </div>
                                </div>
                                  <div  class="span2 m-wrap">
                                    <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;"  class="control-label">@lang('Select') @lang('Fiscal Year')</label>
                                    <div class="controls">
                                     <select name="fiscal_year">
                                      <option value=""></option>
                                      @forelse($fiscalYear as $fe)
                                          <option {{selected($fe->id,$_GET['fiscal_year'] ?? 0)}} value="{{$fe->id}}">{{$commonclass->dateToview($fe->start_date).'-'.$commonclass->dateToview($fe->end_date)}}</option>
                                          @empty
                                          @endforelse
                                     </select>
                                    </div>
                                </div>
                                <div  class="span2 m-wrap">
                                    <label style="color:#4D739D; font-family: Verdana,Arial, Helvetica, sans-serif;"   class="control-label">@lang('Select Sector') </label>
                                    <div class="controls">
                                        <select name="sec" onchange="sector_to_subsector(this)">
                                            <option></option>
                                            @foreach($sector as $a_sector)
                                            <option {{selected($a_sector->id,$_GET['sec'] ?? $sector_id ?? 0)}} value="{{$a_sector->id}}">{{$a_sector->sector_name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>              
                                <div  class="span2 m-wrap">
                                    <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;"  class="control-label">@lang('Select SubSector')</label>
                                    <div class="controls">
                                        <select id='sub_sector' name="sub_sec">
                                            <option></option>
                                            @foreach($subsector as $a_subsector)
                                            <option {{selected($a_subsector->id,$_GET['sub_sec'] ??   $subsector_id ?? 0)}} value="{{$a_subsector->id}}">{{$a_subsector->sub_sector_name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                              
                                <div  class="span2 m-wrap">
                                <label style=" padding-top: 20px" class="control-label"> </label>
                                <div class="controls">
                                    <button name="search" value="search" class="btn btn-warning" type="submit"><i class="icon-search icon-white"></i>
                                    </button>
                                </div>
                                </div>
                               </form>
                            </div>
                            <div class="controls controls-row">
                              <form method="Post" action="{{route('pd_distribution.store')}}" class="allocation_form">
                                @csrf
                                <input type="hidden" name="ceiling_for" value="{{$ceiling_for}}">           
                                <div  class="span3 m-wrap" class="inline">
                                    <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif; display: inline">@lang('GOB')</label>
                                   
                                       <input type="text" name="ceiling_amount" readonly="" id="ceiling_amount" value="{{$ceiling_amount ?? 0}}">
                                       <input type="hidden" name="fiscal_year" readonly="" id="ceiling_amount" value="{{$selectedfiscalYear ?? 0}}">
                                    
                                </div>
                                 <div  class="span3 m-wrap">
                                    <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif; display: inline">@lang('Balance')</label>
                                   
                                       <input type="text" readonly name="ceiling_balance" id="balance" value="{{$ceiling_amount ?? 0}}">
                                      
                                </div>
                                                             
                       
                            </div>
                          
                           <br>
                           <br>
                                  <h5>@lang('Ministry Wise Resource Distribution')</h5>
                           
                           <hr/>
                           <hr/>
                          
                              <table class="table table-responsive table-striped table-bordered">
                                    <tr>
                                           <th>Sl</th>
                                           <th>Ministry/Division Name</th>
                                           <th>GOB Amount</th>       
                                    </tr>
                                @forelse($ministry as $min)
                                <tr>
                                  <input type="hidden" name="sector_id" value="{{$sector_id}}">
                                  <input type="hidden" name="subsector_id" value="{{$subsector_id}}">
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{ $min->ministry_name }} <input type="hidden" name="ministry_id[]" value="{{$min->id}}"></td>
                                  <td><input type="number" class='amount' min='0' value='' name='amount[]'></td>
                                </tr>
                                @if($loop->last)
                                 <tr>
                                  <td colspan="3" style="text-align: right;"> <button type="submit" class="btn btn-success">Save</button></td>
                                 </tr>
                                 @endif
                                @empty
                                <tr>
                                  <td colspan="3"> </td>
                                  
                                </tr>
                                @endif
                              </table>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('additionalJS')
<script src="{{asset('js/backend_js/matrix.tables.js')}}"></script>


<script type="text/javascript">
   var balance = document.getElementById('balance').value;
      t_balance = parseFloat(balance);
     $(".amount").on('keyup keypress change blur',function(){
    
      
       var sum=0;
      $('.amount').each(function(i, obj) {   
     sum+=parseFloat(obj.value=='' ? 0 :obj.value); 
     
     if(sum>t_balance)
     {
         alert('false');    
         sum=sum-obj.value;
         obj.value=0;
         return false;
     }
      });
     console.log(sum);  
    
     var substrac=t_balance-sum;

     $("#balance").val(substrac);
  });
 


  
</script>
@endsection



