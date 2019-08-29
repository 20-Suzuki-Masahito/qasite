$("input[type='radio']").change(function(){
    if ($("#other:checked").val()) {
        $("#purpose").prop("disabled",false);
    }else {
         $("#purpose").prop("disabled",true);
    }
});