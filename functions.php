<?php
/**
 * KBM functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package KBM
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kbm_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on KBM, use a find and replace
		* to change 'kbm' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'kbm', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'kbm' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'kbm_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'kbm_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kbm_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kbm_content_width', 640 );
}
add_action( 'after_setup_theme', 'kbm_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kbm_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'kbm' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'kbm' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'kbm_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kbm_scripts() {
	wp_enqueue_style( 'kbm-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'kbm-style', 'rtl', 'replace' );

	wp_enqueue_script( 'kbm-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kbm_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

//remove p fron contact form 7
add_filter('wpcf7_autop_or_not', '__return_false');


// Include Custom POst Type 
include('cpt/counseling.php');
include('cpt/work.php');
include('cpt/specialties.php');
include('cpt/services.php');
// include('cpt/products.php');


function add_additional_class_on_li($classes, $item, $args) {
	if(isset($args->add_li_class)) {
	$classes[] = $args->add_li_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_class_on_a_tag($classes, $item, $args)
{
	if (isset($args->add_a_class)) {
	$classes['class'] = $args->add_a_class;
	}
	return $classes;
}
add_filter('nav_menu_link_attributes', 'add_class_on_a_tag', 1, 3);



// products shortcode 
function productpage_product( $args = array() ) {

	ob_start();
	$args = array(
        'post_type' => 'product',
        'order' => 'asc',
        'limit'    => -1,
    );
	$products = wc_get_products( $args );
	 
	global $product;
	 
	$i = 0;
	if(isset($products) && !empty($products)):
		foreach($products as $key => $product):
			echo '
			
				<div class="col-lg-4">
				 
                    <div class="card">
                        <span class="sale-ribbon">Sale</span>
                        <img class="img-fluid card-img-top" src="'.wp_get_attachment_url( $product->get_image_id() ).'" alt="Card image">
                        <div class="card-body">
                         
                          <h4 class="card-title">'.$product->name.'</h4>
                         
                          <div class="card-price">
                        <div class="sale-price">'.$product->get_price_html().'</div>
                          </div>
                          <a href="'.$product->get_permalink().'" class="btn btn-primary">Purchase Book</a>
                        </div>
                      </div>
                       
                </div>
		   ';

	  		$i++; 
		endforeach;

	endif;

	$output = ob_get_clean();
	return $output;	
	wp_reset_postdata();
}
add_shortcode('productpage_product','productpage_product');	

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

// remove product meta 
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );



// add on feature in cart page 

// Add checkbox to cart page
// add_action( 'woocommerce_cart_totals_before_shipping', 'add_custom_checkbox_to_cart', 20 );
// add_action( 'woocommerce_review_order_before_shipping', 'add_custom_checkbox_to_cart', 20 );
// add_action('woocommerce_product_options_general_product_data', 'add_custom_checkbox_to_cart');
// function add_custom_checkbox_to_cart() {
//     echo '<div class="custom-checkbox">';
//     echo '<label for="custom_checkbox">';
//     echo '<input type="checkbox" name="custom_checkbox" id="custom_checkbox"> Add Custom Price';
//     echo '</label>';
//     echo '</div>';
// }

// AJAX handler to update cart total
// add_action('wp_ajax_update_cart_total', 'update_cart_total_ajax');
// add_action('wp_ajax_nopriv_update_cart_total', 'update_cart_total_ajax');

// function update_cart_total_ajax() {
//     // Get the current cart total
//     $cart_total = WC()->cart->get_cart_contents_total();

//     // Check if the checkbox is checked
//     $checkbox_checked = isset($_POST['checkbox_checked']) ? $_POST['checkbox_checked'] : false;

//     // Set your conditions and the corresponding additional price
//     $additional_price;
// 	$$new_total;
// 	$formatted_total;

//     if ($checkbox_checked) {
//         // Get the quantity in the cart
// 		// var_dump($checkbox_checked);
//         $cart_quantity = WC()->cart->get_cart_contents_count();

//         if ($cart_quantity >= 1 && $cart_quantity <= 5) {
//             $additional_price = 3.50;
//         } elseif ($cart_quantity >= 6 && $cart_quantity <= 10) {
//             $additional_price = 5.50;
//         } elseif ($cart_quantity >= 10) {
//             $additional_price = 8.00;
//         }

// 		$new_total = $cart_total + $additional_price;
// 		$formatted_total = 'if cond'. number_format($new_total, 2, '.', '');
//     }
// 	if($checkbox_checked == 'false' || $checkbox_checked == false) {
// 		$formatted_total = 'else cond'.$cart_total;
// 	}

    // Calculate the new total
    

    // Format the new total as HTML
    // $formatted_total = wc_price($new_total);
	

//     echo $formatted_total;

//     wp_die();
// }



// function calculate_embossing_fee(){
	
// 	foreach ( WC()->cart->get_cart() as $key => $cart_item ) {
// 		$subtotal = $cart_item['data']->get_regular_price() * $cart_item['quantity'];
// 	}
// 	// $subtotal = wc_price ( $subtotal );

// 	$fax = WC()->cart->get_cart_contents_count();
// 	if ($fax >= 1 && $fax <= 5) {
// 		$additional_price = 3;
// 	} elseif ($fax >= 6 && $fax <= 10) {
// 		$additional_price = 5;
// 	} elseif ($fax >= 10) {
// 		$additional_price = 8;
// 	}
	
// 	$new_total = $subtotal + $additional_price;

// 	echo 'total product count'.$fax;
// 	echo "<br>";
// 	echo 'total '.$subtotal;
// 	echo "<br>";
// 	echo 'total after wrap '.$new_total;
// }

// add_action( 'woocommerce_before_calculate_totals', 'calculate_embossing_fee', 99 );


// add_action( 'woocommerce_before_calculate_totals', 'add_custom_checkbox_to_cart', 20 );

// function add_custom_checkbox_to_cart() {
//     echo '<div class="custom-checkbox">';
//     echo '<label for="custom_checkbox">';
//     echo '<input type="checkbox" name="custom_checkbox" id="custom_checkbox"> Add Custom Price';
//     echo '</label>';
//     echo '</div>';
// }


// Display the checkout field in cart page totals section
add_action( 'woocommerce_cart_totals_before_order_total', 'display_priority_fee_checkbox_field', 20 );
function display_priority_fee_checkbox_field(){
    echo '<tr class="installment-section">
    <th>'.__("Wrapping Charges").'</th><td>';

    woocommerce_form_field( 'priority_fee', array(
        'type'          => 'checkbox',
        'class'         => array('form-row-wide'),
        'label'         => __('1 to 5 (£4) <br> 6 to 10 (£6) <br> 10 and more(£8)'),
    ), WC()->session->get('priority_fee') ? '1' : '' );

    echo '<div class="tooltip">?
    <span class="tooltiptext">'.__("By selecting this option... ").'</span>
    </div></td>';
}

// Remove "(optional)" text from the field
add_filter( 'woocommerce_form_field' , 'remove_optional_txt_from_priority_fee_checkbox', 10, 4 );
function remove_optional_txt_from_priority_fee_checkbox( $field, $key, $args, $value ) {
    // Only on checkout page for Order notes field
    if( 'priority_fee' === $key ) {
        $optional = '&nbsp;<span class="optional">(' . esc_html__( 'optional', 'woocommerce' ) . ')</span>';
        $field = str_replace( $optional, '', $field );
    }
    return $field;
}

// jQuery :: Ajax script
add_action( 'wp_footer', 'priority_fee_js_script' );
function priority_fee_js_script() {
    // On Order received page, remove the wc session variable if it exist
    if ( is_wc_endpoint_url('order-received')
        && WC()->session->__isset('priority_fee') ) :

        WC()->session->__unset('priority_fee');

    // On Cart page: jQuert script
    elseif ( is_cart() ) :

    ?>
    <script type="text/javascript">
    jQuery( function($){
        if (typeof woocommerce_params === 'undefined')
            return false;

        var c = 'input[name=priority_fee]';

        $(document.body).on( 'click change', c, function(){
            console.log('click');
            var fee = $(c).is(':checked') ? '1' : '';

            $.ajax({
                type: 'POST',
                url: woocommerce_params.ajax_url,
                data: {
                    'action': 'priority_fee',
                    'priority_fee': fee,
                },
                success: function (response) {
                    setTimeout(function(){
                        $(document.body).trigger('added_to_cart');
                    }, 500);
                },
            });
        });
    });
    </script>
    <?php
    endif;
}

// Get Ajax request and saving to WC session
add_action( 'wp_ajax_priority_fee', 'priority_fee_ajax_receiver' );
add_action( 'wp_ajax_nopriv_priority_fee', 'priority_fee_ajax_receiver' );
function priority_fee_ajax_receiver() {
    if ( isset($_POST['priority_fee']) ) {
        $priority_fee = $_POST['priority_fee'] ? true : false;
        // Set to a WC Session variable
        WC()->session->set('priority_fee', $priority_fee );

        echo $priority_fee ? '1' : '0';
        die();
    }
}

// Add a custom calculated fee conditionally
// add_action( 'woocommerce_cart_calculate_fees', 'set_priority_fee' );
// function set_priority_fee( $cart ){
//     if ( is_admin() && ! defined('DOING_AJAX') )
//         return;

//     if ( WC()->session->get('priority_fee') ) {
//         $item_count  = $cart->get_cart_contents_count();
//         $fee_label   = sprintf( __( "Add on Charges for %s items" ), '('. $item_count .')' );
//         $fee_amount  = 20 + $item_count;
//         $cart->add_fee( $fee_label, $fee_amount );
//     }
// }


add_action( 'woocommerce_cart_calculate_fees', 'set_priority_fee' );

function set_priority_fee( $cart ) {
    if ( is_admin() && ! defined('DOING_AJAX') )
        return;

    if ( WC()->session->get('priority_fee') ) {
        $item_count  = $cart->get_cart_contents_count();
        $fee_label   = sprintf( __( "Add on Charges for %s items" ), '('. $item_count .')' );

        // Set the base fee amount
        $base_fee_amount = 0;

        // Set the additional fee based on the quantity
        if ($item_count >= 1 && $item_count <= 5) {
            $additional_fee = 4;
        }elseif ($item_count >= 6 && $item_count <= 10) {
            $additional_fee = 6;
        }
		else {
            $additional_fee = 8;
        }

        // Calculate the total fee amount
        $fee_amount  = $base_fee_amount + $additional_fee;

        // Add the fee to the cart
        $cart->add_fee( $fee_label, $fee_amount );
    }
}


