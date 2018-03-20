<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> 首页</a></li>
        <li class="breadcrumb-item active" aria-current="page">管理后台</li>
        <li class="breadcrumb-item active" aria-current="page">用户管理</li>
	</ol>
</nav>

<div class="lwl-content" style="margin-top:1em">
    <h2 class="text-center">用户管理</h2>

    <div>
        <div>
            <div class="input-group">
                <select class="custom-select col-lg-2" id="users-search-key">
                    <option value="id" selected>UID</option>
                    <option value="username">用户名</option>
                    <option value="email">邮箱</option>
                </select>
                <input id="users-search-content" type="text" class="form-control">
                <span class="input-group-btn">
                    <button id="users-search-btn" class="btn btn-outline-primary" type="button">搜索</button>
                </span>
            </div>
        </div>
    </div>
    <div class="mt-2    ">
        <table class="table table-bordered table-radius table-striped">
            <thead>
                <tr>
                    <th>用户名</th>
                    <th>邮箱</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody id="users-tbody">
            </tbody>
        </table>
    </div>

</div>


<div class="modal" tabindex="-1" role="dialog" id="edit-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">修改资料</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="input-group mb-2">
              <span class="input-group-text">邮箱</span>
              <input id="edit-email" type="text" class="form-control">
          </div>
          <div class="input-group mb-2">
              <span class="input-group-text">用户名</span>
              <input id="edit-username" type="text" class="form-control">
          </div>
          <div class="input-group mb-2">
              <span class="input-group-text">手机号</span>
              <input id="edit-phone" type="text" class="form-control">
          </div>
          <div class="input-group mb-2">
              <span class="input-group-text">新密码</span>
              <input id="edit-newpw" type="password" class="form-control" placeholder="不修改请留空">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn modal-btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn modal-btn btn-primary" id="confirmUED">修改</button>
      </div>
    </div>
  </div>
</div>

<?php $csrf = array( 'name' => $this->security->get_csrf_token_name(), 'hash' => $this->security->get_csrf_hash() );?>
<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

<script>
<?php
    echo "var uid = $uid;";
?>
</script>
