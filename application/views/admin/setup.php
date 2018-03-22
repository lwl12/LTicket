<h2 style="margin-top:1em">欢迎使用 LTicket</h2>
<div class="lwl-content">

<h4>&gt; 我们需要一些信息来初始化运行环境...</h4>
<hr>
<form action="/setup/install" id="form-ins" method="post" accept-charset="utf-8">
    <?php $csrf = array( 'name' => $this->security->get_csrf_token_name(), 'hash' => $this->security->get_csrf_hash() );?>
    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
<div class="alert alert-secondary" role="alert">基本信息</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">管理员邮箱</span>
  </div>
  <input required type="email" class="form-control" placeholder="" name="email" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
     <div class="input-group-prepend">
    <span class="input-group-text">管理员密码</span>
    </div>
  <input required type="password" class="form-control" placeholder="不少于 6 位" name="password" aria-describedby="basic-addon2">
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">数据库地址</span>
  </div>
  <input required type="text" class="form-control" placeholder="" name="dbhost">

    <div class="input-group-prepend">
      <span class="input-group-text">端口</span>
    </div>
    <input required type="number" class="form-control" placeholder="" name="dbport" value="3306">
</div>

<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">数据库用户</span>
    </div>
    <input required type="text" class="form-control" placeholder="" name="dbuser">
  <div class="input-group-prepend">
    <span class="input-group-text">数据库密码</span>
  </div>
  <input type="password" class="form-control" autocomplete="off" name="dbpass">
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">数据库名称</span>
  </div>
  <input required type="text" class="form-control" placeholder="" name="dbname" value="lticket">
</div>

<hr>
<div class="alert alert-secondary" role="alert">邮件（SMTP）服务器信息</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">服务器地址</span>
  </div>
  <input required type="text" class="form-control" placeholder="" name="mxhost">

  <div class="input-group-prepend">
    <span class="input-group-text">端口</span>
  </div>
  <input required type="text" class="form-control" value="465" name="mxport">
</div>

<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">邮箱用户名</span>
    </div>
    <input required type="text" class="form-control" placeholder="" name="mxuser">
  <div class="input-group-prepend">
    <span class="input-group-text">密码</span>
  </div>
  <input required type="password" class="form-control" autocomplete="off" name="mxpass">
</div>

<div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">发信人地址</span>
    </div>
    <input required type="text" class="form-control" placeholder="一般与用户名一致" name="mxname">
  <div class="input-group-prepend">
    <span class="input-group-text">加密</span>
  </div>
  <select class="custom-select" name="mxsec">
    <option selected value="ssl">SSL</option>
    <option value="tls">START TLS</option>
    <option value="">Plain</option>
  </select>
</div>

<button type="submit" class="btn btn-lg btn-outline-success btn-block" style="display: block; margin-top: 2em; margin-bottom: 1em;">开始安装</button>
</form>

</div>
