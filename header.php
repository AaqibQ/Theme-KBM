<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package KBM
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.carousel.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<header>
        <nav class="navbar navbar-expand-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="<?php echo get_option("siteurl"); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" class="img-fluid" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">☰</span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    
                            <?php 
                            wp_nav_menu( array( 
                            'menu' => 'Menu 1', 
                           'container'       => false,
                            'container_class' => false,
                            'items_wrap'      => '<ul class="navbar-nav me-auto mx-auto mb-2 mb-lg-0">%3$s</ul>',
                            'fallback_cb'     => false,
                            'add_li_class'  => 'nav-item',
                            'add_a_class'  => 'nav-link'
                                ) );
                            ?>
                
                    <!-- <ul class="navbar-nav me-auto mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Services
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Service 1</a></li>
                                <li><a class="dropdown-item" href="#">Service 2</a></li>
                                <li><a class="dropdown-item" href="#">Service 3</a></li>
                                <li><a class="dropdown-item" href="#">Service 4</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About the Author</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact Us</a>
                        </li>
                    </ul> -->
                </div>
            </div>
        </nav>
    </header>
