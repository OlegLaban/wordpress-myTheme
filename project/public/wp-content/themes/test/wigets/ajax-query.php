<?php

add_action( 'wp_ajax_intexosft', 'get_html_search_result' ); // wp_ajax_{ЗНАЧЕНИЕ ПАРАМЕТРА ACTION!!}
add_action( 'wp_ajax_nopriv_intexosft', 'get_html_search_result' );  // wp_ajax_nopriv_{ЗНАЧЕНИЕ ACTION!!}
// первый хук для авторизованных, второй для не авторизованных пользователей




function get_html_search_result(){
    //Функция которая изменяет запрос функции "get_posts" добавляя к блоку WHERE пользовательскую чтроку
    function useless_condition ( $where ) {
        //Обработка подставляемых значений для защиты от SQL инъекций.
        $searchString = esc_sql($_POST['param1']);
        //Здесь описывается та часть запроса которая будет добавлена.
        return $where . " AND ( post_content LIKE '%" . $searchString . "%' OR post_title LIKE '%" . $searchString . "%' ) ";
    }
    //Фильтр с хуком "post_where" который позволяет достучатся до блока where запроса.
    add_filter( 'posts_where' , 'useless_condition' );

    //Берем посты типа "MyPosts" внимание стоит обратить на параметр "suppress_filters" он по умолчанию равен true, что означает, что измененная часть запроса
    // не будет использована в результирющем запросе к базе. Поэтому мы меняем его на False, и теперь измененный запрос будет учтен.
    $posts = get_posts( array(
        'post_type' => 'MyPosts',
        'suppress_filters' => FALSE
    ) );
    //Оборачиваем данные в верстку.
    $html = '<ul class="spost_nav">';
    foreach ($posts as $post){

        $html .= "<li>"
            . "<div class=\"media wow fadeInDown\"> <a href=' {$post->guid}  ?>' class=\"media-left\"> " . get_the_post_thumbnail($post->ID, 'medium') . "</a> "
            . "<div class=\"media-body\"> <a href=\" {$post->guid}\" class=\"catg_title\">{$post->post_title}</a> </div>"
            . "</div>"
            ."</li>";

    }
    $html .= '</ul>';
    //Выводим данные для ajax ответа.
    echo $html;
    die; // даём понять, что обработчик закончил выполнение
}

//other code



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