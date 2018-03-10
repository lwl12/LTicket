if ($.AMUI && $.AMUI.validator) {
    $.AMUI.validator.patterns.mobile = /^\s*1\d{10}\s*$/;
}
$('#form-book').validator({
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
    if($("#form-book .am-field-error").length != 0 || $('#input-name').val().trim() == '' ||  $('#input-phone').val().trim() == ''){
        alert('表单填写错误，请检查！');
        return false;
    }
    $('#btn-book').button('loading');
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
            $('#btn-book').button('reset');
        }
    });
}

$('#btn-book').click(function() {
    setTimeout(() => {
        PostForm()
    }, 100);
});
