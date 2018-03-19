<?php $csrf = array( 'name' => $this->security->get_csrf_token_name(), 'hash' => $this->security->get_csrf_hash() );?>
<div class="login-cover">
    <div class="login-info cf">
        <div class="login-info-form">
            <div class="login-info-form-content">
                <div class="g">
                    <div class="col-lg-12">
                        <div class="login-logo">
                            <img src="assets/i/logo-b.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="input-group">
                             <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user-circle-o fa-fw" aria-hidden="true"></i></span></div>
                            <input id="input-username" type="email" class="form-control" placeholder="注册邮箱">
                        </div>
                    </div>
                    <div class="col-lg-12 mt-1">
                        <div class="input-group">
                             <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-key fa-fw"></i></span></div>
                            <input id="input-pwd" type="password" class="form-control" placeholder="密码">
                        </div>
                        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                    </div>
                </div>
                <div class="g margin-top-lg">
                    <div class="col-md-6 col-lg-6"><a class="login-link" href="/main/forgot_pwd">无法登录？</a></div>
                    <div class="col-md-6 col-lg-12 mt-2">
                        <button type="button" id="btn-login" class="btn btn-outline-success btn-block">登录</button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="login-line">
                        <span class="login-line-font">没有账号？</span>
                    </div>
                </div>
                <div class="login-consociation">
                    <a href="/main/register"><button type="button" type="button" class="btn btn-outline-info btn-block">立即注册</button></a>
                </div>
            </div>
        </div>

        <div class="login-info-cover">
            <div class="login-info-cover-title">
                LTicket
                <div class="login-info-cover-title-small">LWL Networks Technology (Group) Co., Ltd. ʘᴗʘ</div>
                <div class="login-info-cover-line"></div>
            </div>
        </div>

    </div>
</div>
