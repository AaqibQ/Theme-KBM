
<?php
/*
Template Name: Books Products
*/
get_header();
?>

    <div class="about-banner">
        <div class="container">
            <div class="contentbox">
                <h2><?php echo get_the_title(); ?> </h2>
                <p> <?php echo get_the_content(); ?> </p>
            </div>
        </div>
    </div>
    
    <section class="products-section">
        <div class="container">
            <div class="row">
                 <?php echo do_shortcode('[productpage_product]'); ?>
            </div>
        </div>
    </section>


    <?php get_template_part('template-parts/location');?>


<?php
get_footer();    
