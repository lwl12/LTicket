<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> 首页</a></li>
        <li class="breadcrumb-item active" aria-current="page">管理后台</li>
        <li class="breadcrumb-item active" aria-current="page">实时数据</li>
	</ol>
</nav>

<div class="lwl-content" style="margin-top:1em">
    <h2 class="text-center"></h2>
    <p class="text-center">
        总用户数：<span id="user-num"> <?=$data['user_num']?> </span>
        <br>
        已激活用户数：<span id="active-user-num"> <?=$data['active_user_num']?> </span>
        <br><br>
        普通门票数：<span id="normal-ticket-num"> <?=$data['normal_ticket_num']?> </span>
        <br>
        内部门票数：<span id="staff-ticket-num"> <?=$data['staff_ticket_num']?> </span>
        <br>
    </p>
</div>
