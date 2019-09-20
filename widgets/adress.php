<?php
/* Adress and phone Widget */
class contact_widget extends WP_Widget {
	

    
    public function __construct() {
        $widget_options = array(
            'classname' => 'contact_widget',
            'description' => 'Contact Widget',
        );
        parent::__construct( 'contact_widget', 'Contact Widget', $widget_options );
    }

    public function widget( $args, $instance ) {
        $args['before_widget'] = '<div class="widget widget_contact" >';
        $args['after_widget'] = '</div>';
        
    ?>
    <?php 
        echo $args['before_widget'];
        $adress = '';
        if(!empty($instance['adress']) && !empty($instance['phone'])){
            $adress = 'Adress and Phone';
        } elseif (!empty($instance['adress'])){
            $adress = 'Adress';
        } elseif (!empty($instance['phone'])){
            $adress = 'Phone';
    }?>
        <h5><?php echo $adress ?></h5>
		<p class="address">
	    <?php echo $instance['adress']; ?>
	        <span><?php echo $instance['phone']; ?></span>
        </p>
                       
    <?php 
        $email = '';
        if(!empty($instance['email']) &&( !empty($instance['twitter']) || (!empty($instance['facebook_link']) && !empty($instance['facebook_name']) ) || !empty($instance['instagram'])  )){
            $email = 'Email and Social';
        } elseif (!empty($instance['email'])){
            $email = 'Email';
        } elseif (!empty($instance['twitter']) || (!empty($instance['facebook_link']) && !empty($instance['facebook_name']) ) || !empty($instance['instagram'])){
        $email = 'Social';
        }
    ?>
		<h5><?php echo $email ?></h5>
		<p>
        <?php if(!empty($instance['email'])){ ?>
            <span>E-mail: <?php echo $instance['email']; ?></span><br>
        <?php
                }
                if(!empty($instance['twitter'])){
        ?>
            <span>Twitter: <a href="https://twitter.com/<?php echo $instance['twitter'] ?>" target="_blank"><?php echo $instance['twitter'] ?></a></span><br>
        <?php
                }
                if(!empty($instance['facebook_link']) && !empty($instance['facebook_name']) ) {
        ?>
            <span>Facebook: <a href="<?php echo $instance['facebook_link'] ?>" target="_blank"><?php echo $instance['facebook_name']; ?></a></span><br>
        <?php
                }
                if(!empty($instance['instagram'])){
        ?>
            <span>Instagram: <a href="https://www.instagram.com/<?php echo $instance['instagram'] ?>" target="_blank">@<?php echo $instance['instagram'] ?></a></span>
        <?php
                }
        ?>
        </p>
        <?php
        echo $args['after_widget'];
    }
    
    public function form( $instance ) {
        
        $adress = ! empty( $instance['adress'] ) ? $instance['adress'] : '';
        $phone = ! empty( $instance['phone'] ) ? $instance['phone'] : '';
        $email = ! empty( $instance['email'] ) ? $instance['email'] : '';
        $twitter = ! empty( $instance['twitter'] ) ? $instance['twitter'] : '';
        $facebookName = ! empty( $instance['facebook_name'] ) ? $instance['facebook_name'] : '';
        $facebookLink = ! empty( $instance['facebook_link'] ) ? $instance['facebook_link'] : '';
        $instagram = ! empty( $instance['instagram'] ) ? $instance['instagram'] : ''; ?>        
        <p>
        <label for="<?php echo $this->get_field_id( 'adress'); ?>">Address:</label> <br>
        <textarea name="<?php echo $this->get_field_name( 'adress'); ?>" id="<?php echo $this->get_field_id( 'adress'); ?>" cols="" rows="4" style="resize: none; max-width:100%; width: 100%;"><?php echo esc_attr($adress); ?></textarea><br>
        <label for="<?php echo $this->get_field_id( 'phone'); ?>">Phone:</label><br>
        <input type="tel" pattern="(\+38)?09[0-9]{8}" id="<?php echo $this->get_field_id( 'phone'); ?>" name="<?php echo $this->get_field_name( 'phone'); ?>" style="width: 100%; max-width: 100%;" value="<?php echo esc_attr($phone); ?>"><br>
        <label for="<?php echo $this->get_field_id( 'email'); ?>">Email:</label> <br>
        <input type="email" style="width: 100%; max-width: 100%;" id="<?php echo $this->get_field_id( 'email'); ?>" name="<?php echo $this->get_field_name( 'email'); ?>" value="<?php echo esc_attr($email); ?>"><br>
        <label for="<?php echo $this->get_field_id( 'twitter'); ?>">Twitter (login):</label> <br>
        <input type="text" name="<?php echo $this->get_field_name( 'twitter'); ?>" id="<?php echo $this->get_field_id( 'twitter'); ?>" style="width: 100%; max-width: 100%;" value="<?php echo esc_attr($twitter); ?>"> <br>
        <label for="<?php echo $this->get_field_id( 'facebook_name'); ?>">Facebook name:</label><br>
        <input type="text" name="<?php echo $this->get_field_name( 'facebook_name'); ?>" id="<?php echo $this->get_field_id( 'facebook_name'); ?>" style="width: 100%; max-width: 100%;" value="<?php echo esc_attr($facebookName); ?>"><br>
        <label for="<?php echo $this->get_field_id( 'facebook_link'); ?>">Facebook link:</label><br>
        <input type="text" name="<?php echo $this->get_field_name( 'facebook_link'); ?>" id="<?php echo $this->get_field_id( 'facebook_link'); ?>" style="width: 100%; max-width: 100%;" value="<?php echo esc_attr($facebookLink); ?>"><br>
        <label for="<?php echo $this->get_field_id( 'instagram'); ?>">Instagram (login):</label><br>
        <input type="text" name="<?php echo $this->get_field_name( 'instagram'); ?>" id="<?php echo $this->get_field_id( 'instagram'); ?>" style="width: 100%; max-width: 100%;" value="<?php echo esc_attr($instagram); ?>">
        </p>
       <?php
       
    }

    public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
        $instance['adress'] = strip_tags( $new_instance[ 'adress' ] );
        $instance['phone'] = strip_tags( $new_instance[ 'phone' ] );
        $instance['email'] = strip_tags( $new_instance[ 'email' ] );
        $instance['twitter'] = strip_tags( $new_instance[ 'twitter' ] );
        $instance['facebook_name'] = strip_tags( $new_instance[ 'facebook_name' ] );
        $instance['facebook_link'] = strip_tags( $new_instance[ 'facebook_link' ] );
        $instance['instagram'] = strip_tags( $new_instance[ 'instagram' ] );
        return $instance;
    }

}

function contact_register_widget() {
    register_widget( 'contact_widget' );
}
add_action( 'widgets_init', 'contact_register_widget' );