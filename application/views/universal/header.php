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

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="topnav">
    <a class="navbar-brand" href="#">
    <!-- <img src="assets/i/logo.png" width="125" height="292" alt=""> -->
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php if($logged === true): ?>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="">首页 <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
<?php endif; ?>
</nav>


<div class="container">
