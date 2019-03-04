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
        <div id="showun_A_P_Modal">

        </div>
        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>@lang('Approaved Projects List') </h5>
                    </div>
                    <div class="widget-content nopadding">

                        <form action="{{route('approved_project_list.store')}}" method="post" class="form-horizontal">
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
                                        <th rowspan="2">@lang("Action")</th>
                                    </tr>
                                    <tr>
                                        <th>Total FE</th>
                                        <th>Total Taka</th>
                                        <th>Project Aid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach($approved_project as $project)
                                    <?php
                                    $route = route('show_approved_project');
                                    ?>
                                    <tr>
                                        <td><input type="checkbox" name="chkproject[]" value="{{$project->unapprove_project_id}}"> </td>
                                        <td>{{$loop->iteration}}</td>
                                        <td >{{$project->project_code}}</td>
                                        <td style="text-align: center">{{$project->project_tiltle_bn}}<br/>({{$project->date_of_commencement}} To {{$project->date_of_completion}})</td>
                                        <td>{{$project->fe}} ৳ </td>
                                        <td>{{$project->total }} ৳</td>
                                        <td>{{$project->pa}} ৳ </td>
                                        <td>
                                            @foreach($project->approved_project_source as $source)
                                            {{$commonclass->getValue($source->finanacing_source,'ProjectSource','source_name')}}<br/>
                                            {{--{{$source->finanacing_source}}--}}
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($project->approved_project_comments as $comment)
                                            @if($comment->comment_level==12)
                                            {{$comment->comments}}<br/><br/>
                                            @else
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($project->approved_project_comments as $comment)
                                            @if($comment->comment_level==11)
                                            {{$comment->comments}}<br/><br/>
                                            @else
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($project->approved_project_comments as $comment)
                                            @if($comment->comment_level==9)
                                            {{$comment->comments}}<br/><br/>
                                            @else
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($project->approved_project_comments as $comment)
                                            @if($comment->comment_level==16)
                                            {{$comment->comments}}<br/><br/>
                                            @else
                                            @endif
                                            @endforeach
                                        </td>
                                        <td> Approved </td>
                                        <td>
                                            <a onclick='click_project_view("{{$project->unapprove_project_id}}","{{$route}}", "showun_A_P_Modal", "approved_modal")' class="btn btn-success pull-left" title="View"><i class="icon-eye-open"></i> </a>
                                            {{$commonclass->access_button('1','',route('approaved_project.edit',$project->unapprove_project_id))}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="form-actions pull-right">
                                <button type="submit" class="btn btn-success">@lang("Approve")</button>
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
