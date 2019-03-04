
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">

    </script>


    <script type="text/javascript">

            // var rowCount = $('#table_body tr').length;
            // alert("rowCount");
           function del(id) {

               console.log(id);

               // var rowid = document.getElementById('getrowid').value;

               // var dataId = $('#btnDeleteProduct').attr('data-id');
               // var rowid = $(this).attr("name");

               alert("Delete!");

                $.ajax({
                    url: "{{ route('cartdelete') }}",
                    type: 'get',

                    data: {
                        rowid: id,
                    },

                    success: function (result) {
                        console.log(result);

                        $('#component_id_').html("");
                        $('#component_id_').html(result);
                    }
                });
            }


         //.................................*update name*.......................................//

            function update(id) {

               var name=$("#"+id).html();
               console.log(name);


                $.ajax({
                    url: "{{ route('cartupdate') }}",
                    type: 'get',

                    data: 'rowid='+id +'&name='+name ,

                    success: function (result) {
                        console.log(result);

                        $('#component_id_').html("");
                        $('#component_id_').html(result);
                    }
                });


            }

            //.................................*update quantity*.......................................//

            function  updateqty(id) {


                var qty=$("#qty"+id).html();
                // var qty = $('#aa').html();

                console.log(qty);


                $.ajax({
                    url: "{{ route('cartupdate') }}",
                    type: 'get',

                    data: 'rowid='+id +'&qty='+qty ,

                    success: function (result) {
                        console.log(result);

                        $('#component_id_').html("");
                        $('#component_id_').html(result);
                    }
                });


            }


            //.................................*update serial no*.......................................//

            function   updatesl(id) {


                var sl=$("#sl"+id).html();
                // var qty = $('#aa').html();

                console.log(sl);


                $.ajax({
                    url: "{{ route('cartupdate') }}",
                    type: 'get',

                    data: 'rowid='+id +'&id='+sl ,

                    success: function (result) {
                        console.log(result);

                        $('#component_id_').html("");
                        $('#component_id_').html(result);
                    }
                });


            }


            //.................................*update Unit Cost*.......................................//


            function   updateunitcost(id) {


                var unitcost=$("#unitcost"+id).html();
                // var qty = $('#aa').html();

                console.log(unitcost);


                $.ajax({
                    url: "{{ route('cartupdate') }}",
                    type: 'get',

                    data: 'rowid='+id +'&price='+unitcost ,

                    success: function (result) {
                        console.log(result);

                        $('#component_id_').html("");
                        $('#component_id_').html(result);
                    }
                });


            }




    </script>


</head>




<div class="widget-box">
<div class="widget-content nopadding">
<table class="table table-bordered data-table" >

    <thead>
    <tr id="component_id_">
        <th>@lang('SL No')</th>
        <th>@lang("Component Name")</th>
        <th>@lang('Quantity')</th>
        <th>@lang('Unit Cost')</th>
        <th>@lang('Estimated Cost')</th>
        <th>@lang('Action')</th>


    </tr>
    </thead>



<tbody>
@php($i=1)

@forelse($abc as $acomponet_data)

<tr id="component_id_">

    {{--<td onblur="updatesl('{{$acomponet_data->rowId}}')"  id="sl{{$acomponet_data->rowId}}" contenteditable >{{$acomponet_data->id}}</td>--}}

    <td> {{$i++}}</td>


    <td onblur="update('{{$acomponet_data->rowId}}')"  id="{{$acomponet_data->rowId}}" contenteditable > {{$acomponet_data->name}} </td>

    <td onblur="updateqty('{{$acomponet_data->rowId}}')"  id="qty{{$acomponet_data->rowId}}" contenteditable>  {{$acomponet_data->qty}} </td>
    <td onblur="updateunitcost('{{$acomponet_data->rowId}}')"  id="unitcost{{$acomponet_data->rowId}}" contenteditable>{{$acomponet_data->price}}</td>
    <td>{{$acomponet_data->qty*$acomponet_data->price}}</td>
    {{--<td>{{$acomponet_data->options->ecost}}</td>--}}
    <td>
        <a  onclick="del('{{$acomponet_data->rowId}}')" class="btn btn-danger btn-xs">
        <span  class="icon-trash"></span>
        </a>



    </td>
</tr>
    @empty

@endforelse


</tbody>
</table>
</div>
</div>



@section('additionalJS')






@endsection







