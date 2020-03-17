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
        <section class="title">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 top-image">
                        <h1 class="section-title"><?php single_post_title(); ?></h1>
                    </div>
                </div>
            </div>
        </section>
