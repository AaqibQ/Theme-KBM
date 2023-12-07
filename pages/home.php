<?php
/*
Template Name: Home
*/
get_header();

?>

    <div id="homecarousel" class="carousel carousel-dark slide homebanner" data-bs-ride="carousel">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#homecarousel" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#homecarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#homecarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-social-icons">
            <ul class="d-flex p-0">
                <li>
                    <a href="<?php echo esc_html(get_option('facebook')); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner_social-fb.png" class="img-fluid" alt="facebook">
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_html(get_option('instagram')); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner_social-ig.png" class="img-fluid" alt="facebook">
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_html(get_option('twitter')); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner_social-tw.png" class="img-fluid" alt="facebook">
                    </a>
                </li>
            </ul>
        </div>


        <div class="carousel-inner">

            <?php
            if( have_rows('main_banner_') )
            $i=1; 
            while ( have_rows('main_banner_') ) : the_row();
                ?>
                  <div class="carousel-item <?php echo $i == 1 ? 'active' : ''; ?>" data-bs-interval="2000">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner1.png" class="d-block w-100" alt="banner">
                    <div class="carousel-caption">
                        <h2>Make Your Event Memorable</h2>
                        <h3><?php the_sub_field('heading'); ?></h3>
                        <p><?php the_sub_field('content'); ?></p>
                            <a href="<?php the_sub_field('button_url'); ?>" class="btn banner_btn_custom"><?php the_sub_field('button_text'); ?></a>
                    </div>
                </div>
                <?php 
                 $i++;
                endwhile;
                wp_reset_postdata();
                ?>
        </div>
    </div>

    <section class="wedding-photography">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="<?php echo get_field('about_image'); ?> " class="img-fluid wedding-photography-abs" alt="collage image">
                </div>
                <div class="col-lg-6">
                    <div class="caption header-text">
                        <h6><?php echo get_field('about_heading'); ?> </h6>
                        <p>
                           <?php echo get_field('about_content'); ?> 
                        </p>
                    </div>
                    <div class="main-button scroll-to-section">
                        <a href="<?php echo get_field('about_url'); ?> " class="btn btn-primary btncustomoutline">
                            <?php echo get_field('about_button'); ?> 
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/seconeabs.png" class="img-fluid seconeabsimg" alt="abs pattern">
    </section>


    <section class="what-we-do">
        <div class="container">
            <div class="row mb-5 align-items-center">
                
                <div class="col-lg-5">
                    <div class="content_section">
                        <h6>What we do</h6>
                        <h3> <?php echo get_field('what_heading_'); ?> </h3>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="content_section">
                        <p> <?php echo get_field('what_content'); ?>  </p>
                    </div>
                </div>

            </div>

            <div class="owl-carousel owl-theme what-we-do-carousel">
                <?php 
               $args = array(
                    'post_type'           => 'counseling',
                    'post_status'         => 'publish',
                    'ignore_sticky_posts' => 1,
                    'posts_per_page'      =>-1,
                    'orderby'             => 'asc',
                    'order'               => 'asc',
                    'tax_query'           => array(
                        array(
                            'taxonomy'      => 'counseling_categories',
                            'field'         => 'slug', //This is optional, as it defaults to 'term_id'
                            'terms'         => 'page-home',
                            'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
                        )
                    )
                );
                
                $the_query = new WP_Query( $args );

                if ($the_query->found_posts!=0)
                {
                    $data = [];
                    $i=1;
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                    $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                        ?>
                        <div class="card-box-hover-with-image">
                            <img src="<?php echo $feat_image ; ?>" class="img-fluid" alt="service">
                            <div class="card_footer_custom">
                                <a href="javascript:;"> <?php echo get_the_title(); ?> <i class="fa fa-angle-right" aria-hidden="true"></i> </a>
                            </div>
                        </div>                             
                        <?php
                    $i++;
                    endwhile;
                    wp_reset_postdata();
                    wp_reset_query();
                }

                ?>
            </div>
        </div>
    </section>


    <section class="best-moments">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src=" <?php echo get_field('moment_image'); ?>" class="img-fluid" alt="collage image">
                </div>
                <div class="col-lg-6">
                    <div class="caption header-text">
                        <h6><?php echo get_field('moment_heading'); ?> </h6>
                        <p>
                        <?php echo get_field('moment_content'); ?> 
                        </p>
                    </div>
                    <div class="main-button scroll-to-section">
                        <a href="<?php echo get_field('moment_button_link'); ?>" class="btn btn-primary btncustomoutline">
                        <?php echo get_field('moment_button_text'); ?> 
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/seconeabs2.png" class="img-fluid seconeabsimg2" alt="abs pattern">
    </section>


    <section class="trusted-clients">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="caption header-text">
                        <h6><?php echo get_field('trusted_section_heading'); ?></h6>
                        <p>
                        <?php echo get_field('trusted_section_content'); ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/trustedclients.png" class="img-fluid" alt="collage image">
                </div>
            </div>
        </div>
    </section>


    <section class="our-latest-work">
        <div class="container">
            <div class="content">
                <h2><?php echo get_field('work_heading'); ?></h2>
                <p><?php echo get_field('work_content'); ?>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">

                <?php 
                $args = array(
                    'post_type'           => 'work',
                    'post_status'         => 'publish',         
                );
                
                $the_query = new WP_Query( $args );

                if ($the_query->found_posts!=0)
                {
                    $data = [];
                    $i=1;
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                    $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                        ?>
                         <div class="col-lg-3 col-sm-6 my-4">
                            <img src="<?php echo $feat_image ; ?>" class="img-fluid" alt="work image">
                        </div>                        
                        <?php
                    $i++;
                    endwhile;
                    wp_reset_postdata();
                    wp_reset_query();
                }

                ?>
            </div>
        </div>
    </section>


    <?php get_template_part('template-parts/location');?>


    <section class="contact-us-with-bg">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>What Our Client Says</h2>
                   <!-- <p>Our friendly team would love to hear from you!</p> -->
					<?php echo do_shortcode( '[rt-testimonial id="252" title=""]' ) ?>
                  <?php //echo do_shortcode('[contact-form-7 id="8f655ba" title="Home Contact"]');?>
                </div>
                
            </div>
        </div>
    </section>

<?php
get_footer();    