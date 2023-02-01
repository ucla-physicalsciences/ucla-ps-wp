<?php
/**
 * Partial to display a single post
*/
?>

<article data-layout="c-single-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		 <figure>
				<?php the_post_thumbnail( 'medium', ['class' => 'u-photo c-post-img'] ); ?>
				<?php if (the_post_thumbnail_caption()): ?>
    			<figcaption><?php the_post_thumbnail_caption(); ?></figcaption>
    		<?php endif; ?>
		 </figure>
		<div>
			<?php the_title( '<h1>', '</h1>' ); ?>
		</div>
	</header>
  <div class="entry-content">
	<?php the_content(); ?>
	</div>

</article>
