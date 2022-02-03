<?php get_header(); ?>

<main id="main" role="main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); 
  	
  ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
    <p class="breadcrumb"><?php get_breadcrumb(); ?> / <?php the_title(); ?></p>
    <h1><?php the_title(); ?></h1>
    </header>
    <div class="entry-content">

      <?php get_template_part( 'template-parts/acf-blocks-ucla-wc' ); ?>
      <?php the_content(); ?>

      <?php if (is_active_sidebar('right-widget-area')) : ?>
      <div class="sidebar-widget">
        <?php dynamic_sidebar('right-widget-area'); ?>
      </div>
      <?php endif; ?>

    </div>

    <?php endwhile;
  endif; ?>

  </article>


</main>

<?php get_footer(); ?>