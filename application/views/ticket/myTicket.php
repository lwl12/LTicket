<ol class="am-breadcrumb">
<li><a href="/" class="am-icon-home">票务系统</a></li>
<li><a href="/main/myTicket" class="am-active">我的门票</a></li>
</ol>

<div class="lwl-content">
    <h2 class="am-text-center">我的邀请函</h2>

    <div class="am-center" style="max-width:640px;margin-bottom:1rem">

        <div class="am-alert am-alert-success" style="margin:0 0.625rem 1em 0.625rem">
            <small>
                <li>点击邀请函，可通过二维码快速入场！</li>
                <li>请妥善保管您的编号和验证码哦！</li>
            </small>
        </div>
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

                if ($t['status'] == 1) echo '<span class="am-badge am-badge-success am-radius">未使用</span>';
                if ($t['status'] == 2) echo '<span class="am-badge am-badge-warning am-radius">已使用</span>';
                if ($t['status'] == -1) echo '<span class="am-badge am-badge-danger am-radius">已作废</span>';

                if ($t['class'] == 1) echo '<span class="am-badge am-badge-primary am-round">普通座</span>';
                if ($t['class'] == 2) echo '<span class="am-badge am-badge-danger am-round">VIP 座</span>';

                echo "<span class=\"am-badge am-badge-secondary am-radius\">$time</span>";
                if ($t['status'] == 2) echo "<span class=\"am-badge am-badge-secondary am-radius\">$time2</span>";

                echo"</p>
                </div>
                <hr>
                ";
            }
        }
        ?>

    </div>
</div>

<div class="am-modal am-modal-no-btn" tabindex="-1" id="qrcode-modal">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">二维码
      <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
    </div>
    <div class="am-modal-bd" style="text-align:center">
      <img id="qrcode-url" class="am-center" style="max-width:100%">
      入场时，您可以直接出示该二维码;
      <br>
      不要把二维码发送给别人哦！
    </div>
  </div>
</div>