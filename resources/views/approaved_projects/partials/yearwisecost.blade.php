<div class="modal fade" id="yearwisecostModalshow" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="text-align: center;color: #000000;padding-bottom: 10px" class="modal-title">@lang('Year Wise Estimated Cost Summary')</h4>
            </div>
            <div class="modal-body">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <form action="{{url('add_year_wise_cost')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                 @csrf
                              
                                    <fieldset>
                                     <legend></legend>
                                     <div class="span12">
                                         <div class="span7 margin-bottom" >
                                             <div class="span6">
                                                 <label for="" class="span4" >Financial Year: </label>
                                                 <input type="hidden" name="project_id" value="{{$project_id}}">
                                                 <select class="span8" name="fiscal_year" id="" required>
                                                        <option value=""> -- @lang("Select") --</option>
                                                        @foreach($fiscalyears as $fiscalyear)
                                                        <option value="{{ $fiscalyear->id }}" >{{ $fiscalyear->start_date."-".$fiscalyear->end_date }}</option>
                                                        @endforeach
                                                 </select>
                                             </div>
                                             <div class="span6">
                                                 <div class="span12">
                                                     <label for="" class="span3 ">GOB{{required()}}: </label><input type="text" required  style="margin-left:4px" name="gob" class="span8">
                                                 </div>
                                                 <div class="span12">
                                                     <label for="" class="span3">FE{{required()}}: </label><input type="text" required  name="gob_fe" class="span8 padding-left">
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="span5">
                                             <div class="span8">
                                                 <div class="span12">
                                                     <label for="" class="span3 ">Own Fund{{required()}}: </label><input type="text" required  style="margin-left:4px" name="own_fund" class="span8">
                                                 </div>
                                                 <div class="span12">
                                                     <label for="" class="span3">FE{{required()}}: </label><input type="text" required  name="ownfund_fe" class="span8 padding-left">
                                                 </div>
                                             </div>
                                             <div class="span4">
                                                 
                                             </div>
                                         </div>
                                     </div>
                                     
                                     <div class="span12">
                                         &nbsp;
                                     </div>
                                     <div class="span12">
                                         <div class="span4">
                                             <label for="" class="span3 ">RPA{{required()}}: </label><input type="text" required  style="margin-left:4px" name="pa_rpa" class="span8">
                                         </div>
                                         <div class="span4">
                                             <label for="" class="span3 ">DPA{{required()}}: </label><input type="text" required  style="margin-left:4px" name="pa_dpa" class="span8">
                                         </div>
                                         
                                     </div>
                                     <div class="span12">
                                         <div class="span4">
                                             <div class="span12">
                                                     <label for="" class="span3 ">Others{{required()}}: </label><input type="text" required  style="margin-left:4px" name="others" class="span8">
                                                 </div>
                                                 <div class="span12">
                                                     <label for="" class="span3">Mention{{required()}}: </label><input type="text" required  name="mention" class="span8 padding-left">
                                                 </div>
                                         </div>
                                     </div>
                                  </fieldset>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">@lang("Save")</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('Close')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


