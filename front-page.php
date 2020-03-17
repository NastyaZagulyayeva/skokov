<?php 
/*
    Template Name: Home
*/
?>
<?php get_header(); ?>

        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>We create quality designs.</h2>
                        <p>We specialize in Web Design / Development and Graphic Design</p>
                    </div>
                </div>

                <div class="row">
                <?php 
                        global $post;
                        $args = array( 'post_type' => 'design', 'posts_per_page' => 4 );
                        $loop = new WP_Query( $args );
                        while ($loop->have_posts() ){
                             $loop->the_post();
                             $category = get_the_terms( $post->ID, 'design_categories' );
                            foreach($category as $catItem){
                                $dataCatComma = $catItem->name; 
                                $pic = z_taxonomy_image_url($catItem->term_id);
                                ?>
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="section-box">
                                <div class="box-header-overlay">
                                    <div class="post-img" style="background-image: url(<?= $pic ?>);">
                                    <?php the_post_thumbnail(); ?>
                                    <p class="category-name"><?php echo $dataCatComma ?></p>
                                    </div>
                                    <div class="short-description description">
                                        <p><?= post_excerpt($post, 50) ?></p>
                                    </div>
                                    <div class="post-title description">
                                        <p><?php the_title(); ?></p>
                                        <p class="category">In <span>web design</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } }?>
                </div>
            </div>

        </section>

        <section class="portfolio">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 head-wrapper">
                        <?php echo do_shortcode( '[section text="our work"]' ); ?>
                    </div>
                    <div class="col-12">
                        <p class="description-section">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed d
                        </p>
                    </div>
                </div>
            </div>

            <div class="container-fluid grid-container">
                <div class="row grid"> 
                    <div class="col-12 col-sm-6 col-md-4 col-xl-2 grid-sizer"></div>
                    <?php 
                        $args = array( 'post_type' => 'portfolio', 'posts_per_page' => 11);
                        $loop = new WP_Query( $args );
                        $index = 0;
                        while ($loop->have_posts() ): $loop->the_post();
                        $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
                        ?>
                    <div class="col-12 col-sm-6 col-md-4 grid-item <?= masonry_class_selector($index); ?>">
                        <div class="grid-item-img" style="background-image: url('<?= $backgroundImg[0]; ?>');"></div>
                    </div>
                    <?php $index++; endwhile; ?>
                </div>
            </div>
        </section>

        <section class="client">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 head-wrapper">
                        <?php echo do_shortcode( '[section text="our clients"]' ); ?>
                    </div>
                    <div class="col-12">
                        <p class="description-section">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed d
                        </p>
                    </div>
                </div>
            </div>
            <div class="container-fluid owl-carousel">
                <?php 
                    $args = array( 'post_type' => 'client', 'posts_per_page' => 8);
                    $loop = new WP_Query( $args );
                    while ($loop->have_posts() ): $loop->the_post();
                ?>    
                <div>
                    <?php the_post_thumbnail(); ?> 
                </div>

                <?php endwhile; ?>
            </div>
        </section>

<?php get_footer(); ?>