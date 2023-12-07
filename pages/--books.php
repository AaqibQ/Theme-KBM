
<?php
/*
Template Name: Books
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
                <?php
                    $args = array(
                    	'post_type'      => 'products',
                    	'posts_per_page' => 10,
                    );
                    $loop = new WP_Query($args);
                    while ( $loop->have_posts() ) {
                    	$loop->the_post();
                ?>
                	<div class="col-lg-4">
                        <div class="card">
                            <span class="sale-ribbon">Sale</span>
                            <img class="img-fluid card-img-top" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Card image">
                            <div class="card-body">
                              <h4 class="card-title"><?php echo get_the_title(); ?></h4>
                              <div class="card-price">
                                  <!--<div class="regular-price"><del>$<?php //echo get_field('product_regular_price'); ?></del></div>-->
                                  <div class="sale-price">$<?php echo get_field('product_sale_price'); ?></div>
                              </div>
                              <a href="<?php echo the_permalink(); ?>" class="btn btn-primary">Add to Cart</a>
                            </div>
                          </div>
                    </div>
                <?php
                    }
                ?>
                
                
            </div>
        </div>
    </section>


    <?php get_template_part('template-parts/location');?>


<?php
get_footer();    
