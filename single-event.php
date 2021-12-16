<?php
/**
 * The template for displaying a single event.
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

			get_template_part( 'template-parts/content/content', get_post_type() );
		
		
		}
	}

	?>

</main>

<?php get_footer(); ?>
