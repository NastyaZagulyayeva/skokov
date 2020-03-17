<?php get_header('page'); ?>
<section class="post-portfolio">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-12 single-post-portfolio">
                <?php 
                    $content = get_post_field('post_content', $post_id);
                    $content = preg_replace("/<img[^>]+\>/i", "", $content);
                ?>


                <div class="gallery js-gallery">
                    <div class="gallery__bigImage" id="js-bigImage">
                        <?php 
                            $attachments= get_attached_media( 'image', $post->ID );
                            $first = array_shift($attachments);?>
                            <a href="<?php echo wp_get_attachment_url($first->ID); ?>" data-fancybox>
                                <img src="<?php echo wp_get_attachment_url($first->ID); ?>" alt="image1">
                            </a>
                        <button type="button" class="gallery__prev" id="js-prev"></button>
                        <button type="button" class="gallery__next" id="js-next"></button>
                    </div>

                    <ul class="gallery__list" id="js-list">
                        <li class="gallery__item active">
                            <a class="gallery__link" href="<?php echo wp_get_attachment_url($first->ID); ?>">
                                <img class="gallery__smallImage" src="<?php echo wp_get_attachment_url($first->ID); ?>" alt="image1">
                            </a>
                        </li>   
                        <?php     
                            foreach($attachments as $att_id => $attachment) {
                                $full_img_url = wp_get_attachment_url($attachment->ID);?>
                                <li class="gallery__item">
                                    <a class="gallery__link" href="<?php echo $full_img_url; ?>">
                                        <img class="gallery__smallImage" src="<?php echo $full_img_url; ?>" alt="image2">
                                    </a>
                                </li>
                        <?php }?>
                    </ul>
                </div>


                <div class="post-description">
                    <?php echo do_shortcode( '[section text="project description"]' ); ?>
                    <div class="post-content">
                        <p><?php echo $content; ?><p>
                    </div>
                </div>

                <div class="related-posts">
                <span class="title-for-blok-post">recent projects</span>
                <div class="rel-posts">
                    <div class="container-fluid">
                        <div class="row">
                        <?php 
                        $args = array(
                            'numberposts' => 3,
                            'post_type' => 'gallery-portfolio',
                            'post_status' => 'publish'
                        ); 

                        $result = wp_get_recent_posts($args);

                        foreach( $result as $p ){ ?>
                                <div class="rel-post col-lg-4 col-md-6 col-12">
                                    <a href="<?php echo get_permalink($p["ID"]); ?>"><?php echo get_the_post_thumbnail($p["ID"]);; ?></a>
                                </div>    
                            <?php 
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div> 
            </div>   
            <div class="sidebar col-md-4 col-12">
                <?php get_sidebar() ?>
            </div>
        </div>
    </div>
</section>                

<?php get_footer(); ?>