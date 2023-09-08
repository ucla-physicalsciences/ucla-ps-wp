<?php get_header(); ?>

<main class="main">

  <article id="post-0" class="post not-found">

    <?php include 'templates/page-header.php'; ?>

    <div class="entry-content">
      
        <p>Sorry, we couldn't find that page.</p>
        <p>Try searching or go to our <a href="/">homepage</a>.</p>
        <?php get_search_form(); ?>
        <hr>
        <figure>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/404.jpg" alt="UCLA Computer">
				<figcaption>ARPANET, the computer network that became the internet, was designed and built at UCLA. A team led by Leonard Kleinrock sent the world’s first message over the network on Oct. 29, 1969.</figcaption>
        </figure>

    </div>

  </article>

</main>

<?php get_footer(); ?>
