<!-- <script src='https://www.recaptcha.net/recaptcha/api.js'></script> -->
<!-- <div id='recaptcha' class="g-recaptcha" data-sitekey="6LdslDkUAAAAAHTvBo2zPzsrqSSoQZHKjlKRjokw" data-callback="PostReg" data-size="invisible"></div> -->

<ol class="am-breadcrumb">
<li><a href="/" class="am-active am-icon-home">首页</a></li>
<li><a class="am-active">注册</a></li>
</ol>

<div class="lwl-content">
    <h2 class="am-text-center">注册账号</h2>
    <div class="am-g">
        <?php echo form_open('user/register', 'id="form-reg" class="am-form" onsubmit="return false"'); ?>
            <fieldset>
                <div class="am-u-lg-12">
                    <div class="am-form-group">
                        <div class="am-input-group">
                            <span class="am-input-group-label"><i class="am-icon-at am-icon-fw"></i></span>
                            <input id="input-email" type="email" name="email" class="am-form-field" placeholder="邮箱" data-validation-message="请输入正确的邮箱地址" required>
                        </div>
                    </div>
                </div>
                <div class="am-u-lg-12">
                    <div class="am-form-group">
                        <div class="am-input-group">
                            <span class="am-input-group-label"><i class="am-icon-phone am-icon-fw"></i></span>
                            <input id="input-phone" type="text" name="phone" class="am-form-field js-pattern-mobile" placeholder="手机号" data-validation-message="请输入11位大陆手机号" required>
                        </div>
                    </div>
                </div>
                <div class="am-u-lg-12">
                    <div class="am-form-group">
                        <div class="am-input-group">
                            <span class="am-input-group-label"><i class="am-icon-user am-icon-fw"></i></span>
                            <input id="input-username" type="text" name="username" class="am-form-field" minlength="3" maxlength="16" placeholder="用户名 (3-16位字符)" required>
                        </div>
                    </div>
                </div>
                <div class="am-u-lg-12">
                    <div class="am-form-group">
                        <div class="am-input-group">
                            <span class="am-input-group-label"><i class="am-icon-key am-icon-fw"></i></span>
                            <input id="input-pwd" type="password" name="passwd" class="am-form-field" minlength="6" maxlength="20" placeholder="密码 (6-20位字符)" required>
                        </div>
                    </div>
                </div>
                <div class="am-u-lg-12">
                    <div class="am-form-group">
                        <div class="am-input-group">
                            <span class="am-input-group-label"><i class="am-icon-key am-icon-fw"></i></span>
                            <input id="input-pwd-repeat" type="password" name="repasswd" class="am-form-field" minlength="3" maxlength="20" data-equal-to="#input-pwd" placeholder="确认密码" data-validation-message="两次输入的密码不一致" required>
                        </div>
                    </div>
                </div>
            </fieldset>
            <button id="btn-reg" type="submit" onclick="PostReg()" class="am-btn am-btn-primary am-btn-block">立即注册</button>
        </form>
    </div>

</div>
