<?php


/**
 * Adds widget.
 */
class Follow_us_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'follow-us', // Base ID
			esc_html__( 'Follow us', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Follow us with mailchimp', 'text_domain' ), ) // Args
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
        $text = apply_filters( 'widget_text', $instance['text'] );
        
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        
        $paragraph = '<p>';
        $paragraph .= $text;
		$paragraph .= '</p>';
		$mailchimp = '<div id="mc_embed_signup">
        <form action="https://gmail.us5.list-manage.com/subscribe/post?u=a038531d0c70a38b126dab8d4&amp;id=2041edbaea" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">
        <div class="mc-field-group">
            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
        </div>   
            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_a038531d0c70a38b126dab8d4_2041edbaea" tabindex="-1" value=""></div>
            <div class="clear"><button name="subscribe" id="mc-embedded-subscribe" class="button"><i class="fa fa-envelope-o"></i></button></div>
            </div>
        </form>
        </div>';

		echo $paragraph;
		echo $mailchimp;
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
        $text = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( 'Text', 'text_domain' );

		?>
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php esc_attr_e( 'Text:', 'text_domain' ); ?></label> 
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>"></textarea>
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
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['text'] = ( ! empty( $new_instance['text'] ) ) ? sanitize_text_field( $new_instance['text'] ) : '';

        return $instance;
	}

} 