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
                            <h5> </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table" id="dataList">
                                <thead>
                                    <tr>
                                        <th>@lang('Sl No')</th>
                                        <th>@lang("Project Name")</th>
                                        <th>@lang('Status')</th>
                                        <th>@lang('Details')</th>
                                    </tr>
                               
                                </thead>
                                <tbody>
                                     @forelse($projectList as $pr)
                                     <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td> {{$pr->project_title}}</td>
                                        <td></td>
                                        <td><a style="color:blue" href="{{route('demand.edit',$pr->id)}}">Allocate</a></td>
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