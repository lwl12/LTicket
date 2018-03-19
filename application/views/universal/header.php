<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <base href='<?php echo base_url();?>' />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LTicket</title>
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
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

<nav class="navbar navbar-expand-lg navbar-dark"  id="topnav">
  <a class="navbar-brand" href="/"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" style="position:relative; z-index:99999;" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <?php if($logged): ?>
        <li class="nav-item <?php if($this->router->fetch_method() === 'index') echo 'active'; ?>">
          <a class="nav-link" href="/">首页</a>
        </li>
        <li class="nav-item <?php if($this->router->fetch_method() === 'profile') echo 'active'; ?>">
          <a class="nav-link" href="/main/profile">个人中心</a>
        </li>
        <li class="nav-item <?php if($this->router->fetch_method() === 'myTicket') echo 'active'; ?>">
          <a class="nav-link" href="/main/myTicket">我的邀请函</a>
        </li>
        <?php if($user['admin']): ?>
       <li class="nav-item dropdown <?php if($this->router->fetch_class() === 'Admin') echo 'active'; ?>">
         <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           管理面板
         </a>
         <div class="dropdown-menu">
           <a class="dropdown-item <?php if($this->router->fetch_method() === 'users') echo 'active'; ?>" href="/admin/users">用户管理</a>
           <a class="dropdown-item <?php if($this->router->fetch_method() === 'tickets') echo 'active'; ?>" href="/admin/tickets">票务管理</a>
           <a class="dropdown-item <?php if($this->router->fetch_method() === 'enter') echo 'active'; ?>" href="/admin/enter">入场检票</a>
           <a class="dropdown-item <?php if($this->router->fetch_method() === 'data') echo 'active'; ?>" href="/admin/data">实时数据</a>
         </div>
       </li>
       <?php endif; ?>
    </ul>
    <span class="navbar-text mr-2">你好，<?=$user['username']?></span>
    <a id="a-logout" href="javascript:;"><button class="btn btn-outline-warning my-2 my-sm-0 my-lg-0" type="text">退出</button></a>
    <?php endif; ?>
  </div>
</nav>

<div class="container">
