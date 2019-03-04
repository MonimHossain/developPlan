<?php
$urll = route('add_approval', $project->unapprove_project_id);
?>

<div class="clearfix">
    <span class="pull-right"> <a onclick='open_modal_custom("{{$urll}}", "approval_divshow", "AdministrativeModalshow")' class="btn btn-success"><i class="icon-plus"></i> @lang('Add Approval Info')</a> </span>
</div>

<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>@lang("Approval History") </h5>
    </div>
    <div class="widget-content nopadding">
        <div class="row-fluid">
            <div  class="span12 m-wrap" style="text-align:center;">
                <table id="comments_table" class="table table-striped table-bordered dt-responsive table-hover" >
                    <thead>
                        <tr>
                            <th >@lang('Approve By') </th>
                            <th >@lang('Approve Date') </th>
                            <th>@lang('Approval go no')</th>
                            <th>@lang('Approval Level')</th>
                            <th>@lang('Administrative By')</th>
                            <th>@lang('Administrative Date')</th>
                            <th>@lang('Administrative go no')</th>
                            <th>@lang('Administrative Level')</th>
                            <th>@lang('File')</th>

 <!--<th>@lang('Action')</th>-->
                        </tr>
                    </thead>
                    <tbody id="table_body_location">
                        @forelse($project->approval_history as $aphistory)
                        <tr id="tr">
                            <td style="text-align: center">
                                {{$commonclass->getValue($aphistory->approve_by,'approval_setup','approved_by')}}
                            </td> 
                            <td style="text-align: center">
                                {{$commonclass->dateToview($aphistory->approve_date)}}
                            </td>
                            <td style="text-align: center">
                                {{$aphistory->approval_go_no}}
                            </td>
                            <td style="text-align: center">
                                {{$commonclass->getValue($aphistory->approval_level,'Usergroup','group_name')}}
                            </td>
                            <td style="text-align: center">
                                {{$commonclass->getValue($aphistory->administrative_by,'user','name')}}
                            </td> 
                            <td style="text-align: center">
                                {{$commonclass->dateToview($aphistory->administrative_date)}}
                            </td>
                            <td style="text-align: center">
                                {{$aphistory->administrative_go_no}}
                            </td>
                            <td style="text-align: center">
                                {{$commonclass->getValue($aphistory->administrative_level,'Usergroup','group_name')}}
                            </td>
                            <td style="text-align: center">
                                @if($aphistory->file_name!=null)
                                {{ download($aphistory->file_name)}}
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                           <td colspan="9" style="text-align: center">No Approval History Available</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>
        <hr>

    </div>
</div>