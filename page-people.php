<?php
/**
 * Template Name: People Page
 * Template Post Type: person, page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ucla-ps-wp
 * 
 */

get_header();
?>

<main id="main" role="main">




<?php 

if ( have_posts() ) {

	while ( have_posts() ) {
		the_post();
	

		get_template_part( 'template-parts/content/content-people' );
	}
}
?>



</main><!-- #site-content -->

<?php
get_footer();
