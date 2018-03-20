<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> 首页</a></li>
        <li class="breadcrumb-item active" aria-current="page">管理后台</li>
        <li class="breadcrumb-item active" aria-current="page">票务管理</li>
	</ol>
</nav>

<div class="lwl-content" style="margin-top:1em">
    <h2 class="text-center">票务管理</h2>

    <div>
        <div>
            <div class="input-group mb-2">
                <select id="tickets-search-key" class="custom-select col-lg-2">
                    <option value="id">票号</option>
                    <option value="name">姓名</option>
                    <option value="phone">手机</option>
                </select>
                <input id="tickets-search-content" type="text" class="form-control">
                <div class="btn-group">
                    <button id="tickets-search-btn" class="btn btn-outline-info" type="button">搜索</button>
                    <button id="sendTicket" class="btn btn-outline-primary">发门票</button>
                </div>
            </div>
        </div>
    </div>
    <div class="scrollable-horizontal">
        <table class="table table-bordered table-radius table-striped">
            <thead>
                <tr>
                    <th>票号</th>
                    <th>姓名</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody id="tickets-tbody">
            </tbody>
        </table>
    </div>

</div>

<div class="modal" tabindex="-1" role="dialog" id="edit-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">修改信息</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="input-group mb-2">
              <span class="input-group-text">持票人 ID：<a id="edit-user"></a></span>
          </div>
          <div class="input-group mb-2">
              <span class="input-group-text">票号</span>
              <input id="edit-tid" type="text" class="form-control" disabled="true">
          </div>
          <div class="input-group mb-2">
              <span class="input-group-text">姓名</span>
              <input id="edit-name" type="text" class="form-control">
          </div>
          <div class="input-group mb-2">
              <span class="input-group-text">手机号</span>
              <input id="edit-phone" type="number" class="form-control">
          </div>
          <div class="input-group mb-2">
              <span class="input-group-text">票类</span>
              <select id="edit-type" class="custom-select">
                  <option value="1">普通票</option>
                  <option value="2">内部票</option>
              </select>
              <!-- <input id="edit-type" type="number" class="form-control"> -->
          </div>
          <div class="input-group mb-2">
              <span class="input-group-text">等级</span>
              <select id="edit-class" class="custom-select">
                  <option value="1">普通座</option>
                  <option value="2">VIP 座</option>
              </select>
              <!-- <input id="edit-class" type="number" class="form-control"> -->
          </div>
          <div class="input-group mb-2">
              <span class="input-group-text">状态</span>
              <select id="edit-status" class="custom-select">
                  <option value="1">未使用</option>
                  <option value="2">已使用</option>
                  <option value="-1">已作废</option>
              </select>
              <!-- <input id="edit-status" type="number" class="form-control"> -->
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn modal-btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn modal-btn btn-primary" id="confirmTED">修改</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="add-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">送票</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="input-group mb-2">
              <span class="input-group-text">邮箱</span>
              <input id="add-email" type="email" class="form-control">
          </div>
          <div class="input-group mb-2">
              <span class="input-group-text">姓名</span>
              <input id="add-name" type="text" class="form-control">
          </div>
          <div class="input-group mb-2">
              <span class="input-group-text">手机号</span>
              <input id="add-phone" type="number" class="form-control">
          </div>
          <div class="input-group mb-2">
              <span class="input-group-text">票类</span>
              <select id="add-type"  class="custom-select">
                  <option value="1">普通票</option>
                  <option value="2">内部票</option>
              </select>
          </div>
          <div class="input-group mb-2">
              <span class="input-group-text">等级</span>
              <select id="add-class"  class="custom-select">
                  <option value="1">普通座</option>
                  <option value="2">VIP 座</option>
              </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn modal-btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn modal-btn btn-primary" id="confirmADT">送票</button>
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
