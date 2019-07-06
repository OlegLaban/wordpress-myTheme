<?php
/*
 * Plugin Name: post-type-car
 */


add_action( 'init', 'post_type_car_install' );
function post_type_car_setup(){
    // Регистрируем тип записи "car"
    register_post_type('car', [
            'labels' => [
                'name' => __('Cars'),
                'singular_name' => __('Car')
            ],
            'menu_position' => 5,
            'public' => true,
            'has_archive' => true,
        ]
    );
}

register_activation_hook( __FILE__, 'post_type_car_install' );
function post_type_car_install(){
    // Запускаем функцию регистрации типа записи
    post_type_car_setup();

    // Сбрасываем настройки ЧПУ, чтобы они пересоздались с новыми данными
    flush_rewrite_rules();
}

register_deactivation_hook( __FILE__, 'post_type_car_deactivation' );
function post_type_car_deactivation() {
    // Сбрасываем настройки ЧПУ, чтобы они пересоздались с новыми данными
    flush_rewrite_rules();
}