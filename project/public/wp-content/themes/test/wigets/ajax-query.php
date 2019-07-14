<?php

function get_html_search_result(){


    //Функция которая изменяет запрос функции "get_posts" добавляя к блоку WHERE пользовательскую чтроку
    function useless_condition($where){
        /* Добавляем в контекст функции стандартный объект для работы с базой данных (это нужно для работы с методом prepare
         * для защиты от sql инъекций.
         */
       global $wpdb;
       //Подготавливаем строку запроса для оператора LIKE (SQL).
        $searchString = '%'. $_POST['param1'] .'%';
        //Обработка подставляемых значений для защиты от SQL инъекций.
        $sql = $wpdb->prepare( " AND ( post_content LIKE %s OR post_title LIKE %s ) ", array( $searchString, $searchString));
       // var_dump($sql);
        //Здесь описывается та часть запроса которая будет добавлена.
        return $where . $sql;
    }
    //Фильтр с хуком "post_where" который позволяет достучатся до блока where запроса.
    add_filter( 'posts_where' , 'useless_condition' );

    //Берем посты типа "MyPosts" внимание стоит обратить на параметр "suppress_filters" он по умолчанию равен true, что означает, что измененная часть запроса
    // не будет использована в результирющем запросе к базе. Поэтому мы меняем его на False, и теперь измененный запрос будет учтен.
    $posts = get_posts( array(
        'post_type' => 'myposts',
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

add_action( 'wp_ajax_intexosft', 'get_html_search_result' ); // wp_ajax_{ЗНАЧЕНИЕ ПАРАМЕТРА ACTION!!}
add_action( 'wp_ajax_nopriv_intexosft', 'get_html_search_result' );  // wp_ajax_nopriv_{ЗНАЧЕНИЕ ACTION!!}
// первый хук для авторизованных, второй для не авторизованных пользователей
