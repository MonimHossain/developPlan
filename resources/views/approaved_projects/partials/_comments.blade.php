<div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>@lang("Comments") </h5>
    </div>
    <div class="widget-content nopadding">
        <form action="{{url('add_comments_to_approve_project')}}" method="post" class="form-horizontal">
            @csrf

            <div class="row-fluid">
                <div class="span12">
                    <h4 style="text-align: center">@lang('Comments')</h4>
                    <hr/>
                    <hr/>
                </div>
            </div>

            <div class="row-fluid">

                <div  class="span10 m-wrap">
                    <label  class="control-label">@lang('Comments') :</label>
                    <div class="controls">
                        <input type="hidden" name="unapprove_project_id" value="{{$project->unapprove_project_id}}">
                        <textarea type="text" name="comments" class="span11" placeholder=" @lang("Comments")"> </textarea>
                    </div>
                </div>
                <div>
                    <div class="controls">
                        <button type="submit"class="btn btn-success">@lang('Add') </button> 
                    </div>
                </div>
            </div>

            <div class="row-fluid">

                <div  class="span12 m-wrap" style="text-align:center;">
                    <table id="comments_table" class="table table-striped table-bordered dt-responsive table-hover" >
                        <thead>
                            <tr>
                                <th >@lang('Comments By') </th>
                                <th >@lang('Comments Group') </th>
                                <th>@lang('Comments')</th>
                                <!--<th>@lang('Action')</th>-->
                            </tr>
                        </thead>
                        <tbody id="table_body_location">
                            @forelse($project->approved_project_comments as $acommment)
                            <tr id="tr">
                                <td style="text-align: center">
                                    {{$commonclass->getValue($acommment->created_by,'user','name')}}
                                </td>
                                <td style="text-align: center">
                                    {{$commonclass->getValue($acommment->comment_level,'Usergroup','group_name')}}
                                </td>
                                <td style="text-align: center" onblur="updates_comments('{{$acommment->id}}')"  id="cmt{{$acommment->id}}" contenteditable>
                                    {{$acommment->comments}}
                                </td>

<!--                                <td style="text-align: center">
                                    <a  onclick="delcomment('{{$acommment->id}}')" class="btn btn-danger btn-xs">
                                        <span  class="icon-trash"></span>
                                    </a>
                                </td>-->
                            </tr>
                            @empty
                             <tr>
                                 <td colspan="3" style="text-align: center">@lang('No Comments Available')</td>
                             </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
            <hr>
           
        </form>
    </div>
</div>