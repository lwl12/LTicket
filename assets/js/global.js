function _logout() {
    $.ajax({
        type: "GET",
        url: "user/logout",
        dataType: "json",
        success: function (response) {
            if (response.status > 0) {
                window.location.href = "/";
            } else {
                alert(response.msg);
            };
        }
    });
}

function _cpw(old_pw,new_pw,callback) {
    $.ajax({
        type: "POST",
        url: "user/cpw",
        data: {
            'old_pw': old_pw,
            'new_pw': new_pw,
            '_SECSRF-T': $("input[name='_SECSRF-T']").val()
        },
        dataType: "json",
        success: function (response) {
            if (response.status > 0) {
                alert(response.msg);
                window.location.href = "/";
            } else {
                alert(response.msg);
                callback();
            };
        }
    });
}

$('#a-logout').click(function () {
    $(this).html('请稍候');
    _logout();
});
