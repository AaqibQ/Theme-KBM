<?php
    /*
    Template Name: Appointment
    */
    get_header();
?>

    
    
    <section class="bookappointment_btn_section py-5" style="margin-top:100px;">
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#appointmentModal" id="bookappointment"> Book an appointment </button>
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