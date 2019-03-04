<div class="modal fade" id="edit_aprroved_component_modal" role="dialog">
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
                            <form action="{{url('update_component_wise_cost',$component_wise_cost->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                 @csrf

                              <input type="hidden" name="project_id" value="{{$project_id}}">
                                    <fieldset>
                                        <legend> Components and Estimated Cost Summary</legend>
                                     <div class="span12">
                                            <div class="span6">
                                                <div class="span12">
                                                   <label for="" class="span4" > Budget Head: </label>
                                                   <select class="span8" name="budget_head">
                                                          <option value=""> -- @lang("Select") --</option>
                                                          @foreach($budgetheads as $budgetheads)
                                                          <option {{selected($budgetheads->id,$component_wise_cost->budget_head)}} value="{{ $budgetheads->id }}" >{{ $budgetheads->budget_head_name }}</option>
                                                          @endforeach
                                                   </select>
                                                </div>
                                            </div>
                                            <div class="span6">
                                               <div class="span11">
                                                   <label for="" class="span4" > Economic Code: </label>
                                                   <input type="text" value="{{$component_wise_cost->economic_code}}" name="economic_code" class="span8 padding-left">
                                                </div>
                                            </div>
                                         
                                     </div>
                                     <div class="span12">
                                            <div class="span6">
                                               <div class="span12">
                                                   <label for="" class="span4" >Component Description: </label>
                                                   <textarea name="component_description" rows="2" class="span8 padding-left">{{$component_wise_cost->component_description}}</textarea>
                                               </div>
                                            </div>
                                            <div class="span6">
                                                <div class="span11">
                                                   <label for="" class="span4" >Economic Sub-Code: </label>
                                                   <input value="{{$component_wise_cost->economic_subcode}}"  type="text" name="economic_subcode" class="span8 padding-left">
                                               </div>
                                            </div>
                                     </div>
                                     
                                     <div class="span12 " style=" margin-top: 5px;">
                                        <div class="span6">
                                           <div class="span12">
                                               <label for="" class="span4" >Unit : </label>
                                               <input value="{{$component_wise_cost->unit}}" type="text" name="unit" class="span8 padding-left">
                                           </div>
                                        </div>
                                        <div class="span6">
                                            <div class="span11">
                                               <label for="" class="span4" >Quantity : </label>
                                               <input value="{{$component_wise_cost->quantity}}" type="text" name="quantity" class="span8 padding-left">
                                           </div>
                                        </div>
                                     </div>
                                     
                                     <div class="span12">
                                        <div class="span6">
                                           <div class="span12">
                                               <label for="" class="span4" >Unit Cost: </label>
                                               <input value="{{$component_wise_cost->unit_cost}}" type="text" name="unit_cost" class="span8 padding-left">
                                           </div>
                                        </div>
                                        <div class="span6">
                                            <div class="span11">
                                               <label for="" class="span4" >Total Cost : </label>
                                               <input value="{{$component_wise_cost->total_cost}}" type="text" name="total_cost" class="span8 padding-left">
                                           </div>
                                        </div>
                                     </div>
                                     
                                     <div class="span12">
                                        <div class="span6">
                                           <div class="span12">
                                               <label for="" class="span4" >GOB: </label>
                                               <input value="{{$component_wise_cost->gob}}" type="text" name="gob" class="span8 padding-left">
                                           </div>
                                        </div>
                                        <div class="span6">
                                            
                                        </div>
                                     </div>
                                     <div class="span12">
                                        <div class="span6">
                                           <div class="span12">
                                               <label for="" class="span4" >(FE): </label>
                                               <input value="{{$component_wise_cost->gob_fe}}" type="text" name="gob_fe" class="span6 padding-left">
                                           </div>
                                        </div>
                                        <div class="span6">
                                            
                                        </div>
                                     </div>
                                     
                                  </fieldset>
                                 
                                 <fieldset>
                                        
                                    <legend> Project Aid</legend>
                                    
                                    <div class="span12">
                                        <div><b>RPA</b> </div>
                                    </div>
                                    
                                     <div class="span12">
                                            <div class="span6">
                                               <div class="span12">
                                                   <label for="" class="span4" >Through GOB: </label>
                                                   <input value="{{$component_wise_cost->rpa_through_gob}}" type="text" name="rpa_through_gob" class="span8 padding-left">
                                               </div>
                                            </div>
                                            <div class="span6">
                                                <div class="span11">
                                                   <label for="" class="span4" >Special Account : </label>
                                                   <input value="{{$component_wise_cost->special_acount}}" type="text" name="special_acount" class="span8 padding-left">
                                               </div>
                                            </div>
                                     </div>
                                    
                                    <div class="span12">
                                        <div><b>DPA</b> </div>
                                    </div>
                                    
                                    
                                    <div class="span12">
                                        <div class="span6">
                                           <div class="span12">
                                               <label for="" class="span4" >Through PD: </label>
                                               <input value="{{$component_wise_cost->dpa_through_pd}}" type="text" name="dpa_through_pd" class="span8 padding-left">
                                           </div>
                                        </div>
                                        <div class="span6">
                                            <div class="span11">
                                               <label for="" class="span4" >Through DP : </label>
                                               <input value="{{$component_wise_cost->dpa_through_dp}}" type="text" name="dpa_through_dp" class="span8 padding-left">
                                           </div>
                                        </div>
                                     </div>
                                    <div class="span12">
                                        <div class="span6">
                                           <div class="span12">
                                               <label for="" class="span4" >Own Fund: </label>
                                               <input value="{{$component_wise_cost->ownfund}}" type="text" name="ownfund" class="span8 padding-left">
                                           </div>
                                        </div>
                                        <div class="span6">
                                            <div class="span11">
                                               <label for="" class="span4" >Others : </label>
                                               <input value="{{$component_wise_cost->others}}" type="text" name="others" class="span8 padding-left">
                                           </div>
                                        </div>
                                     </div>
                                    <div class="span12">
                                        <div class="span6">
                                           <div class="span12">
                                               <label for="" class="span4" >(FE): </label>
                                               <input value="{{$component_wise_cost->ownfund_fe}}" type="text" name="ownfund_fe" class="span6 padding-left">
                                           </div>
                                        </div>
                                        <div class="span6">
                                            
                                        </div>
                                     </div>
                                    
                                  </fieldset>
                                 
                                    <div class="modal-footer">
                                        <button name="save_componnent" value="1" type="submit" class="btn btn-success">@lang("Save")</button>
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


