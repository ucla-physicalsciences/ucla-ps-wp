<?php
/**
 * Displays the featured image
 *
 * @package ucla-ps-wp
 */
?>

<figure class="c-hero-image">
<?php the_post_thumbnail( 'large', ['class' => 'img-responsive'] ); ?>
<?php $caption = get_the_post_thumbnail_caption() ?>
<?php if ( $caption ): ?>
	<figcaption><?php echo esc_html( $caption ); ?></figcaption>
<?php endif; ?>
</figure>

