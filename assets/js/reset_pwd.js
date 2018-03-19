function PostForm() {
    $('#btn-reset').text('处理中...');
    $('#btn-reset').attr("disabled", "disabled");
    $.ajax({
        type: "POST",
        url: "/user/reset_pwd",
        data: {
            'code': code,
            'pw': $('#input-pwd').val().trim(),
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
            $('#btn-reset').text('修改密码');
            $('#btn-reset').removeAttr('disabled');
        }
    });
}

$('#btn-reset').click(function() {
    setTimeout(() => {
        PostForm();
    }, 100);
});
