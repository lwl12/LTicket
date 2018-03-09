function login() {
    un = $('#input-username').val().trim();
    pw = $('#input-pwd').val().trim();
    rm = false;
    if (un == '' || pw == '') {
        alert('用户名或密码不能为空!');
    } else {
        $('#btn-login').html('登录中');
        $('#btn-login').attr('disabled','true');
        _login(un, pw, rm);
    }
}

function _login(id, pw, rm) {
    $.ajax({
        type: "POST",
        url: "user/login",
        data: {
            "id": id,
            "pw": pw,
            "rm": rm,
            '_SECSRF-T': $("input[name='_SECSRF-T']").val()
        },
        dataType: "json",
        success: function (response) {
            if (response.status > 0) {
                window.location.href = "/";
            } else {
                alert(response.msg);
                $('#btn-login').html('登录');
                $('#btn-login').removeAttr('disabled');
            };
        }
    });
}

$('#btn-login').click(function () {
    login();
});
$('#input-pwd').unbind().bind('keypress', function (event) {
    if (event.keyCode == "13") {
        login();
    }
});
