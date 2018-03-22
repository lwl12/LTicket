$('#confirmSED').click(function(e) {
    $.ajax({
        type: "POST",
        url: "/admin/api_setting_update",
        data: {
            'startdate': $('#input-startdate').val(),
            'finaldate': $('#input-finaldate').val(),
            'alltnum': $('#input-alltnum').val(),
            'pertnum': $('#input-pertnum').val(),
            '_SECSRF-T': $("input[name='_SECSRF-T']").val()
        },
        dataType: "json",
        success: function(response) {
            alert(response.msg);
        }
    });
});
