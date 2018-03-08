$('#form-forgot').validator({
    onValid: function (validity) {
        $(validity.field).closest('.am-form-group').find('.am-alert').hide();
    },

    onInValid: function (validity) {
        var $field = $(validity.field);
        var $group = $field.closest('.am-form-group');
        var $alert = $group.find('.am-alert');
        // 使用自定义的提示信息 或 插件内置的提示信息
        var msg = $field.data('validationMessage') || this.getValidationMessage(validity);

        if (!$alert.length) {
            $alert = $('<div class="am-alert am-alert-danger"></div>').hide().
            appendTo($group);
        }

        $alert.html(msg).show();
    }
});

function PostForm() {
    $('#btn-forgot').button('loading');
    $.ajax({
        type: "POST",
        //url: "/user/forgot_pwd",
        url: "/user/can_not_login",
        data: {
            'id': $('#input-email').val().trim(),
            'g-recaptcha-response': grecaptcha.getResponse()
        },
        dataType: "json",
        success: function (response) {
            if(response.status > 0) {
                alert(response.msg);
                window.location.href = '/';
            } else {
                alert(response.msg);
                grecaptcha.reset();
            }
            $('#btn-forgot').button('reset');
        }
    });
}

function check() {
    if($("#form-forgot .am-field-error").length != 0){
        alert('表单填写错误，请检查！');
        return false;
    }
    grecaptcha.execute();
}

$('#btn-forgot').click(function() {
    setTimeout(() => {
        check()
    }, 100);
});