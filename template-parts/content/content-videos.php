<?php
/**
 * Custom template for displaying people
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ucla-ps-wp
 */

?>

<article <?php post_class('ucla-ps-c-videos'); ?> id="post-<?php the_ID(); ?>">
    
<?php if( get_field('ucla_ps_video_url') ):?>
  <?php the_field('ucla_ps_video_url'); ?>
<?php endif; ?>
		
    <div class="entry-content">
    <?php
    //get_template_part( 'template-parts/featured-image' );
    get_template_part( 'template-parts/entry-header' );
    ?>	
    <?php if( get_field('ucla_ps_video_summary') ):?>
      <p class="lede"><?php the_field('ucla_ps_video_summary'); ?></p>
    <?php endif; ?>  


		</div><!-- .entry-content -->


</article><!-- .post -->
