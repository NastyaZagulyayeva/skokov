<?php get_header('page'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 blog-page">
        <?php
            global $post;
            
        ?>
            <div class="title-post-info">
                <?php the_post_thumbnail(); ?>
                <h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="info">
                    <i class="fa fa-heart"><span>6</span></i>
                    <p><?php the_author_meta('display_name', $post->post_author ); ?> /<?php echo get_comments_number($post); ?> comments / <?= get_the_date('M. d, Y', $post); ?></p>
                </div>
            </div>
            <div class="post-content">
                <?php
                   echo apply_filters( 'the_content', $post->post_content ); 
                ?>
            </div> 
            <div class="related-posts">
                <span class="title-for-blok-post">Related posts</span>
                <div class="rel-posts">
                    <div class="container-fluid">
                        <div class="row">
                        <?php 
                        $related_tax = 'category';
                        $cats_tags_or_taxes = wp_get_object_terms( $post->ID, $related_tax, array( 'fields' => 'ids' ) );
                        $args = array(
                            'posts_per_page' => 3, 
                            'tax_query' => array(
                                array(
                                    'taxonomy' => $related_tax,
                                    'field' => 'id',
                                    'include_children' => false, 
                                    'terms' => $cats_tags_or_taxes,
                                    'operator' => 'IN' 
                                )
                            )
                        );
                        $rel_post_query = new WP_Query( $args );
                        if( $rel_post_query->have_posts() ) :
                            while( $rel_post_query->have_posts() ) : $rel_post_query->the_post(); ?>
                            <div class="rel-post col-lg-4 col-md-6 col-12">
                                <?php the_post_thumbnail(); ?>
                                <h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </div>
                            <?php
                            endwhile;
                        endif;
                    wp_reset_postdata();
                    ?>
                        </div>
                    </div>
                </div>
            </div> 
            <?php comments_template(); ?>  
        </div>
        <div class="sidebar col-md-4">
            <?php get_sidebar() ?>
        </div>
    </div>
</div>                

<?php get_footer(); ?>