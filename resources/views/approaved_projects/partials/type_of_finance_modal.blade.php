<div class="modal fade" id="type_of_finance_modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="text-align: center;color: #000000;padding-bottom: 10px" class="modal-title">@lang('Type of Finance')</h4>
            </div>
             <form action="{{url('add_finance_approve_project')}}" method="post" class="form-horizontal">
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
                                                        <option value="{{ $s->id }}" >{{ $s->source_name ?? null }}</option>
                                                        @endforeach
                                                 </select>
                                             </div>
                                             <div class="span6">
                                                 <div class="span12">
                                                     <label for="" class="span3 ">GOB{{required()}}: </label><input type="text" required  style="margin-left:4px" name="gob" class="span8">
                                                 </div>
                                                 <div class="span12">
                                                     <label for="" class="span3">(FE){{required()}}: </label><input type="text" required  name="gob_fe" class="span8 padding-left">
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="span5">
                                             <div class="span8">
                                                 <div class="span12">
                                                     <label for="" class="span3 ">PA{{required()}}: </label><input type="text" required  style="margin-left:4px" name="pa" class="span8">
                                                 </div>
                                                 <div class="span12">
                                                     <label for="" class="span3">(RPA){{required()}}: </label><input type="text" required  name="pa_rpa" class="span8 padding-left">
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
                                                     <label for="" class="span3 ">Own Fund{{required()}}: </label><input type="text" required  style="margin-left:4px" name="ownfund" class="span8">
                                                 </div>
                                                 <div class="span12">
                                                     <label for="" class="span3">(FE){{required()}}: </label><input type="text" required  name="ownfund_fe" class="span8 padding-left">
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="span3">
                                             <div class="span12">
                                                 <div class="span12">
                                                     <label for="" class="span5">Others{{required()}}: </label><input type="text" required  style="margin-left:4px" name="others" class="span6">
                                                 </div>
                                                 <div class="span12">
                                                     <label for="" class="span5">(Mention){{required()}}: </label><input type="text" required  name="others_mention" class="span6 padding-left">
                                                 </div>
                                             </div>

                                         </div>
                                         {{-- source mode --}}
                                         <div class="span4">
                                           <div class="span12">


                                               <label for="" class="span5" >Pa Source{{required()}}: </label>

                                                 <select class="span6" name="pa_source" required="">
                                                    @forelse($paSource as $pa)
                                                    <option value="{{$pa->id}}">{{ $pa->pa_source_name }}</option>
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
