var auto_post = true, posting = false;

function do_bind() {
    $('#t_num').unbind().bind('input propertychange', function() {
        text = $(this).val().trim();
        if (text.length == 7) {
            do_post(text, true);
        }
    });
}

//开始的时候先绑定
do_bind()

$('#t_num').bind('keypress', function (event) {
    if (event.keyCode == "13") {
        text = $(this).val().trim();
        if (text.length == 7) {
            do_post(text, true);
        } else {
            alert('请输入 7 位整数');
        }
    }
});
$('#t_btn').click(function() {
    text = $(this).val().trim();
    if (text.length == 7) {
        do_post(text, true);
    } else {
        alert('请输入 7 位整数');
    }
});

$('#auto-post').change(function() {
    if($(this).is(':checked')) {
        console.log('auto post open');
        do_bind()
    } else {
        console.log('auto post close');
        $('#t_num').unbind();
    }
});

function do_post(text, focus) {
    if(posting) return;
    posting = true;
    console.log(text);
    $('#t_num').attr('disabled','true');
    $('#t_btn').attr('disabled','true');
    t_num = parseInt(text.substring(0,4));
    t_code = parseInt(text.substring(4,7));
    console.log(t_num, t_code);
    enter(t_num, t_code, focus);
}

function enter(t_num, t_code, focus) {
    $.ajax({
        type: "POST",
        url: "/admin/api_enter",
        data: {
            'num': t_num,
            'code': t_code
        },
        dataType: "json",
        success: function (response) {
            if(response.status > 0) {
                notie.alert({ type: 'success', text: response.msg, time: 2, position: 'top' });                
            } else {
                notie.alert({ type: 'error', text: response.msg, time: 2, position: 'top' });                
            }
            $('#log').prepend(getTime() + ': ' + addZero(t_num, 4) + ' ' + response.msg + '<br>')
            do_after(focus)
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert('系统错误，请重试 - ' + textStatus);
            do_after(focus)
        }
    });
}

function do_after(focus) {
    $('#t_num').removeAttr('disabled');
    $('#t_btn').removeAttr('disabled');
    $('#t_num').val('');
    if(focus) $('#t_num').focus();
    posting = false;
}

var t_cam = [];
//qrcode scan
let scanner = new Instascan.Scanner({
    video: document.getElementById('preview'),
    mirror: false
});
scanner.addListener('scan', function (content) {
  console.log(content);
  do_post(content, false);
});
Instascan.Camera.getCameras().then(function (cameras) {
  if (cameras.length > 0) {
    console.log(cameras);
    t_cam = cameras;
    for(var i=0;i<cameras.length;i++) {
        $('#switch-cam').append('<a onclick="switchCam('+i+')">摄像头'+(i+1)+": "+cameras[i].name+'</a><br>');
    }
    scanner.start(cameras[0]);
  } else {
    $('#switch-cam').append('<p>未找到摄像头</p>');
  }
}).catch(function (e) {
  console.error(e);
});

function switchCam(id) {
    scanner.start(t_cam[id]);
}

function getTime() {
    var myDate = new Date();
    return myDate.toLocaleTimeString();
}

function addZero(num,length){
    var numstr = num.toString();
    var l=numstr.length;
    if (numstr.length>=length) {return numstr;}
      
    for(var  i = 0 ;i<length - l;i++){
      numstr = "0" + numstr;  
     }
    return numstr; 
}