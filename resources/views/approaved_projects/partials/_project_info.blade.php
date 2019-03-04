



<div class="widget-box">
  <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
    <h5>@lang("Approved Project") </h5>
  </div>
  <div class="widget-content nopadding">
    <form action="{{route('approaved_project.update',$project->unapprove_project_id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
      @csrf
      @method('PATCH')

      {{--..............................................project infomation section............................................--}}

      <div class="row-fluid">
        <div class="span12">
          <h4 style="">@lang('Project Information')</h4>
          <hr/>
          <hr/>
        </div>
      </div>
<div class="row-fluid">
        <div  class="span5 m-wrap">
          <label  class="control-label">@lang('Project Code(PD)') :</label>
          <div class="controls">
            <input type="text" name="project_code" class="span12" value="{{$project->project_code}}" readonly="" />
          </div>

        </div> <div  class="span6 m-wrap" style="margin-left:30px">

          <label  class="control-label">@lang('Project Code(FD)') :</label>
          <div class="controls">

            <input type="text" name="project_code_fd" class="span12" value="{{$project->project_code_fd}}" required="" />
          </div>
        </div>
        

 </div>

      <div class="row-fluid">

        <div  class="span12">
          <label class="control-label"> @lang("Project Title(English)") :</label>
          <div class="controls">
            <input type="text" name="project_title" class="span11" placeholder=" @lang("Project Title(English)")"  readonly="" value="{{$project->project_title}}" />
          </div>
        </div>
      </div>




      <div class="row-fluid">

        <div  class="span12 m-wrap">
          <label class="control-label"> @lang("Project Title(Bangla)") :</label>
          <div class="controls">
            <input type="text" name="project_tiltle_bn" class="span11"  placeholder=" @lang("Project Title Bangla")" readonly="" value="{{$project->project_tiltle_bn}}"/>
          </div>
        </div>


      </div>

      <div class="row-fluid">

        <div  class="span6 m-wrap">
          <label  class="control-label">@lang('Ministry') :</label>
          <div class="controls">
            <select name="ministry">
              <option> @lang('Select One')</option>

              @foreach($ministry as $aministry)

              <option {{ selected($aministry->id,$project->ministry)}} value="{{$aministry->id}}"> {{$aministry->ministry_name}}</option>

              @endforeach
            </select>
          </div>
        </div>

        <div  class="span6 m-wrap">
          <label  class="control-label">@lang('Agency') :</label>
          <div class="controls">
            <select name="agency">
              <option> @lang('Select One')</option>

              @foreach($agency as $a_agency)
              <option {{ selected($a_agency->id,$project->agency)}} value="{{$a_agency->id}}"> {{$a_agency->agency_name}}</option>
              @endforeach
            </select>
          </div>
        </div>

      </div>

      <div class="row-fluid">

        <div  class="span6 m-wrap">
          <label  class="control-label">@lang('Sector') :</label>
          <div class="controls">
            <select name="sector">
              <option> @lang('Select One')</option>

              @foreach($sector as $asector)
              <option {{ selected($asector->id,$project->sector)}} value="{{$asector->id}}"> {{$asector->sector_name}}</option>
              @endforeach
            </select>
          </div>
        </div>


        <div  class="span6 m-wrap">
          <label  class="control-label">@lang('Sub Sector') :</label>
          <div class="controls">
            <select name="sub_sector">
              <option> @lang('Select One')</option>

              @foreach($subsector as $a_subsector)

              <option  {{ selected($a_subsector->id,$project->sub_sector)}} value="{{$a_subsector->id}}"> {{$a_subsector->sub_sector_name}}</option>

              @endforeach
            </select>
          </div>
        </div>



      </div>


      <div class="row-fluid">

        <div  class="span12 m-wrap">
          <label class="control-label"> @lang("Objectives(Bangla)") :</label>
          <div class="controls">

            <textarea type="text" name="objectives_bn" class="span11 m-wrap" placeholder=" @lang("Objectives(Bangla)")" readonly=""> {{$project->objectives_bn }}</textarea>
          </div>
        </div>

  


</div>
 <div class="row-fluid">

<div  class="span12 m-wrap">
<label class="control-label"> @lang("Objectives(English)") :</label>
<div class="controls">

<textarea type="text" name="objectives" class="span11" placeholder=" @lang("Objectives(English)")" readonly=""> {{$project->objectives }}</textarea>
</div>
</div>
</div>



{{--...................................Estimated Cost of the Project(In Lakh Taka) section....................................--}}

<div class="row-fluid">
  <div class="span12">
    <h4 style="">@lang('Project Estimated Cost') </h4>
    <hr/>
    <hr/>
  </div>
</div>



<div class="row-fluid">

  <div  class="span4">
    <label class="control-label"> @lang("Total") :</label>
    <div class="controls">

      <input type="text" name="total"  placeholder=" @lang("Total")" value="{{$project->cost_details->last()->total ?? null}}" />
    </div>
  </div>

  <div  class="span4">
    <label class="control-label"> @lang("GOB") :</label>
    <div class="controls">

      <input type="text" name="gob"  placeholder=" @lang("GOB")"  value="{{$project->cost_details->last()->gob ?? null}}"/>
    </div>
  </div>

  <div  class="span4 m-wrap">
    <label class="control-label"> @lang("FE") :</label>
    <div class="controls">

      <input type="text" name="fe" class="span11" placeholder=" @lang("FE")"  value="{{$project->cost_details->last()->fe}}"/>
    </div>
  </div>



</div>



<div class="row-fluid">

  <div  class="span4 m-wrap">
    <label class="control-label"> @lang("PA") :</label>
    <div class="controls">

      <input type="text" name="pa"  placeholder=" @lang("PA")"  value="{{$project->cost_details->last()->pa ?? null}}"/>
    </div>
  </div>

  <div  class="span4 m-wrap">
    <label class="control-label"> @lang("RPA") :</label>
    <div class="controls">

      <input type="text" name="rpa"  placeholder=" @lang("RPA")"  value="{{$project->cost_details->last()->rpa ?? null}}"/>
    </div>
  </div>

  <div  class="span4 m-wrap">
    <label class="control-label"> @lang("Own Fund") :</label>
    <div class="controls">

      <input type="text" name="own_fund" class="span11"  placeholder=" @lang("Own Fund")"  value="{{$project->cost_details->last()->own_fund ?? null}}"/>
    </div>
  </div>


</div>


<div class="row-fluid">

  <div  class="span4 m-wrap">
    <label class="control-label"> @lang("Exchange Rate") :</label>
    <div class="controls">

      <input type="text" name="exchange_rate"  placeholder=" @lang("Exchange Rate")" value="{{$project->cost_details->last()->exchange_rate ?? null}}" />
    </div>
  </div>

  <div  class="span4 m-wrap">
    <label class="control-label"> @lang("Exchange Date") :</label>
    <div class="controls">

      <input type="text" id="datepicker" class="span12 datepicker" value="{{$commonclass->datetoview($project->cost_details->last()->exchange_date) ?? null }}" name="exchange_date" />
    </div>
  </div>
  <div  class="span4">
    <label class="control-label"> @lang("Others") :</label>
    <div class="controls">

      <input type="text" id="" class="span11"  placeholder=" @lang("Others")"  >
    </div>
  </div>
</div>
<hr/>
<div class="row-fluid">

  <table class="table table-bordered" style="width:70%">
    <thead>
      <tr>

        <th>@lang('Version')</th>
        <th>@lang('Total')</th>
        <th>@lang('GOB')</th>
        <th>@lang('FE')</th>
        <th>@lang('PA')</th>
        <th>@lang('RPA')</th>
        <th>@lang('Own Fund')</th>
        <th>@lang('Exchange Rate')</th>
        <th>@lang('Exchange Date')</th>
        <th>@lang('Other')</th>
      </tr>
    </thead>
    <tbody>
      @forelse($project->cost_details as $cd)
      <tr>


        <td style="text-align: center">{{$cd->version}}</td>
        <td style="text-align: center">{{$cd->total}}</td>
        <td style="text-align: center">{{$cd->gob}}</td>
        <td style="text-align: center">{{$cd->fe}}</td>
        <td style="text-align: center">{{$cd->pa}}</td>
        <td style="text-align: center">{{$cd->rpa}}</td>
        <td style="text-align: center">{{$cd->own_fund}}</td>
        <td style="text-align: center">{{$cd->exchange_rate}}</td>
        <td style="text-align: center">{{$cd->exchange_date}}</td>
        <td style="text-align: center">{{$cd->other}}</td>
      </tr>
      @empty

      @endforelse
    </tbody>

  </table>
 </div>



{{--//.............................................................source_start....................................................//--}}
<hr/>



<div class="span9 m-wrap">
  <label>@lang('PA Source')</label>
  <table id="source_table" class="table table-striped table-bordered dt-responsive table-hover" >

    <thead>
      <tr>
        <th style=" width: 30%; ">@lang('Source') </th>
        <th>@lang('Amount') </th>

        <th>@lang('Action')</th>
      </tr>
    </thead>

    <tbody id="table_body">
      @forelse($project->approved_project_source as $ps)
      <tr id="tr_{{ $loop->iteration }}">

        <td>
          <select name="source[]" id="source_id_1" >
            <option value=""></option>

            @foreach($source as $asource)

            <option {{selected($ps->finanacing_source,$asource->id)}} value="{{$asource->id}}"> {{$asource->source_name}}</option>

            @endforeach
          </select>
        </td>

        <td>
          <input type="text" name="amount[]" class="span11"  placeholder=" @lang("Amount")" value="{{$ps->amount}}">
        </td>

        <td>
          <a class="btn btn-success" id="add_1" title="@lang('Add')" onclick="add_row_source(1);"><i class="icon-plus" ></i></a>
          <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row_source(1);"><i class="icon-minus" ></i> </a>
        </td>


      </tr>
      @empty
      <tr id="tr_1">

        <td>
          <select name="source[]" id="source_id_1" >
            <option value=""></option>

            @foreach($source as $asource)

            <option  value="{{$asource->id}}"> {{$asource->source_name}}</option>

            @endforeach
          </select>
        </td>

        <td>
          <input type="text" name="amount[]" class="span11"  placeholder=" @lang("Amount")">
        </td>

        <td>
          <a class="btn btn-success" id="add_1" title="@lang('Add')" onclick="add_row_source(1);"><i class="icon-plus" ></i></a>
          <a class="btn btn-danger"  title="@lang('Delete')"  onclick="remove_row_source(1);"><i class="icon-minus" ></i> </a>
        </td>


      </tr>
      @endforelse
    </tbody>


  </table>


</div>

<div class="row-fluid">
  <div class="span12">
    <h4 style="">@lang('Project Implementation Preiod')</h4>
    <hr/>
    <hr/>
  </div>
</div>


<div class="row-fluid">

  <div  class="span6 m-wrap">
    <label class="control-label"> @lang("Date of Commencement") :</label>
    <div class="controls">
      @php
      $start_date=$project->date_details->last()->date_of_commencement ?? null;
      if($start_date!=null)
      {
        $s_date=$commonclass->datetoview($project->date_details->last()->date_of_commencement);
      }
      else{
        $s_date=null;
      }
      $end_date=$project->date_details->last()->date_of_completion ?? null;
      if($end_date!=null)
      {
        $e_date=$commonclass->datetoview($project->date_details->last()->date_of_completion);
      }
      else{
        $e_date=null;
      }
      @endphp
      <input type="text"  class="span11"  name="date_of_commencement" disabled=""  value="{{$s_date}}"/>
    </div>
  </div>



  <div  class="span6 m-wrap">

    <label class="control-label"> @lang("Date of Completion") :</label>
    <div class="controls">

      <input type="text" id="datepicker" class="span11 datepicker"  name="date_of_completion" value="{{$e_date}}" />
    </div>
  </div>




</div>

<div class="row-fluid">

  <div  class="span6 m-wrap">
    <label class="control-label"> @lang("Revision type") :</label>
    <div class="controls">
      
      
      <select name="revision" id="">
        @for($i=1;$i<=10;$i++)
        <option {{selected($project->date_details->last()->revision,$i)}} value="{{$i}}">revision {{$i}}</option>
        @endfor
      </select>
    </div>
  </div>



  <div  class="span6 m-wrap">

    <label class="control-label"> @lang("Attachment (Can attach more than one)"):</label>
    <div class="controls">
      
     <input multiple="multiple" name="attachment[]" type="file">
    </div>
  </div>
</div>
  <div class="row-fluid">

  <div  class="span6 m-wrap">
    <label class="control-label"> @lang("Go type") :</label>
    <div class="controls">
      
      
      <select name="go_type" id="">
        <option></option>
        @forelse($commonclass->go_type_array() as $key=>$go_type)
        <option {{selected($project->date_details->last()->revision,$i)}} value="{{$key}}">{{$go_type}}</option>
        @empty

        @endforelse
      </select>
    </div>
  </div>



  <div  class="span6 m-wrap">

    <label class="control-label"> @lang("Go number") :</label>
    <div class="controls">

      <input type="text" id="" class="span11"  name="go_number" value="{{$project->date_details->last()->go_number}}" />
    </div>
  </div>




</div>
<hr/>
<div class="row-fluid">

  <table class="table table-bordered" style="width:70%">
    <thead>
      <tr>

        <th>@lang('Version No')</th>
        <th>@lang('Revision Type')</th>
        <th>@lang('Revision Date')</th>
        <th>@lang('Date of Commencement')</th>
        <th>@lang('Date of Completion')</th>
        <th>@lang('Go Type')</th>
        <th>@lang('Go Number')</th>
        
      </tr>
    </thead>
    <tbody>
      @forelse($project->date_details as $d)
      <tr>


        <td style="text-align: center">{{$d->version}}</td>
        <td style="text-align: center">{{$d->revision}}</td>
        <td style="text-align: center">{{$commonclass->datetoview($d->created_at)}}</td>
        
        <td style="text-align: center">{{$commonclass->datetoview($d->date_of_commencement)}}</td>
        <td style="text-align: center">{{$commonclass->datetoview($d->date_of_completion)}}</td>
        <td style="text-align: center">{{$commonclass->go_type_array()[$d->go_type] ?? null}}</td>
        <td style="text-align: center">{{$d->go_number}}</td>
      </tr>
      @empty

      @endforelse
    </tbody>

  </table>
  <hr>




</div>
{{--......................................................Components section............................................--}}




{{--   <div class="row-fluid">
<div class="span12">
<hr/>
<h4 style="">@lang('Components')</h4>
<hr/>
<hr/>
</div>
</div> --}}








{{--//....................................................cart*start........................................................--}}




{{--......................................................Project Implementation Preiod section............................................--}}



<div class="form-actions text-center" >
 <button type="submit" class="btn btn-success">@lang("Save")</button>
  {{-- <a href="" class="btn btn-success btnNext">@lang("Save & Next")</a> --}}
</div>
</form>
</div>
</div>