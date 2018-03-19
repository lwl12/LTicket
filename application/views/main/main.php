<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home" aria-hidden="true"></i> 首页</li>
	</ol>
</nav>

<div class="alert alert-info" role="alert">
	<i class="fa fa-check-circle-o" aria-hidden="true"></i> 喵喵喵，这里是系统通知~
</div>

<div class="lwl-content">
	<p class="text-center">
		你好，
		<?=$user['username']?>
	</p>


	<table class="mx-auto">
		<tr>
			<td class="text-center mr-5">
				<b>门票发放计划</b><br> 29 日 22:23 - 666 张<br> 30 日 18:17 - 余下所有！
			</td>
			<td class="text-center">
				<b>您可在以下时间段内进行门票预约</b> <br>
				<span class="badge badge-pill badge-success">自</span>
				<?=$startTime?> <br> <span class="badge badge-pill badge-danger">至</span><?=$endTime?>
			</td>
		</tr>
	</table>




	<div style="margin-top:2em;">
		<p class="text-center"><b>今日门票剩余：</b></p>
		<div class="progress" style="margin-bottom:0.5rem; height: 20px;">
			<div class="progress-bar bg-info" role="progressbar" style="width: <?=$remainPercent?>%" aria-valuenow="<?=$remainPercent?>" aria-valuemin="0" aria-valuemax="100">
				<?=$remainPercent?>%</div>
		</div>
	</div>

	<div style="margin-top:2em; text-align: center;" class="">
		<a href="/main/book"><button type="button" class="btn btn-outline-success btn-lg mr-5">立即预约</button></a>
		<a href="/main/myTicket"><button type="button" class="btn btn-outline-info btn-lg">我的邀请函</button></a>
	</div>

</div>
