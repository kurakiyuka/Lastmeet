$('.form_date').datetimepicker({
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 0,
    forceParse: 0
});

$(".glyphicon-plus").bind("click", function(){

    $(".modal-body").append($(".photo-select").clone());
});
