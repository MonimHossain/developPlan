<?php
$urll=route('add_type_of_finance',$project->unapprove_project_id);


?>

<div class="clearfix">
    <span class="pull-right"> <a  onclick='open_modal_custom("{{$urll}}","type_of_finance_divshow","type_of_finance_modal")'class="btn btn-success"><i class="icon-plus"></i>@lang('Add')</a>
</span>
</div>





<div class="widget-content nopadding">
    <span class="label label-info"></span>
    <div class="widget-content ">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>

                    <th>@lang('Mode of Finance')</th>
                    <th><p>@lang('GOB')</p> <p>@lang('(FE)')</p></th>
                    <th><p>@lang('PA')</p><p>@lang('(RPA)')</p></th>
                    <th><p>@lang('Own Fund')</p><p>@lang('(FE)')</p></th>
                    <th><p>@lang('Others')</p><p> (@lang('Specify'))</p></th>
                    <th>@lang('PA Source')</th>
                    <th>@lang('Action')</th>
                </tr>
            </thead>
            <tbody>
                @forelse($project->finance_type as $pf)
                <tr>
                    @php
                   $edit_urll=url("edit_type_of_finance/$pf->id/$project->unapprove_project_id");
                   @endphp
                    <td> {{$commonclass->getValue($pf->source_mode,'ProjectSource','source_name')}}</td>
                    <td> <p>{{$pf->gob ?? null}}</p> <p>{{isset($pf->gob_fe) ? "($pf->gob_fe)" :null}}</p> </td>
                    <td> <p>{{$pf->pa ?? null}}</p> <p>{{isset($pf->pa_rpa) ? "($pf->pa_rpa)" :null}}</p> </td>
                    <td> <p>{{$pf->ownfund ?? null}}</p> <p>{{isset($pf->ownfund_fe) ? "($pf->ownfund_fe)" :null}}</p> </td>
                    <td> <p>{{$pf->others ?? null}}</p> <p>{{isset($pf->others_mention) ? "($pf->others_mention)" :null}}</p>  </td>
                    <td> {{$commonclass->getValue($pf->pa_source,'PaSource','pa_source_name')}}</td>
                    <td> <a  onclick='open_modal_custom("{{$edit_urll}}","type_of_finance_divshow","type_of_finance_edit_modal")'class="btn btn-success" title="Edit"><i class="icon-edit"></i></a>  {{$commonclass->access_button(2,"",url("delete_type_of_finance/$pf->id/$project->unapprove_project_id")) }}</td>


                </tr>
                @empty
                <tr>
                    <td style="text-align: center" colspan="7">@lang('No Financial Type Available')</td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>
