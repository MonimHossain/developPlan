
<table id="comments_table" class="table table-striped table-bordered dt-responsive table-hover" >
    <thead>
        <tr>
            <th >@lang('Comments By') </th>
            <th >@lang('Comments Group') </th>
            <th>@lang('Comments')</th>
            <th>@lang('Action')</th>
        </tr>
    </thead>
    <tbody id="table_body_location">
        @foreach($commment as $acommment)
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

            <td style="text-align: center">
                <a  onclick="delcomment('{{$acommment->id}}')" class="btn btn-danger btn-xs">
                    <span  class="icon-trash"></span>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>