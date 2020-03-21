<?php 
/*
    Template Name: Blog
*/
?>
<?php get_header('page'); ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 main">
                    <div class="blog-container">
                        <div class="blog-page masonry-block" id="page1">
                            <div class="grid-sizer"></div>
                            <div class="grid-item blog-item">
                                <p class="quote">"<?php echo get_theme_mod( 'quote_in_blog'); ?>"</p>
                                <p class="author"><?php echo get_theme_mod( 'quote_author_in_blog'); ?></p>
                            </div>
                            <?php
                                global $post;
                                $postslist = get_posts( array( 'posts_per_page' => 7, 'order'=> 'ASC', 'orderby' => 'date' ) );
                                foreach ( $postslist as $post ){
                                    setup_postdata($post);
                            ?>
                                <div class="grid-item blog-item">
                                    <?php the_post_thumbnail(); ?>
                                    <h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <p class="news-text"><?php the_excerpt(); ?></p>
                                    <div class="info">
                                        <i class="fa fa-heart"><span>6</span></i>
                                        <p><?php the_author(); ?> / <?php get_comments_number($post) ?> comments / <?= get_the_date('M. d, Y', $post); ?></p>
                                    </div>
                                </div>
                                    <?php
                                }
                                wp_reset_postdata(); ?>
   
                        </div>
                    </div>
                </div>
                <div class="sidebar col-md-4">
                    <?php get_sidebar() ?>
                </div>
            </div>
        </div>

<?php get_footer(); ?>