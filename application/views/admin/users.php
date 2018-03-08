<ol class="am-breadcrumb">
<li><a class="am-icon-home">管理面板</a></li>
<li><a class="am-active">用户管理</a></li>
</ol>

<div class="lwl-content" style="margin-top:1em">
    <h2 class="am-text-center">用户管理</h2>

    <div class="am-g">
        <div class="am-u-lg-3">
            <select id="users-search-key" data-am-selected>
                <option value="id">UID</option>
                <option value="username">用户名</option>
                <option value="email">邮箱</option>
                <option value="name">认证姓名</option>
            </select>
        </div>
        <div class="am-u-lg-9">
            <div class="am-input-group">
                <input id="users-search-content" type="text" class="am-form-field">
                <span class="am-input-group-btn">
                    <button id="users-search-btn" class="am-btn am-btn-default" type="button">搜索</button>
                </span>
            </div>
        </div>
    </div>
    <div class="am-scrollable-horizontal">
        <table class="am-table am-table-bordered am-table-radius am-table-striped">
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

<div class="am-modal am-modal-prompt" tabindex="-1" id="edit-modal">
<div class="am-modal-dialog">
  <div class="am-modal-hd">
  修改资料
  <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
  </div>
  <div class="am-modal-bd">

    <div class="am-input-group">
        <span class="am-input-group-label">邮箱</span>
        <input id="edit-email" type="text" class="am-form-field">
    </div>
    <div class="am-input-group">
        <span class="am-input-group-label">用户名</span>
        <input id="edit-username" type="text" class="am-form-field">
    </div>
    <div class="am-input-group">
        <span class="am-input-group-label">手机号</span>
        <input id="edit-phone" type="text" class="am-form-field">
    </div>
    <div class="am-input-group">
        <span class="am-input-group-label">认证 ID</span>
        <input id="edit-uid" type="text" class="am-form-field">
    </div>
    <div class="am-input-group">
        <span class="am-input-group-label">认证姓名</span>
        <input id="edit-name" type="text" class="am-form-field">
    </div>
    <div class="am-input-group">
        <span class="am-input-group-label">认证年段</span>
        <input id="edit-grade" type="text" class="am-form-field">
    </div>
    <div class="am-input-group">
        <span class="am-input-group-label">认证班级</span>
        <input id="edit-class" type="text" class="am-form-field">
    </div>
    <div class="am-input-group">
        <span class="am-input-group-label">认证座号</span>
        <input id="edit-seatnumber" type="text" class="am-form-field">
    </div>
    <div class="am-input-group">
        <span class="am-input-group-label">新密码</span>
        <input id="edit-newpw" type="password" class="am-form-field" placeholder="不修改请留空">
    </div>

    <button id="users-add-auth" class="am-btn am-btn-primary am-btn-xs">加认证</button>
    <button id="users-remove-auth" class="am-btn am-btn-primary am-btn-xs">删认证</button>

  </div>
  <div class="am-modal-footer">
    <button type="button" class="am-btn am-modal-btn am-btn-default am-btn-hollow"  data-am-modal-cancel>取消</button>
    <button type="button" class="am-btn am-modal-btn am-btn-primary" data-am-modal-confirm>修改</button>
  </div>
</div>
</div>

<script>
<?php
    echo "var uid = $uid;";
?>
</script>