<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> 首页</a></li>
        <li class="breadcrumb-item active" aria-current="page">个人中心</li>
	</ol>
</nav>

<div class="lwl-content">
    <img class="img-thumbnail rounded-circle bs-center" src="/api/gravatar/<?=$user['email']?>" width="140" height="140" />

    <table class="table table-striped table-bordered mt-3 text-center" style="margin: auto; max-width: 500px;">
  <tbody>
    <tr>
      <th scope="row">用户名</th>
      <td><?=$user['username']?></td>
    </tr>
    <tr>
      <th scope="row">邮箱</th>
      <td><?=$user['email']?></td>
    </tr>
    <tr>
      <th scope="row">手机号</th>
      <td><?=$user['phone']?></td>
    </tr>
    <tr>
      <th scope="row">注册时间</th>
      <td><?=$user['created_on']?></td>
    </tr>
    <tr>
      <th scope="row">上次登录</th>
      <td><?=$user['last_login']?></td>
    </tr>
  </tbody>
</table>

    <div class="bs-center" style="margin-top:2rem;margin-bottom:0.5rem;max-width:600px;">
        <button type="button" id="cpw-prompt-toggle" class="btn btn-info btn-block bs-center">修改密码</button>
    </div>
</div>

<?php $csrf = array( 'name' => $this->security->get_csrf_token_name(), 'hash' => $this->security->get_csrf_hash() );?>


<div class="modal" tabindex="-1" role="dialog" id="cpw-prompt">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">修改密码</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="input-group mb-3"><input id="user-cpw-old-pw" type="password" placeholder="原密码" class="form-control"></div>
          <div class="input-group mb-3"><input id="user-cpw-new-pw" type="password" placeholder="新密码" class="form-control"></div>
          <div class="input-group mb-3"><input id="user-cpw-confirm-pw" type="password" placeholder="重复输入新密码" class="form-control"></div>
          <input class="form-control" type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn modal-btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn modal-btn btn-primary" id="confirmCPW">修改</button>
      </div>
    </div>
  </div>
</div>
