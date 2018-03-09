<ol class="am-breadcrumb">
<li><a class="am-active am-icon-home">首页</a></li>
</ol>

<div class="am-alert am-alert-success am-alert-icon-sm" data-am-alert>
    <button type="button" class="am-close">&times;</button>
    <span class="am-icon-check-circle"></span>
    <p>喵喵喵，这里是系统通知~</p>
</div>

<div class="lwl-content">
    <p class="am-text-center">
        <?php
        echo "Welcome, ".$user['username']." !".PHP_EOL;
        ?>
    </p>

    <p class="am-text-center">
        您的预约时间： <br> <?php echo $startTime ?> <br> 至  <br> <?php echo $endTime ?>
    </p>

    <div class="am-g doc-am-g" style="margin-bottom:0.5rem">
        <div class="am-u-lg-6" style="margin-bottom:0.5rem">
            <a href="/main/book" type="button" class="am-btn am-btn-primary am-btn-block">立即预约</a>
        </div>
        <div class="am-u-lg-6">
            <a href="/main/myTicket" type="button" class="am-btn am-btn-primary am-btn-block">我的邀请函</a>
        </div>
    </div>

</div>
