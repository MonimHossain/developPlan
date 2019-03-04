@extends('layouts.adminLayout.admin_design')

@section('content')
<style>

</style>

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{route('dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> @lang("Home") </a></div>
    </div>
    <!--End-breadcrumbs-->

    <div class="container-fluid" id='app'>

      

        <div class="row-fluid">
            <div class="span12">

                  <div class="widget-content nopadding">
        <table class="table table-bordered" id="dataList">
            <thead>
                <tr>
                    <th>@lang('SL')</th>
                    <th>@lang("Ceilling For")</th>
                    <th>@lang('Sector')</th>
                    <th>@lang("Sub Sector")</th>
                    <th>@lang("Ministry")</th>
                    <th>@lang('Action')</th>
                </tr>
            </thead>
            <tbody>
                @foreach($project_celling as $a_project_celling)
                <tr>
                    <td>{{$loop->iteration }}</td>
                    <td> @if($a_project_celling->ceiling_for==1)
                    ADP
                    @else
                    RADP
                    @endif
                    </td>
                    <td>{{$commonclass->getValue($a_project_celling->sector_id,'Sector','sector_name')}}</td>
                    <td>{{$commonclass->getValue($a_project_celling->subsector_id,'SubSector','sub_sector_name')}}</td>  
                    <td>
                     @forelse($a_project_celling->allocated_ministry as $am)
                      {{$commonclass->getValue($am->ministry_id,'ministry','ministry_name')}}@unless($loop->last),@endunless
                     @empty
                     @endforelse

                    </td>            
                    <td>
                        {{$commonclass->access_button('1',__('Edit'),route('pd_distribution.edit',$a_project_celling->id))}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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



