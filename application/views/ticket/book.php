<ol class="am-breadcrumb">
<li><a href="/" class="am-icon-home">票务系统</a></li>
<li><a href="/main/book" class="am-active">预约订票</a></li>
</ol>

<div class="lwl-content">
    <h2 class="am-text-center">完善信息</h2>

    <div class="login-info-form am-center" style="max-width:640px;margin-bottom:1rem">
        <div class="am-alert am-alert-warning" style="margin:0 0.625rem 1em 0.625rem">
        <p><small>
            1. 请确保所填写的信息真实准确，一旦提交，无法修改；
            <br>
            2. 手机号将作为您参加晚会抽奖的重要依据，请您务必确保填写无误；
            <br>
            3. 请勿恶意提交。
        </small></p>
        </div>

        <div class="ticket-book-1">
            <div class="am-g">
                <form id="form-book" class="am-form" onsubmit="return false">
                    <div class="am-u-lg-12">
                        <div class="am-form-group">
                            <div class="am-input-group">
                                <span class="am-input-group-label"><i class="am-icon-user am-icon-fw"></i></span>
                                <input id="input-name" type="text" class="am-form-field" placeholder="姓名" data-validation-message="请填写正确的姓名" value="<?php echo $user['name'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-lg-12">
                    <div class="am-form-group">
                            <div class="am-input-group">
                                <span class="am-input-group-label"><i class="am-icon-phone am-icon-fw"></i></span>
                                <input id="input-phone" type="text" class="am-form-field js-pattern-mobile" placeholder="手机号" data-validation-message="请输入11位大陆手机号" value="<?php echo $user['phone'] ?>" required>
                            </div>
                    </div>

                    <script src='https://www.recaptcha.net/recaptcha/api.js'></script>
                    <div id='recaptcha' class="g-recaptcha" data-sitekey="6LdslDkUAAAAAHTvBo2zPzsrqSSoQZHKjlKRjokw" data-callback="PostForm" data-size="invisible"></div>
                    <button id="btn-book" type="button" class="am-btn am-btn-primary am-btn-block">预约！</button>
                </form>
            </div>
        </div>

    </div>
</div>