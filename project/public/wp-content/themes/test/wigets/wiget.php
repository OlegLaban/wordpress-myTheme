<?php
class Intex_Widget_For_Search extends WP_Widget
{
    public function __construct()
    {
        $widget_options = array(
            'classname' => 'search_widget',
            'description' => 'This is an search_widget',
        );
        parent::__construct('search_widget', 'Search Widget', $widget_options);
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; ?>
        <div class="widget-search">
            <input id="search-input" type="text" name="search" placeholder="<?php echo $instance['placeholder']; ?>">
            <button id="search-button">Искать</button>
            <p><strong>Результаты поиска</strong></p>
            <div id="wrap-search">
            </div>
        </div>


        <?php echo $args['after_widget'];
    }

    public function form($instance)
    {
        $placeholder = !empty($instance['placeholder']) ? $instance['placeholder'] : '';
        $title = !empty($instance['title']) ? $instance['title'] : ''; ?>
        <p>
        <label for="<?php echo $this->get_field_id('placeholder'); ?>">Set placeholder:</label>
        <input type="text" id="<?php echo $this->get_field_id('placeholder'); ?>"
               name="<?php echo $this->get_field_name('placeholder'); ?>"
               value="<?php echo esc_attr($placeholder); ?>"/><br>
        <label for="<?php echo $this->get_field_id('title'); ?>">Set title:</label>
        <input type="text" id="<?php echo $this->get_field_id('title'); ?>"
               name="<?php echo $this->get_field_name('title'); ?>"
               value="<?php echo esc_attr($title); ?>"/>
        </p><?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['placeholder'] = strip_tags($new_instance['placeholder']);
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;

    }
}
