<div class="modal fade" id="type_of_finance_edit_modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="text-align: center;color: #000000;padding-bottom: 10px" class="modal-title">@lang('Type of Finance Edit')</h4>
            </div>
             <form action="{{url('update_finance_type',$type_of_finance->id)}}" method="post" class="form-horizontal">
            <div class="modal-body">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-content nopadding">
                           
                                 <fieldset>

                                 @csrf
                                    <input type="hidden" name= "project_id" value="{{$project_id}}">
                                     <legend>Type of Finance</legend>
                                     <div class="span12">
                                         <div class="span7 margin-bottom" >
                                             <div class="span6">
                                                 <label for="" class="span6" >Mode/Source: </label>
                                                 <select class="span6" name="source_mode" id="" required>
                                                        <option value=""> -- @lang("Select") --</option>
                                                        @foreach($source as $s)
                                                        <option {{ selected($type_of_finance->source_mode,$s->id) }} value="{{ $s->id }}" >{{ $s->source_name ?? null }}</option>
                                                        @endforeach
                                                 </select>
                                             </div>
                                             <div class="span6">
                                                 <div class="span12">
                                                     <label for="" class="span3 ">GOB{{required()}}: </label><input type="text" required  style="margin-left:4px" name="gob" class="span8" value="{{$type_of_finance->gob}}">
                                                 </div>
                                                 <div class="span12">
                                                     <label for="" class="span3">(FE){{required()}}: </label><input type="text" required  name="gob_fe" class="span8 padding-left"  value="{{$type_of_finance->gob_fe}}">
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="span5">
                                             <div class="span8">
                                                 <div class="span12">
                                                     <label for="" class="span3 ">PA{{required()}}: </label><input type="text" required  style="margin-left:4px" name="pa" class="span8" value="{{$type_of_finance->pa}}" >
                                                 </div>
                                                 <div class="span12">
                                                     <label for="" class="span3">(RPA){{required()}}: </label><input type="text" required  name="pa_rpa" class="span8 padding-left" value="{{$type_of_finance->pa_rpa}}">
                                                 </div>
                                             </div>
                                             <div class="span4">

                                             </div>
                                         </div>
                                     </div>

                                     <div class="span12">
                                         &nbsp;
                                     </div>
                                     {{--  start 2nd row modal--}}
                                      <div class="span12">
                                         <div class="span4 margin-bottom" >

                                             <div class="span12">
                                                 <div class="span12">
                                                     <label for="" class="span3 ">Own Fund{{required()}}: </label><input type="text" required  style="margin-left:4px" name="ownfund" class="span8" value="{{$type_of_finance->ownfund}}">
                                                 </div>
                                                 <div class="span12">
                                                     <label for="" class="span3">(FE){{required()}}: </label><input type="text" required  name="ownfund_fe" class="span8 padding-left" value="{{$type_of_finance->ownfund_fe}}">
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="span3">
                                             <div class="span12">
                                                 <div class="span12">
                                                     <label for="" class="span5">Others{{required()}}: </label><input type="text" required  style="margin-left:4px" name="others" class="span6" value="{{$type_of_finance->others}}">
                                                 </div>
                                                 <div class="span12">
                                                     <label for="" class="span5">(Mention){{required()}}: </label><input type="text" required  name="others_mention" class="span6 padding-left" value="{{$type_of_finance->others_mention}}">
                                                 </div>
                                             </div>

                                         </div>
                                         {{-- source mode --}}
                                         <div class="span4">
                                           <div class="span12">


                                               <label for="" class="span5" >Pa Source{{required()}}: </label>

                                                 <select class="span6" name="pa_source" required="">
                                                    @forelse($paSource as $pa)
                                                    <option {{ selected($type_of_finance->pa_source,$pa->id) }} value="{{$pa->id}}">{{ $pa->pa_source_name }}</option>
                                                    @empty
                                                    @endforelse
                                                 </select>



                                             </div>
                                         </div>
                                         {{-- end source mode --}}

                                     </div>
                                     {{-- end span12 modal 2nd row --}}


                                    </div>
                                 </fieldset>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">@lang("Update")</button>
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
