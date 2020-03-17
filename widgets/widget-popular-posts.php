<?php

class Popular_posts extends WP_Widget {

	function __construct() {
		parent::__construct(
			'popular_posts_widget', // Base ID
			esc_html__( 'Popular posts', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Popular posts info', 'text_domain' ), ) // Args
		);
	}

    public function widget( $args, $instance ) {

        echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        ?>
        <ul class="posts">
			<?php
				global $post;
				$postslist = get_posts( array( 'posts_per_page' => 5, 'order'=> 'ASC', 'orderby' => 'date' ) );
				foreach ( $postslist as $post ){
					 ?>
							<li class="post-item">
								<?php the_post_thumbnail(); ?>
                                <div class="post-info">
                                    <p><?php the_title(); ?></p>
                                    <div class="like-count">
                                        <p><?php echo get_the_date('M. d, Y', $post); ?></p>
                                        <i class="fa fa-heart">21</i>
                                    </div>
                                </div>
                            </li>

				<?php }
			?>
		</ul>
        <?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Popular Posts', 'text_domain' );
		$posts = ! empty( $instance['posts'] ) ? $instance['posts'] : esc_html__( '5', 'text_domain' );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			<label for="<?php echo esc_attr( $this->get_field_id( 'posts' ) ); ?>"><?php esc_attr_e( 'Number of Posts:', 'text_domain' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'posts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'posts' ) ); ?>" type="text" value="<?php echo esc_attr( $posts ); ?>">
		</p>
		<?php 
	}

	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['posts'] = ( ! empty( $new_instance['posts'] ) ) ? sanitize_text_field( $new_instance['posts'] ) : '';

		return $instance;
	}

}

