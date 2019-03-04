@extends('layouts.adminLayout.admin_design')

@section('content')
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{route('dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> @lang('Home')</a></div>
        </div>
        <!--End-breadcrumbs-->

        <div class="container-fluid">

            <div class="row-fluid">
                <div class="span12">
                   
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>@lang("User Group") </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{ route('menucreation.update', $edit_menu->id) }}" method="post" class="form-horizontal">
                                @method('PATCH')
                                @csrf
                                <div class="control-group">
                                    @csrf
                                    <label class="control-label">@lang('Menu Name') :  </label>
                                    <div class="controls">
                                        <input type="text" name="name" class="span11" placeholder="@lang('Menu Name')" value="{{ $edit_menu->name }}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">@lang('Menu Link') :</label>
                                    <div class="controls">
                                        <input type="text" name="link" class="span11" placeholder="@lang('Menu Link')" value="{{ $edit_menu->link }}">
                                    </div>
                                </div>

                                @php
                                    use App\Menu;
                                    $menu = new Menu();
                                    $all_menus = $menu->selectBoxMaker($menu_data, true);
                                @endphp

                                <div class="control-group">
                                    <label class="control-label">@lang('Parent Menu') :</label>
                                    <div class="controls">
                                        <select name="parent_menu">
                                            <option value=""> @lang('Select')</option>
                                            @foreach($all_menus as $amenu)
                                                <option value="{{ $amenu['id'] }}"
                                                        @if($amenu['id'] == $edit_menu->parent_menu)
                                                        selected
                                                        @endif>{!! $amenu['value'] !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">@lang('Sequence') :</label>
                                    <div class="controls">
                                        <input type="number" name="sequence" class="span11" placeholder="@lang('Sequence')" value="{{ $edit_menu->sequence }}" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">@lang('Status') :</label>
                                    <div class="controls">
                                        <select name="status">
                                            <option value=""> </option>
                                            <option value="0" @if($edit_menu->status == 0)
                                            selected
                                                    @endif>Inactive</option>
                                            <option value="1" @if($edit_menu->status == 1)
                                            selected
                                                    @endif>Active</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">@lang('Update')</button>
                                    <a href="{{ route('menucreation.index')}}" class="btn btn-danger">@lang('Close')</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
