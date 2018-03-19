<ol class="am-breadcrumb">
<li><a class="am-icon-home">管理面板</a></li>
<li><a class="am-active">实时数据</a></li>
</ol>

<div class="lwl-content" style="margin-top:1em">
    <h2 class="text-center"></h2>
    <p class="text-center">
        总用户数：<span id="user-num"> <?php echo $data['user_num'] ?> </span>
        <br>
        已激活用户数：<span id="active-user-num"> <?php echo $data['active_user_num'] ?> </span>
        <br><br>
        普通门票数：<span id="normal-ticket-num"> <?php echo $data['normal_ticket_num'] ?> </span>
        <br>
        内部门票数：<span id="staff-ticket-num"> <?php echo $data['staff_ticket_num'] ?> </span>
        <br>
    </p>
</div>