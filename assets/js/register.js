if ($.AMUI && $.AMUI.validator) {
    $.AMUI.validator.patterns.mobile = /^\s*1\d{10}\s*$/;
}

$('#form-reg').validator({
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

function PostReg() {
    $('#btn-reg').button('loading');
    $.ajax({
        type: "POST",
        url: "/user/register",
        data: {
            'email': $('#input-email').val().trim(),
            'phone': $('#input-phone').val().trim(),
            'un': $('#input-username').val().trim(),
            'pw': $('#input-pwd').val().trim(),
            'g-recaptcha-response': grecaptcha.getResponse()
        },
        dataType: "json",
        success: function (response) {
            if(response.status > 0) {
                $('.fly-content').html(
                '<h2 class="am-text-center">离成功只有一步——</h2>'+
                '<p class="am-text-center">'+
                    '系统已经发送了一封邮件到您填写的邮箱，请打开您的邮箱，点击激活链接进行激活。'+
                    '<br>'+
                    '如果您迟迟没有收到邮件，您可以尝试点击下面的按钮重新发送。'+
                '</p>'+
                '<a href="/main/forgot_pwd/' + $('#input-email').val().trim() + '" type="button" class="am-btn am-btn-primary am-btn-block">重发邮件</a>');
                /*
                alert(response.msg);
                window.location.href = '/';
                */
            } else {
                alert(response.msg);
                grecaptcha.reset();
            }
            $('#btn-reg').button('reset');
        }
    });
}

function Reg() {
    if($("#form-reg .am-field-error").length != 0){
        alert('表单填写错误，请检查！');
        return false;
    }
    grecaptcha.execute();
}

$('#btn-reg').click(function() {
    setTimeout(() => {
        Reg()
    }, 100);
});

$('#input-pwd-repeat').bind('keypress', function (event) {
    if (event.keyCode == "13") {
        $('#btn-reg').click();
    }
});