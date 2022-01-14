<?php get_header(); ?>
<main id="site-content" role="main">

<?php

  $page_title    = 'News';
  $page_subtitle = '';

   
?>
  <article>
    <header>
      <div class="breadcrumb"><?php get_breadcrumb(); ?> / News</div>
      <?php if ( $page_title ) { ?>
        <h1><?php echo wp_kses_post( $page_title ); ?></h1>
      <?php } ?>
       
    </header>
    
    <div class="c-blog-posts">

        
          <?php
          // Pagination
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          // Example argument that defines three posts per page.
          $args = array(
            'posts_per_page' => 12,
            'post_status' => 'publish',
            'paged' => $paged,
            'orderby' => 'date',
            'order' => 'DESC'
           );

          // Variable to call WP_Query.
          $the_query = new WP_Query( $args );

          if ( $the_query->have_posts() ) :
            ?>
            <div class="h-feed">
            <?php
              // Start the Loop
              while ( $the_query->have_posts() ) : $the_query->the_post();
              // Loop Content
              include 'template-parts/card-story-ucla-ps.php';
              // End the Loop
              endwhile;
             ?>
             </div>
             <?php 
          else:
              // If no posts match this query, output this text.
              _e( 'Sorry, no results match your criteria.', 'textdomain' );
          endif;

          wp_reset_postdata();
          ?>

          <nav class="nav-links pagination u-max-width">
            <?php echo paginate_links([
              'format'  => 'page/%#%',
              'current' => $paged,
              'total'   => $the_query->max_num_pages,
              'mid_size'        => 10,
              'prev_text'       => __('&laquo;'),
              'next_text'       => __('&raquo;')
            ]); ?>
          </nav>
       



        <?php if (is_active_sidebar('primary-widget-area')) : ?>

            <div class="col span_2_of_12"></div>
            <div class="col span_3_of_12">
                <?php dynamic_sidebar('primary-widget-area'); ?>
            </div>
        <?php endif; ?>

    </div>

    <?php get_template_part('nav', 'below'); ?>
</main>
<?php get_footer(); ?>
