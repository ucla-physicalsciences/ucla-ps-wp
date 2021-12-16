<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ucla-ps-wp
 */

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/acf-blocks-ucla-wc' );
	get_template_part( 'template-parts/content/content-front-page' );

?>

<?php
	
endwhile; // End of the loop.

get_footer();
