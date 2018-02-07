<div class="header-wrapper">
    <div class="container" style="margin-bottom: 5px;">
        <div class="row">
            <div class="col-lg-3 col-xl-3 col-md-6 col-xs-6 col-sm-6">
                <div class="subscribe">
                    <p>{{ trans('lang.header_subcrible') }}</p>
                    <input type="email" placeholder="{{ trans('lang.header_email') }}" /><br>
                    <input type="button" value="{{ trans('lang.header_emailBtn') }}" /><br>
                    <form action="">
                        <input type="radio" name="lang" onclick="handleClick(this);" value="en" <?php if(config('app.locale') == 'en') echo 'checked' ?>>
                        <img src="{{ asset("images/uk.png") }}">
                        English
                        <input type="radio" name="lang" onclick="handleClick(this);" value="tha" <?php if(config('app.locale') == 'tha') echo 'checked' ?>>
                        <img src="{{ asset("images/thailand.png") }}">
                        Thailand<br>
                    </form>
                    <br>
                </div>
            </div>
            <div class="col-lg-6 col-xl-6 col-md-6 col-xs-6 col-sm-6">
                <div id="logo">
                    <img src="{{ asset("images/logo.png") }}">
                </div>
            </div>
            <div class="col-lg-3 col-xl-3 hidden-md hidden-sm hidden-xs">
                <div class="social">
                    <form action="mailto:">
                        <button>
                            <span class="icon icon-envelope"> {{ trans('lang.header_emailMe') }}</span>
                        </button>
                    </form>
                    <br>
                    <a href="{{ env('INSTAGRAM_URL') }}" target="_blank" style="text-decoration: none">
                        <span id="span-social" class="icon icon-instagram fa fa-instagram"></span>
                    </a>
                    <a href="{{ env('FACEBOOK_URL') }}" target="_blank" style="text-decoration: none">
                        <span id="span-social" class="icon icon-facebook fa fa-facebook"></span>
                    </a>
                    <a href="{{ env('YOUTUBE_URL') }}" target="_blank" style="text-decoration: none">
                        <span id="span-social" class="icon icon-youtube-sign fa fa-youtube-play"></span>
                    </a>
                    <br>

                    @if($_SERVER['REQUEST_URI'] == '/tha' || $_SERVER['REQUEST_URI'] == '/en' || (strpos($_SERVER['REQUEST_URI'], '/category/') > 0))
                    <form action="" role="search" class="search-form">
                        <input type="submit" value="" class="search-submit">
                        <input type="search" name="q" class="search-text" placeholder="Search..." autocomplete="off">
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function handleClick(lang) {
        var currentUrl = document.location.href;

        var protocol = document.location.protocol; //"http:"
        var host = document.location.hostname;  // "stackoverflow.com",

        var domain = protocol + '//' + host + ':8000';

        if(lang.value == 'en') {
            if(currentUrl.indexOf(domain + '/tha') !== -1) {
                var newUrl = currentUrl.replace(domain + '/tha', domain + '/en');
                window.location.href = newUrl;
            }
        }

        if(lang.value == 'tha') {
            if(currentUrl.indexOf(domain + '/en') !== -1) {
                var newUrl = currentUrl.replace(domain + '/en', domain + '/tha');
                window.location.href = newUrl;
            }
        }
    }
</script>