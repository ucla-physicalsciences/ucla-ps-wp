<?php
/**
 * The template for displaying a single resource.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ucla-ps-wp

 */

get_header();
?>

<main id="site-content" role="main">


	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
		
		}
	}

	?>

</main><!-- #site-content -->

<?php get_footer(); ?>
