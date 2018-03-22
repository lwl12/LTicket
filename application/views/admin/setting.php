<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> 首页</a></li>
        <li class="breadcrumb-item active" aria-current="page">管理后台</li>
        <li class="breadcrumb-item active" aria-current="page">参数设置</li>
	</ol>
</nav>

<div class="lwl-content">
    <h2 class="text-center">参数设置</h2>
	<div class="input-group mt-3">
		<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar-o fa-fw" aria-hidden="true"></i>&nbsp;预约开始时间</span></div>
		<input id="input-startdate" type="datetime-local" class="form-control" value="<?=$startdate?>" required>
	</div>
	<div class="input-group mt-2">
		<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i>&nbsp;预约结束时间</span></div>
		<input id="input-finaldate" type="datetime-local" class="form-control" value="<?=$finaldate?>" required>
	</div>

	<div class="input-group mt-2">
		<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-ticket fa-fw" aria-hidden="true"></i>&nbsp;总计发行票数</span></div>
		<input id="input-alltnum" type="number" class="form-control" value="<?=$alltnum?>" required>
	</div>

	<div class="input-group mt-2">
		<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-arrow-circle-up fa-fw" aria-hidden="true"></i>&nbsp;单人持票上限</span></div>
		<input id="input-pertnum" type="number" class="form-control" value="<?=$pertnum?>" required>
	</div>

	<button type="button" id="confirmSED" class="btn btn-outline-primary btn-lg btn-block mt-4">确定</button>

    <?php $csrf = array( 'name' => $this->security->get_csrf_token_name(), 'hash' => $this->security->get_csrf_hash() );?>
    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

</div>
