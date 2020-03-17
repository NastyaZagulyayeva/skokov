<?php 
/*
    Template Name: Contact
*/
?>

<?php get_header('page'); ?>

<section class='contact-info'>
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d166068.29449357087!2d31.909144811963067!3d49.431271745469466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d14b866064977f%3A0xf8dce723a9cbb5d8!2z0KfQtdGA0LrQsNGB0YHRiywg0KfQtdGA0LrQsNGB0YHQutCw0Y8g0L7QsdC70LDRgdGC0YwsIDE4MDAw!5e0!3m2!1sru!2sua!4v1583160512720!5m2!1sru!2sua" width="600" height="645" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
    <div class="container-fluid contact-form">
        <div class="row">
            <div class="col-12 col-md-8 form">
            <?php echo do_shortcode( '[section text="send us a message"]' ); ?>
                <form id="add_feedback">
                    <input type="text" name="art_name" id="art_name" class="required art_name" placeholder="name..." value=""/>
                    <input type="email" name="art_email" id="art_email" class="required art_email" placeholder="email..." value=""/>
                    <input type="text" name="art_subject" id="art_subject" class="art_subject" placeholder="subject..." value=""/>
                    <textarea name="art_comments" id="art_comments" placeholder="message..." rows="10" cols="30" class="required art_comments"></textarea>
                    <input type="submit" id="submit-feedback" class="button-form" value="Send a message"/>
                </form>
            </div>
            <div class="col-12 col-md-4 conact-us">
            <?php echo do_shortcode( '[section text="contact info"]' ); ?>
                <?php the_widget('Contact_us_Widget', array('address' => '12569 Saint Patrick des Prés, 85000 Paris, France', 'phone' => '+380458454578', 'email' => 'freeforwebdesign@gmail.com')); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>