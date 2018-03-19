<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> 首页</a></li>
        <li class="breadcrumb-item active" aria-current="page">账号异常</li>
	</ol>
</nav>

<div class="lwl-content">
    <h2 class="text-center">找回密码 / 激活账号</h2>
    <div>
        <?php echo form_open('/user/can_not_login', 'id="form-forgot" class="mt-3" onsubmit="return false"'); ?>
            <fieldset>
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-at fa-fw"></i></span></div>
                            <input id="input-email" type="email" class="form-control" placeholder="邮箱" value="<?php echo $id ?>" data-validation-message="请输入正确的邮箱地址" required>
                        </div>
                    </div>
                </div>
            </fieldset>

            <button id="btn-forgot" type="submit" class="btn btn-primary btn-block">发送邮件</button>
        </form>
    </div>

</div>
