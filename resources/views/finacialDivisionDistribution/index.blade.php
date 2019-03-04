@extends('layouts.adminLayout.admin_design')
@section('additionalCSS')


 <style>
        .hide{
            display:none;
            border:none;
            outline:none;
        }
        .border{
        
            border:none;
        }
        .table th, .table td{
            padding:12px;
        }
        
        /*select {
            border:none !important;
            width:100% !imprtant;
            background: inherit;
        }*/
        input{
            border:none;
            outline:none;
        }
        
        .edit,.update{
            border-radius:20px;
            outline:none;
            width:50%;
             margin-left:12px;
             margin-bottom:4px;
        }
    </style>
@endsection
@section('content')
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{route('dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> @lang("Home") </a></div>
        </div>
        <!--End-breadcrumbs-->

        <div class="container-fluid">
             <div class="row-fluid">
                <div class="span11">
                    <form  action="{{route('financial-division-distributon.store')}}" method="post">
                        @csrf
                        <div class="span12">

                          <div class="span10">
                                 <div class="span4">
                             
                                  <label >@lang('Ceilling For')</label>
                                
                                     <select name="ceiling_for">
                                         <option value="0">ADP</option>
                                         <option value="1">RADP</option>
                                     </select>
                                  </div>
                          
                           
                           <div class="span4">
                           
                                 <label >@lang('Financial Year')</label>
                               
                                   <select name="financial_year">
                                    @foreach($fiscalyears as $fiscalyear)
                                    <option value="{{$fiscalyear->id}}">{{$commonclass->datetoyear($fiscalyear->start_date)
                                        }}-{{ $commonclass->datetoyear($fiscalyear->end_date)}}</option>
                                     
                                     @endforeach  
                                     </select>
                            
                             
                           </div> 
                           <div class="span4">
                         
                              <label >@lang('Total GOB')</label>
                             
                                  <input type="number" name="ceiling_amount" >
                              
                          </div>
                          </div>
                           <div class="span2">
                                    <br>

                                <button class="btn btn-success">@lang('Add')</button>
                               </div>
                          
                           </div> 
                              </form> 
                        </div>
                        
                 
                </div>

                 
          
            <div class="row-fluid">

                <div class="span12">

                    

                    <div class="widget-box">
                        <div class="widget-title">
                          
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table" id="dataList">
                                <thead>
                                <tr>
                                    <th>@lang('Ceilling For')</th>
                                    <th>@lang('Financial Year')</th>
                                    <th>@lang("Total GOB")</th>
                                    <th>@lang('Action')</th>

                                </tr>
                                </thead>
                                <tbody>
                                
                                    <form >
                                    @csrf
                                    @method('PATCH')
                                   
                                @foreach($financeDivisionDistributions as $financeDivisionDistribution)

                                    
                                        
                                      <tr id="tr_{{$loop->iteration}}" >

                                        <td > <span>
                                             {{$financeDivisionDistribution->ceiling_for==0?"ADP":"RADP"}}
                                        </span>

                                            <span class="hide" > 
                                           <select name="ceiling_for">
                                             <option @if ($financeDivisionDistribution->ceiling_for==0)
                                                 {{'selected'}}
                                             @endif value="0">ADP</option>
                                             <option
                                             @if ($financeDivisionDistribution->ceiling_for==1)
                                                 {{'selected'}}
                                             @endif value="1">RADP</option>
                                            </select>
                                        </span>


                                        </td>
                                        
                                       


                                        <td ><span>{{$commonclass->datetoyear($financeDivisionDistribution->financeyear->start_date)}}- {{$commonclass->datetoyear($financeDivisionDistribution->financeyear->end_date)}}</span>
                                            <span class="hide"> 
                                            <select name="financial_year">
                                                @foreach($fiscalyears as $fiscalyear)
                                                <option @if ($financeDivisionDistribution->financeyear->id==$fiscalyear->id)
                                                     {{'selected'}}
                                                @endif value="{{$fiscalyear->id}}">{{$commonclass->datetoyear($fiscalyear->start_date)
                                                    }}-{{ $commonclass->datetoyear($fiscalyear->end_date)}}</option>
                                                 
                                                 @endforeach  
                                             </select>


                                        </span>
                                        </td>
                                        
                                        
                                        <td ><span>{{$financeDivisionDistribution->ceiling_amount}}</span>

                                            <span class="hide"> 
                                           
                                            <input type="number" name="ceiling_amount" value="{{$financeDivisionDistribution->ceiling_amount}}">

                                        </span>
                                        </td>
                                        
                                         
                                        <td>
                                            <a href="" class="btn btn-success edit" id="edit">Edit</a>
                                            
                                             <a href="{{route('financial-division-distributon.update',[$financeDivisionDistribution->id])}}" class="update hide btn btn-success pull-left">
                                                <i class="icon-edit"></i>@lang('Update')</a>
                                          
                                          
                                       


                                        </td>
                                       
                                        </tr>
                                        
                                    
                                    @endforeach

                                   
                                        </form>

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

<script type="text/javascript">
 
 var rowdata={};
  $(function(){
         $(document).on('click','.edit',function(e){
 
            e.preventDefault();
             var action=$(this);
             var update=action.next();

                

                update.toggleClass('hide');
              
                    if(action.text()=="Edit"){
                                        action.text('Cancel');
                                         action.addClass('btn-danger');
                                         action.removeClass('btn-success');
                                    }
                                    else{
                                        action.text('Edit');
                                        action.addClass('btn-success');
                                         action.removeClass('btn-danger');
                                    }
                     $(this).parents('tr').find('td').each(function(i,el){
                           
                            var border=el;
                            
                           
                            $(el).find('span').each(function(i,el){
                                    
                                    
                                    $(this).toggleClass('hide');
                                    
                                    $(border).toggleClass('border'); 
                                
                            
                            
                            });
                    });
                
        
          });
                

          $(document).on('click','.update',function(e){
            e.preventDefault();
            var route=$(this).attr('href');
           
                // -----fisrt option for data retrive-----//;

                 //ceiling_for=$(this).parents('tr').find("[name='ceiling_for']").val();
                // var financial_year=$(this).parents('tr').find("[name='financial_year']").val();
                // var ceiling_amount=$(this).parents('tr').find("[name='ceiling_amount']").val();
            

            //----- second option for data retrive-----using jquey serialize//
            
            // var select=$(this).parents('tr').find('select').serialize();
            // alert(select);
            // var input=$(this).parents('tr').find('input').serialize();
            // alert(input);
            // var data=select+'&'+input;
            // alert(data);
            //----third option for data retrive serialize by name attribute ----//

                 var data=$(this).parents('tr').find('[name]').serialize();

                $.ajax({
                    headers:{'X-CSRF-TOKEN': $('input[name="_token"]').val()},
                    type:"PATCH",
                    data:data,
                    url:route,
                    dataType:'json',
                    asyncs:true,
                    success:function(response){
                        console.log(response);
                        location.reload();
                       
                    },
                    error:function(jqxhr,exception){
                         console.log(jqxhr.responseText);
                         var reload=function(){
                            location.reload();
                         }
                         setInterval(reload,70000);
                         

                    }

             });
             
        });
              
 
    });

</script>
@endsection
