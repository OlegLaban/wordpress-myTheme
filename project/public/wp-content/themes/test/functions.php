<?php
//include yourself function
require get_template_directory() . '/inc/funcIntexsoft.php';
//Включаем поддержку миниатюр.
add_theme_support( 'post-thumbnails' );

// add style in template
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

add_action('wp_enqueue_scripts', 'css_to_wp_head');

//Регистрируем произвольные типы постов.
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

    //
    register_post_type('MyPosts', array(
        'labels'             => array(
            'name'               => 'Intexsoft posts', // Основное название типа записи
            'singular_name'      => 'Intex_post', // отдельное название записи типа Book
            'add_new'            => 'new InPost',
            'add_new_item'       => 'Add new InPost',
            'edit_item'          => 'edit InPost',
            'new_item'           => 'New InPost',
            'view_item'          => 'View InPost',
            'search_items'       => 'search InPosts',
            'not_found'          =>  'InPosts is not defined',
            'not_found_in_trash' => 'В корзине InPost не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'InPosts'

        ),
        'taxonomies'           => array('category'),
        'public'             => true,
        'supports'           => array('title','editor', 'thumbnail','author'),
        'has_archive'        => true,
    ));

}


add_action( 'init', 'register_posts' );

// метабокс с селектом команд
/*
 * Здесь создаются две функции каждая из которых определяет верстку (внешний вид метабоксов). а после каждой функции
 *  следует хук для добаления метабокса.
 */
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

add_action('add_meta_boxes', function () {
    add_meta_box( 'Leng_team', 'Сфера применения', 'Leng_team_metabox', 'Langs', 'side', 'low'  );
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

add_action('add_meta_boxes', function(){
    add_meta_box( 'langs', 'Языки сферы', 'Areas_Langs_metabox', 'Areas', 'side', 'low'  );
}, 1);


//Функция для добавления меню в wordpress.
function addMenu(){
    register_nav_menus(array(
        'top' => 'Top menu',
        'main_menu' => 'Main menu',
        'social_nav' => 'Social Nav'
    ));
}

add_action('after_setup_theme', 'addMenu');

//Подсчет просмотров записи.
function kama_postviews() {

    /* ------------ Настройки -------------- */
    $meta_key       = 'views';  // Ключ мета поля, куда будет записываться количество просмотров.
    $who_count      = 1;            // Чьи посещения считать? 0 - Всех. 1 - Только гостей. 2 - Только зарегистрированных пользователей.
    $exclude_bots   = 1;            // Исключить ботов, роботов, пауков и прочую нечесть :)? 0 - нет, пусть тоже считаются. 1 - да, исключить из подсчета.

    global $user_ID, $post;
    if(is_singular()) {
        $id = (int)$post->ID;
        static $post_views = false;
        if($post_views) return true; // чтобы 1 раз за поток
        $post_views = (int)get_post_meta($id,$meta_key, true);
        $should_count = false;
        switch( (int)$who_count ) {
            case 0: $should_count = true;
                break;
            case 1:
                if( (int)$user_ID == 0 )
                    $should_count = true;
                break;
            case 2:
                if( (int)$user_ID > 0 )
                    $should_count = true;
                break;
        }
        if( (int)$exclude_bots==1 && $should_count ){
            $useragent = $_SERVER['HTTP_USER_AGENT'];
            $notbot = "Mozilla|Opera"; //Chrome|Safari|Firefox|Netscape - все равны Mozilla
            $bot = "Bot/|robot|Slurp/|yahoo"; //Яндекс иногда как Mozilla представляется
            if ( !preg_match("/$notbot/i", $useragent) || preg_match("!$bot!i", $useragent) )
                $should_count = false;
        }

        if($should_count)
            if( !update_post_meta($id, $meta_key, ($post_views+1)) ) add_post_meta($id, $meta_key, 1, true);
    }
    return true;
}

add_action('wp_head', 'kama_postviews');


//Корректируем хлебные крошки.
function change_html_breadchump($data)
{
    //Правильно ли это, это же костыль!!!
    /*
     * Изменяем массив с пунктами меню, удаля последний так как мне не нужна ссылка на список всех постов.
     * */
     array_pop($data->trail);
}

add_action('bcn_after_fill', 'change_html_breadchump', 10, 1);


//Удаляематрибуты ширины и высоты у изображений.
function delete_width_height($image){
    $image[1] = '';
    $image[2] = '';
    return $image;
}

add_filter('wp_get_attachment_image_src','delete_width_height', 100, 1);

//Изменяем классы у меню.
function change_menu_item_css_classes( $classes, $item, $args, $depth ) {
    if( $item->ID === 60 && $args->theme_location === 'main_menu' ){
        $classes[] = 'dropdown';
    }

    return $classes;
}

add_filter( 'nav_menu_css_class', 'change_menu_item_css_classes', 10, 4 );

//Изменение второго сверху меню
require get_template_directory() . '/intex_inc/walker_top_menu.php';
