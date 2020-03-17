<?php

// Регистрация класса виджета
function my_register_widgets() {
	register_widget( 'SearchBox_Widget' );
	register_widget( 'MyTags_Widget' );
	register_widget( 'About_us_Widget' );
	register_widget( 'Social_connecting_Widget' );
	register_widget( 'Contact_us_Widget' );
	register_widget( 'Follow_us_Widget' );
	register_widget( 'Popular_posts' );

}
add_action( 'widgets_init', 'my_register_widgets' );