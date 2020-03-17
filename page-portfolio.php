<?php 
/*
    Template Name: Portfolio
*/
?>
<?php get_header('page'); ?>
        <section class="portfolio">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h2>We create quality designs.</h2>
                        <p>We specialize in Web Design / Development and Graphic Design</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <ul class="nav nav-pills align-self-start nav-margin" id="nav-products" role="tablist">
                        <?php
                        $terms = get_terms( [
                            'taxonomy' => 'gallery-categories',
                            'hide_empty' => false,
                        ] );
                        foreach($terms as $term) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link filter-button" data-filter="<?php echo $term->slug; ?>">
                                    <?php echo $term->name; ?>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>   
                    <div class="tab-content row">
                    <?php 
                        global $post;
                        $args = array(
                            'post_type' => 'gallery-portfolio',
                            'posts_per_page' => 9
                        );
                        $query = new WP_Query;
                        $portfolio_item = $query->query($args);
                        foreach( $portfolio_item as $item ){
                            $category = get_the_terms( $item->ID, 'gallery-categories' );
                            $flag = 0;
                            foreach($category as $catItem){
                                if($flag == 0){
                                    $dataCat = $catItem->slug;
                                    $dataCatComma = $catItem->name;
                                }else{
                                    $dataCat .= ' '.$catItem->slug;
                                    $dataCatComma .= ', '.$catItem->name;
                                }
                                $flag++;
                            }  
                            $postLink = get_the_permalink($item->ID);
                            $attachmentId = get_post_thumbnail_id($item->ID);
                            $thymbUrl = wp_get_attachment_url($attachmentId, 'full', true); 
                            echo '<div class="gallery_product col-lg-4 col-md-6 col-sm-12 col-xs-12 col-12 filter '.$dataCat.'" data-cat="'.$dataCat.'">
                                    <img src="'.$thymbUrl.'" class="img-responsive">
                                    <figcaption class="img-overlay">
                                        <a href="'.$postLink.'" class="img-link" aria-label="row"></a>
                                    </figcaption>
                                </div> ' ;
                        }   
                    ?>     
                    </div>
                    </div>
                </div>
            </div>
        </section>
<?php get_footer(); ?>