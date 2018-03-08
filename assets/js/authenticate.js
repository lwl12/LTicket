function PostForm() {
    $('#btn-auth').button('loading');
    njid = $('#select-njid').val();
    name = $('#input-name').val();
    pwd = $('#input-pwd').val();
    if(njid <= 0 || name=='' || pwd=='') {
        alert('请填写认证信息！');
        $('#btn-auth').button('reset');
        return;
    }
    $.ajax({
        type: "POST",
        url: "/user/auth",
        data: {
            'njid': njid,
            'name': name,
            'pwd': pwd
        },
        dataType: "json",
        success: function (response) {
            if(response.status > 0) {
                alert(response.msg);
                location.reload() 
            } else {
                alert(response.msg);
            }
            $('#btn-auth').button('reset');
        }
    });
}

$('#btn-auth').click(function() {
    PostForm();
});