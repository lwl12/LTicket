<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> 首页</a></li>
        <li class="breadcrumb-item active" aria-current="page">重设密码</li>
	</ol>
</nav>

<div class="lwl-content">
    <h2 class="text-center">重设密码</h2>
    <div class="g">
        <form id="form-reset" class="form" onsubmit="return false">
            <?php $csrf = array( 'name' => $this->security->get_csrf_token_name(), 'hash' => $this->security->get_csrf_hash() );?>
            <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
            <fieldset>
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-key fa-fw"></i></span></div>
                            <input id="input-pwd" type="password" class="form-control" minlength="6" maxlength="20" placeholder="新密码 (至少六位)" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-key fa-fw"></i></span></div>
                            <input id="input-pwd-repeat" type="password" class="form-control" minlength="3" maxlength="20" data-equal-to="#input-pwd" placeholder="重复密码 (同上)" data-validation-message="两次输入的密码不一致" required>
                        </div>
                    </div>
                </div>
            </fieldset>
            <button id="btn-reset" type="submit" class="btn btn-primary btn-block">修改密码</button>
        </form>
    </div>
</div>

<script>
    var code = '<?php echo $code ?>' ;
</script>
