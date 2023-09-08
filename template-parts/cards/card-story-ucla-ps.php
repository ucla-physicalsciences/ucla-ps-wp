<?php
if ( get_field( 'post-use_external_url_for_link' )===true )
  {
  $link_attrs = "href='".esc_url( get_field( 'post-external-url' ) )."'";
  }
else
  {
  $link_attrs = "href='".get_permalink()."'";
  }
?>
<article class="h-entry post-<?php the_ID(); ?>" id="post-<?php the_ID(); ?>">
  <?php // Entry Meta ?>
  <figure>
  <a <?php echo $link_attrs; ?> rel="bookmark" aria-label="<?php the_title(); ?>">
    
      <?php setup_postdata($post); ?>
      <?php the_post_thumbnail( 'medium', ['class' => 'u-photo'] ); ?>
    </a>
  </figure> 
<div>
  <h2 class="p-name h3"><a aria-label="<?php the_title(); ?>" class="link u-url" <?php echo $link_attrs; ?>
      rel="bookmark"><?php the_title(); ?></a></h2>
  <p class="p-summary"><?= wp_strip_all_tags( get_the_excerpt(), true ) ?></p>
  <time class="dt-published"
    datetime="<?php echo get_post_time( 'Y-n-j' ); ?>"><?php echo get_post_time( 'F j, Y' ); ?></time>
</div>

</article>
