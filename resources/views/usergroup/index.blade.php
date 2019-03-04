@extends('layouts.adminLayout.admin_design')

@section('content')

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div class="pos-demo" id="breadcrumb"> <a href="{{route('dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> @lang("Home") </a></div>
    </div>
    <!--End-breadcrumbs-->

    <div class="container-fluid">

<!--        <div class="row-fluid">
            <div class="span4"></div>
            <div class="pos-demo span4"></div>
            <div class="span4"></div>
        </div>-->

    <div class="row-fluid">
        <div class="span12">

              <div class="clearfix">
                <span class="pull-right"> <a href="{{ route('usergroup.create')}}" class="btn btn-success "><i class="icon-plus"></i> @lang('Add')</a> </span>
              </div>

            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>@lang('User Group') </h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table" id="dataList">
                        <thead>
                            <tr>
                                <th>@lang('ID')</th>
                                <th>@lang("Group Name")</th>
                                <th>@lang('Sub Group')</th>
                                <th>@lang('Description')</th>
                                <th>@lang('Action')</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usergroup as $group)
                            <tr>
                                <td>{{$group->id}}</td>
                                <td>{{$group->group_name}}</td>
                                <td>{{ $commonClass->getValue($group->sub_group,'Usergroup','group_name') }}</td>
                                <td>{{$group->description}}</td>
                                <td>
                                    {{$commonclass->access_button('1',__('Edit'),route('usergroup.edit',$group->id))}}
                                    {{$commonclass->access_button('2',__('Delete'),route('usergroup.destroy', $group->id))}}
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

<script type="text/javascript">
    function add_notify(){
        $(".pos-demo").notify(
            "I'm to the right of this box",
            "success",
            { position:"bottom" }

          );
    }
</script>

@endsection
