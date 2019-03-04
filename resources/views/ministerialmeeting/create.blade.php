@extends('layouts.adminLayout.admin_design')

@section('content')
<style>
    input[type=checkbox]{
        opacity:1 !important;
    }
</style>
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{route('dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> @lang("Home") </a></div>
    </div>
    <!--End-breadcrumbs-->

    <div class="container-fluid">

        <div class="row-fluid">
            <div class="span12">
             
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>@lang("Pipeline Project List") </h5>
                    </div>
                    
                    <div id="commentModal"></div>
                    <div id="administrativeModal"></div>
                    <div id="showun_P_Modal"></div>


                    <div class="widget-content nopadding">
                        <form action="{{route('ministerialmeeting.store')}}" method="post" class="form-horizontal">
                            @csrf
                            <table class="table table-bordered table-striped with-check" id="dataList">
                                <thead>
                                    <tr>
                                        <th rowspan="2"><input type="checkbox" name="chkprojectall" value=""></th>
                                        <th rowspan="2">@lang('Serial No')</th>
                                        <th rowspan="2">@lang('Project Code (PD)')</th>
                                        <th rowspan="2">@lang('Project Name And Implementaion Preiod')</th>
                                        <th colspan="3">@lang("Project Cost")</th>
                                        <th rowspan="2" >@lang("Project Aid Source")</th>
                                        <th rowspan="2">@lang("Ministry Comment")</th>
                                        <th rowspan="2">@lang("Sub Sector Comment")</th>
                                        <th rowspan="2">@lang("Sector Comment")</th>
                                        <th rowspan="2">@lang("Programming Division Comment")</th>
                                        <!--<th rowspan="2">@lang('Attachment')</th>-->
                                        <th rowspan="2">@lang('Action')</th>
                                    </tr>
                                    <tr>
                                        <th>Total FE</th>
                                        <th>Total Taka</th>
                                        <th>Project Aid</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach($unapproved_project as $un_p_list)
                                    <tr>

                                        @php

                                            $route=route('show_unapproved_project');

                                        @endphp

                                        <td><input type="checkbox" name="chkproject[]" value="{{$un_p_list->id}}"> </td>
                                        <td>{{$loop->iteration}}</td>
                                        <td >{{$un_p_list->project_code_pd}}</td>
                                        <td style="text-align: center">{{$un_p_list->project_tiltle_bn}}<br/>({{$un_p_list->date_of_commencement}} TO {{$un_p_list->date_of_completion}})</td>
                                        <td>{{$un_p_list->fe}} ৳ </td>
                                        <td>{{$un_p_list->total}} ৳ </td>
                                        <td>{{$un_p_list->pa}} ৳ </td>
                                        <td>
                                            @foreach($un_p_list->unapproved_source_details as $source)
                                                {{$commonclass->getValue($source->finanacing_source,'ProjectSource','source_name')}}<br/>
                                                {{--{{$source->finanacing_source}}--}}
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($un_p_list->unapproved_comments as $comment)
                                                @if($comment->comment_level==12)
                                                    {{$comment->comments}}<br/><br/>
                                                @else
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($un_p_list->unapproved_comments as $comment)
                                                @if($comment->comment_level==11)
                                                    {{$comment->comments}}<br/><br/>
                                                @else
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($un_p_list->unapproved_comments as $comment)
                                                @if($comment->comment_level==9)
                                                    {{$comment->comments}}<br/><br/>
                                                @else
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($un_p_list->unapproved_comments as $comment)
                                                @if($comment->comment_level==16)
                                                    {{$comment->comments}}<br/><br/>
                                                @else
                                                @endif
                                            @endforeach
                                        </td>


<!--                                        <td >
                                            <a href="#" style="text-align: center; color: #009900;" onclick="add_Administrative_Information('{{$un_p_list->id}}')"  class=" pull-left"> @lang('Administrative Information') </a>
                                        </td>-->

                                        <td >
                                            <a onclick='click_project_view("{{$un_p_list->id}}","{{$route}}", "showun_P_Modal", "unapproved_modal")' class="btn btn-success pull-left" title=" View "><i class="icon-eye-open"></i> </a>
                                            <a href="#"  onclick="clickcomment('{{$un_p_list->id}}')"class="btn btn-success" title="Add Comment"><i class="icon-comments"></i>  </a>
                                        </td>
                                        {{--{{route('newproject.show',$un_p_list->id)}}--}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="form-actions pull-right">
                               
<!--                                @if($user_group==13)
                                <button type="submit" name="submitbutton" value="send" class="btn btn-success">@lang("Send to Ministry")</button>
                                @elseif($user_group==12)
                                <button type="submit" name="submitbutton" value="back" class="btn btn-success">@lang("Back to Agency")</button>
                                <button type="submit" name="submitbutton" value="send" class="btn btn-success">@lang("Send to sector division")</button>
                                @elseif($user_group==10)
                                <button type="submit" name="submitbutton" value="back" class="btn btn-success">@lang("Back to Agency")</button>
                                <button type="submit" name="submitbutton" value="send" class="btn btn-success">@lang("Send to sector division")</button>
                                @elseif($user_group==16)
                                <button type="submit" name="submitbutton" value="send" class="btn btn-success">@lang("Approve")</button>
                                
                                @else
                                @endif -->
                                <button type="submit" name="submitbutton" value="send" class="btn btn-success">@lang("Approve")</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
@section('additionalJS')
<script src="{{asset('js/backend_js/matrix.tables.js')}}"></script>

<script type="text/javascript">

    function  add_Administrative_Information(id){
        $.ajax({
            url: "{{ route('add_administrative_info') }}",
            type: 'get',
            data: {
                id: id,
            },
            success: function (result) {
                console.log(result);
                $('#administrativeModal').html("");
                $('#administrativeModal').html(result);
                $('#AdministrativeModalshow').modal('show');
                
                 $('.datepicker').datepicker({
                    format:'dd-mm-yyyy',
                    todayHighlight: true,
                    autoclose: true
                });
            }
        });
    }

</script>
@endsection
