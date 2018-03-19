(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
      } else {
          PostReg();
      }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

function PostReg() {
    $('#btn-reg').text('处理中...');
    $('#btn-reg').attr("disabled", "disabled")
    $.ajax({
        type: "POST",
        url: "/user/register",
        data: {
            'email': $('#input-email').val().trim(),
            'phone': $('#input-phone').val().trim(),
            'username': $('#input-username').val().trim(),
            'passwd': $('#input-pwd').val().trim(),
            '_SECSRF-T': $("input[name='_SECSRF-T']").val()
        },
        dataType: "json",
        success: function (response) {
            if(response.status > 0) {
                $('.lwl-content').html(
                '<h2 class="text-center">离成功只有一步——</h2>'+
                '<p class="text-center">'+
                    '系统已经发送了一封邮件到您填写的邮箱，请打开您的邮箱，点击激活链接进行激活。'+
                    '<br>'+
                    '如果您迟迟没有收到邮件，您可以尝试点击下面的按钮重新发送。'+
                '</p>'+
                '<a href="/main/forgot_pwd/' + $('#input-email').val().trim() + '"><button type="button" class="btn btn-outline-primary btn-block">重发邮件</button></a>');
                /*
                alert(response.msg);
                window.location.href = '/';
                */
            } else {
                $('#error-disp').css('display', '');
                $('#error-desc').html(response.msg);
            }
            $('#btn-reg').text('立即注册');
            $('#btn-reg').removeAttr('disabled');
        }
    });
}
