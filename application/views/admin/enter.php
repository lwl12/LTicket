<ol class="am-breadcrumb">
<li><a class="am-icon-home">管理面板</a></li>
<li><a class="am-active">入场检票</a></li>
</ol>

<div class="lwl-content">
    <h2 class="am-text-center">入场检票</h2>
    <div class="am-input-group">
        <input type="number" id="t_num" class="am-form-field" placeholder="七位数字" oninput="if(value.length>7)value=value.slice(0,7)">
        <span class="am-input-group-btn">
            <button id="t_btn" class="am-btn am-btn-primary" type="button">入场</button>
        </span>
    </div>

    <p style="text-align:center">直接输入七位数字，如 0023123，代表票号 0023，校验码 123</p>

    <p style="text-align:center">输入到第七位时自动提交：
        <label class="am-switch">
            <input type="checkbox" id="auto-post" checked>
            <span class="am-switch-checkbox"></span>
        </label>
    </p>

    <hr>

    <h4 class="am-text-center">扫描二维码</h4>
    <video id="preview" class="am-center" style="max-width:100%;max-height:400px"></video>
    <div id="switch-cam" style="text-align:center"></div>

    <hr>

    <small><span id="log"></span></small>

    <?php $csrf = array( 'name' => $this->security->get_csrf_token_name(), 'hash' => $this->security->get_csrf_hash() );?>
    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
    
</div>
