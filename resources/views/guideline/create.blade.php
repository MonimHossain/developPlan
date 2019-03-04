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
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>@lang("Create Guideline") </h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form   action="{{route('guideline.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                               <div class=control-group>
                                    <div class="span4">
                                    <label class="control-label">@lang('Guideline for'){{required()}} :</label>
                                    <div class="controls">

                                        <select name="guideline_for">
                                            <option  selected="selected" value=""> @lang('Select')</option>

                                            <option value="0">@lang('ADP')</option>
                                            <option value="1">@lang('RADP')</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="span4">
                                    <label class="control-label">@lang('Fiscal Year'){{required()}} :</label>
                                    <div class="controls ">

                                        <select name="fiscal_year">
                                            <option  selected value=""> @lang('Select')</option>

                                            @foreach ($fiscalyears as $element)
                                              <option   value="{{$element->id}}">{!!  $commonclass->datetoyear($element->start_date)."-".$commonclass->datetoyear($element->end_date) !!}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- call notice type --}}
                                <div class="span4">
                                <label class="control-label">@lang('Call Notice Type'){{required()}} :</label>
                                <div class="controls">

                                    <select name="call_notice_type">
                                        <option></option>

                                        <option value="0">@lang('Call Notice 1')</option>
                                        <option value="1">@lang('Call Notice 2')</option>
                                    </select>
                                </div>
                            </div>

                               </div>

                               <div class="control-group">
                                 <div class="span4">
                                   <label class="control-label">@lang('From Month') :</label>
                                   <div class="controls ">
                                    @php
                                        array_pop($month);

                                    @endphp
                                     <select name="from_month">
                                         <option  selected value=""> @lang('Select')</option>

                                         @foreach ($month as $index=>$value)
                                           <option

                                             value="{{$index}}">{{__($value)}}</option>

                                         @endforeach
                                     </select>
                                   </div>
                                 </div>
                                 <div class="span4">
                                   <label class="control-label">@lang('To Month') :</label>
                                   <div class="controls ">

                                     <select name="to_month">
                                         <option  selected value=""> @lang('Select')</option>

                                         @foreach ($month as $index=>$value)
                                           <option

                                             value="{{$index}}">{{__($value)}}</option>

                                         @endforeach
                                     </select>
                                   </div>
                                 </div>
                               </div>

                                <div class="control-group">
                                    <div class='span5'>
                                    <label class="control-label"> @lang("Agency Submission Date"){{required()}} :</label>
                                    <div class="controls">
                                        <input type="text" name="agency_date" class=" datepicker span10" id="datepicker"  autocomplete="off" placeholder=" @lang("Agency Date")" value="{{$commonclass->datetoview(old('agency_date'))}}"/>
                                    </div>
                                </div>
                                <span class=""> <h5>@lang('To Ministry')</h5></span>
                                </div>


                                <div class="control-group">
                                    <div class='span5'>
                                    <label class="control-label"> @lang("Ministry/Division Submisson Date"){{required()}} :</label>
                                    <div class="controls">
                                        <input type="text" name="ministry_date" class=" datepicker span10" id="datepicker"  autocomplete="off" placeholder=" @lang("Ministry Date")" value="{{$commonclass->datetoview(old('ministry_date'))}}" />
                                    </div>
                                </div>
                                <span class=""> <h5>@lang('To Sector Division')</h5></span>
                                </div>

                                <div class="control-group">
                                    <div class='span5'>
                                    <label class="control-label"> @lang("Sector Division Submisson Date"){{required()}} :</label>
                                    <div class="controls">
                                        <input type="text" name="sector_division_date" class=" datepicker span10" id="datepicker"  autocomplete="off" placeholder=" @lang("Sector Division Date")" value="{{$commonclass->datetoview(old('sector_division_date'))}}" />
                                    </div>
                                </div>
                                <span class=""> <h5>@lang('To Program Division')</h5></span>
                                </div>

                                <div class="control-group">
                                    <label class="control-label"> @lang("Comments") :</label>
                                    <div class="controls">

                                        <textarea name="comment" rows="7" class="span7" placeholder="{{trans('Write Your Comment')}}">{{old('comment')}}</textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label"> @lang("Attach Guideline") :</label>
                                    <div class="controls">
                                      <input type="file" name="file_name" value="">
                                    </div>
                                </div>




                                <div class="control-group">
                                    <label class="control-label">@lang('Status') :</label>
                                    <div class="controls">

                                        <select name="status" class="span3">
                                              <option></option>

                                            <option selected value="1">@lang('Active')</option>
                                            <option value="0">@lang('Inactive')</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">@lang("Save")</button>
                                    <a href="{{route('guideline.index')}}" class="btn btn-danger">@lang("Close")</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
