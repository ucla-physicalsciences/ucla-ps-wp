<?php get_header(); ?>

<main id="main" class="main page-no-banner">
  <?php if (have_posts()) : while (have_posts()) : the_post(); 
  	
  ?>
      
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

       
         
            <div class="breadcrumb"><?php get_breadcrumb(); ?> / <?php the_title(); ?></div>
            <h1><?php the_title(); ?></h1>
            <?php edit_post_link(); ?>



        <div class="entry-content">
         
            <?php get_template_part( 'template-parts/acf-blocks-ucla-wc' ); ?>
            <?php the_content(); ?>

          <?php if (is_active_sidebar('right-widget-area')) : ?>
              <div class="col span_12_of_12"></div>
              <div class="col span_12_of_12">
                  <?php dynamic_sidebar('right-widget-area'); ?>
              </div>
          <?php endif; ?>

        </div>

    <?php endwhile;
  endif; ?>

      </article>


</main>

<?php get_footer(); ?>
