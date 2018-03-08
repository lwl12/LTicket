var need_captcha = false;

function check() {
    un = $('#input-username').val().trim();
    if (un == '') return;

    $.ajax({
        type: "POST",
        url: "user/need_captcha",
        data: {
            "id": un
        },
        dataType: "json",
        success: function (response) {
            if (response.status > 0) {
                need_captcha = true;
                $('#btn-login').click(function () {
                    grecaptcha.execute();
                });
                $('#input-pwd').unbind().bind('keypress', function (event) {
                    if (event.keyCode == "13") {
                        grecaptcha.execute();
                    }
                });
            } else {
                need_captcha = false;
                $('#btn-login').click(function () {
                    login();
                });
                $('#input-pwd').unbind().bind('keypress', function (event) {
                    if (event.keyCode == "13") {
                        login();
                    }
                });
            };
        }
    });
}

$("#input-username").blur(function(){
    check();
});
//用户名编辑框失去焦点时检测是否需要验证码，需要的话把事件绑定上

function login() {
    un = $('#input-username').val().trim();
    pw = $('#input-pwd').val().trim();
    rm = false;
    if (un == '' || pw == '') {
        alert('用户名或密码不能为空!');
        if(need_captcha) grecaptcha.reset();
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
            'g-recaptcha-response': grecaptcha.getResponse()
        },
        dataType: "json",
        success: function (response) {
            if (response.status > 0) {
                window.location.href = "/";
            } else if(response.status == -2) {
                grecaptcha.execute();
                //如果返回结果需要验证码，那就通过 recaptcha 再 login 一次
            } else {
                alert(response.msg);
                $('#btn-login').html('登录');
                $('#btn-login').removeAttr('disabled');
                grecaptcha.reset();
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