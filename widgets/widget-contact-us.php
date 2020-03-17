<?php


/**
 * Adds widget.
 */
class Contact_us_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'contact_widget', // Base ID
			esc_html__( 'Contact us', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Contact info', 'text_domain' ), ) // Args
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
        $address = apply_filters( 'widget_address', $instance['address'] );
        $phone = apply_filters( 'widget_phone', $instance['phone'] );
		$email = apply_filters( 'widget_email', $instance['email'] );

        echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        ?>
        <address>
            <span class="icon-square"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
            <p><span class="top">Address:</span><?php echo $address ?></p>
        </address>
        <address>
            <span class="icon-square"><i class="fa fa-whatsapp" aria-hidden="true"></i></span>
            <p>
                <span class="top">Phone:</span>
                <a href="tel:<?php echo $phone ?>"><?php echo $phone ?></a>
            </p>
        </address>
        <address>
            <span class="icon-square"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
            <p>
                <span class="top">E-mail:</span>
                <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a>
            </p>
        </address>

        <?php
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
        $address = ! empty( $instance['address'] ) ? $instance['address'] : esc_html__( 'Address', 'text_domain' );
        $phone = ! empty( $instance['phone'] ) ? $instance['phone'] : esc_html__( 'Phone', 'text_domain' );
        $email = ! empty( $instance['email'] ) ? $instance['email'] : esc_html__( 'Email', 'text_domain' );

        ?>
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"><?php esc_attr_e( 'Address:', 'text_domain' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>" type="text" value="<?php echo esc_attr( $address ); ?>"></input>
        </p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"><?php esc_attr_e( 'Phone:', 'text_domain' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone' ) ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>"></input>
        </p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php esc_attr_e( 'Email:', 'text_domain' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>"></input>
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
		$instance['address'] = ( ! empty( $new_instance['address'] ) ) ? sanitize_text_field( $new_instance['address'] ) : '';
		$instance['phone'] = ( ! empty( $new_instance['phone'] ) ) ? sanitize_text_field( $new_instance['phone'] ) : '';
		$instance['email'] = ( ! empty( $new_instance['email'] ) ) ? sanitize_text_field( $new_instance['email'] ) : '';


        return $instance;
	}

} 