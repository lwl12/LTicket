<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> 首页</a></li>
        <li class="breadcrumb-item active" aria-current="page">预约订票</li>
	</ol>
</nav>


<div class="lwl-content">
    <h2 class="text-center">完善信息</h2>

    <div class="login-info-form bs-center" style="max-width:640px;margin-bottom:1rem">
        <div class="alert alert-warning mt-3 mb-3">
        <p><small>
            1. 请确保所填写的信息真实准确，一旦提交，无法修改；
            <br>
            2. 手机号将作为您参加相关活动的重要依据，请您务必确保填写无误；
            <br>
            3. 请勿恶意提交。
        </small></p>
        </div>

        <div class="ticket-book-1">
            <div class="g">
                <form id="form-book" class="form" onsubmit="return false">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user fa-fw"></i></span></div>
                                <input id="input-name" type="text" class="form-control" placeholder="姓名" data-validation-message="请填写正确的姓名" value="<?php echo $user['username'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                    <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone fa-fw"></i></span></div>
                                <input id="input-phone" type="text" class="form-control js-pattern-mobile" placeholder="手机号" data-validation-message="请输入11位大陆手机号" value="<?php echo $user['phone'] ?>" required>
                            </div>
                    </div>
                    <?php $csrf = array( 'name' => $this->security->get_csrf_token_name(), 'hash' => $this->security->get_csrf_hash() );?>
                    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                    <button id="btn-book" type="button" class="btn btn-primary btn-block">预约！</button>
                </form>
            </div>
        </div>

    </div>
</div>
