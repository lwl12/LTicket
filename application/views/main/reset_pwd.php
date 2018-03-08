<ol class="am-breadcrumb">
<li><a href="/" class="am-active am-icon-home">首页</a></li>
<li><a>找回密码</a></li>
<li><a class="am-active">重设密码</a></li>
</ol>

<div class="lwl-content">
    <h2 class="am-text-center">重设密码</h2>
    <div class="am-g">
        <form id="form-reset" class="am-form" onsubmit="return false">
            <fieldset>
                <div class="am-u-lg-12">
                    <div class="am-form-group">
                        <div class="am-input-group">
                            <span class="am-input-group-label"><i class="am-icon-key am-icon-fw"></i></span>
                            <input id="input-pwd" type="password" class="am-form-field" minlength="6" maxlength="20" placeholder="新密码 (6-20位字符)" required>
                        </div>
                    </div>
                </div>
                <div class="am-u-lg-12">
                    <div class="am-form-group">
                        <div class="am-input-group">
                            <span class="am-input-group-label"><i class="am-icon-key am-icon-fw"></i></span>
                            <input id="input-pwd-repeat" type="password" class="am-form-field" minlength="3" maxlength="20" data-equal-to="#input-pwd" placeholder="重复密码 (同上)" data-validation-message="两次输入的密码不一致" required>
                        </div>
                    </div>
                </div>
            </fieldset>
            <button id="btn-reset" type="submit" class="am-btn am-btn-primary am-btn-block">修改密码</button>
        </form>
    </div>
</div>

<script>
    var code = '<?php echo $code ?>' ;
</script>
