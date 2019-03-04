<?php 
$urll=route('add_locationwisecost',$project->unapprove_project_id);
?>

<div class="clearfix">
    <span class="pull-right"> <a onclick='open_modal_custom("{{$urll}}","location_wise_divshow","locationwisecostModalshow")' class="btn btn-success"><i class="icon-plus"></i> @lang('Add')</a> </span>
</div>

<div class="widget-content nopadding">
    <span class="label label-info"></span>
    <div class="widget-content ">
        <table class="table table-bordered table-striped with-check">
            <thead>
                <tr>
                    <th>@lang('SL NO')</th>
                    <th>@lang('Division')</th>
                    <th>@lang('District')</th>
                    <th>@lang('Upazila/Location')</th>
                    <th>@lang('Amount')</th>
                    <th>@lang('Action')</th>
                </tr>
            </thead>
            <tbody>
                @forelse($project->approved_location_cost as $pa)
                @php
               $edit_urll=url("edit_locationwisecost/ $pa->id/$project->unapprove_project_id");
                @endphp
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$commonclass->getValue($pa->division,'division','division_name') }}</td>
                    <td>{{$commonclass->getValue($pa->district,'district','district_name') }}</td>
                    <td>{{$commonclass->getValue($pa->upazila,'UpazilaLocation','upazila_location_name') }}</td>
                    <td>{{ $pa->amount}}</td>
                    <td> <a  onclick='open_modal_custom("{{$edit_urll}}","location_wise_divshow","location_wsie_edit_modal")'class="btn btn-success" title="Edit"><i class="icon-edit"></i></a></td>
                </tr>
                 @empty
                 <tr>
                    <td colspan="6" style="text-align: center">No Location Wise Cost Available</td>
                 </tr>
                 @endforelse
            </tbody>
        </table>
    </div>
</div>

