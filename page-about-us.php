<?php 
/*
    Template Name: About us
*/
?>
<?php 
    $currentPageId = get_the_ID();
    $customField = get_field('about_us_content', $currentPageId);
    $imageTitle = ' ';
    $greeting = '';
    $excerption = '';
    $descCol1 = '';
    $descCol2 = '';
    if (!is_null($customField)) {
        $imageTitle = $customField['image_title'];
        $greeting = $customField['greeting'];
        $excerption = $customField['excerption'];
        $descCol1 = $customField['description_column_1'];
        $descCol2 = $customField['description_column_2'];
    }
?>
<?php get_header('page'); ?>
<section class='about-us'>
    <div class="container-fluid page-heading">
        <div class="row">
            <div class="col-12 col-lg-4">
                <img src="<?php echo $imageTitle ?>"/>
            </div>
            <div class="col-12 col-lg-8 main-text-about-us">
                <h3><?php echo $greeting ?></h3>
                <p class="excerption"><?php echo $excerption ?></p>
                <div class="row">
                    <div class="col-12 col-md-6">
                       <p class="description"><?php echo $descCol1 ?></p>
                    </div>
                    <div class="col-12 col-md-6">
                        <p class="description"><?php echo $descCol1 ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <div class="container-fluid our-skills">
    <?php echo do_shortcode( '[section text="our skills"]' ); ?>
    <p class="description-section"><?php echo get_theme_mod( 'text_for_skill'); ?></p>
        <div class="row skills">
        <?php
        while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php
        endwhile;
        ?>
        </div>
    </div>
    <div class="container-fluid our-team">
    <?php echo do_shortcode( '[section text="our team"]' ); ?>
    <p class="description-section"><?php echo get_theme_mod( 'text_for_team'); ?></p>
        <div class="row team">
            <?php 
                global $post;
                $args = array( 'post_type' => 'co-worker', 'posts_per_page' => 7);
                $myposts = get_posts($args);
                foreach ( $myposts as $post ){
                    $category = get_the_terms( $post->ID, 'co-worker-categories' );
                    foreach($category as $catItem){
                        $dataCatComma = $catItem->name;
            ?>
            <div class="col-lg-3 col-md-4 col-12 team-item">
                <?php the_post_thumbnail(); ?>
                <div class="spetsial">
                    <p><?php echo $dataCatComma; ?></p>
                </div>
            </div>
            <?php } } ?>
            <div class="col-lg-3 col-md-4 col-12 team-item">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/photo.png' ?>" alt="select photo">
                <div class="spetsial">
                    <input type="submit" id="submit" class="button-form" value="Send CV"/>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>


                


                    
