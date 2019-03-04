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
                              <form method="Post" action="{{route('pd_distribution.update',$allocated_ministry->id)}}" class="allocation_form">
                                @method('put')
                                @csrf
                                <div  class="span3 m-wrap">
                                    <label style="color:#4D739D; font-family: Verdana,Arial, Helvetica, sans-serif;"   class="">@lang('Ceilling For') </label>
                                    <div class="controls">
                                     
                                        <select name="ceiling_for">

                                            <option {{ selected($allocated_ministry->ceiling_for,0) }} value="0">ADP</option>
                                            <option {{ selected($allocated_ministry->ceiling_for,1) }} value="1">RADP</option>  
                                        </select>
                                    </div>
                                </div>              
                                <div  class="span3 m-wrap" class="inline">
                                    <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif; display: inline">@lang('GOB')</label>
                                   
                                    <input type="text" name="ceiling_amount" readonly="" id="ceiling_amount"  value="{{$allocated_ministry->ceiling_amount}}">
                                    <input type="hidden" name="" readonly="" id="previous_balance"  value="{{$allocated_ministry->ceiling_balance}}">
                                    
                                </div>
                                 <div  class="span3 m-wrap">
                                    <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif; display: inline">@lang('Balance')</label>
                                     <input type="hidden"  id="is_special_account" value="{{$allocated_ministry->is_special_account}}">
                                       <input type="text" readonly name="ceiling_balance" id="balance" value="{{ $allocated_ministry->ceiling_balance}}">
                                           
        @if($allocated_ministry->is_special_account==1)
        <input type="hidden" value="{{$celling_mst->ceiling_amount-$celling_mst->ceiling_balance}}" id="b_balance"> 
        @else
        @endif
                                </div>
                                 <div  class="span2 m-wrap">
                                     <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif; display: inline"> 
                                     </label>
                                   <button class="btn btn-success"> Convert to Special Account </button>
                                    
                                </div>                              
                       
                            </div>
                          
                           <br>
                           <br>
                                  <h5>Ministry Wise Resource Distribution</h5>
                           
                           <hr/>
                           <hr/>
                          
                              <table class="table table-responsive table-striped table-bordered">
                                    <tr>
                                           <th>Sl</th>
                                           <th>Ministry/Division Name</th>
                                           <th>GOB Amount</th>       
                                    </tr>
                                @forelse($allocated_ministry->allocated_ministry as $min)
                                <tr>
                               
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{ $commonclass->getValue($min->ministry_id,'ministry','ministry_name' )}} <input type="hidden" name="ministry_id[]" value="{{$min->ministry_id}}"></td>
                                  <td><input type="number" class='amount' min='0' value="{{$min->amount}}" name='amount[]'></td>
                                </tr>
                                @if($loop->last)
                                 <tr>
                                  <td colspan="3" style="text-align: right;"> <button type="submit" class="btn btn-success">Update</button></td>
                                 </tr>
                                 @endif
                                @empty
                                <tr>
                                  <td colspan="3"> 

                                  </td>
                                  
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
   var previous_balance = document.getElementById('previous_balance').value;
      t_balance = parseFloat(balance);
     $(".amount").on('keyup',function(){
    
      
      var sum = 0;
    $('.amount').each(function() {
        sum += Number($(this).val());
        if (t_balance<sum)
        {
          alert($(this).val());
          //sum=sum-Number($(this).val());
        }
    });
     console.log(sum);  
    
     var substrac=t_balance-sum;

     $("#balance").val(substrac);
  });
  
</script>
@endsection



