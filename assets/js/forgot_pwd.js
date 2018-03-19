function PostForm() {
    $('#btn-forgot').text('处理中...');
    $('#btn-forgot').attr("disabled", "disabled");
    $.ajax({
        type: "POST",
        url: "/user/can_not_login",
        data: {
            'id': $('#input-email').val().trim(),
            '_SECSRF-T': $("input[name='_SECSRF-T']").val()
        },
        dataType: "json",
        success: function (response) {
            if(response.status > 0) {
                alert(response.msg);
                window.location.href = '/';
            } else {
                alert(response.msg);
            }
            $('#btn-forgot').text('发送邮件');
            $('#btn-forgot').removeAttr('disabled');
        }
    });
}

$('#btn-forgot').click(function() {
    setTimeout(() => {
        PostForm();
    }, 100);
});
