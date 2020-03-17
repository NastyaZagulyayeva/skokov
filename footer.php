<footer>
    <div class="footer container-fluid">
        <div class="row">
            <div class=" col-lg-4 col-12">
            <?php
                dynamic_sidebar('footer-left');
            ?>
            </div>
            <div class=" col-lg-4 col-12">
            <?php
                dynamic_sidebar('footer-center');
            ?>
            </div>
            <div class=" col-lg-4 col-12">
            <?php
                dynamic_sidebar('footer-right');
            ?>
            </div>
        </div>
    </div>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <p class="copyright">Copyright 2013 - FreeForWebDesign.com - All Rights Reserved</p>
            <div class="navbar-style">
            <?php wp_nav_menu([
                    'theme_location'  => 'bottom',
                    'menu'            => '', 
                    'container'       => 'ul', 
                    'menu_class'      => 'navbar-nav', 
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                ] ); ?>
            </div>
        </nav>
    </div>
</footer>
<?php  wp_footer(); ?>
</body>
</div>