<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <meta name="description" content="<?php echo sub_tagline; ?>">

        <title> <?php echo business_name; ?> - <?php echo $title; ?> </title>

        <!--Favicon-->
        <link rel="icon" href="<?php echo business_favicon; ?>" type="image/jpg" />
        <!-- Bootstrap CSS -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/bootstrap-multiselect.css'); ?>" rel="stylesheet">
        <!-- Font Awesome CSS-->
        <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <!-- Line Awesome CSS -->
        <link href="<?php echo base_url('assets/css/line-awesome.min.css'); ?>" rel="stylesheet">
        <!-- Animate CSS-->
        <link href="<?php echo base_url('assets/css/animate.css'); ?>" rel="stylesheet">
        <!-- Bar Filler CSS -->
        <link href="<?php echo base_url('assets/css/barfiller.css'); ?>" rel="stylesheet">
        <!-- Magnific Popup Video -->
        <link href="<?php echo base_url('assets/css/magnific-popup.css'); ?>" rel="stylesheet">
        <!-- Flaticon CSS -->
        <link href="<?php echo base_url('assets/css/flaticon.css'); ?>" rel="stylesheet">
        <!-- Owl Carousel CSS -->
        <link href="<?php echo base_url('assets/css/owl.carousel.css'); ?>" rel="stylesheet">
        <!-- Style CSS -->
        <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
        <!-- Responsive CSS -->
        <link href="<?php echo base_url('assets/css/responsive.css'); ?>" rel="stylesheet">


        <!-- Custom CSS -->
        <link href="<?php echo base_url('assets/css/test.css'); ?>" rel="stylesheet">

        <!-- jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="<?php echo base_url('assets/js/bootstrap-multiselect.js'); ?>"></script>

    </head>

    <body>

        <!-- Pre Loader -->

        <div class="site-preloader-wrap">
            <div class="spinner"></div>
        </div>

        <!-- Header Top Area -->

    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="site-info">
                        <ul>
                            <li><a href="mailto:<?php echo business_contact_email; ?>"><i class="fa fa-envelope"></i> <?php echo business_contact_email; ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <p class="welcome-message">Welcome to the <?php echo business_name; ?></p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 text-right">
                    <div class="social-icon">
                        <a href="https://web.facebook.com/Thumbsupngo" target="_blank"><i class="la la-facebook"></i></a>
                        <a href="https://twitter.com/thumbsupngo" target="_blank"><i class="la la-twitter"></i></a>
                        <a href="https://www.instagram.com/thumbsupngo/" target="_blank"><i class="la la-instagram"></i></a>
                        <a href="https://www.youtube.com/channel/UCzzwlxS3srNQXtfGn8ztVgA" target="_blank"><i class="la la-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Header Area -->

    <div class="header-area">
        <div class="sticky-area">
            <div class="navigation">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a class="navbar-brand" href="#"><img src="<?php echo business_logo; ?>" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="main-menu">
                            <nav class="navbar navbar-expand-lg">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                    <span class="navbar-toggler-icon"></span>
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                                    <ul class="navbar-nav m-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url('about'); ?>">About Us</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url('board'); ?>">Board</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="<?php echo base_url('volunteer'); ?>">Volunteers</a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" href="#">Causes +
                                            </a>
                                            <ul class="sub-menu">
                                                <li><a href="causes.html">Causes</a></li>
                                                <li><a href="single-causes.html">Causes Details</a></li>
                                            </ul>
                                        </li>-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url('events'); ?>">Events</a>
                                        </li>
                                         <!--<li class="nav-item">
                                            <a class="nav-link" href="#">Pages +
                                            </a>
                                            <ul class="sub-menu">
                                                <li><a href="about.html">About us</a></li>
                                                <li><a href="program.html">Our Programs</a></li>
                                                <li><a href="team.html">Our Volunteer</a></li>
                                                <li><a href="portfolio.html">Our Gallery</a></li>
                                                <li><a href="faq.html">FAQ</a></li>
                                            </ul>
                                        </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url('gallery'); ?>">Gallery</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url('contact'); ?>">Contact</a>
                                        </li>
                                    </ul>

                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-2 text-right">
                        <div class="header-right-content">
                            <a class="main-btn" data-toggle="modal" data-target="#donate">Donate</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>