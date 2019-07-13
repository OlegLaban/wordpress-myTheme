<?php get_header(); ?>
    <section id="sliderSection">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="slick_slider">
                    <div class="single_iteam"> <a href="<?php echo get_template_directory_uri() ?>/pages/single_page.html"> <img src="<?php echo get_template_directory_uri() ?>/images/slider_img4.jpg" alt=""></a>
                        <div class="slider_article">
                            <h2><a class="slider_tittle" href="<?php echo get_template_directory_uri() ?>/pages/single_page.html">Fusce eu nulla semper porttitor felis sit amet</a></h2>
                            <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra urna. Morbi dui...</p>
                        </div>
                    </div>
                    <div class="single_iteam"> <a href="<?php echo get_template_directory_uri() ?>/pages/single_page.html"> <img src="<?php echo get_template_directory_uri() ?>/images/sliderimg2.jpg" alt=""></a>
                        <div class="slider_article">
                            <h2><a class="slider_tittle" href="<?php echo get_template_directory_uri() ?>/pages/single_page.html">Fusce eu nulla semper porttitor felis sit amet</a></h2>
                            <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra urna. Morbi dui...</p>
                        </div>
                    </div>
                    <div class="single_iteam"> <a href="<?php echo get_template_directory_uri() ?>/pages/single_page.html"> <img src="<?php echo get_template_directory_uri() ?>/images/slider_img3.jpg" alt=""></a>
                        <div class="slider_article">
                            <h2><a class="slider_tittle" href="<?php echo get_template_directory_uri() ?>/pages/single_page.html">Fusce eu nulla semper porttitor felis sit amet</a></h2>
                            <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra urna. Morbi dui...</p>
                        </div>
                    </div>
                    <div class="single_iteam"> <a href="<?php echo get_template_directory_uri() ?>/pages/single_page.html"> <img src="<?php echo get_template_directory_uri() ?>/images/slider_img1.jpg" alt=""></a>
                        <div class="slider_article">
                            <h2><a class="slider_tittle" href="<?php echo get_template_directory_uri() ?>/pages/single_page.html">Fusce eu nulla semper porttitor felis sit amet</a></h2>
                            <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra urna. Morbi dui...</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="latest_post">
                    <h2><span>Latest post</span></h2>
                    <div class="latest_post_container">
                        <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
                        <?php
                            $args  = array(
                                    'post_type'   => 'MyPosts',
                                    'numberposts' => 5,
                                    'orderby'     => 'date',
                                    'order'       => 'ASC'
                            );
                            $posts = get_posts($args);
                        ?>
                        <ul class="latest_postnav">
                            <?php foreach ($posts as $post): ?>
                                <li>
                                    <div class="media"> <a href="<?php echo $post->guid; ?>" class="media-left"> <?php echo get_the_post_thumbnail($post->ID, 'medium'); ?></a>
                                        <div class="media-body"> <a href="<?php echo $post->guid; ?>" class="catg_title"><?php echo $post->post_title; ?></a> </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contentSection">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="left_content">
                    <div class="single_post_content">
                        <h2><span>Business</span></h2>

                        <?php
                        // get Posts for Buisness
                            $posts = get_posts(array(
                                    'post_type' => 'MyPosts',
                                     'cat'      => 6,
                                     'orderby'  => 'date',
                                     'order'    => 'ASC'
                                ));
                            //Выделяем первый пост для нашей верстки.
                            $firstPost = array_shift($posts);
                        ?>
                        <div class="single_post_content_left">
                            <ul class="business_catgnav  wow fadeInDown">

                                <li>
                                    <figure class="bsbig_fig"> <a href="<?php echo $firstPost->guid; ?>" class="featured_img">
                                            <?php echo get_the_post_thumbnail($firstPost->ID, 'medium' ); ?>
                                            <span class="overlay"></span> </a>
                                        <figcaption>
                                            <a href="<?php echo $firstPost->guid; ?>"><?php echo $firstPost->post_title; ?></a> </figcaption>
                                        <p><?php echo trim(_mb_substr($firstPost->post_content, 0, 200), ' ') . '...';  ?></p>
                                    </figure>
                                </li>
                            </ul>
                        </div>
                        <div class="single_post_content_right">
                            <ul class="spost_nav">
                                <?php foreach ($posts as $post): ?>
                                <li>
                                    <div class="media wow fadeInDown"> <a href="<?php echo $post->guid ?>" class="media-left"> <?php echo get_the_post_thumbnail($post->ID, 'medium', array('class' => "")); ?> </a>
                                        <div class="media-body"> <a href="<?php echo $post->guid;  ?>" class="catg_title"><?php echo $post->post_title; ?></a> </div>
                                    </div>
                                </li>
                                <?php endforeach;; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="fashion_technology_area">
                        <div class="fashion">
                            <div class="single_post_content">
                                <h2><span>Fashion</span></h2>
                                <?php $posts = get_posts(array(
                                        'category'  => 8,
                                        'post_type' => 'MyPosts',
                                        'orderby'   => 'date',
                                        'order'     => 'ASC'
                                    ));
                                    $firstPost = array_shift($posts);
                                ?>
                                <ul class="business_catgnav wow fadeInDown">
                                    <li>
                                        <figure class="bsbig_fig"> <a href="<?php echo $firstPost->guid; ?>" class="featured_img">
                                                <?php echo get_the_post_thumbnail($firstPost->ID, 'large' ); ?>
                                                <span class="overlay"></span> </a>
                                            <figcaption><a href="<?php echo $firstPost->guid; ?>"><?php echo $firstPost->post_title; ?></a> </figcaption>
                                            <p><?php echo trim(_mb_substr($firstPost->post_content, 0, 200), ' ') . '...';  ?></p>
                                        </figure>
                                    </li>
                                </ul>
                                <ul class="spost_nav">
                                    <?php foreach($posts as $post): ?>
                                    <li>
                                        <div class="media wow fadeInDown"> <a href="<?php echo $post->guid; ?>" class="media-left"> <?php echo get_the_post_thumbnail($post->ID, 'medium'); ?> </a>
                                            <div class="media-body"> <a href="<?php echo $post->guid; ?>" class="catg_title"> <?php echo $post->post_title; ?></a> </div>
                                        </div>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="technology">
                            <div class="single_post_content">
                                <h2><span><?php echo get_cat_name(9); ?></span></h2>
                                <?php
                                    $queryParams = array(
                                        'category'    => 9,
                                        'orderby'     => 'date',
                                        'order'       => 'ASC',
                                        'post_type'   => 'MyPosts'
                                    );
                                    $posts = get_posts($queryParams);
                                    $firstPost = array_shift($posts);
                                ?>
                                <ul class="business_catgnav">
                                    <li>
                                        <figure class="bsbig_fig wow fadeInDown"> <a href="<?php echo $firstPost->guid; ?>" class="featured_img"> <?php echo get_the_post_thumbnail($firstPost->ID, 'medium'); ?> <span class="overlay"></span> </a>
                                            <figcaption> <a href="<?php echo $firstPost->guid; ?>"><?php echo $firstPost->post_title; ?></a> </figcaption>
                                            <p><?php echo mb_substr($firstPost->post_content, 0, 120); ?></p>
                                        </figure>
                                    </li>
                                </ul>
                                <ul class="spost_nav">
                                    <?php foreach($posts as $post): ?>
                                    <li>
                                        <div class="media wow fadeInDown"> <a href="<?php echo $post->guid; ?>" class="media-left"> <?php echo get_the_post_thumbnail($post->ID, 'medium'); ?> </a>
                                            <div class="media-body"> <a href="<?php echo $post->guid; ?>" class="catg_title"><?php echo $post->post_title; ?></a> </div>
                                        </div>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single_post_content">
                        <h2><span>Photography</span></h2>
                        <ul class="photograph_nav  wow fadeInDown">
                            <li>
                                <div class="photo_grid">
                                    <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo get_template_directory_uri() ?>/images/photograph_img2.jpg" title="Photography Ttile 1"> <img src="<?php echo get_template_directory_uri() ?>/images/photograph_img2.jpg" alt=""/></a> </figure>
                                </div>
                            </li>
                            <li>
                                <div class="photo_grid">
                                    <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo get_template_directory_uri() ?>/images/photograph_img3.jpg" title="Photography Ttile 2"> <img src="<?php echo get_template_directory_uri() ?>/images/photograph_img3.jpg" alt=""/> </a> </figure>
                                </div>
                            </li>
                            <li>
                                <div class="photo_grid">
                                    <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo get_template_directory_uri() ?>/images/photograph_img4.jpg" title="Photography Ttile 3"> <img src="<?php echo get_template_directory_uri() ?>/images/photograph_img4.jpg" alt=""/> </a> </figure>
                                </div>
                            </li>
                            <li>
                                <div class="photo_grid">
                                    <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo get_template_directory_uri() ?>/images/photograph_img4.jpg" title="Photography Ttile 4"> <img src="<?php echo get_template_directory_uri() ?>/images/photograph_img4.jpg" alt=""/> </a> </figure>
                                </div>
                            </li>
                            <li>
                                <div class="photo_grid">
                                    <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo get_template_directory_uri() ?>/images/photograph_img2.jpg" title="Photography Ttile 5"> <img src="<?php echo get_template_directory_uri() ?>/images/photograph_img2.jpg" alt=""/> </a> </figure>
                                </div>
                            </li>
                            <li>
                                <div class="photo_grid">
                                    <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo get_template_directory_uri() ?>/images/photograph_img3.jpg" title="Photography Ttile 6"> <img src="<?php echo get_template_directory_uri() ?>/images/photograph_img3.jpg" alt=""/> </a> </figure>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="single_post_content">
                        <h2><span><?php echo get_cat_name(7) ?></span></h2>
                        <div class="single_post_content_left">
                            <?php
                                $queryParams = array(
                                        'category'    => 7,
                                        'orderby'     => 'date',
                                        'order'       => 'ASC',
                                        'post_type'   => 'MyPosts'
                                );
                                $posts = get_posts($queryParams);
                                $firstPost = array_shift($posts);
                            ?>
                            <ul class="business_catgnav">
                                <li>
                                    <figure class="bsbig_fig  wow fadeInDown"> <a class="featured_img" href="<?php echo $firstPost->guid; ?>"> <?php echo get_the_post_thumbnail($firstPost->ID, 'medium'); ?> <span class="overlay"></span> </a>
                                        <figcaption> <a href="<?php echo $firstPost->guid; ?>"><?php echo $firstPost->post_title; ?></a> </figcaption>
                                        <p><?php echo mb_substr($firstPost->post_content, 0, 150); ?></p>
                                    </figure>
                                </li>
                            </ul>
                        </div>
                        <div class="single_post_content_right">
                            <ul class="spost_nav">
                                <?php foreach($posts as $post): ?>
                                    <li>
                                        <div class="media wow fadeInDown"> <a href="<?php echo $post->guid; ?>" class="media-left"> <?php echo get_the_post_thumbnail($post->ID, 'medium') ?> </a>
                                            <div class="media-body"> <a href="<?php echo $post->guid; ?>l" class="catg_title"><?php echo $post->post_title; ?></a> </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                                <?/*
                                <li>
                                    <div class="media wow fadeInDown"> <a href="<?php echo get_template_directory_uri() ?>/pages/single_page.html" class="media-left"> <img alt="" src="<?php echo get_template_directory_uri() ?>/images/post_img2.jpg"> </a>
                                        <div class="media-body"> <a href="<?php echo get_template_directory_uri() ?>/pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media wow fadeInDown"> <a href="<?php echo get_template_directory_uri() ?>/pages/single_page.html" class="media-left"> <img alt="" src="<?php echo get_template_directory_uri() ?>/images/post_img1.jpg"> </a>
                                        <div class="media-body"> <a href="<?php echo get_template_directory_uri() ?>/pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media wow fadeInDown"> <a href="<?php echo get_template_directory_uri() ?>/pages/single_page.html" class="media-left"> <img alt="" src="<?php echo get_template_directory_uri() ?>/images/post_img2.jpg"> </a>
                                        <div class="media-body"> <a href="<?php echo get_template_directory_uri() ?>/pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                                    </div>
                                </li>*/?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <aside class="right_content">
                    <div class="single_sidebar">
                        <h2><span>Popular Post</span></h2>
                        <ul class="spost_nav">
                            <?php
                            $queryParams = array(
                                 'post_type' => 'MyPosts',
                                'meta_query' => array(
                                    'relation' => 'AND',
			                        array(
			                            'key' => 'views',
                                        'value' => '0',
                                        'compare' => '>'
                                    )
                                ),
                                'orderby'     => 'views',
	                            'order'       => 'DESC'
                            );
                                $wp_query = new WP_Query($queryParams);
                                $posts = $wp_query->get_posts();
                            ?>
                            <?php foreach($posts as $post): ?>
                            <li>
                                <div class="media wow fadeInDown"> <a href="<?php echo $post->guid;  ?>" class="media-left"> <?php echo get_the_post_thumbnail($post->ID, 'medium'); ?> </a>
                                    <div class="media-body"> <a href="<?php echo $post->guid; ?>" class="catg_title"><?php echo $post->post_title; ?></a> </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="single_sidebar">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>
                            <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a></li>
                            <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Comments</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="category">
                                <ul>
                                    <li class="cat-item"><a href="#">Sports</a></li>
                                    <li class="cat-item"><a href="#">Fashion</a></li>
                                    <li class="cat-item"><a href="#">Business</a></li>
                                    <li class="cat-item"><a href="#">Technology</a></li>
                                    <li class="cat-item"><a href="#">Games</a></li>
                                    <li class="cat-item"><a href="#">Life &amp; Style</a></li>
                                    <li class="cat-item"><a href="#">Photography</a></li>
                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="video">
                                <div class="vide_area">
                                    <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="comments">
                                <ul class="spost_nav">
                                    <li>
                                        <div class="media wow fadeInDown"> <a href="<?php echo get_template_directory_uri() ?>/pages/single_page.html" class="media-left"> <img alt="" src="<?php echo get_template_directory_uri() ?>/images/post_img1.jpg"> </a>
                                            <div class="media-body"> <a href="<?php echo get_template_directory_uri() ?>/pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media wow fadeInDown"> <a href="<?php echo get_template_directory_uri() ?>/pages/single_page.html" class="media-left"> <img alt="" src="<?php echo get_template_directory_uri() ?>/images/post_img2.jpg"> </a>
                                            <div class="media-body"> <a href="<?php echo get_template_directory_uri() ?>/pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media wow fadeInDown"> <a href="<?php echo get_template_directory_uri() ?>/pages/single_page.html" class="media-left"> <img alt="" src="<?php echo get_template_directory_uri() ?>/images/post_img1.jpg"> </a>
                                            <div class="media-body"> <a href="<?php echo get_template_directory_uri() ?>/pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media wow fadeInDown"> <a href="<?php echo get_template_directory_uri() ?>/pages/single_page.html" class="media-left"> <img alt="" src="<?php echo get_template_directory_uri() ?>/images/post_img2.jpg"> </a>
                                            <div class="media-body"> <a href="<?php echo get_template_directory_uri() ?>/pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single_sidebar wow fadeInDown">
                        <h2><span>Sponsor</span></h2>
                        <?php dynamic_sidebar( 'search_side' ); ?>
                        <a class="sideAdd" href="#"><img src="<?php echo get_template_directory_uri() ?>/images/add_img.jpg" alt=""></a> </div>
                    <div class="single_sidebar wow fadeInDown">
                        <h2><span>Category Archive</span></h2>
                        <select class="catgArchive">
                            <option>Select Category</option>
                            <option>Life styles</option>
                            <option>Sports</option>
                            <option>Technology</option>
                            <option>Treads</option>
                        </select>
                    </div>
                    <div class="single_sidebar wow fadeInDown">
                        <h2><span>Links</span></h2>
                        <ul>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Rss Feed</a></li>
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Life &amp; Style</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
