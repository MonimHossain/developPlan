$( document ).ready(function() {
   



  
    
  

    // $.fn.dataTable.ext.errMode = 'none';

    table = $("#dataList").DataTable({

        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "sDom": '<""l>t<"F"fp>',
        "bLengthChange" : false,
        
       
    });


    $('.datepicker').datepicker({
        format:'dd-mm-yyyy',
        todayHighlight: true,
        autoclose: true
    });
    
   

});


//all linkage and target start//



//edit sdgs cart//

 



function open_modal_custom(url,push_result,modal_id) {
    $.ajax({
        url: url,
        type: 'get',
        success: function (result) {
            //console.log(result);
            $('#year_wise_divshow').html("");
            $('#'+push_result).html(result);
            $('#'+modal_id).modal('show');
            
            $('.datepicker').datepicker({
                format:'dd-mm-yyyy',
                todayHighlight: true,
                autoclose: true
            });
            
        }
    });
}



