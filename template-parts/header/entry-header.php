<?php
/** Displays the post header **/
?>

<header class="entry-header">

	<?php
		$title = get_the_title();
		if ( is_singular() ) {
			the_title( '<h1 class="p-name">', '</h1>' );
		} 
		else if ( ! is_singular() ) {
			
			the_title( '<h1 class="p-name"><a href="' . esc_url( get_permalink() ) . '">', '</a></h1>' );
		}

	

	if ( has_excerpt() && ! is_singular() ) {
		?>

		<div class="p-summary standfirst">
			<?php the_excerpt(); ?>
		</div>

		<?php
	}

	?>


</header>
