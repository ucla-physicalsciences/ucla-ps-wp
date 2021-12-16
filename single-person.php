<?php
/**
 * The template for displaying a single person.
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
			// print post type. must be inside loop
			// printf( __( 'The post type is: %s', 'textdomain' ), get_post_type( get_the_ID() ) );
		}
	}

	?>

</main>


<?php get_footer(); ?>
