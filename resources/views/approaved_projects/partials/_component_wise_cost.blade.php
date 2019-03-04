<?php 
$urll=route('add_componentwisecost',$project->unapprove_project_id);
?>

<div class="clearfix">
    <span class="pull-right"> <a onclick='open_modal_custom("{{$urll}}","component_wise_divshow","componentwisecostModalshow")' class="btn btn-success"><i class="icon-plus"></i> @lang('Add')</a> </span>
</div>

<div class="widget-content nopadding">
    <span class="label label-info"></span>
    <div class="widget-content ">
        <table class="table table-bordered table-striped with-check">
            <thead>
                <tr>
                    <th rowspan="4">@lang('SL NO')</th>
                    <th rowspan="4">@lang('Economic Code')</th>
                    <th rowspan="4">@lang('Economic Sub Code')</th>
                    <th rowspan="4">@lang('Component Description')</th>
                    <th rowspan="4">@lang('Unit')</th>
                    <th rowspan="4">@lang('Quantity')</th>
                    <th rowspan="4">@lang('Total Cost')</th>
                    <th rowspan="4">@lang('GOB')<br/>@lang('(FE)')</th>
                    <th  colspan="4" >@lang('Project Aid')</th>

                    <th rowspan="4">@lang('Own Fund')<br/>@lang('(FE)')</th>
                    <th rowspan="4">@lang('Others')</th>
                    <th rowspan="4">@lang('% of Total Project Cost')</th>
                    <th rowspan="4">@lang('Action')</th>
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
                    @php
                        $edit_urll=url("edit_component_wise_cost/$approved_component->id/$project->unapprove_project_id");
                    @endphp

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

                    <td><a  onclick='open_modal_custom("{{$edit_urll}}","component_wise_divshow","edit_aprroved_component_modal")'class="btn btn-success" title="Edit"><i class="icon-edit"></i></a> </td>


                </tr>
             @empty
                 <tr>
                     <td style="text-align: center" colspan="15">@lang('No Component wise Cost Available')</td>
                 </tr>
             @endforelse
            </tbody>
        </table>
    </div>
</div>

