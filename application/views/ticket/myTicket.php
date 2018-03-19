<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> 首页</a></li>
        <li class="breadcrumb-item active" aria-current="page">我的邀请函</li>
	</ol>
</nav>

<div class="lwl-content">
    <h2 class="text-center">我的邀请函</h2>

    <div class="bs-center" style="max-width:640px; margin-bottom:1rem">

        <div class="alert alert-success" style="margin-top: 2em">
            <small>
                <li>点击邀请函，可通过二维码快速入场！</li>
                <li>请妥善保管您的编号和验证码哦！</li>
            </small>
        </div>
        <hr>
        <?php
        if(count($ticket) == 0) {
            echo '<p style="text-align:center">无记录，请先预约！</p>';
        } else {
            foreach ($ticket as $t) {
                $id = sprintf("%04d", $t['id']);
                $code = $t['checkCode'];
                $time = date("Y-m-d H:i:s", $t['time_create']);
                $time2 = date("Y-m-d H:i:s", $t['time_use']);
                echo '<div class="ticket-box">';
                echo '<img class="ticket-img" style="cursor:pointer" code="'.$id.$code.'" src="/ticket/getImg/'.$t['id'].'">';
                echo '<p class="detail">';

                if ($t['status'] == 1) echo '<span class="badge badge-success mr-1">未使用</span>';
                if ($t['status'] == 2) echo '<span class="badge badge-warning mr-1">已使用</span>';
                if ($t['status'] == -1) echo '<span class="badge badge-danger mr-1">已作废</span>';

                if ($t['class'] == 1) echo '<span class="badge badge-primary mr-1">普通座</span>';
                if ($t['class'] == 2) echo '<span class="badge badge-danger mr-1">VIP 座</span>';

                echo "<span class=\"badge badge-info mr-1\">预约时间 $time</span>";
                if ($t['status'] == 2) echo "<span class=\"badge badge-dark mr-1\">使用时间 $time2</span>";

                echo"</p></div><hr>";

            }
        }
        ?>

    </div>
</div>


<div class="modal modal-no-btn" tabindex="-1" role="dialog" id="qrcode-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">二维码</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
          <img id="qrcode-url" style="max-width:100%">
          <p>入场时，您可以直接出示该二维码</p>
          <p>不要把二维码发送给别人哦！</p>
      </div>
    </div>
  </div>
</div>
