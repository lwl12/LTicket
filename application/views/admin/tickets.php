<ol class="am-breadcrumb">
<li><a class="am-icon-home">管理面板</a></li>
<li><a class="am-active">票务管理</a></li>
</ol>

<div class="lwl-content" style="margin-top:1em">
    <h2 class="text-center">票务管理</h2>

    <div class="am-g">
        <div class="am-u-lg-3">
            <select id="tickets-search-key" data-am-selected>
                <option value="id">票号</option>
                <option value="name">姓名</option>
                <option value="phone">手机</option>
            </select>
        </div>
        <div class="am-u-lg-7">
            <div class="am-input-group">
                <input id="tickets-search-content" type="text" class="am-form-field">
                <span class="am-input-group-btn">
                    <button id="tickets-search-btn" class="am-btn am-btn-default" type="button">搜索</button>
                </span>
            </div>
        </div>
        <div class="am-u-lg-2">
            <button id="sendTicket" class="am-btn am-btn-primary">发门票</button>
        </div>
    </div>
    <div class="am-scrollable-horizontal">
        <table class="am-table am-table-bordered am-table-radius am-table-striped">
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

<div class="am-modal am-modal-prompt" tabindex="-1" id="edit-modal">
    <div class="am-modal-dialog">
    <div class="am-modal-hd">
    修改信息
    <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
    </div>
    <div class="am-modal-bd">

        <div class="am-input-group">
            <span class="am-input-group-label">持票人 ID：<a id="edit-user"></a></span>
        </div>
        <div class="am-input-group">
            <span class="am-input-group-label">票号</span>
            <input id="edit-tid" type="text" class="am-form-field" disabled="true">
        </div>
        <div class="am-input-group">
            <span class="am-input-group-label">姓名</span>
            <input id="edit-name" type="text" class="am-form-field">
        </div>
        <div class="am-input-group">
            <span class="am-input-group-label">手机号</span>
            <input id="edit-phone" type="number" class="am-form-field">
        </div>
        <div class="am-input-group">
            <span class="am-input-group-label">票类</span>
            <select id="edit-type" data-am-selected>
                <option value="1">普通票</option>
                <option value="2">内部票</option>
            </select>
            <!-- <input id="edit-type" type="number" class="am-form-field"> -->
        </div>
        <div class="am-input-group">
            <span class="am-input-group-label">等级</span>
            <select id="edit-class" data-am-selected>
                <option value="1">普通座</option>
                <option value="2">VIP 座</option>
            </select>
            <!-- <input id="edit-class" type="number" class="am-form-field"> -->
        </div>
        <div class="am-input-group">
            <span class="am-input-group-label">状态</span>
            <select id="edit-status" data-am-selected>
                <option value="1">未使用</option>
                <option value="2">已使用</option>
                <option value="-1">已作废</option>
            </select>
            <!-- <input id="edit-status" type="number" class="am-form-field"> -->
        </div>

    </div>
    <div class="am-modal-footer">
        <button type="button" class="am-btn am-modal-btn am-btn-default am-btn-hollow"  data-am-modal-cancel>取消</button>
        <button type="button" class="am-btn am-modal-btn am-btn-primary" data-am-modal-confirm>修改</button>
    </div>
    </div>
</div>

<div class="am-modal am-modal-prompt" tabindex="-1" id="add-modal">
    <div class="am-modal-dialog">
    <div class="am-modal-hd">
    送票
    <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
    </div>
    <div class="am-modal-bd">

        <div class="am-input-group">
            <span class="am-input-group-label">邮箱</span>
            <input id="add-email" type="email" class="am-form-field">
        </div>
        <div class="am-input-group">
            <span class="am-input-group-label">姓名</span>
            <input id="add-name" type="text" class="am-form-field">
        </div>
        <div class="am-input-group">
            <span class="am-input-group-label">手机号</span>
            <input id="add-phone" type="number" class="am-form-field">
        </div>
        <div class="am-input-group">
            <span class="am-input-group-label">票类</span>
            <select id="add-type" data-am-selected>
                <option value="1">普通票</option>
                <option value="2">内部票</option>
            </select>
        </div>
        <div class="am-input-group">
            <span class="am-input-group-label">等级</span>
            <select id="add-class" data-am-selected>
                <option value="1">普通座</option>
                <option value="2">VIP 座</option>
            </select>
        </div>

    </div>
    <div class="am-modal-footer">
        <button type="button" class="am-btn am-modal-btn am-btn-default am-btn-hollow"  data-am-modal-cancel>取消</button>
        <button type="button" class="am-btn am-modal-btn am-btn-primary" data-am-modal-confirm>添加</button>
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
