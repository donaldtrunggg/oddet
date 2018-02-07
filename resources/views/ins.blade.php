<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Focus &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Template by FREEHTML5.CO"/>
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive"/>
    <meta name="author" content="FREEHTML5.CO"/>

    <!--
      //////////////////////////////////////////////////////

      FREE HTML5 TEMPLATE
      DESIGNED & DEVELOPED by FREEHTML5.CO

      Website: 		http://freehtml5.co/
      Email: 			info@freehtml5.co
      Twitter: 		http://twitter.com/fh5co
      Facebook: 		https://www.facebook.com/fh5co

      //////////////////////////////////////////////////////
       -->

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content=""/>
    <meta name="twitter:image" content=""/>
    <meta name="twitter:url" content=""/>
    <meta name="twitter:card" content=""/>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet"> -->

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Magnifoc Popup  -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/style.css">


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

</head>
<body>

<nav id="fh5co-main-nav" role="navigation">
    <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle active"><i></i></a>
    <div class="js-fullheight fh5co-table">
        <div class="fh5co-table-cell js-fullheight">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active"><a href="gallery.html">Gallery</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<div id="fh5co-page">
    <header>
        <div class="container">
            <div class="fh5co-navbar-brand">
                <h1 class="text-center"><a class="fh5co-logo" href="index.html"><i class="icon-camera2"></i></a></h1>
                <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
            </div>
        </div>
    </header>

    <?php
    $year = 0;
    $month = 0;
    ?>

    @for($i = 0; $i < count($data); $i++)
        <?php
        abc:
        $carouselId = $data[$i]->id;
        $year = $data[$i]->year;
        $month = $data[$i]->month;
        ?>

        <div id="fh5co-intro-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center animate-box">
                        {{--<h2 class="intro-heading">Our Gallery &amp; Collection</h2>--}}
                        <p><span><?php echo $month . ' - ' . $year ?></span></p>
                    </div>
                </div>
            </div>
        </div>

        <div id="fh5co-photos-section">
            <div class="container">
                <div class="row text-center">

                    <div class="carousel " data-ride="carousel" data-type="multi"  data-interval="false"
                         id="myCarousel<?php echo $carouselId ?>">
                        <div class="carousel-inner">
                            <?php $count = 0; ?>
                            @for($j = $i; $j < count($data); $j++)
                                <?php
                                $item_year = $data[$j]->year;
                                $item_month = $data[$j]->month;

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

                                <div class="item <?php if($count == 0) echo 'active' ?>">
                                    <?php
                                        $count++;
                                        $link_app = str_replace('https://www.instagram.com/', 'instagram://', $data[$j]->link);
                                    ?>
                                    <div class="col-md-4">
                                        <a href='<?php echo $data[$j]->image; ?>'
                                           data-link="<?php echo $data[$j]->link?>" data-link-app="<?php echo $link_app ?>" class="grid-photo img-popup"
                                           style="background-image: url('<?php echo $data[$j]->image ?>');">
                                            {{--<div class="desc">--}}
                                            {{--<h3>Camera</h3>--}}
                                            {{--<span>12 Photos</span>--}}
                                            {{--</div>--}}
                                            {{--<a href="instagram://user?username=untitled.tiff">untitled.tiff</a>--}}
                                        </a>
                                    </div>
                                </div>
                            @endfor
                </div>
            </div>
        </div>
    @endfor
    <footer>
        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h3 class="section-title">Focus</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the
                            Semantics.</p>
                    </div>

                    <div class="col-md-3">
                        <h3 class="section-title">Our Services</h3>
                        <ul>
                            <li><a href="#">Videos</a></li>
                            <li><a href="#">Photography</a></li>
                            <li><a href="#">Editing Photos</a></li>
                            <li><a href="#">Newsletter</a></li>
                            <li><a href="#">API</a></li>
                            <li><a href="#">FAQ / Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-md-4">
                        <h3 class="section-title">Photos</h3>
                        <ul class="float">
                            <li><a href="#">Natures</a></li>
                            <li><a href="#">Adventure</a></li>
                            <li><a href="#">Wedding</a></li>
                            <li><a href="#">Food &amp; Drinks</a></li>
                            <li><a href="#">Animals</a></li>
                            <li><a href="#">Cars</a></li>
                        </ul>
                        <ul class="float">
                            <li><a href="#">Architecture</a></li>
                            <li><a href="#">Wallpaper Car</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Lanscape</a></li>
                            <li><a href="#">Environment</a></li>
                            <li><a href="#">Climate</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <h3 class="section-title">Information</h3>
                        <ul>
                            <li><a href="#">Terms &amp; Condition</a></li>
                            <li><a href="#">License</a></li>
                            <li><a href="#">Privacy &amp; Policy</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row copy-right">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <p class="fh5co-social-icon">
                            <a href="#"><i class="icon-twitter2"></i></a>
                            <a href="#"><i class="icon-facebook2"></i></a>
                            <a href="#"><i class="icon-instagram"></i></a>
                            <a href="#"><i class="icon-dribbble2"></i></a>
                            <a href="#"><i class="icon-youtube"></i></a>
                        </p>
                        <p>Copyright 2016 Free Html5 <a href="#">Focus</a>. All Rights Reserved. <br>Made with <i
                                    class="icon-heart3"></i> by <a href="http://freehtml5.co/" target="_blank">Freehtml5.co</a>
                            / Demo Images: <a href="https://unsplash.com/" target="_blank">Unsplash </a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="/js/jquery.waypoints.min.js"></script>

<!-- Counters -->
<script src="js/jquery.countTo.js"></script>
<!-- Magnific Popup -->
<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>

<!-- Main JS (Do not remove) -->
<script src="js/main.js"></script>

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

</body>
</html>

