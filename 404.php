<?php 
/*
    Template Name: 404
*/
?>
<?php get_header('page'); ?>
<section class="error">
    <h1 class="page-title"><?php _e( '404', 'skokov' ); ?></h1>
    <div class="intro-text">
        <p><?php _e( 'page not found!', 'skokov' ); ?></p>
    </div>
    <div class="proposal">
        <div class="btn-link-block">
            <a class="btn-link" href="<?php echo home_url(); ?>">Back to homepage</a>
        </div>
        <span> or</span>
        <div class="btn-link-block">
            <a class="btn-link" href="<?php echo home_url('/blog'); ?>">Our Blog</a>
        </div>
    </div>


</section> 
<?php get_footer(); ?>