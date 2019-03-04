@extends('layouts.adminLayout.admin_design')

@section('content')
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{route('dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> @lang("Home") </a>
            </div>
        </div>
        <!--End-breadcrumbs-->

        <div class="container-fluid">

            <div class="row-fluid">
                <div class="span12">

                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5> ADP / RADP Preparation </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table" id="dataList">
                                <thead>
                                    <tr>
                                        <th rowspan="2">@lang('Serial No')</th>
                                        <th rowspan="2">@lang('Project Code (PD)')</th>
                                        <th rowspan="2">@lang('Project Name And Implementaion Preiod')</th>
                                        <th colspan="3">@lang("Project Cost")</th>
                                        <th rowspan="2" >@lang("Project Aid Source")</th>
                                        <th rowspan="2">@lang("Ministry Comment")</th>
                                        <th rowspan="2">@lang("Sub Sector Comment")</th>
                                        <th rowspan="2">@lang("Sector Comment")</th>
                                        <th rowspan="2">@lang("Programming Division Comment")</th>
                                        <th rowspan="2">@lang("Action")</th>
                                    </tr>
                                    <tr>
                                        <th>@lang("Total FE")</th>
                                        <th>@lang("Total Taka")</th>
                                        <th>@lang("Project Aid")</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @forelse($projectList as $pr)
                                     <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td >{{$pr->project_code}}</td>
                                        <td style="text-align: center">{{$pr->project_tiltle_bn}}<br/>({{$pr->date_of_commencement}} To {{$pr->date_of_completion}})</td>
                                        <td>{{$pr->fe}} ৳ </td>
                                        <td>{{$pr->total }} ৳</td>
                                        <td>{{$pr->pa}} ৳ </td>
                                        <td>
                                        @foreach($pr->approved_project_source as $source)
                                        {{$commonclass->getValue($source->finanacing_source,'ProjectSource','source_name')}}<br/>
                                        {{--{{$source->finanacing_source}}--}}
                                        @endforeach
                                        </td>
                                        <td>
                                            @foreach($pr->approved_project_comments as $comment)
                                                @if($comment->comment_level==12)
                                                    {{$comment->comments}}<br/><br/>
                                                @else
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($pr->approved_project_comments as $comment)
                                                @if($comment->comment_level==11)
                                                    {{$comment->comments}}<br/><br/>
                                                @else
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($pr->approved_project_comments as $comment)
                                                @if($comment->comment_level==9)
                                                    {{$comment->comments}}<br/><br/>
                                                @else
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($pr->approved_project_comments as $comment)
                                                @if($comment->comment_level==16)
                                                    {{$comment->comments}}<br/><br/>
                                                @else
                                                @endif
                                            @endforeach
                                        </td>
                                        <td><a class="btn btn-success" href="{{route('adp_allocation.edit',$pr->unapprove_project_id)}}">@lang("Allocate")</a></td>
                                     </tr>
                                     @empty

                                     @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
