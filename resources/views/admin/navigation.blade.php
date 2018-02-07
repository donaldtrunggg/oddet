<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['isADMIN']) && !$_SESSION['isADMIN'])
    return;
?>
<div class="row">
    <nav class="clearfix">
        <ul class="clearfix">
            <li><a href="/<?php echo config('app.locale') ?>/admin/post" style="color: orange; ">{{ trans('lang.admin_nav_managePost') }}</a></li>
            <li><a href="/<?php echo config('app.locale') ?>/admin/post/insert/" style="color: orange">{{ trans('lang.admin_nav_insertPost') }}</a>
            </li>

            <li><a href="/<?php echo config('app.locale') ?>/admin/instagram" style="color: orange">{{ trans('lang.admin_nav_manageIns') }}</a></li>
            <li><a href="/<?php echo config('app.locale') ?>/admin/instagram/insert/" style="color: orange">{{ trans('lang.admin_nav_insertIns') }}</a></li>
            <li><a href="/logoutAction" style="color: orange">{{ trans('lang.admin_nav_logout') }}</a></li>

        </ul>
        <a href="#" id="pull">Menu</a>
    </nav>
</div>

<script>
    $(function() {
        var pull        = $('#pull');
        var menu        = $('nav ul');
        var menuHeight  = menu.height();

        $(pull).on('click', function(e) {
            e.preventDefault();
            menu.slideToggle();
        });

        $(window).resize(function(){
            var w = $(window).width();
            if(menu.is(':hidden')) {
                menu.removeAttr('style');
            }
        });
    });
</script>