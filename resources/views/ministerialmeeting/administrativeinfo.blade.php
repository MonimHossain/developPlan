<style>
    .modal{
        width:50% !important;
        left:0 !important;
        top: 5% !important;
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
    
.datepicker{z-index:999999 !important;}
    


</style>
<div class="modal fade" id="AdministrativeModalshow" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="text-align: center;color: #000000;padding-bottom: 10px" class="modal-title">@lang('Administrative Information')</h4>
            </div>
            <div class="modal-body">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <form action="{{route('adminministerialmeeting.admin_store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                 @csrf
                                 
                                <div class=control-group>
                                    <label class="control-label">@lang('Approved By') : {{required()}} </label>
                                    <div class="controls">
                                        <select name="approve_by">
                                            <option value=""> -- @lang("Select") --</option>
                                            @foreach($all_user as $all_user)
                                            <option value="{{ $all_user->id }}" @if($all_user->id == $project_data->approve_by)
                                                    selected
                                                    @endif >{{ $all_user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"> @lang("Approval Date") : {{required()}} </label>
                                    <div class="controls">
                                        <input type="text" name="approve_date" class="datepicker span10" id="datepicker" autocomplete="off" value="{{$project_data->approve_date}}" placeholder="@lang("Approval Date")" />
                                        <input type="hidden" name="project_id" value="{{ $project_id }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"> @lang("Government Order No") : {{required()}}</label>
                                    <div class="controls">
                                        <input type="text" name="approval_go_no" class="span10" autocomplete="off" value="{{$project_data->approval_go_no}}" placeholder=" @lang("Government Order No")" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"> @lang("Administrative Date") : {{required()}} </label>
                                    <div class="controls">
                                        <input type="text" name="administrative_date" class="datepicker span10" id="datepicker" autocomplete="off" value="{{$project_data->administrative_date}}" placeholder=" @lang("Administrative Date")"  />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"> @lang("Government Order No") : {{required()}} </label>
                                    <div class="controls">
                                        <input type="text" name="administrative_go_no" class="span10" autocomplete="off" value="{{$project_data->administrative_go_no}}" placeholder=" @lang("Government Order No")"  />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"> @lang("Attach File") :</label>
                                    <div class="controls">
                                        <input type="file" name="file_name" value="">
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">@lang("Save")</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('Close')</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


