<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> 首页</a></li>
        <li class="breadcrumb-item active" aria-current="page">管理后台</li>
        <li class="breadcrumb-item active" aria-current="page">入场检票</li>
	</ol>
</nav>

<div class="lwl-content">
    <h2 class="text-center">入场检票</h2>
    <div class="input-group">
        <input type="number" id="t_num" class="form-control" placeholder="七位数字" oninput="if(value.length>7)value=value.slice(0,7)">
        <span class="input-group-btn">
            <button id="t_btn" class="btn btn-outline-primary" type="button">入场</button>
        </span>
    </div>

    <p style="text-align:center">直接输入七位数字，如 0023123，代表票号 0023，校验码 123</p>

    <p style="text-align:center">输入到第七位时自动提交：
        <label class="switch">
            <input type="checkbox" id="auto-post" checked>
            <span class="switch-checkbox"></span>
        </label>
    </p>

    <hr>

    <h4 class="text-center">扫描二维码</h4>
    <video id="preview" class="center" style="max-width:100%;max-height:400px"></video>
    <div id="switch-cam" style="text-align:center"></div>

    <hr>

    <small><span id="log"></span></small>

    <?php $csrf = array( 'name' => $this->security->get_csrf_token_name(), 'hash' => $this->security->get_csrf_hash() );?>
    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

</div>
