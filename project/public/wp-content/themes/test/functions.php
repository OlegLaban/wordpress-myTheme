<?php

//include yourself function
require get_template_directory() . '/inc/funcIntexsoft.php';

// add style in template
add_action('wp_enqueue_scripts', 'css_to_wp_head');
function css_to_wp_head()
{
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap-min-css', get_template_directory_uri() . '/them/css/bootstrap.min.css' );
    wp_enqueue_style('font-awesome-min-css', get_template_directory_uri() . '/them/css/font-awesome.min.css' );
    wp_enqueue_style('animate-css', get_template_directory_uri() . '/them/css/animate.css' );
    wp_enqueue_style('font-css', get_template_directory_uri() . '/them/css/font.css' );
    wp_enqueue_style('li-scroller-css', get_template_directory_uri() . '/them/css/li-scroller.css' );
    wp_enqueue_style('jquery-fancybox-css', get_template_directory_uri() . '/them/css/jquery.fancybox.css' );
    wp_enqueue_style('theme-css', get_template_directory_uri() . '/them/css/theme.css' );
    wp_enqueue_style('slick.css', get_template_directory_uri() . '/them/css/slick.css' );
    wp_enqueue_style('style.css', get_template_directory_uri() . '/them/css/style.css' );


    wp_enqueue_script('jquery-min-js', get_template_directory_uri() . '/them/javascript/jquery.min.js', array(), '', true);
    wp_enqueue_script('wow-min-js', get_template_directory_uri() . '/them/javascript/wow.min.js', array(), '', true);
    wp_enqueue_script('bootstrap-min-js', get_template_directory_uri() . '/them/javascript/bootstrap.min.js', array(), '', true);
    wp_enqueue_script('slick-min-js', get_template_directory_uri() . '/them/javascript/slick.min.js', array(), '', true);
    wp_enqueue_script('slick-min-js', get_template_directory_uri() . '/them/javascript/slick.min.js', array(), '', true);
    wp_enqueue_script('jquery-li_scroller-1-0-js', get_template_directory_uri() . '/them/javascript/jquery.li-scroller.1.0.js', array(), '', true);
    wp_enqueue_script('jquery-newsTicker-min-js', get_template_directory_uri() . '/them/javascript/jquery.newsTicker.min.js', array(), '', true);
    wp_enqueue_script('jquery-fancybox-pack-js', get_template_directory_uri() . '/them/javascript/jquery.fancybox.pack.js', array(), '', true);
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/them/javascript/custom.js', array(), '', true);
    wp_enqueue_script('respond-min-js', get_template_directory_uri() . '/them/javascript/respond.min.js', array(), '', true);
    wp_enqueue_script('html5shiv-min-js', get_template_directory_uri() . '/them/javascript/html5shiv.min.js', array(), '', true);
}

add_action( 'init', 'register_posts' );

function register_posts()
{
    register_post_type('Areas', array(
        'labels'             => array(
            'name'               => 'Areas', // Основное название типа записи
            'singular_name'      => 'Area', // отдельное название записи типа Book
            'add_new'            => 'new Aria',
            'add_new_item'       => 'Add new area',
            'edit_item'          => 'edit area',
            'new_item'           => 'New area',
            'view_item'          => 'View area',
            'search_items'       => 'search area',
            'not_found'          =>  'Areas is not definde',
            'not_found_in_trash' => 'В корзине area не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Areas'

        ),
        'public'             => true,
        'supports'           => array('title','editor','author'),
        'has_archive'        => true,
    ));

    register_post_type('Langs', array(
        'labels'             => array(
            'name'               => 'Langs', // Основное название типа записи
            'singular_name'      => 'Lang', // отдельное название записи типа Book
            'add_new'            => 'new Lang',
            'add_new_item'       => 'Add new Lang',
            'edit_item'          => 'edit Lang',
            'new_item'           => 'New Lang',
            'view_item'          => 'View Lang',
            'search_items'       => 'search Lang',
            'not_found'          =>  'Langs is not definde',
            'not_found_in_trash' => 'В корзине area не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Langs'

        ),
        'public'             => true,
        'supports'           => array('title','editor','author'),
        'has_archive'        => true,
    ));

}


add_action('add_meta_boxes', function () {
    add_meta_box( 'Leng_team', 'Сфера применения', 'Leng_team_metabox', 'Langs', 'side', 'low'  );
}, 1);

// метабокс с селектом команд
function Leng_team_metabox( $post ){
    $areas = get_posts(array( 'post_type'=>'Areas', 'posts_per_page'=>-1, 'orderby'=>'post_title', 'order'=>'ASC' ));

    if( $areas ){
        echo '<select name="post_parent" style="width:100%">';
        foreach( $areas as $area ){
            echo '<option value="' . $area->ID . '" ' . selected($area->ID, $post->post_parent). '> '. esc_html($area->post_title) .'</option>';
        }
        echo '</select>';
    }
    else
        echo 'Сфер нет...';
}

add_action('add_meta_boxes', function(){
    add_meta_box( 'langs', 'Языки сферы', 'Areas_Langs_metabox', 'Areas', 'side', 'low'  );
}, 1);

function Areas_Langs_metabox( $post ){
    $langs = get_posts(array( 'post_type'=>'Langs', 'post_parent'=>$post->ID, 'posts_per_page'=>-1, 'orderby'=>'post_title', 'order'=>'ASC' ));

    if( $langs ){
        foreach( $langs as $lang ){
            echo $lang->post_title .'<br>';
        }
    }
    else
        echo 'Языков нет...';
}


