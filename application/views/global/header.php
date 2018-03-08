<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <base href='<?php echo base_url();?>' />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LTicket</title>
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <link rel="stylesheet" href="assets/css/amazeui.css"/>
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <?php
    for ($i=1; $i<=count($add_css); $i++) {
        echo '<link href="assets/css/'. $add_css[$i-1] . '" rel="stylesheet">' . PHP_EOL;
    }
    ?>
</head>
<body>

<!--[if lte IE 8]>
<div class="ie-must-go-die">
  <div class="ie-container">
    <h1>
      您正在使用IE
    </h1>
    <p>
      少女H也曾依赖过IE，借此来窥探这个世界。
      <br>
      但IE毕竟已然老去，早已无法适应这个绚丽的时代。
      <br>
      他的职责既已完成，不如就任其安然睡去吧——
      <br>
      毕竟，这个时代是属于现代浏览器的。
    </p>
    <a href="https://api.i-meto.com/chrome" target="_blank">
      您可以点击此处，下载Chrome后再次打开本页面。
    </a>
  </div>
</div>
<![endif]-->

 <header class="am-topbar am-topbar-inverse">
    <h1 class="am-topbar-brand">
        <a href="" class="am-text-ir"></a>
    </h1>

<?php
if ($logged) {
    echo '
    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-secondary am-show-sm-only" data-am-collapse="{target: \'#doc-topbar-collapse-2\'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>
    <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse-2">
    <ul class="am-nav am-nav-pills am-topbar-nav">
      <li><a href="/">首页</a></li>
      <li><a href="/main/profile">个人中心</a></li>
      <li><a href="/main/myTicket">我的邀请函</a></li>';

    if ($user['admin']) {
        echo '
        <li class="am-dropdown" data-am-dropdown>
            <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                管理面板 <span class="am-icon-caret-down"></span>
            </a>
            <ul class="am-dropdown-content">
                <li><a href="/admin/users">用户管理</a></li>
                <li><a href="/admin/tickets">票务管理</a></li>
                <li><a href="/admin/enter">入场检票</a></li>
                <li><a href="/admin/data">实时数据</a></li>
            </ul>
        </li>
        ';
    }

    echo'
    </ul>

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
        <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle="" href="javascript:;">
            Welcome, '.$user['username'].'
            <span class="am-icon-caret-down"></span>
            </a>
        <ul class="am-dropdown-content">
            <li><a href="/main/profile">个人中心</a></li>
        </ul>
        </li>
        <li><a id="a-logout" href="javascript:;"><span class="am-icon-close"></span> 退出</a></li>
    </ul>
    </ul>
    </div>
        ';
}
?>
</header>

<div class="am-cf admin-main">
<div class="am-container">
