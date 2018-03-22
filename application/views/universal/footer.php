</div>
<div class="copyright">
    Made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://lwl.moe/" target="_blank">lwl12</a>
    <br>
    &copy; 2018 <a href="https://github.com/liwanglin12/LTicket" target="_blank">LWL Networks</a>, All rights reserved.
</div>

</div>

<!--<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>-->

<!--[if lt IE 9]>
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/assets/js/jquery-3.2.1.min.js"></script>
<!--<![endif]-->
<script src="/assets/js/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="/assets/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="/assets/js/global.js"></script>
<?php
    for ($i=1;$i<=count($add_js);$i++) {
        echo '<script src="/assets/js/'. $add_js[$i-1] . '"></script>' . PHP_EOL;
    }
?>

</body>
</html>
