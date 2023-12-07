    <section class="our-locations">
        <div class="container">
            <div class="content">
                <h2><?php echo esc_html(get_option('our_location')); ?></h2>
                <p><?php echo esc_html(get_option('our_location_content')); ?> </p>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content-logo.png" class="img-fluid" alt="work image">
                    <p class="our-locations-conent"><?php echo esc_html(get_option('inner_content_details')); ?></p>
                    <h6 class="social-links-heading">
                        Our Social Links
                    </h6>
                    <ul class="our-social-links">
                      <li><a href="https://www.facebook.com/john.pierre.796"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/fb.png" class="img-fluid" alt="footer social icons"></a></li>
                        <li><a href="https://twitter.com/jepierre4"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/tw.png" class="img-fluid" alt="footer social icons"></a></li>
                        <li><a href="https://www.instagram.com/johnepierresr/"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/ig.png" class="img-fluid" alt="footer social icons"></a></li>
                    </ul>
                    <div class="main-button scroll-to-section">
                        <a href="/contact-us/" class="btn btn-primary btncustomoutline">
                            Get Started 
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3598.014738282181!2d-80.4292766!3d25.604426500000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9c2410d2e6f25%3A0x1746e52f1cf23a74!2s17569%20SW%20147th%20Ave%2C%20Miami%2C%20FL%2033187%2C%20USA!5e0!3m2!1sen!2s!4v1697704131215!5m2!1sen!2s" width="600" height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="location-image-abs"></iframe>
                    
                </div>
            </div>
        </div>
    </section>