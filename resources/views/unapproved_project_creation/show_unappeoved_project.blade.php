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

<div id="unapproved_modal" class="modal hide in" aria-hidden="false" style="display: block;">
<div class="modal-header">
<button data-dismiss="modal" class="close" type="button">×</button>
<h3>Project View</h3>
</div>
<div class="modal-body">
<div id="">
<div class="widget-box">
    <div class="widget-content ">
        <table id="" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th style="color: #b22db0;text-align: center"  > @lang('Project Basic Informations')</th>
            </tr>
            </thead>
        </table>
        <table id="" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th >@lang('Project Title English') </th>
                <th >@lang('Project Title Bangla') </th>
            </tr>
            </thead>
            <tbody >
            <tr>
                <td style="text-align: center">
                    {{$un_project->project_title}}
                </td>
                <td style="text-align: center">

                    {{$un_project->project_tiltle_bn}}

                </td>
            </tr>
     </tbody>
        </table>
        <table id="" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th >@lang('Project Type') </th>
                <th >@lang('Project Code(PD)') </th>
            </tr>
            </thead>
            <tbody >
       <tr>
                <td style="text-align: center">
                    {{$commonclass->getValue($un_project->project_type,'ProjectType','project_type')}}
                </td>
                <td style="text-align: center">
                    {{$un_project->project_code_pd}}
                </td>
            </tr>
            </tbody>
        </table>
        <table id="" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th >@lang('Ministry') </th>
                <th >@lang('Agency') </th>
                <th >@lang('Sector') </th>
                <th >@lang('Subsector') </th>
            </tr>
            </thead>
            <tbody >
                <tr>
                    <td style="text-align: center">
                       {{$commonclass->getValue($un_project->ministry,'ministry','ministry_name')}}
                    </td>
                    <td style="text-align: center">
                        {{$commonclass->getValue($un_project->agency,'agency','agency_name')}}
                    </td>
                    <td style="text-align: center">
                        {{$commonclass->getValue($un_project->sector,'Sector','sector_name')}}
                    </td>
                    <td style="text-align: center">
                        {{$commonclass->getValue($un_project->sub_sector,'SubSector','sub_sector_name')}}
                    </td>
                </tr>
            </tbody>

        </table>
<table id="" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th >@lang('Objectives English') </th>
                <th >@lang('Objectives Bangla') </th>
            </tr>
            </thead>
            <tbody >
            <tr>
                <td style="text-align: center">
                    {{$un_project->objectives}}
                </td>
                <td style="text-align: center">
                     {{$un_project->objectives_bn}}
                </td>
            </tr>
            </tbody>
        </table>
        <table id="" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th style="color: #b22db0" > @lang(' Project Cost Info')</th>
            </tr>
            </thead>
            <tbody >
            </tbody>
        </table>
        <table id="" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th  > @lang(' Estimated Cost of the project info')</th>
            </tr>
            </thead>
            <tbody >
            </tbody>
        </table>
        <table id="" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th >@lang('TOTAL') </th>
                <th >@lang('GOB') </th>
                <th >@lang('FE') </th>
                <th >@lang('PA') </th>
                <th >@lang('RPA') </th>
                <th >@lang('Own Fund') </th>
                <th >@lang('Exchange Rate') </th>
                <th >@lang('Exchange Date') </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="text-align: center">
                    {{$un_project->total}}
                </td>
                <td style="text-align: center">{{$un_project->gob}}</td>
                <td style="text-align: center">{{$un_project->fe}}</td>
                <td style="text-align: center">{{$un_project->pa}}</td>
                <td style="text-align: center">{{$un_project->rpa}}</td>
                <td style="text-align: center">{{$un_project->own_fund}}</td>
                <td style="text-align: center">{{$un_project->exchange_rate}}</td>
                <td style="text-align: center">{{$un_project->exchange_date}}</td>
            </tr>
            </tbody>
        </table>
        <table id="" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th>@lang(' Project source details Cost') </th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
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
            @foreach($project_source as $a_project_source)
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
        <table id="" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th  > @lang('Project wise component list Cost')</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <table id="comments_table" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th >@lang('SL NO') </th>
                <th >@lang('COMPONENT NAME') </th>
                <th>@lang('QUANTITY')</th>
                <th>@lang('UNITCOST')</th>
                <th>@lang('ESTIMATED COST')</th>
            </tr>
            </thead>
            <tbody id="table_body_location">
            @php($i=1)
            @foreach($component_list as $a_component_list)
                <tr id="tr">
                    <td style="text-align: center">
                        {{$i++}}
                    </td>
                    <td style="text-align: center">
                        {{$a_component_list->components_name}}
                    </td>
                    <td style="text-align: center">
                        {{$a_component_list->quantity}}
                    </td>
                    <td style="text-align: center">
                        {{$a_component_list->unit_cost}} TK
                    </td>
                    <td style="text-align: center">
                        {{$a_component_list->estimated_cost}} TK
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <table id="" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th  > @lang('Location wise cost details ') </th>

            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <table id="comments_table" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th >@lang('SL') </th>
                <th >@lang('Division') </th>
<!--                                    <th>@lang('RMO')</th>-->
                <th>@lang('City Crop./District')</th>
                <th>@lang('Upazilla./Thana')</th>
<!--                                    <th>@lang('Amount')</th>-->
            </tr>
            </thead>
            <tbody id="table_body_location">
            <tr id="tr">
                @foreach($location_cost as $a_location_cost)
                    <td style="text-align: center">
                        {{$i++}}
                    </td>
                    <td style="text-align: center">
                        {{$commonclass->getValue($a_location_cost->division,'division','division_name')}}
                    </td>

<!--                                        <td style="text-align: center">
                        {{$a_location_cost->rmo}}
                        {{$commonclass->getValue($a_location_cost->rmo,'rmo','rmo_name')}}
                    </td>-->
                    <td style="text-align: center">
                       {{--// {{$a_location_cost->district}}--}}
                        {{$commonclass->getValue($a_location_cost->district,'district','district_name')}}
                    </td>
                    <td style="text-align: center">
                        {{$commonclass->getValue($a_location_cost->upazila,'UpazilaLocation','upazila_location_name')}}
                    </td>
<!--                                        <td style="text-align: center">
                        {{$a_location_cost->amount}}
                    </td>-->
            </tr>
         @endforeach
            </tbody>
        </table>
        <hr/>
        <hr/>
        <table id="" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th style="color: #b22db0; " > @lang('Linkage and targets ')</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <table id="" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th  > @lang('Multi Year Plan')</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <table id="comments_table" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th >@lang('SL NO') </th>
                <th >@lang('Relation') </th>
<!--                                    <th >@lang('Status') </th>-->

            </tr>
            </thead>
            <tbody >
            @foreach($mul as $mul)
            <tr>
                    <td style="text-align: center">
                        {{$loop->iteration}}
                    </td>
                    <td style="text-align: center">
                   YES        
                   </td>
            </tr>
                @endforeach
          </tbody>
        </table>
        <table id="" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th  > @lang('SDGS')</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <table id="comments_table" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th >@lang('SL NO') </th>
                <th >@lang('Goal') </th>
                <th >@lang('Targets') </th>
            </tr>
            </thead>
            <tbody >
            @foreach($sdgs as $a_sdgs)
            <tr>
                    <td style="text-align: center">
                        {{$loop->iteration}}
                    </td>
                    <td style="text-align: center">
                        {{$commonclass->getValue($a_sdgs->goal,'sdgsgole','gole_name')}}
                    </td>
                    <td style="text-align: center">
                        {{$commonclass->getValue($a_sdgs->target,'sdgstargets','targets')}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <table id="" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th  > @lang('CLIMATE')</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <table id="comments_table" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th >@lang('SL NO') </th>
                <th >@lang('Goal') </th>
                <th >@lang('Targets') </th>
            </tr>
            </thead>
            <tbody >
            @foreach($climate as $a_climate)
            <tr>
                    <td style="text-align: center">
                        {{$loop->iteration}}
                    </td>
                    <td style="text-align: center">
                        {{$commonclass->getValue($a_climate->goal,'ClaimateChangeGoal','goal_name')}}
                    </td>
                    <td style="text-align: center">
                        {{$commonclass->getValue($a_climate->target,'ClimateChangeTarget','targets')}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <table id="" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th  > @lang('POVERTY')</th>

            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

        <table id="comments_table" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th >@lang('SL NO') </th>
                <th >@lang('Goal') </th>
                <th >@lang('Targets') </th>
            </tr>
            </thead>
            <tbody >
            @foreach($poverty as $a_poverty)
            <tr>
                    <td style="text-align: center">
                        {{$loop->iteration}}
                    </td>
                    <td style="text-align: center">
                        {{$commonclass->getValue($a_poverty->goal,'PovertyGoal','goal_name')}}
                    </td>
                    <td style="text-align: center">
                        {{$commonclass->getValue($a_poverty->target,'PovertyTarget','target')}}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <table id="" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th  > @lang('PPP')</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <table id="comments_table" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th >@lang('SL NO') </th>
                <th >@lang('Relation') </th>
<!--                                    <th >@lang('Status') </th>-->
            </tr>
            </thead>
            <tbody >
            @foreach($ppp as $a_ppp)
            <tr>
                    <td style="text-align: center">
                        {{$loop->iteration}}
                    </td>
                    <td style="text-align: center">
                   YES        
                        {{$commonclass->getValue($a_ppp->goal,'pppgole','gole_name')}}
                    </td>
<!--                                        <td style="text-align: center">
                        {{$commonclass->getValue($a_ppp->target,'ppptargets','targets')}}
                    </td>-->
                      </tr>
                @endforeach
          </tbody>
        </table>
        <table id="" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th style="color: #b22db0; " > @lang('Project Comments ') </th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
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
            @foreach($comments as $a_comments)
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
        <table id="" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th style="color: #b22db0" > @lang('Project Implemantation Preiod ')</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <table id="comments_table" class="table table-striped table-bordered dt-responsive table-hover" >
            <thead>
            <tr>
                <th >@lang('DATE OF COMMENCEMENT') </th>
                <th>@lang('DATE OF COMPLETION')</th>
            </tr>
            </thead>
            <tbody id="table_body_location">
            <tr id="tr">
                <td style="text-align: center">
                    {{$un_project->date_of_commencement}}
                </td>
                <td style="text-align: center">
                    {{$un_project->date_of_completion}}

                </td>
            </tr>
            </tbody>
        </table>
        <hr/>
        <div class="modal-footer">
            <a data-dismiss="modal" class="btn btn-warning" href="#">Close</a>
        </div>

    </div>
</div>
</div>
</div>
</div>







