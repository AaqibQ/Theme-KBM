<?php
/*
Template Name: Contact
*/
get_header();
?>


<div class="about-banner">
        <div class="container">
            <div class="contentbox">
                <h2><?php echo get_field('banner_heading'); ?> </h2>
                <p><?php echo get_field('banner_content'); ?></p>
            </div>
        </div>
    </div>

    <section class="contact-us-page-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3598.014738282181!2d-80.4292766!3d25.604426500000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9c2410d2e6f25%3A0x1746e52f1cf23a74!2s17569%20SW%20147th%20Ave%2C%20Miami%2C%20FL%2033187%2C%20USA!5e0!3m2!1sen!2s!4v1697704131215!5m2!1sen!2s" width="500" height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="location-image-abs-2"></iframe>
                    
                </div>
                <div class="col-lg-6 contact-page-form-section">
                    <h2><?php echo get_field('form_heading'); ?></h2>
                    <p class="mb-5">
                    <?php echo get_field('form_content'); ?></p>
                    <?php echo do_shortcode('[contact-form-7 id="a01ae43" title="Contact Page Form"]');?>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();   