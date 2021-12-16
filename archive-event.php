<?php
/**
 * Event archive template
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package ucla-ps-wp
**/

get_header();
?>

<main id="site-content" role="main">

	<?php

	$archive_title    = '';
	$archive_subtitle = '';

	 if ( ! is_home() ) {
		$archive_title    = get_the_archive_title();
		$archive_subtitle = get_the_archive_description();
		
	}

	if ( $archive_title || $archive_subtitle ) {
		?>
 		<header class="archive-header has-text-align-center">
				<?php if ( $archive_title ) { ?>
					<h1><?php echo wp_kses_post( $archive_title ); ?></h1>
				<?php } ?>

				<?php if ( $archive_subtitle ) { ?>
					<div class="standfirst"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
				<?php } ?>
		</header>
	
		<?php
	}

		 get_template_part( 'template-parts/content/content-events', get_post_type() );

			
	?>


	<?php get_template_part( 'template-parts/pagination' ); ?>
</main><!-- #site-content -->



<?php
get_footer();
