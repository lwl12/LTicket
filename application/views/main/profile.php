<ol class="am-breadcrumb">
<li><a href="/main/profile" class="am-active am-icon-home">个人中心</a></li>
</ol>

<div class="lwl-content">
    <img class="am-img-thumbnail am-circle am-center" src="<?php echo '/api/gravatar/'.$user['email']; ?>" width="140" height="140" />

    <p class="am-text-center">
        用户名：<?php echo $user['username']; ?>
        <br>
        邮箱：<?php echo $user['email']; ?>
        <br>
        手机号：<?php echo $user['phone']; ?>
        <br>
        注册时间：<?php echo $user['created_on']; ?>
        <br>
        上次登录：<?php echo $user['last_login']; ?>
        <br>
    </p>

    <div class="am-g am-center" style="margin-top:0.5rem;margin-bottom:0.5rem;max-width:600px;">
        <button type="button" id="cpw-prompt-toggle" class="am-btn am-btn-primary am-btn-block am-center">修改密码</button>
    </div>
</div>
<?php $csrf = array( 'name' => $this->security->get_csrf_token_name(), 'hash' => $this->security->get_csrf_hash() );?>
<div class="am-modal am-modal-prompt" tabindex="-1" id="cpw-prompt">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">
    修改密码
    <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
    </div>
    <div class="am-modal-bd">
      <input id="user-cpw-old-pw" type="password" placeholder="原密码" class="am-modal-prompt-input">
      <input id="user-cpw-new-pw" type="password" placeholder="新密码" class="am-modal-prompt-input">
      <input id="user-cpw-confirm-pw" type="password" placeholder="重复输入新密码" class="am-modal-prompt-input">
      <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
    </div>
    <div class="am-modal-footer">
      <button type="button" class="am-btn am-modal-btn am-btn-default am-btn-hollow"  data-am-modal-cancel>取消</button>
      <button type="button" class="am-btn am-modal-btn am-btn-primary" data-am-modal-confirm>修改</button>
    </div>
  </div>
</div>
