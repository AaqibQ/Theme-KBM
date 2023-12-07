
<?php
/*
Template Name: About
*/
get_header();
?>

    <div class="about-banner">
        <div class="container">
            <div class="contentbox">
                <h6>FOUNDER OF KINGDOM BUILDING MARRIAGES</h6>
                <h2><?php echo get_field('banner_heading'); ?> </h2>
                <p> <?php echo get_field('banner_content'); ?> </p>
            </div>
        </div>
    </div>

    <section class="intorduction-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="<?php echo get_field('introduction_image_'); ?>" class="img-fluid" alt="collage image">
                </div>
                <div class="col-lg-6">
                    <div class="intorduction-section-text">
                        <h6>Introduction</h6>
                        <?php echo get_field('intrduction_content'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="specialties-section">
        <div class="container">
            <div class="section-content">
                <h6>TYPE OF CEREMONY</h6>
                <h2>Specialties</h2>
            </div>
        </div>
        <div class="container">
            <div class="owl-carousel owl-theme specialties-slider">

                <?php 
                $args = array(
                    'post_type'           => 'specialties',
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
                         <div class="specialties-box">
                            <img src="<?php echo $feat_image ; ?>" class="img-fluid" alt="specialties">
                            <p class="specialties-abs-text">
                            <?php echo get_the_title(); ?>
                            </p>
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

    <section class="affiliation-section">
        <div class="container">
            <div class="section-content">
                <h6>Affiliation</h6>
                <h2>Service Type</h2>
            </div>
        </div>
        <div class="container">
            <div class="owl-carousel owl-theme affiliation-slider">
                <?php 
                $args = array(
                    'post_type'           => 'services',
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
                         <div class="affiliation-box">
                            <img src="<?php echo $feat_image ; ?>" class="img-fluid" alt="affiliation">
                            <p class="affiliation-abs-text">
                            <?php echo get_the_title(); ?>
                            </p>
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


<?php
get_footer();    
