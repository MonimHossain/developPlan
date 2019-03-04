@extends('layouts.adminLayout.admin_design')
@section('additionalCSS')
<style> 

 


</style>
@endsection
@section('content')
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{route('dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> @lang("Home") </a>
            </div>
        </div>
        <!--End-breadcrumbs-->

        <div class="container-fluid">

            <div class="container-fluid">
                <h4 style="text-align:center;text-decoration:underline">@lang('Foreign Aid Budget And Accounts')</h4>
            </div>
            {{-- start upper filed --}}
            <form action="{{route('fa-budget-accounts.store')}}" method='post' enctype="multipart/form-data">
                @csrf
                <div class="row-fluid form-horizontal" id="upper_data">
                    <div class="span12">
                        <div class="span5">
                            <label class="control-label">@lang('Financial Year'):</label>
                            
                            
                            <div class="controls">
                                <select name="financial_year">
                                @foreach($fiscalyears as $fiscalyear)
                               
                                    <option value="{{$fiscalyear->id}}">{{$commonclass->datetoyear($fiscalyear->start_date)}}-{{$commonclass->datetoyear($fiscalyear->end_date)}}</option>

                                @endforeach

                            </select>
                            </div>
                        </div>
                        <div class="span5">
                            <label class="control-label">@lang('Allocation For'):</label>
                            
                            
                            <div class="controls">
                                <select name="allocation_for">
                                <option value="0">@lang('ADP')</option>
                                <option value="1">@lang('RADP')</option>
                            </select>
                            </div>
                        </div>
                        <div class="span2"></div>
                    </div>

                    <div class="span12">
                        <div class="span5" style="margin-left:-29px">
                            <div class="">
                                <label class="control-label">@lang('Sector'):</label>
                            
                            
                            <div class="controls">
                                <select id="sector" onchange="sector_to_ministry(this)" name="sector_id">
                                   
                                 @foreach($sectors as $sector)
                               
                                    <option value="{{$sector->id}}">{{$sector->sector_name}}</option>

                                @endforeach
                            </select>
                            </div>
                            </div>
                            
                        </div>
                        <div class="span5">
                           <div class="">
                                <label class="control-label">@lang('Ministry'):</label>
                                                        
                            <div class="controls">
                                <select id="showministry" name="ministry_id" onchange="ministry_to_project(this)">
                                
                            </select>
                            </div>
                           </div>
                        </div>
                        <div class="span2"></div>
                    </div>
                </div>
            {{-- end upper field --}}

            {{-- start table filed --}}
            <div class="row-fluid">

                
                
                <div class="span12">

                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5> </h5>
                        </div>
                        <div class="widget-content nopadding" id="table-body">
                            <table class="table table-bordered data-table" id="dataList">
                                <thead>
                                    <tr>
                                        <th rowspan="2">@lang('Name Of The Project')</th>
                                        <th rowspan="2">@lang('Dev.Partner')</th>
                                        <th rowspan="2">@lang('Total')</th>
                                        <th colspan="2" rowspan="1">@lang("2017-2018 ADP")</th>
                                        <th colspan="2" rowspan="1">@lang("2017-2018 RADP")</th>
                                        <th colspan="2" rowspan="1">@lang("2018-2019 ADP")</th>
                                        
                                    </tr>
                                    <tr>
                                        <th>@lang('PA')</th>
                                        <th>@lang("RPA")</th>
                                        <th>@lang('PA')</th>
                                        <th>@lang("RPA")</th>
                                        <th>@lang('PA')</th>
                                        <th>@lang("RPA")</th>
                                       
                                    </tr>
                                </thead>
                              
                               
                            </table>
                            <div style="height:30px;width:100%; background:#747474">
                                <div align="center">
                                    <button class="btn btn-default">@lang('Submit')</button>
                                </div>
                            </div>
                            <div class="form-horizontal">
                                <label class="control-label span2">@lang('Upload Excel'):</label>
                               
                                    <input type="file" name="file" class="controls">
                           
                            </div>
                        </div>

                    </div>
                </div>

              
            </div>
        </form>
              {{-- end of table field--}}
        </div>

    </div>

@endsection
@section('additionalJS')

<script type="text/javascript">
     
$(function(){
    
    var is_select_sector=$('#sector').val();

    if(is_select_sector){
      
        sector_to_ministry(is_select_sector);
    }


});


</script>

@endsection
