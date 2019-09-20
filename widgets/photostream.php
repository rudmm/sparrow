<?php
/* Adress and phone Widget */
class photostream_widget extends WP_Widget {

    public function __construct() {
        $widget_options = array(
            'classname' => 'photostream_widget',
            'description' => 'PhotoStream Widget',
        );
        parent::__construct( 'photostream_widget', 'Photostream Widget', $widget_options );
    }

    public function widget( $args, $instance ) {
        $args['before_widget'] = '<div class="widget widget_photostream ">';
        $args['after_widget'] = '</div>';
        echo $args['before_widget'];
        ?>
        <h5><?php echo $instance['title']; ?></h5> 
        <ul class="photostream cf">
        <?php $the_query = new WP_Query( 'showposts=' . $instance['quantity_photo'] );
		    while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></li>
            <?php endwhile; ?>
        </ul>
        <?php
        echo $args['after_widget'];
    }
    
    public function form( $instance ) {
        
        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
        $quantity_photo = ! empty( $instance['quantity_photo'] ) ? $instance['quantity_photo'] : 1;
        ?>        
        <p>
        <label for="<?php echo $this->get_field_id( 'title'); ?>">Enter Title:</label><br>
        <input type="text" name="<?php echo $this->get_field_name( 'title'); ?>" id="<?php echo $this->get_field_id( 'title'); ?>" style="width: 100%; max-width: 100%;" value="<?php echo esc_attr($title); ?>"><br>
        <label for="<?php echo $this->get_field_id( 'quantity_photo'); ?>">Quantity photo posts<span style="color: red;">(max = 12)</span>:</label><br>
        <input type="number" name="<?php echo $this->get_field_name( 'quantity_photo'); ?>" id="<?php echo $this->get_field_id( 'quantity_photo'); ?>" style="width: 100%; max-width: 100%;" value="<?php echo esc_attr($quantity_photo); ?>">
        </p>
        <?php
       
    }

    
    public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance[ 'title' ] );
        if($new_instance['quantity_photo']> 12){
			$new_instance['quantity_photo'] = 12;
		}
        $instance['quantity_photo'] = strip_tags( $new_instance[ 'quantity_photo' ] );
        return $instance;
    }

}

function photostream_register_widget() {
    register_widget( 'photostream_widget' );
}
add_action( 'widgets_init', 'photostream_register_widget' );