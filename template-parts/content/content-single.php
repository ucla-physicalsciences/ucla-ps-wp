<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ucla-ps-wp
 * 
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_post_thumbnail(); ?>
		<?php the_title( '<h1>', '</h1>' ); ?>
	</header>

	<div class="entry-content">
		<?php
		the_content();
		get_template_part( 'template-parts/acf-blocks-ucla-wc' );	
		?>
	</div><!-- .entry-content -->

	
		



</article><!-- #post-<?php the_ID(); ?> -->
