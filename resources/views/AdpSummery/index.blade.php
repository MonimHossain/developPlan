@extends('layouts.adminLayout.admin_design')

@section('content')
<style>
   input[type=checkbox]{
        opacity:1 !important;
    }
    .trbgcolor{
        //background-color: #dbc59e !important;
        color: #82ad2b !important;
    }
    table {
        display: block;
        overflow-x: auto !important;


    }
    table th,td{
        vertical-align: middle !important;
    }

    .allocation_form{
        padding: 20px;
    }

</style>

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{route('dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> @lang("Home") </a></div>
    </div>
    <!--End-breadcrumbs-->

    <div class="container-fluid">

        <div class="dynamic_view" style="width: 100%"> </div>

        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>@lang("ADP Allocation") </h5>
                    </div>
                    <div id="commentModal"></div> 
                    <div class="widget-content nopadding">
                         <form method="get" action="{{route('AdpSummery.index')}}" class="allocation_form">
               
                <div class="controls controls-row">
                <div  class="span2 m-wrap">
                        <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;" class="control-label">@lang('Select Ministry') </label>
                        <div class="controls">
                              @php
                            if($user_group == 13 || $user_group == 15)
                            {
                                  $agency_id=auth()->user()->department_id;
                            }
                            elseif ($user_group == 12 || $user_group == 14 ) {
                                 $ministry_id=auth()->user()->department_id;
                              
                                }
                           elseif($user_group == 9 || $user_group == 10)
                           {
                                $sector_id=auth()->user()->department_id;
                           }
                           elseif ($user_group == 11 || $user_group == 19)
                           {
                                $subsector_id=auth()->user()->department_id;
                           }

                            
                               
                           @endphp
                            <select name="min">
                                <option></option>
                                @foreach($ministry as $a_ministry)
                                    <option {{selected($a_ministry->id,$_GET['min']??  $ministry_id ?? 0)}} value="{{$a_ministry->id}}">{{$a_ministry->ministry_name}}</option>
                                @endforeach
                          
                        </select>   
                        </div>
                    </div>
                    <div  class="span2 m-wrap">
                        <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;"  class="control-label">@lang('Select Agency') </label>
                        <div class="controls">
                            <select name="agen">
                                <option></option>
                                @foreach($agency as $a_agency)
                                    <option {{selected($a_agency->id,$_GET['agen'] ??  $agency_id ?? 0)}} value="{{$a_agency->id}}"> {{$a_agency->agency_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div  class="span2 m-wrap">
                        <label style="color:#4D739D; font-family: Verdana,Arial, Helvetica, sans-serif;"   class="control-label">@lang('Select Sector') </label>
                        <div class="controls">
                            <select name="sec" onchange="sector_to_subsector(this)">
                                <option></option>
                                @foreach($sector as $a_sector)
                                    <option {{selected($a_sector->id,$_GET['sec'] ?? $sector_id ?? 0)}} value="{{$a_sector->id}}">{{$a_sector->sector_name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>              
                    <div  class="span2 m-wrap">
                        <label style="color:#4D739D;font-family: Verdana,Arial, Helvetica, sans-serif;"  class="control-label">@lang('Select SubSector')</label>
                        <div class="controls">
                            <select id='sub_sector' name="sub_sec">
                                <option></option>
                                @foreach($subsector as $a_subsector)
                                    <option {{selected($a_subsector->id,$_GET['sub_sec'] ??   $subsector_id ?? 0)}} value="{{$a_subsector->id}}">{{$a_subsector->sub_sector_name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
<!--                 style="float:right"-->
                    <div  class="span2 m-wrap">
                        <label style=" padding-top: 20px" class="control-label"> </label>
                        <div class="controls">
                            <button name="search" value="search" type="submit" class="btn btn-warning"><i class="icon-search icon-white"></i></button>
                        </div>
                    </div>




                </div>
            </form>
            <hr/>
                        <form action="{{route('sendadpallocation.store')}}" method="post" class="form-horizontal">
                            @csrf
                              <div id="Print_area"> 
<br/>
                               <table class="table table-bordered with-check table-responsive">
                                <thead>
                                    <tr>
                                        
                                        <th rowspan="3">@lang('Project Code')</th>
                                        <th rowspan="3">@lang('Sl No')</th>
                                        <th rowspan="3">@lang('Project Nmae') (@lang('Implementation Period'))</th>
                                        <th rowspan="3">@lang('Approval Stage')</th>
                                        <th colspan="2">@lang("Project Cost")</th>
                                        <th colspan="2">@lang("Revised Allocation of 2017-2018")</th>
                                        <th colspan="2">@lang("Actual Cost of 2017-2018 (July-February)")</th>
                                        <th colspan="2">@lang("Corted Cost of upto February,2018")</th>
                                        <th colspan="7">@lang("Annual Development Programe Allocated for 2018-2019")</th>
                                        <th rowspan="3">@lang("Project Aid Source")</th>

                                       
                                    </tr>
                                      <tr>

                                        <th rowspan="2">@lang("Total") @lang("(FE)")</th>
                                        <th rowspan="2">@lang("PA")
                                        (@lang("Cash"))</th>
                                        <th rowspan="2">@lang("Total")</th>
                                        <th rowspan="2">@lang("Tk")</th>
                                        <th rowspan="2">@lang("Total") @lang("(FE)")</th>
                                        <th rowspan="2">@lang("Tk")</th>
                                        <th rowspan="2">@lang("Total")</th>
                                        <th rowspan="2">@lang("Tk")</th>
                                        <th rowspan="2">@lang("Total")</th>
                                        <th rowspan="2">@lang("Tk") (@lang("Revenue"))</th>
                                        <th colspan="2">@lang("Expense")</th>
                                        <th rowspan="2">@lang("Allocated VAT & Import duty")</th>
                                        <th rowspan="2">@lang("Project Aid") (@lang("Cash"))</th>
                                        <th rowspan="2">@lang("Others")</th>

                                    </tr>
                                     <tr>
                                      <th>@lang("Capital") (@lang("Cash"))</th>
                                      <th>@lang("Revenue")</th>
                                    </tr>

                                </thead>
                                <tbody>
                                     @forelse($project_demands as $pr)
                                     <?php
                                        if (in_array($pr->project_name->unapprove_project_id, $backproj)) {
                                            $backtrbgclass = "trbgcolor";
                                        } else {
                                            $backtrbgclass = "";
                                        }

                                        if (in_array($pr->project_name->unapprove_project_id, $checkerbackproj)) {
                                            $trbgclass = "trbgcolor";
                                        } else {
                                            $trbgclass = "";
                                        }
                                    ?>
                                     <tr class="<?php echo $trbgclass; ?> <?php echo $backtrbgclass; ?>">
                                        




                                        <td> {{$pr->project_code ?? null}}</td>
                                        <td> {{$loop->iteration}}</td>
                                        <td> {{$pr->project_name->project_title ?? null}}</td>
                                        <td> {{$pr->project_name->unapprove_project_id ?? null}}</td>
                                        <td> {{$pr->project_cost_total ?? null}} <br/>({{$pr->project_fe ?? null}}) </td>
                                        <td>{{$pr->project_aid ?? null}} <br/>({{$pr->project_rpa ?? null}})    </td>
                                        <td>    </td>
                                        <td>    </td>
                                        <td>    </td>
                                        <td>    </td>
                                        <td>    </td>
                                        <td>    </td>
                                        <td>{{$pr->allocation_total ?? null}}  </td>
                                        <td>  {{$pr->allocation_taka ?? null}} <br/>({{$pr->allocation_revenue ?? null}}) </td>
                                        <td>    {{$pr->capital ?? null}} <br/>({{$pr->capital_rpa ?? null}})</td>
                                        <td>   {{$pr->capital_revenue ?? null}}  </td>
                                        <td>   {{$pr->cdvat ?? null}} </td>
                                        <td> {{$pr->cdvat_pa ?? null}} <br/>({{$pr->cdvat_rpa ?? null}}) </td>
                                        <td>  {{$pr->allocation_others}}  </td>
                                        
                                        <td>
                                        @forelse($pr->demand_source as $ds)
                                         {{$commonclass->getvalue($ds->financing_source,'ProjectSource','source_name')}}<br>
                                         @empty
                                         @endforelse
                                          </td>


                                       
                                      
                                     </tr>
                                     @empty

                                     @endforelse

                                </tbody>
                                </table>
   
                            
                        </form>
                         </div>
                          <div class="form-actions pull-right span12"><hr/>
                   {{custome_print('Print_area',true,__('Print Summary'))}}
                             </div>
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


$('.allocated_view').click(function (e) {

    e.preventDefault();
    $.ajax({
        url: $(this).val(),
    })
            .done(function (d) {

                $('.dynamic_view').html(d);
                $('#allocation_modal').modal('show');
            })
            .fail(function () {
                console.log("error");
            })
            .always(function () {
                console.log("complete");
            });
})


</script>
@endsection



