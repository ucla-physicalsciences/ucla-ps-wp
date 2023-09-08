<?php
/**
 * Partial to display a single post
*/
?>

<article data-layout="c-single-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		 <figure>
				<?php the_post_thumbnail( 'large', ['class' => 'u-photo c-post-img'] ); ?>
				<?php if (the_post_thumbnail_caption()): ?>
    			<figcaption><?php the_post_thumbnail_caption(); ?></figcaption>
    		<?php endif; ?>
		 </figure>
		<div>
			<?php the_category(); ?>
			<?php the_title( '<h1>', '</h1>' ); ?>
			<?php if( get_field('post-lede') ): ?>
	    	<p class="lede"><?php echo esc_html( get_field('post-lede') ); ?></p>
			<?php elseif(the_excerpt()) : ?>
				<?php the_excerpt(); ?>
			<?php endif;
			?>
    	
			
		</div>
	</header>
	<div class="entry-content">
	<?php if( get_field('post-standfirst') ): ?>
	<p class="standfirst"><?php echo esc_html( get_field('post-standfirst') ); ?></p>
	<?php endif;?>
  <?php the_content(); ?>
	<?php the_tags( '<p>Tags: ', ', ', '</p>' ); ?> 
	</div>

</article>
