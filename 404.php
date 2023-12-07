<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package KBM
 */

get_header();
?>
    <div class="about-banner">
        <div class="container">
            <div class="contentbox">
                <h2>404</h2>
            </div>
        </div>
    </div>

    <section class="intorduction-section">
        <div class="container">
            <div class="row align-items-center">
               	<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'kbm' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'kbm' ); ?></p>

			



					<?php
					/* translators: %1$s: smiley */
					$kbm_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'kbm' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$kbm_archive_content" );

					the_widget( 'WP_Widget_Tag_Cloud' );
					?>

			</div><!-- .page-content -->
            </div>
        </div>
    </section>



<?php
get_footer();
