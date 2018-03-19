<ol class="am-breadcrumb">
<li><a href="/" class="am-active am-icon-home">首页</a></li>
<li><a class="am-active">找回密码 / 激活账号</a></li>
</ol>

<div class="lwl-content">
    <h2 class="text-center">找回密码 / 激活账号</h2>
    <div class="am-g">
        <?php echo form_open('/user/can_not_login', 'id="form-forgot" class="am-form" onsubmit="return false"'); ?>
            <fieldset>
                <div class="am-u-lg-12">
                    <div class="am-form-group">
                        <div class="am-input-group">
                            <span class="am-input-group-label"><i class="am-icon-at am-icon-fw"></i></span>
                            <input id="input-email" type="email" class="am-form-field" placeholder="邮箱" value="<?php echo $id ?>" data-validation-message="请输入正确的邮箱地址" required>
                        </div>
                    </div>
                </div>
            </fieldset>

            <button id="btn-forgot" type="submit" class="am-btn am-btn-primary am-btn-block">发送邮件</button>
        </form>
    </div>

</div>
