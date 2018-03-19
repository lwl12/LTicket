<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> 首页</a></li>
        <li class="breadcrumb-item active" aria-current="page">注册</li>
	</ol>
</nav>


<div class="lwl-content">
    <h2 class="text-center">注册账号</h2>

    <div class="alert alert-warning mt-3 bs-center" role="alert" id="error-disp" style="display: none; max-width: 700px;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="alert-heading"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>注册过程遇到了问题</h4>
        <hr>
        <div id="error-desc"></div>
    </div>

    <div>
        <?php echo form_open('/user/register', 'id="form-reg" class="bs-center mt-4 needs-validation" novalidate style="max-width: 700px;" onsubmit="return false"'); ?>
            <fieldset>
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-at fa fa-fw"></i></span></div>
                            <input id="input-email" type="email" name="email" class="form-control" placeholder="邮箱" required>
                            <div class="invalid-feedback">
                                请输入正确的邮箱地址
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone fa fa-fw"></i></span></div>
                            <input id="input-phone" type="tel" pattern="1[0-9]{10}" name="phone" class="form-control js-pattern-mobile" placeholder="手机号" required>
                            <div class="invalid-feedback">
                                请输入 11 位大陆手机号
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user fa fa-fw"></i></span></div>
                            <input id="input-username" type="text" name="username" class="form-control" minlength="3" maxlength="16" placeholder="用户名 (3-16位字符)" required>
                            <div class="invalid-feedback">
                                请设置一个用户名 (3-16位字符)
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-key fa fa-fw"></i></span></div>
                            <input id="input-pwd" type="password" name="passwd" class="form-control" minlength="6" placeholder="密码 (至少六位)" required>
                            <div class="invalid-feedback">
                                请设置一个有效密码（不低于 6 位）
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-key fa fa-fw"></i></span></div>
                            <input id="input-pwd-repeat" type="password" name="repasswd" class="form-control" minlength="6" data-equal-to="#input-pwd" placeholder="确认密码" required>
                            <div class="invalid-feedback">
                                两次输入的密码不一致
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <button id="btn-reg" type="submit" class="mt-2 btn btn-outline-primary btn-block">立即注册</button>
        </form>
    </div>

</div>
