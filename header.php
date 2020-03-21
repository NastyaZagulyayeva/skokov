<!DOCTYPE html>
<div lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Skokov</title>
        <?php wp_head(); ?>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <?php the_custom_logo(); ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php wp_nav_menu([
                    'theme_location'  => 'top',
                    'menu'            => '', 
                    'container'       => 'div', 
                    'container_class' => 'collapse navbar-collapse navbar-style justify-content-flex-end', 
                    'container_id'    => 'navbarNav',
                    'menu_class'      => 'navbar-nav ml-auto', 
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                ] ); ?>
            </nav>
        </header>
        <section class="slider">
            <div id="carouselExampleIndicators" class="carousel slide slider-wrapper" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container margin">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="text-wrpper">
                                        <h2><span class="highlight"><?php echo get_theme_mod( 'title_for_slider'); ?></span></h2>
                                        <p><span class="highlight"><?php echo get_theme_mod( 'description_for_slider'); ?></span></p>
                                    </div>
                                    <div class="btn-link-block">
                                        <a class="btn-link" href="#">Order Now</a>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 padding-colum">
                                <?php 
                                    global $post;
                                    $args = array( 'post_type' => 'co-worker', 'posts_per_page' => 10);
                                    $myposts = get_posts($args);
                                    $firct_block = array_slice($myposts, 0, 3);
                                    $second_block = array_slice($myposts, 3, 3);
                                    $third_block = array_slice($myposts, 6, 3); 
                                    $last_block =  array_slice($myposts, 9, 1);  
                                ?>
                                    <div class="d-flex justify-content-start">
                                    <?php  foreach( $firct_block as $post ){ ?>
                                        <?php the_post_thumbnail(); ?>
                                    <?php } ?>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                    <?php  foreach( $second_block as $post ){ ?>
                                        <?php the_post_thumbnail(); ?>
                                    <?php } ?>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                    <?php  foreach( $third_block as $post ){ ?>
                                        <?php the_post_thumbnail(); ?>
                                    <?php } ?>
                                    </div>
                                    <div class="d-flex justify-content-around">
                                    <?php  foreach( $last_block as $post ){ ?>
                                        <?php the_post_thumbnail('thumbnail', ['class' => 'last-image']); ?>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
