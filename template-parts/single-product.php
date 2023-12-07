
<?php
    get_header();
?>

    <div class="about-banner">
        <div class="container">
            <div class="contentbox">
                <h2>Books</h2>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard<br> dummy 
                    text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type<br> specimen book.
                </p>
            </div>
        </div>
    </div>
    
    <section class="products-single-section">
        <div class="container">
            <div class="row align-items-center">
                 <div class="col-lg-6">
                     <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid" alt="prod image">
                 </div>
                 <div class="col-lg-6">
                     <div class="single-page-product-data">
                         <small>Home/Books/Never Stop Exploring your Mate</small>
                         <h2><?php echo get_the_title(); ?></h2>
                         <div class="product-price">
                             <span class="regular-price">
                                <del>$<?php echo get_field('product_regular_price'); ?></del>
                             </span>
                             <span class="sale-price">
                                 $<?php echo get_field('product_sale_price'); ?>
                             </span>
                         </div>
                         <p>
                             <?php echo get_the_content(); ?>
                         </p>
                         <a href="<?php echo get_field('product_external_link'); ?>" target="_blank" class="btn btn-primary">Add to Cart</a>
                         <hr>
                            <div class="post_category">
                                <?php $terms = get_the_terms( $post->ID , 'products_categories' );
                                    if ( is_array( $terms ) && ! is_wp_error( $terms ) ) {
                                        foreach ($terms as $term) {
                                            $term_link = get_term_link($term, 'tvshows_categories');
                                            if (is_wp_error($term_link))
                                                continue;
                                            echo 'Category <a href="javascript:;">' . $term->name . '</a> ';
                                        }
                                    }
                                ?>
                             </div>
                     </div>
                 </div>
            </div>
        </div>
    </section>


<?php
get_footer();    
