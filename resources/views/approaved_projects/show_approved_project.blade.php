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







<div id="approved_modal" class="modal hide in" aria-hidden="false" style="display: block;">




        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h3>Project View</h3>
        </div>


    <div class="modal-body">


    <div id="">



                    <div class="widget-box">

                        <div class="widget-content ">

                            <div class="row-fluid">
                                <div  class="span5 m-wrap">


                                <h4  style="text-align: center;">{{$project->project_title}}</h4>



                            </div>

                                <div  class="span2 m-wrap">


                                    <h4  style="text-align: center;" >Approved Project</h4>



                                </div>

                                <div  class="span5 m-wrap">


                                    <h4  style="text-align: center;">{{$project->project_tiltle_bn}}</h4>



                                </div>
                            </div>

                            <hr/>

                            <h4 style="color: white;text-align: center;background: #0e0e0e;padding-bottom: 5px" >{{$project->project_title}} Tender Project Information </h4>

                        <hr/>
                          <div class="row-fluid">
                                <div  class="span6 m-wrap">
                                    <h5 style="text-align: center;" >Project Code(PD) : {{ $project->project_code }}</h5>
                                </div>



                                <div  class="span6 m-wrap">
                                    <h5 style="text-align: center;"  >Project Code(FD) : {{$project->project_code_fd}}</h5>
                                </div>

                               

                               
                            </div>

                            <hr/>
                            
        <div  class="span6 m-wrap">
      
         <h4  style="text-align: center;">{{$project->project_tiltle_bn}}</h4>
           {{$project->project_code}}
         

        </div> 
        <div  class="span6 m-wrap">
         
          
           {{$project->project_code_fd}}
          
        </div>
        

 
                            <div class="row-fluid">
                                <div  class="span3 m-wrap">
                                    <h5 style="text-align: center;" >Ministry : {{$commonclass->getValue($project->ministry,'ministry','ministry_name')}}</h5>
                                </div>



                                <div  class="span3 m-wrap">
                                    <h5 style="text-align: center;"  >Agency : {{$commonclass->getValue($project->agency,'agency','agency_name')}}</h5>
                                </div>

                                <div  class="span3 m-wrap">
                                    <h5 style="text-align: center;" >Sector : {{$commonclass->getValue($project->sector,'Sector','sector_name')}}</h5>
                                </div>

                                <div  class="span3 m-wrap">
                                    <h5 style="text-align: center;"  >Sub Sector : {{$commonclass->getValue($project->sub_sector,'SubSector','sub_sector_name')}}</h5>
                                </div>
                            </div>

                            <hr/>


                            <div class="row-fluid">
                                <div  class="span6 m-wrap">
                                    <h5 style="text-align: center;"  >Objectives English : {{$project->objectives}}</h5>
                                </div>



                                <div  class="span6 m-wrap">
                                    <h5 style="text-align: center;" >Objectives Bangla : {{$project->objectives_bn}}</h5>
                                </div>


                            </div>


                            <hr/>
                            <hr/>
                         <h4 style="color: white;text-align: center;background: #0e0e0e;padding-bottom: 5px"> Estimated Cost of the project info</h4>

                            <div class="row-fluid">

  <table class="table table-striped table-bordered dt-responsive table-hover">
    <thead>
      <tr>

        <th>@lang('Version')</th>
        <th>@lang('Total')</th>
        <th>@lang('GOB')</th>
        <th>@lang('FE')</th>
        <th>@lang('PA')</th>
        <th>@lang('RPA')</th>
        <th>@lang('Own Fund')</th>
        <th>@lang('Exchange Rate')</th>
        <th>@lang('Exchange Date')</th>
        <th>@lang('Other')</th>
      </tr>
    </thead>
    <tbody>
      @forelse($project->cost_details as $cd)
      <tr>


        <td style="text-align: center">{{$cd->version}}</td>
        <td style="text-align: center">{{$cd->total}}</td>
        <td style="text-align: center">{{$cd->gob}}</td>
        <td style="text-align: center">{{$cd->fe}}</td>
        <td style="text-align: center">{{$cd->pa}}</td>
        <td style="text-align: center">{{$cd->rpa}}</td>
        <td style="text-align: center">{{$cd->own_fund}}</td>
        <td style="text-align: center">{{$cd->exchange_rate}}</td>
        <td style="text-align: center">{{$cd->exchange_date}}</td>
        <td style="text-align: center">{{$cd->other}}</td>
      </tr>
      @empty

      @endforelse
    </tbody>

  </table>
 </div>

                            

                          
                            <hr/>
                            <hr/>

                            <h4 style="color: white;text-align: center;background: #0e0e0e;padding-bottom: 5px">Project source details</h4>
                            <table id="comments_table" class="table table-striped table-bordered dt-responsive table-hover" >

                                <thead>
                                <tr>
                                    <th >@lang('SL NO') </th>
                                    <th >@lang('SOURCE NAME') </th>

                                    <th>@lang('AMOUNT')</th>



                                </tr>
                                </thead>


                                <tbody id="table_body_location">


  @php($i=1)
                                @foreach($project->approved_project_source as $a_project_source)
                                    <tr id="tr">







                                        <td style="text-align: center">
   {{$i++}}
                                        </td>

                                        <td style="text-align: center">

                                            {{$commonclass->getValue($a_project_source->finanacing_source,'ProjectSource','source_name')}}

                                        </td>

                                        <td style="text-align: center">
                                            {{$a_project_source->amount}} TK
                                        </td>

                                    </tr>

                                @endforeach

                                </tbody>

                            </table>

                            <hr/>
                          


                            <h4 style="color: white;text-align: center;background: #0e0e0e;padding-bottom: 5px">Project Implemantation Preiod </h4>
                          <table class="table table-striped table-bordered dt-responsive table-hover">
    <thead>
      <tr>

        <th>@lang('Version No')</th>
        <th>@lang('Revision Type')</th>
        <th>@lang('Revision Date')</th>
        <th>@lang('Date of Commencement')</th>
        <th>@lang('Date of Completion')</th>
        <th>@lang('Go Type')</th>
        <th>@lang('Go Number')</th>
        
      </tr>
    </thead>
    <tbody>
      @forelse($project->date_details as $d)
      <tr>


        <td style="text-align: center">{{$d->version}}</td>
        <td style="text-align: center">{{$d->revision}}</td>
        <td style="text-align: center">{{$commonclass->datetoview($d->created_at)}}</td>
        
        <td style="text-align: center">{{$commonclass->datetoview($d->date_of_commencement)}}</td>
        <td style="text-align: center">{{$commonclass->datetoview($d->date_of_completion)}}</td>
        <td style="text-align: center">{{$commonclass->go_type_array()[$d->go_type] ?? null}}</td>
        <td style="text-align: center">{{$d->go_number}}</td>
      </tr>
      @empty

      @endforelse
    </tbody>

  </table>



                            <hr/>
                          
<h4 style="color: white;text-align: center;background: #0e0e0e;padding-bottom: 5px">Type of Finance </h4>
<table class="table table-bordered table-striped with-check">
            <thead>
                <tr>
                    
                    <th>@lang('Type/Source')</th>
                    <th>@lang('GOB')@lang('(FE)')</th>
                    <th>@lang('PA')@lang('(RPA)')</th>
                    <th>@lang('Own Fund')@lang('(FE)')</th>
                    <th>@lang('Others')(@lang('Specify'))</th>
                    <th>@lang('PA Source')</th>
                  
                </tr>
            </thead>
            <tbody>
                @forelse($project->finance_type as $pf)
                <tr>
                   
                    <td> {{$commonclass->getValue($pf->source_mode,'ProjectSource','source_name')}}</td>
                    <td> {{$pf->gob ?? null}} {{isset($pf->gob_fe) ? "($pf->gob_fe)" :null}}</td>
                    <td> {{$pf->pa ?? null}} {{isset($pf->pa_rpa) ? "($pf->pa_rpa)" :null}}</td>
                    <td> {{$pf->ownfund ?? null}} {{isset($pf->ownfund_fe) ? "($pf->ownfund_fe)" :null}}</td>
                    <td> {{$pf->others ?? null}} {{isset($pf->others_mention) ? "($pf->others_mention)" :null}}</td>
                    <td> {{$commonclass->getValue($pf->pa_source,'PaSource','pa_source_name')}}</td>
                   
                   
                   
                </tr>
                @empty
                <tr>
                    <td style="text-align: center" colspan="7">@lang('No Financial Type Available')</td>
                </tr>
                @endforelse
                
            </tbody>
        </table>
        <hr/>
<h4 style="color: white;text-align: center;background: #0e0e0e;padding-bottom: 5px">Year Wise Cost </h4>
         <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th valign="center" rowspan="2">@lang('Sl No')</th>
                    <th rowspan="2">@lang('Financial Year')</th>
                    <th rowspan="2">@lang('GOB')@lang('(FE)')</th>
                    <th colspan="2">@lang('PA')</th>
                    <th rowspan="2">@lang('Own Fund')@lang('(FE)')</th>
                    <th rowspan="2">@lang('Others')(@lang('Specify'))</th>
                    <th rowspan="2">@lang('Total')</th>
                   
                </tr>
                 <tr>
                 
                    <th>@lang('RPA')</th>
                    <th>@lang('DPA')</th>  
                </tr>
               
            </thead>
            <tbody>
               
                @forelse($project->year_wise_cost as $py)
               <?php
               
                 $fiscal_year=$commonclass->getValue($py->fiscal_year,'FiscalYear');
               ?>
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$commonclass->dateToview($fiscal_year->start_date)}} - {{$commonclass->dateToview($fiscal_year->end_date)}}</td>
                    <td>{{$py->gob}} ({{$py->gob_fe}})</td>
                    <td>{{$py->pa_rpa}}</td>
                    <td>{{$py->pa_dpa}}</td>
                    <td>{{$py->own_fund}} ({{$py->ownfund_fe}})</td>
                    <td>{{$py->others}} ({{$py->mention}})</td>
                    <td></td>
                   
                  
                </tr>
                @empty
                 <tr>
                    <td style="text-align: center" colspan="8">No Year Wise Cost  Available</td>
                </tr>
                @endif
               
            </tbody>
        </table>

                            <h4 style="color: white;text-align: center;background: #0e0e0e;padding-bottom: 5px">Location wise cost details </h4>
                            <table id="comments_table" class="table table-striped table-bordered dt-responsive table-hover" >

                                <thead>
                                <tr>

                                    <th >@lang('SL') </th>
                                    <th >@lang('Division') </th>

                                    <th>@lang('RMO')</th>
                                    <th>@lang('City Crop./District')</th>
                                    <th>@lang('Upazilla./Thana')</th>
                                    <th>@lang('Amount')</th>




                                </tr>
                                </thead>


                                <tbody id="table_body_location">



                                <tr id="tr">



                                    @foreach($project->approved_location_cost as $a_location_cost)

                                        <td style="text-align: center">
                                            {{$i++}}
                                        </td>







                                        <td style="text-align: center">



                                            {{$commonclass->getValue($a_location_cost->division,'division','division_name')}}
                                        </td>

                                        <td style="text-align: center">

                                            {{$a_location_cost->rmo}}

                                            {{$commonclass->getValue($a_location_cost->rmo,'rmo','rmo_name')}}


                                        </td>

                                        <td style="text-align: center">

                                           {{--// {{$a_location_cost->district}}--}}
                                            {{$commonclass->getValue($a_location_cost->district,'district','district_name')}}




                                        </td>
                                        <td style="text-align: center">


                                            {{$commonclass->getValue($a_location_cost->upazila,'UpazilaLocation','upazila_location_name')}}


                                        </td>

                                        <td style="text-align: center">

                                            {{$a_location_cost->amount}}

                                        </td>

                                </tr>


                                    @endforeach













                                </tbody>

                            </table>

                            <hr/>


          <h4 style="color: white;text-align: center;background: #0e0e0e;padding-bottom: 5px">Componenet Wise Cost </h4>
                         
                            <table class="table table-bordered table-striped with-check">
            <thead>
                <tr>
                    <th rowspan="4">@lang('SL NO')</th>
                    <th rowspan="4">@lang('Economic Code')</th>
                    <th rowspan="4">@lang('Economic Sub Code')</th>
                    <th rowspan="4">@lang('Content Description')</th>
                    <th rowspan="4">@lang('Unit')</th>
                    <th rowspan="4">@lang('Quantity')</th>
                    <th rowspan="4">@lang('Total Cost')</th>
                    <th rowspan="4">@lang('GOB')<br/>@lang('(FE)')</th>
                    <th  colspan="4" >@lang('Project Aid')</th>

                    <th rowspan="4">@lang('Own Fund')<br/>@lang('(FE)')</th>
                    <th rowspan="4">@lang('Others')</th>
                    <th rowspan="4">@lang('% of Total Project Cost')</th>
                    
                </tr>

            <tr>
                <th colspan="2">@lang('RPA')</th>
                <th colspan="2">@lang('DPA')</th>

            </tr>

            <tr>
             <th> @lang('GOB') @lang('Through')</th>
             <th> @lang('Special') @lang('Amount')</th>
             <th> @lang('PD') @lang('Through')</th>
             <th> @lang('DP') @lang('Through')</th>
            </tr>




            </thead>
            <tbody>

             @forelse($project->component_wise_cost as $approved_component)

                <tr>
                    

                    <td>{{$loop->iteration}}</td>
                    <td>{{$approved_component->economic_code}}</td>
                    <td>{{$approved_component->economic_subcode}}</td>
                    <td>{{$approved_component->component_description}}</td>
                    <td>{{$approved_component->unit}}</td>
                    <td>{{$approved_component->quantity}}</td>
                    <td>{{$approved_component->total_cost}}</td>
                    <td>{{$approved_component->gob_fe}}</td>

                    <td>{{$approved_component->rpa_through_gob}}</td>
                    <td>{{$approved_component->special_acount}}</td>
                    <td>{{$approved_component->dpa_through_pd}}</td>
                    <td>{{$approved_component->dpa_through_dp}}</td>


                    <td>{{$approved_component->ownfund_fe}}</td>
                    <td>{{$approved_component->others}}</td>
                    <td style="text-align: center">%</td>

                  


                </tr>
             @empty
                 <tr>
                     <td style="text-align: center" colspan="15">@lang('No Component wise Cost Available')</td>
                 </tr>
             @endforelse
            </tbody>
        </table>


                            <h4 style="color: white;text-align: center;background: #0e0e0e;padding-bottom: 5px">Project Comments </h4>


                            <table id="comments_table" class="table table-striped table-bordered dt-responsive table-hover" >

                                <thead>
                                <tr>
                                    <th >@lang('SL NO') </th>
                                    <th >@lang('Comments By') </th>
                                    <th >@lang('Comments Level') </th>

                                    <th>@lang('Comments')</th>

                                    <th>@lang('Craeted At')</th>




                                </tr>
                                </thead>


                                <tbody id="table_body_location">


                                @php($i=1)
                                @foreach($project->approved_project_comments as $a_comments)
                                    <tr id="tr">







                                        <td style="text-align: center">
                                            {{$i++}}
                                        </td>

                                        <td style="text-align: center">

                                            {{$commonclass->getValue($a_comments->created_by,'user','name')}}

                                        </td>

                                        <td style="text-align: center">

                                            {{$commonclass->getValue($a_comments->comment_level,'usergroup','group_name')}}

                                        </td>

                                        <td style="text-align: center">
                                          {{$a_comments->comments}}
                                        </td>

                                        <td style="text-align: center">
                                            {{$a_comments->	created_at}}
                                        </td>

                                    </tr>

                                @endforeach

                                </tbody>

                            </table>

                        



                            <div class="modal-footer">
                                <a data-dismiss="modal" class="btn btn-warning" href="#">Close</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>







