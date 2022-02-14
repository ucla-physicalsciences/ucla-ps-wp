<?php get_header(); ?>


<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>

  <main role="main" id="main" <?php post_class(); ?>>
    <header>
    <p class="breadcrumb"><?php get_breadcrumb(); ?> / <?php the_title(); ?></p>
    <h1><?php the_title(); ?></h1>
    </header>
      <?php get_template_part("template-parts/acf-blocks"); ?>
      <div class="entry-content">
      <?php get_template_part( 'template-parts/featured-image' );?>
      <?php the_content(); ?>
      </div>
      

<?php
  endwhile;
endif; ?>

  </main>

<?php get_footer(); ?>
