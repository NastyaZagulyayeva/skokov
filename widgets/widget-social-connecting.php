<?php


/**
 * Adds widget.
 */
class Social_connecting_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		$widget_ops = [
			'description' => esc_html__( 'Social links connecting', 'text_domain' ),
            'customize_selective_refresh' => true
        ];
		parent::__construct(
			'social_connecting_widget', // Base ID
			esc_html__( 'Social connecting', 'text_domain' ), // Name
			$widget_ops
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
    public function widget( $args, $instance ) {
		$title = apply_filters('widget_title', $instance['title']);
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $google = $instance['google'];
		$linkedin = $instance['linkedin'];
		$youtube = $instance['youtube'];
 
		// social profile link
        $facebook_profile = '<a class="facebook" href=""><i class="fa fa-facebook"></i></a>';
        $twitter_profile = '<a class="twitter" href="' . $twitter . '"><i class="fa fa-twitter"></i></a>';
        $google_profile = '<a class="google" href="' . $google . '"><i class="fa fa-google-plus"></i></a>';
        $linkedin_profile = '<a class="linkedin" href="' . $linkedin . '"><i class="fa fa-linkedin"></i></a>';
        $youtube_profile = '<a class="youtube" href="' . $youtube . '"><i class="fa fa-youtube"></i></a>';

		echo $args['before_widget'];
		if (!empty($title)) {
		echo $args['before_title'] . $title . $args['after_title'];
		}
		
        echo '<div class="summary-social">';
        echo $facebook_profile;
        echo $twitter_profile;
        echo $google_profile;
        echo $linkedin_profile;
        echo $youtube_profile;

		echo '</div>';
        echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
		$facebook = ! empty( $instance['facebook'] ) ? $instance['facebook'] : esc_html__( 'Link', 'text_domain' );
		$twitter = ! empty( $instance['twitter'] ) ? $instance['twitter'] : esc_html__( 'Link', 'text_domain' );
		$google = ! empty( $instance['google'] ) ? $instance['google'] : esc_html__( 'Link', 'text_domain' );
		$linkedin = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : esc_html__( 'Link', 'text_domain' );
		$youtube = ! empty( $instance['youtube'] ) ? $instance['youtube'] : esc_html__( 'Link', 'text_domain' );
		

	?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?= esc_attr($title); ?>">
        </p>
 
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_attr_e( 'Facebook:', 'text_domain' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>"></input>
		</p>
 
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_attr_e( 'Twitter:', 'text_domain' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>"></input>
		</p>
 
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'google' ) ); ?>"><?php esc_attr_e( 'Google:', 'text_domain' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'google' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'google' ) ); ?>" type="text" value="<?php echo esc_attr( $google ); ?>"></input>
		</p>
 
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php esc_attr_e( 'Linkedin:', 'text_domain' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>"></input>
		</p>
		
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"><?php esc_attr_e( 'Youtube:', 'text_domain' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" type="text" value="<?php echo esc_attr( $youtube ); ?>"></input>
		</p>
 
        <?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
        $instance['title'] = (!empty($new_instance['title']) ) ? sanitize_text_field($new_instance['title']) : '';
        $instance['facebook'] = (!empty($new_instance['facebook']) ) ? sanitize_text_field($new_instance['facebook']) : '';
        $instance['twitter'] = (!empty($new_instance['twitter']) ) ? sanitize_text_field($new_instance['twitter']) : '';
        $instance['google'] = (!empty($new_instance['google']) ) ? sanitize_text_field($new_instance['google']) : '';
        $instance['linkedin'] = (!empty($new_instance['linkedin']) ) ? sanitize_text_field($new_instance['linkedin']) : '';
        $instance['youtube'] = (!empty($new_instance['youtube']) ) ? sanitize_text_field($new_instance['youtube']) : '';
 
        return $instance;
	}

} 