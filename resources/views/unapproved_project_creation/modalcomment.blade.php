


<div class="modal fade  " id="commentModalshow" role="dialog">

    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="text-align: center;color: #000000;padding-bottom: 10px" class="modal-title">@lang('Unapproved Project Comments')</h4>
            </div>
            <div class="modal-body">






                <table id="" class="table table-striped table-bordered dt-responsive table-hover" >

                    <thead>
                    <tr>
                        <th>@lang('Comments')</th>
                        <th >@lang('Action') </th>
                    </tr>
                    </thead>
                    <tbody id="table_body_location">

                    @php
                    $route=route('send_modal_add_comment_data');
                    @endphp
                        <tr id="tr">

                            <td style="text-align: center">


                                <textarea type="text" name="comment" id="cmt" class="span11" placeholder=" @lang("Comments")"></textarea>

                            </td>



                            <td style="text-align: center">

                                <input type="button" class="btn btn-success" onclick="addcommentonmodal({{$id}})" value="@lang('Add')">

                            </td>

                            {{--onclick='addcommentonedit("{{$id}}","{{$route}}","commentModalshow")'--}}


                        </tr>





                    </tbody>





                </table>






                <table id="comments_table" class="table table-striped table-bordered dt-responsive table-hover" >

                    <thead>
                        <tr>
                            <th >@lang('SL') </th>
                            <th >@lang('Comments By') </th>

                            <th >@lang('Comments Level') </th>

                            <th>@lang('Comments')</th>



                        </tr>
                    </thead>


                    <tbody id="table_body_location">

                        @php($i=1)

                        @foreach($all_comment as $acommment)
                        <tr id="tr">

                            <td>
                                {{$i++}}

                            </td>





                            <td style="text-align: center">

                                {{$commonclass->getValue($acommment->created_by,'user','name')}}


                            </td>



                            <td style="text-align: center">

                                {{$commonclass->getValue($acommment->comment_level,'Usergroup','group_name')}}

                            </td>





                            <td style="text-align: center" >
                                {{$acommment->comments}}
                            </td>







                        </tr>

                        @endforeach



                    </tbody>





                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('Close')</button>

            </div>
        </div>

    </div>
</div>

