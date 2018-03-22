LTicket
===============
一个基于 CodeIgniter 编写的活动预约与检录程序

介绍
--
不知道咋写文案，大概就是给大型活动用的东西……
做出来了的功能差不多就是下面这些：

 - 活动预约
 - 检票
   - 有一个还算好用的二维码检票功能
 - 管理后台
   - 挺完善的用户管理
   - 以及门票管理
   - 另外当然可以设置相关预约参数
   - 还可以看到实时的预约和进场数据
 - 看起来比较舒服的 UI (基于 BootStrap)
 - 安全性不错（比如表单全加了反 CSRF 验证）


安装说明
--
1. 下载所有源代码并解压至网站目录
2. （Nginx 用户）编辑网站的 conf 文件，添加以下代码：
`   location / {
        try_files $uri $uri/ /index.php;
    }`
3. 确保网站 application 目录下的 cache 和 config 目录可写，然后访问安装地址：https://your-domain.example/setup (推荐用 HTTPS ，否则二维码扫描会因为浏览器安全策略不可用)
4. 在安装程序里填写相关信息，然后安装
5. 然后就可以了 √

使用说明
--
 - 程序的配置文件分散在 application/config，主要的配置文件如下，可以自行编辑
   - 数据库相关：database.php
   - 邮件相关：email.php
 - 程序在 PHP7.0 和 Mysql 5.6 下测试通过，可以自行尝试较低版本，理论上能支持到 PHP 5.4。

还有一点点话要说
--
代码写的不是很好= =如果能帮到你的话就再好不过啦，也欢迎一起来完善~
本程序使用 MIT 协议授权，可以在协议范围内随意使用。

LTicket 使用了以下开源程序：
 - 轻量级 PHP 开发框架 [CodeIgniter](http://codeigniter.com/)
 - 强大的前端框架 [Bootstrap](https://getbootstrap.com/)
 - 用户系统模块 [ion Auth](https://github.com/benedmunds/CodeIgniter-Ion-Auth)
 - Gravatar 头像获取模块 [Codeigniter-Gravatar](https://github.com/ivantcholakov/Codeigniter-Gravatar)
 - 二维码生成模块 [Ciqrcode](http://phpqrcode.sourceforge.net/)
 - [Jquery](https://jquery.com/)

 因开发周期有点长所以可能会漏掉一些，如果你的项目被漏掉了请一定要提 issue 告诉我哦，非常抱歉_(:з」∠)_

 特别感谢
 --
 @METOWOLF @Fly3949 的全程协助
