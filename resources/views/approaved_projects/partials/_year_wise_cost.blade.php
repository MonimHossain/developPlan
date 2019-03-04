<?php
$urll=route('add_yearwisecost',$project->unapprove_project_id);
?>

<div class="clearfix">
    <span class="pull-right"> <a  onclick='open_modal_custom("{{$urll}}","year_wise_divshow","yearwisecostModalshow")' class="btn btn-success"><i class="icon-plus"></i> @lang('Add')</a> </span>
</div>

<div class="widget-content nopadding">
    <span class="label label-info"></span>
    <div class="widget-content ">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th valign="center" rowspan="2">@lang('Sl No')</th>
                    <th rowspan="2">@lang('Financial Year')</th>
                    <th rowspan="2"> <p>@lang('GOB')</p>  <p>@lang('(FE)')</p> </th>
                    <th colspan="2">@lang('PA')</th>
                    <th rowspan="2"> <p>@lang('Own Fund')</p> <p> @lang('(FE)')</p> </th>
                    <th rowspan="2"> <p>@lang('Others')</p> <p>(@lang('Specify'))</p> </th>
                    <th rowspan="2">@lang('Total')</th>
                    <th rowspan="2">@lang('Action')</th>
                </tr>
                 <tr>

                    <th>@lang('RPA')</th>
                    <th>@lang('DPA')</th>
                </tr>

            </thead>
            <tbody>

                @forelse($project->year_wise_cost as $py)
                @php
                 $edit_urll=url("edit_year_wise_cost/$py->id/$project->unapprove_project_id");
                 $fiscal_year=$commonclass->getValue($py->fiscal_year,'FiscalYear');
                 @endphp
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$commonclass->dateToview($fiscal_year->start_date)}} - {{$commonclass->dateToview($fiscal_year->end_date)}}</td>
                    <td><p>{{$py->gob}}</p> <p>({{$py->gob_fe}})</p> </td>
                    <td>{{$py->pa_rpa}}</td>
                    <td>{{$py->pa_dpa}}</td>
                    <td> <p>{{$py->own_fund}}</p> <p>({{$py->ownfund_fe}})</p> </td>
                    <td> <p>{{$py->others}}</p> <p>({{$py->mention}})</p> </td>
                    <td></td>
                    <td> <a  onclick='open_modal_custom("{{$edit_urll}}","year_wise_divshow","yearwisecosteditmodal")'class="btn btn-success" title="Edit"><i class="icon-edit"></i></a></td>

                </tr>
                @empty
                 <tr>
                    <td style="text-align: center" colspan="8">No Year Wise Cost  Available</td>
                </tr>
                @endif

            </tbody>
        </table>
        <hr/>
    </div>
</div>
