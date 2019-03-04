<style>
.modal{
 
 
  width:85% !important;
  left:0 !important;
  top: 2% !important;
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
<div id="allocation_modal" class="modal hide in" aria-hidden="false" style="display: block;">
              <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h3>Adp Allocation</h3>
              </div>
              <div class="modal-body">
                  

        <div class="widget-box">

          <div class="widget-content">
            <form action="" method="post" class="form-horizontal">
              
               
                 <div class="row-fluid">

                  <div  class="span6">
                    <label class="control-label"> @lang("Allocation For") :</label>
                    <div class="controls">
                      <select name="demand_type" id="" class="span12" disabled="">
                        <option selected value="1">Adp</option>
                      </select>
                    </div>
                  </div>
                   <div  class="span6 m-wrap text-center">
                    <label class="control-label"> @lang("Notice") :</label>
                    <div class="controls">
                     <input type="text" value="Call notice 1" disabled="" class="span11">
                    </div>
                  </div>


                </div>
                <div class="row-fluid">

                  <div  class="span6 m-wrap text-center">
                    <label class="control-label"> @lang("Sector") :</label>
                    <div class="controls">
                      <input type="text" value="{{$project->sector_name ?? null}}" class="span12" disabled="">
                    </div>
                  </div>
                  <div  class="span6 m-wrap text-center">
                    <label class="control-label"> @lang("Subsector") :</label>
                    <div class="controls">
                      <input type="text" value="{{$project->sub_sector_name ?? null}}" class="span11" disabled="">
                    </div>
                  </div>


                </div>
                <div class="row-fluid">

                  <div  class="span6 m-wrap text-center">
                    <label class="control-label"> @lang("Ministry/Division") :</label>
                    <div class="controls">
                     <input type="text" value="{{$project->ministry_name ?? null}}"class="span12" disabled="">
                    </div>
                  </div>
                  <div  class="span6 m-wrap text-center">
                    <label class="control-label"> @lang("Agency") :</label>
                    <div class="controls">
                     <input type="text" class="span11" value="{{$project->agency_name ?? null}}" disabled="">
                    </div>
                  </div>


                </div>
                <hr/>
               <div class="row-fluid">

                  <div  class="span4 m-wrap">
                    <label class="control-label"> @lang("Impletentation Period") :</label>
                    <div class="controls">
                      <input type="text" name='from_date' class="span11" value="{{$commonclass->dateToview($project->project_name->date_of_commencement)}}" disabled="">
                    </div>
                  </div>
                  <div  class="span4 m-wrap">
                    <label class="control-label"> @lang("To") :</label>
                    <div class="controls">
                      <input type="text" name="to_date" class="span11" value="{{$commonclass->dateToview($project->project_name->date_of_completion)}}" disabled="">
                    </div>
                  </div>
                  <div  class="span4">
                    <label class="control-label"> @lang("Project Code"){{required()}}:</label>
                    <div class="controls">
                      <input type="text"  required value="{{$project->project_code}}" name='project_code' class="span12" disabled="">
                    </div>
                  </div>


                </div>
                 <div class="row-fluid">

                  <div  class="span12 m-wrap">
                    <label class="control-label"> @lang("Project Name") :</label>
                    <div class="controls">
                      <input type="text" name='project_name' required value="{{$project->project_name->project_title}}" class="span12" disabled="">
                    </div>
                  </div>
                </div>
                <div class="row-fluid">
                  <div  class="span6 m-wrap">
                    <label class="control-label"> @lang("Project Status"){{required()}}:</label>
                    <div class="controls">
                      <select name="project_status" required  class="span11" disabled="">
                      
                        <option selected value="2">Ongoing</option>
                      </select>
                    </div>
                  </div>
                  <div  class="span6">
                    <label class="control-label"> @lang("Approaval Status"){{required()}}:</label>
                    <div class="controls">
                      <select name="approved_status" required class="span12" disabled="">
                        <option selected value="1">Approaved</option>
                       
                      </select>
                    </div>
                  </div>



                </div>
                <hr/>

                <fieldset>
                  <legend>Project Cost</legend>
                  <label for="">Total{{required()}}: </label><input type="number" name="project_cost_total" value="{{$project->project_cost_total}}" required class="span1"  readonly>

                  <label for="">(FE){{required()}}: </label><input type="number" name="project_fe" required class="span2" value="{{$project->project_fe}}"  readonly>

                  <label for="">Project Aid{{required()}}: </label><input type="number" required name="project_aid" class="span2" value="{{$project->project_aid}}" readonly>
                  <label for="">RPA{{required()}}: </label><input type="number" required name="project_rpa" class="span2"  value="{{$project->project_rpa}}" readonly>
                  <label for="">SF{{required()}}: </label><input type="number" required name="project_sf" class="span2" " value="{{$project->project_sf}}" readonly>
                </fieldset>
                <br>
                <fieldset>
                  <legend>ADP Allocation For</legend>
                  <div class="span5">
                    <label for="">FE year:</label>

                    <select name="original_fiscal_year" id="" required disabled="">
                       @if(!empty($project->fiscal_years)) 
                      <option value="{{$project->fiscal_years->id}}">{{$commonclass->datetoyear($project->fiscal_years->start_date)}}-{{$commonclass->datetoyear($project->fiscal_years->end_date)}}</option>
                      @endif
                    </select>
                  </div>
                  <label for="">Total{{required()}}: </label><input type="number" required  name="original_total" class="span2" value="{{$project->original_total}}" disabled="">
                  <label for="">Taka{{required()}}: </label><input type="number" required  name="original_taka" class="span2" value="{{$project->original_taka}}" disabled="">

                </fieldset>
                <br>
                <fieldset>
                  <legend>Actual Exp. During(July-February)</legend>
                  <label for="">Total{{required()}}: </label><input type="number"  required name="actual_total" class="span3"  value="{{$project->actual_total}}" disabled="">
                  <label for="">Total(FE){{required()}}: </label><input type="number" required  name="actual_total_fe" class="span4"  value="{{$project->actual_total_fe}}" disabled="">


                  <label style="text-align:right;margin-left: 3vw" for="">Taka{{required()}}: </label><input type="number" required name="actual_taka" class="span2" value="{{$project->actual_taka}}">

                </fieldset>
                <br>
                <fieldset>
                  <legend>Cumulative Expenditure</legend>
                  <label for="">Total{{required()}}: </label><input type="number" required name="cumulative_total" class="span4" value="{{$project->actual_taka}}" disabled="">



                  <label for="">Taka{{required()}}: </label><input type="number" required name="cumulative_taka" class="span5" value="{{$project->cumulative_taka}}" disabled="">

                </fieldset>
                <br>
                <fieldset>
                  <legend>ADP Allocation for   @if(!empty($project->fiscal_years)) {{$commonclass->datetoyear($project->fiscal_years->start_date)}}-{{$commonclass->datetoyear($project->fiscal_years->end_date)}} @endif </legend>
                  <div class="row-fluid">
                    <label  for="" style="text-align:right;margin-left: 3vw">Total{{required()}}: </label><input type="number" required  name="allocation_total"class="span3" value="{{$project->allocation_total}}" disabled="">



                    <label style="text-align:right;margin-left: 3vw" for="">Taka{{required()}}: </label><input type="number" required name="allocation_taka" class="span3" value="{{$project->allocation_taka}}" disabled="">
                    <label style="text-align:right;margin-left: 3vw" for="">Reveneu{{required()}}: </label><input type="number" required name="allocation_revenue" class="span3" value="{{$project->allocation_revenue}}" disabled="">
                  </div> 
                  <h5>Heads of Expenditure</h5> 
                  <div class="row-fluid">
                    <label style="text-align:right;margin-left: 2vw" for="">Capital{{required()}}: </label><input type="number" required name="capital" class="span3"  value="{{$project->allocation_revenue}}" disabled="">



                    <label  style="text-align:right;margin-left: 3.5vw" for="">RPA{{required()}}: </label><input type="number" required name="capital_rpa" class="span3"  value="{{$project->allocation_revenue}}" disabled="">
                    <label  style="text-align:right;margin-left: 3vw" for="">Reveneu{{required()}}: </label><input type="number" required name="capital_revenue" class="span3"  value="{{$project->allocation_revenue}}" disabled>
                  </div>
                  <br>
                  <div class="row-fluid">
                    <label  style="text-align:right;margin-left: 2vw" for="">CDVAT{{required()}}: </label><input type="number" required name="cdvat" class="span3"  value="{{$project->cdvat}}" disabled>



                    <label  style="text-align:right;margin-left: 4vw" for="">PA{{required()}}: </label><input type="number" required name="cdvat_pa" class="span3"  value="{{$project->cdvat_pa}}" disabled>
                    <label style="text-align:right;margin-left: 5.5vw" for="">RPA{{required()}}: </label><input type="number" required name="cdvat_rpa" class="span3" value="{{$project->cdvat_rpa}}" disabled>
                  </div>
                  <br>
                  <div class="row-fluid">
                    <label style="text-align:right;margin-left: 3vw" for="">DPA{{required()}}: </label><input type="number" required name="cdvat_dpa" class="span3" value="{{$project->cdvat_dpa}}" disabled="">
                    <label style="text-align:right;margin-left: 2.2vw" for="">Others{{required()}}: </label><input type="number" required name="allocation_others" class="span3"  value="{{$project->allocation_others}}" disabled="">
                     <label style="text-align:right;margin-left: 1.7vw" for="">Self finance{{required()}} : </label><input type="number" value="{{$project->self_finance}}" name="self_finance" required class="span3" disabled=""> 
                  </div> 

                  <br>


                  

                                       
                     
                                       


                  {{-- df sdfs             --}}

                 

                   
             

                   

                   

                  </fieldset>
                    <div class="row-fluid">
                      <div class="span12">
                        <h5 style="">Source of Project Aid</h5>

                      </div>
                    </div>
                     <div class="row-fluid">
                    <div class="span12 m-wrap">
                      <div class="widget-box">
          <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseS3" > <span class="icon"> <i class="icon-chevron-down"></i> </span>
            <h5>Source of Project Aid</h5>
          </div>
          <div class="widget-content nopadding updates collapse" id="collapseS3"> 
                      <table id="source_table" class="table table-striped table-bordered dt-responsive table-hover" >

                        <thead>
                          <tr>
                            <th style=" width: 30%; ">@lang('Source of Project Aid') </th>
                            <th>@lang('Amount') </th>

                           {{--  <th>@lang('Action')</th> --}}
                          </tr>
                        </thead>

                        <tbody id="table_body">
                          @forelse($project->demand_source as $pa)
                          <tr id="tr_{{$loop->iteration}}">

                            <td>
                              <select name="financing_source[]" id="source_id_1" required>
                                <option> @lang('Select One')</option>

                                @foreach($source as $asource)

                                <option @if($pa->financing_source==$asource->id) selected @endif value="{{$asource->id}}"> {{$asource->source_name}}</option>

                                @endforeach
                              </select>
                            </td>

                            <td>
                              <input type="text" name="source_amount[]" required value="{{$pa->amount}}" class="span11"  placeholder=" @lang("Amount")">
                            </td>

                            {{-- <td>
                              <a class="btn btn-success" id="add_1" title="@lang('Add')" onclick="add_row(1);"><i class="icon-plus" ></i></a>
                              <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row(1);"><i class="icon-minus" ></i> </a>
                            </td> --}}


                          </tr>
                          @empty
                          @endif
                        </tbody>


                      </table>
</div>
</div>

                    </div>
                   <div class="row-fluid">
                      <div class="span12">
                        <h5 style="">Location Wise Cost Allocation</h5>

                      </div>
                    </div>
<div class="widget-box">
          <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseG3" > <span class="icon"> <i class="icon-chevron-down"></i> </span>
            <h5>Location Wise Cost Allocation</h5>
          </div>
          <div class="widget-content nopadding updates collapse" id="collapseG3">
                <table id="location_table" class="table table-striped table-bordered dt-responsive table-hover" >

                      <thead>
                        <tr>
                          <th> SL NO </th>
                          <th  style=" width: 20%;">@lang('Division') </th>

                          <th>@lang('RMO')</th>

                          <th>@lang('City Corp./District')</th>

                          <th>@lang('Upazila/Thana')</th>
                          <th>@lang('Amount')</th>

                        </tr>
                      </thead>


                   

                      <tbody id="table_body_location">
                        @forelse($project->demand_details as $pa)
                        <tr id="tr_{{$loop->iteration}}">
                          <div class="row-fluid">


                            <td>
                              1
                            </td>


                            <td>
                              <select name="division[]" id="division_id_{{$loop->iteration}}">
                                <option> @lang('Select One')</option>

                                @foreach($divison as $a_divison)

                                <option @if($pa->division == $a_divison->id) selected @endif value="{{$a_divison->id}}"> {{$a_divison->division_name}}</option>
                                @endforeach
                              </select>

                            </td>


                            <td>


                              <select name="rmo[]">
                                <option value="0"> @lang('Select One')</option>
                                <option value="1"> Demo</option>
                              </select>
                            </td>

                            <td>


                              <select name="district[]">
                                <option value="0"> @lang('Select One')</option>
                                <option value="1"> Demo</option>
                              </select>
                            </td>

                          </div>

                          {{--<div class="row-fluid">--}}
                       
                            <td>

                              <select name="upazila[]">
                                <option> @lang('Select One')</option>
                                @foreach($upazila as $a_upazila)

                                <option @if($a_upazila->id==$pa->upazila_location) selected @endif value="{{$a_upazila->id}}"> {{$a_upazila->upazila_location_name}}</option>
                                @endforeach
                              </select>


                            </td>
                            <td>


                              <input type="number" class="span11" value="{{$pa->amount}}" name="amount[]"  placeholder=" @lang("Amount")" />


                            </td>
                          </tr>
                          @empty
                          @endforelse
                        </tbody>
                      </table>
           
          </div>
        </div>
                  
           </form>

            </div>
         
          </div>
            
                
               
          

            <div class="modal-footer">  
                 <a data-dismiss="modal" class="btn btn-warning" href="#">Close</a>
              </div>
                  
              </div>
              
 </div>


