<div class="row">
    <nav class="clearfix">
        <ul class="clearfix">
            <li><a href="/<?php echo config('app.locale') ?>">{{ trans('lang.nav_home') }}</a></li>
            <li><a href="/<?php echo config('app.locale') ?>/category/travel">{{ trans('lang.nav_travel') }}</a></li>
            <li><a href="/<?php echo config('app.locale') ?>/category/foodie">{{ trans('lang.nav_foodie') }}</a></li>
            <li><a href="/<?php echo config('app.locale') ?>/category/cooking">{{ trans('lang.nav_cooking') }}</a></li>
            <li><a href="/<?php echo config('app.locale') ?>/category/lifestyle">{{ trans('lang.nav_lifestyle') }}</a></li>
            <li><a href="/<?php echo config('app.locale') ?>/gallery">{{ trans('lang.nav_gallery') }}</a></li>
        </ul>
        <a href="#" id="pull">Menu</a>

    </nav>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var menu        = $('nav ul');
        var menuHeight  = menu.height();

        $('#pull').on('click', function(e) {
            console.log('dw');
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