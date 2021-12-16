<?php
/**
 * Custom template for displaying resources
 *
 * Used for index or list of resources.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ucla-ps-wp
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<?php
		get_template_part( 'template-parts/featured-image' );

	  get_template_part( 'template-parts/entry-header' );

  ?>





		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'twentytwenty' ) . '"><span class="label">' . __( 'Pages:', 'twentytwenty' ) . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		//edit_post_link();

		// Single bottom post meta.
		//twentytwenty_the_post_meta( get_the_ID(), 'single-bottom' );

		if ( post_type_supports( get_post_type( get_the_ID() ), 'author' ) && is_single() ) {

			get_template_part( 'template-parts/entry-author-bio' );

		}
		?>

		<div class="entry-content">
			<?php if( get_field('r-alt-name') ): ?>
			<p class="standfirst"><?php echo esc_html( get_field('r-alt-name') ); ?></p>
			<?php endif; ?>


			<?php if( get_field('r-summary') ): ?>
			<p class="p-summary"><?php echo esc_html( get_field( 'r-summary' ) ); ?></p>
			<?php endif; ?>

			<?php if( get_field('r-status') ): ?>
			<p><b>Status</b>: <?php echo esc_html( get_field( 'r-status' ) ); ?></p>
			<?php endif; ?>
		</div>
		

</article>
