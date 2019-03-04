<div class="modal fade" id="location_wsie_edit_modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="text-align: center;color: #000000;padding-bottom: 10px" class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <form action="{{url('add_location_wise_cost')}}" method="post" class="form-horizontal">
                                 @csrf
                              
                                    <fieldset>
                                     <input type="hidden" value="{{$project_id}}" name="unapprove_project_id">   
                                     <legend> Location Wise Cost</legend>
                                     <div class="span12">
                                            <div class="span6">
                                                <div class="span12">
                                                   <label for="" class="span4" >Division: </label>
                                                   <select class="span8" name="division">
                                                          <option value=""> -- @lang("Select") --</option>
                                                          @foreach($divisions as $divisions)
                                                          <option value="{{ $divisions->id }}" >{{ $divisions->division_name }}</option>
                                                          @endforeach
                                                   </select>
                                                </div>
                                            </div>
                                            <div class="span6">
                                               <div class="span11">
                                                   <label for="" class="span4" >District: </label>
                                                   <select class="span8" name="district">
                                                          <option value=""> -- @lang("Select") --</option>
                                                          @foreach($districts as $districts)
                                                          <option value="{{ $districts->id }}" >{{ $districts->district_name }}</option>
                                                          @endforeach
                                                   </select>
                                                </div>
                                            </div>
                                         
                                     </div>
                                     <div class="span12">
                                             <div class="span6">
                                                <div class="span12">
                                                    <label for="" class="span4" >Upazila/Locations: </label>
                                                    <select class="span8" name="upazila" id="">
                                                           <option value=""> -- @lang("Select") --</option>
                                                           @foreach($UpazilaLocations as $UpazilaLocations)
                                                           <option value="{{ $UpazilaLocations->id }}" >{{ $UpazilaLocations->upazila_location_name }}</option>
                                                           @endforeach
                                                    </select>
                                                </div>
                                             </div>
                                             <div class="span6">
                                                 <div class="span11">
                                                    <label for="" class="span4" >Amount: </label>
                                                    <input type="text" name="amount" class="span8 padding-left">
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


