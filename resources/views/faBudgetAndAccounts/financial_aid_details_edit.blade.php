@unless(count($project_info)==0) 
 <style>
 table  {
        display: block;
        overflow-x: auto !important;
      

    }
</style>
@endunless

 <table class="table table-bordered data-table" id="dataList">
                                <thead>
                                    <tr>
                                        <th width='20%' rowspan="2">@lang('Name Of The Project')</th>
                                       {{--  <th rowspan="2">@lang('Dev.Partner')</th> --}}
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
                                <tbody>
@if($joindata)                                    
@forelse($joindata->detail as $project_detail)
 <tr>
   
    <td >{{$commonclass->getValue($project_detail->project_id,'approved_project_info','project_title','unapprove_project_id')}}<input type="hidden" name='project_id[]' value="{{$project_detail->project_id}}"></td>

 {{--    <td style="white-space: nowrap;">
 @foreach($project_detail->demand_source as $source)
   
                          
    {{$commonclass->getValue($source->demand_id,'ProjectSource','source_name')}} </br>
 @endforeach
</td> --}}
    <td><input class='controls' type='number' name='total_amount[]' value="{{$project_detail->total_amount}}"></td>
    <td><input class='controls' type='number' name='current_year_adp_pa[]'value="{{$project_detail->current_year_adp_pa}}"></td>
    <td><input class='controls' type='number' name='current_year_adp_rpa[]'value="{{$project_detail->current_year_adp_rpa}}"></td>
    <td><input class='controls' type='number' name='current_year_radp_pa[]'value="{{$project_detail->current_year_radp_pa}}"></td>
    <td><input class='controls' type='number' name='current_year_radp_rpa[]'value="{{$project_detail->current_year_radp_rpa}}"></td>
    <td><input class='controls' type='number' name='next_year_adp_pa[]'value="{{$project_detail->next_year_adp_pa}}"></td>
    <td><input class='controls' type='number' name='next_year_adp_rpa[]'value="{{$project_detail->next_year_adp_rpa}}"></td>
 
 </tr>

 @empty
 
 @endforelse
 
 </tbody>
                               
     </table>
    <div class="span12">     
        <div style="height:30px;width:100%; background:#747474">
                                <div align="center">
                                    <button class="btn btn-success" formaction="{{route('fa-budget-accounts.update',['id'=>$master_id])}}">@lang('Submit')</button>
                                </div>
                            </div>
                            <div class="form-horizontal">
                                <label class="control-label span2">@lang('Upload Excel'):</label>
                               
                                    <input type="file" name="file" class="controls"></div>
                                    </div>

@endif
         
