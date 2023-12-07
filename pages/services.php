
<?php
/*
Template Name: Services
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
                            'terms'         => 'page-service',
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
                    $inner_image 	    = get_field("inner_image",$post->ID);
                    $side_text 	    = get_field("side_text",$post->ID);
                        ?>
                        <?php 
                        if ($i % 2 == 1) {
                          ?> 
                           <section class="mariage-counseling">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <img src="<?php echo $feat_image ; ?>" class="img-fluid services-sec-abs-img" alt="marriage counseling">
                                        </div>
                                        <div class="col-lg-5">
                                            <img src="<?php echo $inner_image ; ?>" class="img-fluid mb-5" alt="marriage counseling">
                                            <h2 class="services-section-heading"><?php echo get_the_title(); ?></h2>
                                            <p class="services-section-text">
                                            <?php echo get_the_content(); ?>
                                            </p>
                                            <a href="contact-us/" class="btn services-section-btn">Contact us <i class="fa fa-angle-right" aria-hidden="true"></i> </a>
                                        </div>
                                        <div class="col-lg-1">
                                            <img src="<?php echo $side_text ; ?>" class="img-fluid abs-text-services-sec" alt="marriage counseling">
                                        </div>
                                    </div>
                                </div>
                            </section>   
                          <?php
                        }else {
                            ?>
                             <section class="mariage-counseling">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-1">
                                            <img src="<?php echo $side_text ; ?>" class="img-fluid abs-text-services-sec" alt="marriage counseling">
                                        </div>

                                        <div class="col-lg-5">
                                            <img src="<?php echo $inner_image ; ?>" class="img-fluid mb-5" alt="marriage counseling">
                                            <h2 class="services-section-heading"><?php echo get_the_title(); ?></h2>
                                            <p class="services-section-text">
                                            <?php echo get_the_content(); ?>
                                            </p>
                                            <a href="contact-us/" class="btn services-section-btn">Contact us <i class="fa fa-angle-right" aria-hidden="true"></i> </a>
                                        </div>

                                        <div class="col-lg-6">
                                            <img src="<?php echo $feat_image ; ?>" class="img-fluid services-sec-abs-img" alt="marriage counseling">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <?php
                        }
                        ?>                       
                        <?php
                    $i++;
                    endwhile;
                    wp_reset_postdata();
                    wp_reset_query();
                }

                ?>


     <!--<section class="latestbook">-->
     <!--   <div class="container">-->
     <!--       <div class="content-section-latest-book">-->
     <!--           <h4>My latest book for personal growth</h4>-->
     <!--       </div>-->
     <!--   </div>-->
     <!--   <div class="container">-->
     <!--       <div class="row align-items-center">-->
     <!--           <div class="col-lg-6">-->
     <!--               <img src="<?php echo get_template_directory_uri(); ?>/assets/img/latest-book.png" class="img-fluid" alt="latest book">-->
     <!--           </div>-->
     <!--           <div class="col-lg-6">-->
     <!--               <h2>Never Stop <br> Exploring Your <br> Mate</h2>-->
     <!--               <p>-->
     <!--               After spending most of my life believing that I had to put aside my own needs to take career action, I finally realized that I do not have to choose between being self-organized and creative in business. Learn more about it in my book.-->
     <!--               </p>-->
     <!--               <a href="javascript" class="btn services-section-btn">Purchase Book <i class="fa fa-angle-right" aria-hidden="true"></i> </a>-->
     <!--           </div>-->
     <!--       </div>-->
     <!--   </div>-->
     <!--</section>-->
     
     <section class="latestbook">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/videosession.png" class="img-fluid" alt="latest book">
                </div>
                <div class="col-lg-8">
                    <h2>Book a Video Counseling Session</h2>
                    <p>
                        Taking the first step towards a healthier, happier relationship has never been easier. Our video counseling sessions offer convenience and confidentiality. 
                        Schedule your pre-marital or marriage counseling session today and start your journey towards a stronger, more fulfilling partnership. 
                        Book now to invest in your love story.
                    </p>
                    <a href="javascript:;" class="btn services-section-btn" data-toggle="modal" data-target="#appointmentModal" id="bookappointment">Book a video session <i class="fa fa-angle-right" aria-hidden="true"></i> </a>
                </div>
            </div>
        </div>
     </section>


<?php
    get_footer();
?>
