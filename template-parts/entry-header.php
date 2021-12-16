<?php
/** Displays the post header **/

$entry_header_classes = '';

if ( is_singular() ) {
	//$entry_header_classes .= ' header-footer-group';
}

?>

<header class="entry-header<?php echo esc_attr( $entry_header_classes ); ?>">

	<?php
		/**
		 * Allow child themes and plugins to filter the display of the categories in the entry header.
		 *
		 * @param bool   Whether to show the categories in header, Default true.
		 */


		if ( is_singular() ) {
			the_title( '<h1 class="p-name">', '</h1>' );
		} else {
			
			the_title( '<h2 class="p-name"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
		}

	

	if ( has_excerpt() && is_singular() ) {
		?>

		<div class="p-summary standfirst">
			<?php the_excerpt(); ?>
		</div>

		<?php
	}

	?>


</header>
