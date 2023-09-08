<?php 
  // Display secondary nav on large screens (non-mobile)
  if ( has_nav_menu( 'secondary-menu' ) ) { ?>
  <?php 
  wp_nav_menu( array(
    'theme_location' => 'secondary-menu',
    'depth' => 1,
    'container_class' => 'ucla-secondary-nav',
    'container_id' => 'nav-second',
    'menu_class' => 'ucla-secondary-nav__list',
    'container_aria_label' => 'Secondary Menu',
    'list_class' => 'ucla-secondary-nav__item',
    'link_class' => 'ucla-secondary-nav__link',
    'walker' => new Ucla_Wordpress_Secondary_Navigation_Walker()
  )) ?>
<?php } ?>

<?php if ( has_nav_menu( 'main-menu' ) ) { ?>
  <button id="primary-ham" class="hamburger" type="button" aria-label="Menu" aria-controls="nav-main" aria-expanded="false" alt="navigation and search">
    <span class="hamburger__box">
      <span class="hamburger__inner"></span>
    </span>
  </button>
  
  <nav id="nav-main" class="ucla-main-nav" aria-label="Main Menu">
    <ul class="ucla-main-nav__list">
      <?php
      wp_nav_menu( array(
        'theme_location' => 'main-menu',
        'container' => false,
        'depth' => 2,
        'items_wrap' => '%3$s',
        'walker' => new Ucla_Wordpress_Primary_Navigation_Walker()
      ));
      ?>
    </ul>

    <?php 
    if ( has_nav_menu( 'secondary-menu' ) ) { 
      echo "<ul class=\"ucla-secondary-nav__list\">";
      wp_nav_menu( array(
        'theme_location' => 'secondary-menu',
        'container' => false,
        'depth' => 0,
        'items_wrap' => '%3$s',     
        'walker' => new Ucla_Wordpress_Secondary_Navigation_Walker()
      ));

      echo "</ul>";
    }
    ?>
    
    <div class="ucla-main-nav__search-desktop" id="primary-nav-search">
              <button id="search-button" class="ucla-main-nav__search-desktop-button">
                  <svg role="img" aria-label="Search Icon" class="ucla-main-nav__search-icon" width="18px" height="18px" viewBox="0 0 18 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <title>Search Icon</title>
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(-15.000000, -15.000000)">
                              <g id="Nav-Item">
                                  <g transform="translate(12.000000, 12.000000)">
                                      <polygon class="Path-polygon" points="0 0 24 0 24 24 0 24"></polygon>
                                      <path d="M15.5,14 L14.71,14 L14.43,13.73 C15.41,12.59 16,11.11 16,9.5 C16,5.91 13.09,3 9.5,3 C5.91,3 3,5.91 3,9.5 C3,13.09 5.91,16 9.5,16 C11.11,16 12.59,15.41 13.73,14.43 L14,14.71 L14,15.5 L19,20.49 L20.49,19 L15.5,14 Z M9.5,14 C7.01,14 5,11.99 5,9.5 C5,7.01 7.01,5 9.5,5 C11.99,5 14,7.01 14,9.5 C14,11.99 11.99,14 9.5,14 Z" fill="#00598C" fill-rule="evenodd"></path>
                                  </g>
                              </g>
                          </g>
                      </g>
                  </svg>
                  <svg class="ucla-main-nav__search-close" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" xml:space="preserve" viewBox="10 10 28 28">
                      <title>Close</title>
                      <path d="M38 12.8 35.2 10 24 21.2 12.8 10 10 12.8 21.2 24 10 35.2l2.8 2.8L24 26.8 35.2 38l2.8-2.8L26.8 24 38 12.8z" fill="#ffffff" fill-rule="evenodd"></path>
                  </svg>
              </button>
              <div class="ucla-main-nav__search-block-form" id="block-search" role="search">
                  <form role="search" method="get" class="ucla-main-nav__search-form" action="#" id="menu-search-desktop">
                      <label>
                          <span class="ucla-main-nav__screen-reader-text visuallyhidden">Search for:</span>
                          <input type="search" class="ucla-main-nav__search-field" placeholder="Search …" value="" name="s">
                      </label>
                      <input type="submit" class="ucla-main-nav__search-submit" value="Search">
                  </form>
              </div>
          </div>
  </nav>
  

<?php } ?>