@extends('layouts.adminLayout.admin_design')
@section('content')
<style>
    input[type=checkbox]{
        opacity:1 !important;
    }   
    .trbgcolor{
        //background-color: #dbc59e !important;
        color: #FFA500 !important;
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
        <div class="clearfix">
            <span class="pull-right"> <a href="{{route('newproject.create')}}" class="btn btn-success "><i class="icon-plus"></i> @lang('Add')</a> </span>
        </div>
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>@lang('Unapprove Projects Explore') </h5>
                <div id="commentModal">
                </div>
                <div id="showun_P_Modal">
                </div>
            </div>
            <div class="widget-content nopadding">
                <form action="{{url('sendtochecker')}}" method="POST" class="form-horizontal">
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
                            <th rowspan="2">@lang("Status")</th>
                            <th rowspan="2" >@lang("Action")</th>
                        </tr>
                        <tr>
                            <th>Total FE</th>
                            <th>Total Taka</th>
                            <th>Project Aid</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($unapproved_project_list as $un_p_list)
                        @php
                        $route=route('show_unapproved_project');
                        @endphp
                        <?php
                        if (in_array($un_p_list->id, $backproj)) {
                            $backtrbgclass = "trbgcolor";
                        } else {
                            $backtrbgclass = "";
                        }

                        if (in_array($un_p_list->id, $checkerbackproj)) {
                            $trbgclass = "trbgcolor";
                        } else {
                            $trbgclass = "";
                        }
                        ?>
                        <tr class="<?php echo $trbgclass; ?> <?php echo $backtrbgclass; ?>">
                            <td>
                                @if($un_p_list->isdraft==0)
                                <input type="checkbox"  name="chkproject[]" value="{{$un_p_list->id}}">
                                @endif
                            </td>
                            <td>{{$loop->iteration}}</td>
                            <td >{{$un_p_list->project_code_pd}}</td>
                            {{--<td class="span2">{{$un_p_list->project_code_pd}}</td>--}}
                            <td style="text-align: center">{{$un_p_list->project_tiltle_bn}}<br/>({{$un_p_list->date_of_commencement}} To {{$un_p_list->date_of_completion}})</td>
                            <td>{{$un_p_list->fe}} ৳ </td>
                            <td>{{$un_p_list->total }} ৳</td>
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
                            <td> @if($un_p_list->isdraft==0) {{ "Submited" }} @else {{ "Drafted" }} @endif </td>
                            {{--<td>--}}
                                {{--<a href="#" style="text-align: center; color: #009900;" onclick="clickcomment('{{$un_p_list->id}}')"  class=" pull-left"> @lang('Comments') </a>--}}
                            {{--</td>--}}
                            <td>
                                <a onclick='click_project_view("{{$un_p_list->id}}","{{$route}}", "showun_P_Modal", "unapproved_modal")' class="btn btn-success pull-left" title="View"><i class="icon-eye-open"></i> </a>
                                <a href="{{route('newproject.edit',$un_p_list->id)}}" class="btn btn-success pull-left" title="Edit"><i class="icon-edit"></i></a>
                                <a onclick="clickcomment('{{$un_p_list->id}}')" class="btn btn-success pull-left" title="Add Comment"><i class="icon-comments"></i> </a>
                            </td>
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="form-actions pull-right">
                    <button type="submit" name="submitbutton" value="send" class="btn btn-success"> @lang("Send to Moderator") </button>
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
@endsection