<!DOCTYPE html>
<html>
<head>
    <title>NewsFeed</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://web:8888/wp-content/themes/test/tjs.js"></script>
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>
<body>
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
    <header id="header">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="header_top">
                    <?php wp_nav_menu(array(
                            'menu_class' => 'top_nav',
                            'theme_location' => 'top',
                            'after' => '',
                            'container_class' => 'header_top_left'
                    )); ?>
                    <?php /*<div class="header_top_left">
                        <ul class="top_nav">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="pages/contact.html">Contact</a></li>
                        </ul>
                    </div>*/ ?>
                    <div class="header_top_right">
                        <p>Friday, December 05, 2045</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="header_bottom">
                    <div class="logo_area"><a href="index.html" class="logo"><img src="<?php echo get_template_directory_uri() ?>/images/logo.jpg" alt=""></a></div>
                    <div class="add_banner"><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/addbanner_728x90_V1.jpg" alt=""></a></div>
                </div>
            </div>
        </div>
    </header>
    <section id="navArea">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <?php wp_nav_menu(array(
                'menu_class' => 'nav navbar-nav main_nav',
                'theme_location' => 'main_menu',
                'after' => '',
                'container_class' => 'navbar-collapse collapse',
                'walker' => new My_Walker_Nav_Menu()
            )); ?>
            <?php /*<div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav main_nav">
                    <li class="active"><a href="index.html"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
                    <li><a href="#">Technology</a></li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mobile</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Android</a></li>
                            <li><a href="#">Samsung</a></li>
                            <li><a href="#">Nokia</a></li>
                            <li><a href="#">Walton Mobile</a></li>
                            <li><a href="#">Sympony</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Laptops</a></li>
                    <li><a href="#">Tablets</a></li>
                    <li><a href="pages/contact.html">Contact Us</a></li>
                    <li><a href="pages/404.html">404 Page</a></li>
                </ul>
            </div>*/?>
        </nav>
    </section>
    <section id="newsSection">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="latest_newsarea"> <span>Latest News</span>
                    <ul id="ticker01" class="news_sticker">
                        <li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/news_thumbnail3.jpg" alt="">My First News Item</a></li>
                        <li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/news_thumbnail3.jpg" alt="">My Second News Item</a></li>
                        <li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/news_thumbnail3.jpg" alt="">My Third News Item</a></li>
                        <li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/news_thumbnail3.jpg" alt="">My Four News Item</a></li>
                        <li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/news_thumbnail3.jpg" alt="">My Five News Item</a></li>
                        <li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/news_thumbnail3.jpg" alt="">My Six News Item</a></li>
                        <li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/news_thumbnail3.jpg" alt="">My Seven News Item</a></li>
                        <li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/news_thumbnail3.jpg" alt="">My Eight News Item</a></li>
                        <li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/news_thumbnail2.jpg" alt="">My Nine News Item</a></li>
                    </ul>
                    <?php wp_nav_menu(array(
                        'menu_class' => 'social_nav',
                        'theme_location' => 'social_nav',
                        'container_class' => 'social_area',
                        'walker' => new My_Walker_Nav_Menu()
                    )); ?>
                    <?php /*<div class="social_area">
                        <ul class="social_nav">
                            <li class="facebook"><a href="#"></a></li>
                            <li class="twitter"><a href="#"></a></li>
                            <li class="flickr"><a href="#"></a></li>
                            <li class="pinterest"><a href="#"></a></li>
                            <li class="googleplus"><a href="#"></a></li>
                            <li class="vimeo"><a href="#"></a></li>
                            <li class="youtube"><a href="#"></a></li>
                            <li class="mail"><a href="#"></a></li>
                        </ul>
                    </div>*/?>
                </div>
            </div>
        </div>
    </section>
