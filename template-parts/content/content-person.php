<?php
/**
 * Custom template for displaying a person
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ucla-ps-wp
 */

?>

<article <?php post_class('ucla-ps-c-people'); ?> id="post-<?php the_ID(); ?>">
<?php if ( has_post_thumbnail() ) : ?>
<figure class="c-person-image">
<?php the_post_thumbnail( 'square_thumb', ['class' => 'u-photo avatar'] ); ?>
<?php $caption = get_the_post_thumbnail_caption() ?>
<?php if ( $caption ): ?>
	<figcaption><?php echo esc_html( $caption ); ?></figcaption>
<?php endif; ?>
</figure>
<?php endif; ?>


		<h1 class="p-name h2">
		
		<?php echo esc_html( get_field('p-given-name')." ".get_field('p-family-name') ); if( get_field('p-honorific-suffix') ):
        echo esc_html( ", ".get_field('p-honorific-suffix'));
      endif; ?></h1>
		


			<?php if( get_field('p-job-title') ): ?>
				<p class="p-job-title"><?php echo esc_html( get_field( 'p-job-title' ) ); ?></p>
			<?php endif; ?>
				<?php if( get_field('p-org') ): ?>
				<p class="p-org"><?php echo esc_html( get_field( 'p-org' ) ); ?></p>
				<?php endif; ?>
			
				<p><?php if( get_field('p-tel') ): ?><span class="tel"><?php echo esc_html( get_field( 'p-tel' ) ); ?></span><br><?php endif; ?>
					<a href="mailto:<?php echo esc_attr( get_field( 'p-email' ) ); ?>" class="contact"><?php echo esc_html( get_field( 'p-email' ) ); ?></a>
				</p>

				<?php if( get_field('p-summary') ): ?>
					<p class="p-summary"><?php echo esc_html( get_field( 'p-summary' ) ); ?></p>
				<?php endif; ?>

				<?php if( get_field('p-adr') ): ?>
				<address>
					<?php echo get_field( 'p-adr' ); ?>
				</address>
				<?php endif; ?>
					
				<?php
				$person_links = get_field( 'p-links' );
				$custom_links = array( 'Website', 'Google Scholar', 'Open Researcher');

				if ( $person_links )
				?>
				
				<?php
					
					if (is_array($person_links) || is_object($person_links)){
					foreach ( $person_links as $person_link ):
						if ( in_array( $person_link['p-link-site'], $custom_links )  ):
						?>
						<p>
							<a href="<?php echo esc_url( $person_link['p-link-url'] ); ?>" class="url website">
								<?php
								if ( $person_link['p-link-site'] == "Website" )
									echo esc_html( $person_link['p-link-name'] );
								else
									echo esc_html( $person_link['p-link-site'] );
								?>
							</a>
						</p>
						<?php
						endif;
					endforeach;
					}
				?>

<?php
			

			if ( $person_links ):
			?>
				<ul class="social-links">
					<?php
					foreach ( $person_links as $person_link ):
						if ( !in_array( $person_link['p-link-site'], $custom_links ) ):
						?>
						<li><a href="<?php echo esc_url( $person_link['p-link-url'] ); ?>">
								<i class="fab fa-<?php echo esc_html( strtolower( $person_link['p-link-site'] ) ); ?>" aria-hidden="true"></i>
								<?php echo esc_html( $person_link['p-link-site'] ); ?>
						</a>
						</li>
						<?php
						endif;
					endforeach;
					?>
				</ul>

			<?php endif; ?>
		</div>

	
	
</div> 


<?php the_content();?>




		<?php
		// 	<div class="section-inner">
		// wp_link_pages(
		// 	array(
		// 		'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'twentytwenty' ) . '"><span class="label">' . __( 'Pages:', 'twentytwenty' ) . '</span>',
		// 		'after'       => '</nav>',
		// 		'link_before' => '<span class="page-number">',
		// 		'link_after'  => '</span>',
		// 	)
		// );

		edit_post_link();

		// Single bottom post meta.
		// twentytwenty_the_post_meta( get_the_ID(), 'single-bottom' );

		// if ( post_type_supports( get_post_type( get_the_ID() ), 'author' ) && is_single() ) {

		// 	get_template_part( 'template-parts/entry-author-bio' );

		// }

		// </div>
		?>

</article>
