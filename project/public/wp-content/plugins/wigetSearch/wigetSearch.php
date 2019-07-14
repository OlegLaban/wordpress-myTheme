<?php
/*
 * Plugin Name: Wiget Search
 * Description: Виджет для поиска по указанному типу постов.
 * Author:      Oleg
 * Version:     Версия плагина 1.0
 */

function add_script()
{
    wp_enqueue_script('wiget_search_script', get_template_directory_uri() . '/../../plugins/wigetSearch/script.js', array(), '', true);
}

add_action('wp_enqueue_scripts', 'add_script');

// Регистрируем wiget для поиска по записям.
function Intex_Widget_For_Search() {
    register_widget( 'Intex_Widget_For_Search' );
}
add_action( 'widgets_init', 'Intex_Widget_For_Search' );

function intex_search_register_wp_sidebars() {

    /* В боковой колонке - первый сайдбар */
    register_sidebar(
        array(
            'id' => 'search_side', // уникальный id
            'name' => 'Search', // название сайдбара
            'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
            'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
            'after_title' => '</h3>'
        )
    );
}

add_action( 'widgets_init', 'intex_search_register_wp_sidebars' );

//Выводим в шапку параметры для обращения к admin-ajax.php
function js_variables(){
    $variables = array (
        'ajax_url' => admin_url('admin-ajax.php'),
        'is_mobile' => wp_is_mobile()
        // Тут обычно какие-то другие переменные
    );
    echo '<script type="text/javascript"> window.wp_data = ' .   json_encode($variables) .  ' </script>';
}
add_action('wp_head','js_variables');

//Регистрируем плагин вызывая в функции все функуции для настройки объявленные выше.
register_activation_hook( __FILE__, 'wiget_search_install' );

function wiget_search_install(){
    add_script();

    Intex_Widget_For_Search();

    intex_search_register_wp_sidebars();

    js_variables();
}


//Инициализируем wiget.
require __DIR__ . '/wiget.php';

//Функции для работы ajax запроса.
require __DIR__ . '/ajax-query.php';