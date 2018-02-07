{{         trans('lang.failed') }}

@include("partials/head")

<link rel="stylesheet" href="/css/animate.css">
<!-- Icomoon Icon Fonts-->
<link rel="stylesheet" href="/css/icomoon.css">
<!-- Bootstrap  -->
<link rel="stylesheet" href="/css/bootstrap.css">
<!-- Magnifoc Popup  -->
<link rel="stylesheet" href="/css/magnific-popup.css">

<link rel="stylesheet" href="/css/style.css">


<!-- Modernizr JS -->
<script src="/js/modernizr-2.6.2.min.js"></script>
<!-- FOR IE9 below -->
<!--[if lt IE 9]>
<script src="/js/respond.min.js"></script>
<![endif]-->
<style>
    .carousel-control {
        width: 4%;
    }

    .carousel-control.left, .carousel-control.right {
        margin-left: 15px;
        background-image: none;
    }

    @media (max-width: 767px) {
        .carousel-inner .active.left {
            left: -100%;
        }

        .carousel-inner .next {
            left: 100%;
        }

        .carousel-inner .prev {
            left: -100%;
        }

        .active > div {
            display: none;
        }

        .active > div:first-child {
            display: block;
        }

    }

    @media (min-width: 767px) and (max-width: 992px ) {
        .carousel-inner .active.left {
            left: -50%;
        }

        .carousel-inner .next {
            left: 50%;
        }

        .carousel-inner .prev {
            left: -50%;
        }

        .active > div {
            display: none;
        }

        .active > div:first-child {
            display: block;
        }

        .active > div:first-child + div {
            display: block;
        }
    }

    @media (min-width: 992px ) {
        .carousel-inner .active.left {
            left: -25%;
        }

        .carousel-inner .next {
            left: 25%;
        }

        .carousel-inner .prev {
            left: -25%;
        }
    }

</style>


<body>
<div class="container-fluid">
    @include("partials.header")
    @include("partials.navigation")
    @include("partials.about")

    <div class="w3-container" style="margin: 0 auto; text-align: justify;">
        <?php
        $year = 0;
        $month = 0;
        ?>

        @for($i = 0; $i < count($data); $i++)
            <?php
            $oldUrl = '';

            abc:
            $carouselId = $data[$i]->id;
            $year = $data[$i]->year;
            $month = $data[$i]->month;
            $monthName = date('F', mktime(0, 0, 0, $month, 10));

            ?>

            <div id="fh5co-intro-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center animate-box">
                            {{--<h2 class="intro-heading">Our Gallery &amp; Collection</h2>--}}
                            <p><span><?php echo $monthName . ' - ' . $year ?></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="fh5co-photos-section">
                <div class="container">
                    <div class="row text-center">

                        <div class="carousel " data-ride="carousel" data-type="multi" data-interval="false"
                             id="myCarousel<?php echo $carouselId ?>">
                            <div class="carousel-inner">
                                <?php $count = 0; ?>
                                @for($j = $i; $j < count($data); $j++)
                                    <?php
                                    $item_year = $data[$j]->year;
                                    $item_month = $data[$j]->month;
                                    $i = $j;
                                    if($item_year != $year || $item_month != $month):
                                    $i = $j; ?>
                            </div>

                            <?php if($count > 3) : ?>
                            <a class="left carousel-control" href="#myCarousel<?php echo $carouselId ?>"
                               data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                            <a class="right carousel-control" href="#myCarousel<?php echo $carouselId ?>"
                               data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                            <?php endif; ?>
                        </div>

                        <?php
                        goto abc;
                        endif;
                        ?>

                        <?php if($oldUrl != $data[$j]->image): ?>
                        <div class="item <?php if ($count == 0) echo 'active' ?>">
                            <?php
                            $count++;
                            $oldUrl = $data[$j]->image;
                            $link_app = str_replace('https://www.instagram.com/', 'instagram://', $data[$j]->link);

                            ?>

                            <div class="col-md-4">
                                <!--                                --><?php //dump($data[$j]->image);  ?>
                                <a href='<?php echo $data[$j]->image; ?>'
                                   data-link="<?php echo $data[$j]->link?>" data-link-app="<?php echo $link_app ?>"
                                   class="grid-photo img-popup"
                                   style="background-image: url('<?php echo $data[$j]->image ?>'); min-width: 300px">

                                </a>
                            </div>
                        </div>
                        <?php endif; ?>
                        @endfor
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>

<div style="margin-top: 30px">
    @include("partials.footer")
</div>

@include("partials.endpage")
</body>
</html>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

<!-- Bootstrap -->
<script src="/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="/js/jquery.waypoints.min.js"></script>

<!-- Counters -->
<script src="/js/jquery.countTo.js"></script>
<!-- Magnific Popup -->
<script type="text/javascript" src="/js/jquery.magnific-popup.min.js"></script>

<!-- Main JS (Do not remove) -->
<script src="/js/main.js"></script>

<script>
    $('.carousel[data-type="multi"] .item').each(function () {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i = 0; i < 1; i++) {
            next = next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }

            next.children(':first-child').clone().appendTo($(this));
        }
    });
</script>


