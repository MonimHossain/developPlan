@extends('layouts.adminLayout.admin_design')
@section('content')
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
    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
    <h5>@lang('Project Wise Celings Explorer') </h5>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered data-table" id="dataList">
            <thead>
                <tr>
                    <th>@lang('SL')</th>
                    <th>@lang("Ceilling For")</th>
                    <th>@lang('Sector')</th>
                    <th>@lang("Sub Sector")</th>
                    <th>@lang("Ministry")</th>
                    <th>@lang('Action')</th>
                </tr>
            </thead>
            <tbody>
                @foreach($project_celling as $a_project_celling)
                <tr>
                    <td>{{$loop->iteration }}</td>
                    <td> @if($a_project_celling->ceiling_for==1)
                    ADP
                    @else
                    RADP
                    @endif
                    </td>
                    <td>{{$commonclass->getValue($a_project_celling->sector_id,'Sector','sector_name')}}</td>
                    <td>{{$commonclass->getValue($a_project_celling->subsector_id,'SubSector','sub_sector_name')}}</td>  
                    <td>{{$commonclass->getValue($a_project_celling->ministry_id,'ministry','ministry_name')}}</td>            
                    <td>
                        {{$commonclass->access_button('1',__('Edit'),route('project_celings.edit',$a_project_celling->id))}}
<!--                        {{$commonclass->access_button('2',__('Delete'),route('project_celings.destroy',$a_project_celling->id))}}-->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>
</div>
@endsection
