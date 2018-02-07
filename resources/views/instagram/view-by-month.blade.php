{{         trans('lang.failed') }}
@include("partials/head")

<link rel="stylesheet" href="/assets/css/main.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<body>
<div class="container-fluid">
    @include("partials.header")
    @include("partials.navigation")
    @include("partials.about")

    @if(count($data) > 0):
    <?php
    $year = $data[0]->year;
    $month = $data[0]->month;
    $monthName = date('F', mktime(0, 0, 0, $month, 10));
    ?>

    <section id="galleries">

        <!-- Photo Galleries -->
        <div class="gallery">
            <header class="special">
                <h2><?php echo $monthName . ' - ' . $year ?></h2>
            </header>
            <div class="content">
                @foreach($data as $item)

                    <?php
                    $link_app = str_replace('https://www.instagram.com/', 'instagram://', $item->link);
                    //                                    $i = $i+1;

                    ?>
                    <div class="media">
                        <span style="position: absolute; margin: 20px; padding: 5px 10px; z-index: 99999; background: #fff; border-radius: 10px; right: 0; bottom: 0;">
                            <i class="fa fa-heart" style="color: red"></i> {{$item->num_like}} likes</span>
                        <a href="<?php echo $item->image; ?>"><img
                                    src="<?php echo $item->image; ?>"
                                    alt=""
                                    data-link="<?php echo $item->link; ?>"
                                    data-linkapp="<?php echo $link_app; ?>"
                                    title="{{$item->num_like}} likes"/></a>
                    </div>
                @endforeach
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('.poptrox-popup .pic').click(function () {
                            $link = localStorage.getItem('link');
                            $linkapp = localStorage.getItem('linkapp');

                            window.open(
                                $link,
                                '_blank'
                            );
                        });

                        $('.content .media img').click(function () {
//                                alert(this);
                            $link = $(this).attr('data-link');
                            $linkapp = $(this).attr('data-linkapp');

                            localStorage.setItem('link', $link);
                            localStorage.setItem('linkapp', $linkapp)
                        });
                    });

                </script>
            </div>
        </div>
    </section>
    @endif
</div>

<div style="margin-top: 30px">
    @include("partials.footer")
</div>

@include("partials.endpage")
</body>
</html>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>


<!-- jQuery -->
{{--<!-- jQuery Easing -->--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>--}}

{{--<!-- Bootstrap -->--}}
{{--<script src="/js/bootstrap.min.js"></script>--}}
{{--<!-- Waypoints -->--}}
{{--<script src="/js/jquery.waypoints.min.js"></script>--}}

<script src="/assets/js/jquery.poptrox.min.js"></script>
<script src="/assets/js/jquery.scrolly.min.js"></script>
<script src="/assets/js/skel.min.js"></script>
<script src="/assets/js/util.js"></script>
<script src="/assets/js/main.js"></script>

<!-- Counters -->
{{--<script src="/js/jquery.countTo.js"></script>--}}
{{--<!-- Magnific Popup -->--}}
{{--<script type="text/javascript" src="/js/jquery.magnific-popup.min.js"></script>--}}

{{--<!-- Main JS (Do not remove) -->--}}
{{--<script src="/js/main.js"></script>--}}


