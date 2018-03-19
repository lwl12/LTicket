function PostForm() {
    $('#btn-book').text('处理中...');
    $('#btn-book').attr("disabled", "disabled");
    $.ajax({
        type: "POST",
        url: "/ticket/book",
        data: {
            'name': $('#input-name').val().trim(),
            'phone': $('#input-phone').val().trim(),
            '_SECSRF-T': $("input[name='_SECSRF-T']").val()
        },
        dataType: "json",
        success: function (response) {
            if(response.status > 0) {
                alert(response.msg);
                window.location.href = '/main/myTicket';
            } else {
                alert(response.msg);
                if(response.status == -2) window.location.reload();
            }
            $('#btn-book').text('预约！');
            $('#btn-book').removeAttr('disabled');
        }
    });
}

$('#btn-book').click(function() {
    setTimeout(() => {
        PostForm()
    }, 100);
});
