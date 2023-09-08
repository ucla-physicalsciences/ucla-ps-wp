<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width" />
  <?php wp_head(); ?>

  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico" />
  <link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/apple-touch-icon.png">
</head>

<body <?php body_class(); ?>>

  <div id="skip-nav" class="skip-nav visuallyhidden" role="navigation" aria-label="Skip navigation">
    <a class="button" href="#nav-main">Skip to Main Menu</a>
    <a class="button mobile" href="#primary-ham">Skip to Navigation</a>
    <a class="button" href="#main">Skip to Main Content</a>
    <a class="button" href="#footer">Skip to Footer Links</a>
  </div>

  

  <header class="ucla-header ucla-header--school">
    <div class="ucla-header__container" id="header-wrap">
      <a aria-label="UCLA Division of Physical Sciences homepage" class="ucla-header--school__logo-link" href="/">
      
      <svg class="ucla-ps-logo" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" clip-rule="evenodd" viewBox="0 0 300 44" >
  <path fill="#2774ae" d="M0 0h92v45H0z"/>
  <path fill="#fff" fill-rule="nonzero" d="M14.71 27.12a19.118 19.118 0 0 1 0-2.22l1-12h3.85l-1 12.1c-.23 2.62.78 4.48 3.34 4.48 2.56 0 4-1.9 4.24-4.22l1.03-12.37H31l-1 12.22c-.42 4.71-3.48 8.23-8.43 8.23-3.85 0-6.34-2.55-6.81-6.22m17.14-4.06c.51-5.76 4.32-10.53 10.89-10.53a8.872 8.872 0 0 1 5.06 1.49l-.44 4.76a5.645 5.645 0 0 0-5-2.37c-4.1 0-6.34 2.9-6.66 6.57-.32 3.67 1.49 6.48 5.46 6.48a7.294 7.294 0 0 0 5.49-2.47l-.4 4.9a11.003 11.003 0 0 1-5.37 1.5c-6.51 0-9.49-4.93-9-10.32m19-10.18h3.84l-1.41 16.3h7.51c0 .2-.35 3.77-.35 3.77H49.18l1.75-20.07Zm20 7.49c.119-.272.216-.553.29-.84h.06c.023.287.074.572.15.85.21.91 1.7 6 1.7 6h-4.85s2.6-5.85 2.65-6m1-8.39h-.27L61.14 32.89h4.08l1.48-3.18h7.4l.9 3.18h4.1L71.93 12Z"/>
  <path fill-rule="nonzero" d="M102.808 4.814H99v9.968h3.808c3.248 0 4.998-1.946 4.998-4.984 0-3.038-1.75-4.984-4.998-4.984Zm-.028 8.344h-1.89v-6.72h1.89c1.932 0 3.066 1.148 3.066 3.36 0 2.212-1.134 3.36-3.066 3.36Zm6.16-6.538h1.736V4.968h-1.736V6.62Zm-.014 8.162h1.764V7.558h-1.764v7.224Zm8.008-7.224-.7 1.932c-.378 1.204-.77 2.478-1.134 3.696a282.718 282.718 0 0 0-1.134-3.682l-.7-1.946h-1.89l2.674 7.224h2.03l2.688-7.224h-1.834Zm2.534-.938h1.736V4.968h-1.736V6.62Zm-.014 8.162h1.764V7.558h-1.764v7.224Zm6.034.196c2.016 0 3.206-.812 3.206-2.268 0-1.246-.77-1.89-2.506-2.198l-.91-.14c-.784-.14-1.204-.35-1.204-.882 0-.518.406-.84 1.26-.84.91 0 1.484.266 1.526 1.19h1.666c-.056-1.484-.966-2.45-3.192-2.45-1.932 0-2.996.826-2.996 2.184 0 1.232.812 1.918 2.366 2.184l.826.14c1.092.182 1.414.434 1.414.952 0 .546-.406.868-1.428.868-1.05 0-1.512-.322-1.61-1.232h-1.722c.112 1.75 1.246 2.492 3.304 2.492Zm4.158-8.358h1.736V4.968h-1.736V6.62Zm-.014 8.162h1.764V7.558h-1.764v7.224Zm6.552.168c2.198 0 3.668-1.484 3.668-3.78s-1.47-3.78-3.668-3.78c-2.198 0-3.682 1.484-3.682 3.78s1.484 3.78 3.682 3.78Zm0-1.456c-1.148 0-1.876-.798-1.876-2.324 0-1.526.728-2.324 1.876-2.324 1.134 0 1.876.798 1.876 2.324 0 1.526-.742 2.324-1.876 2.324Zm8.736-6.104c-1.022 0-1.792.518-2.254 1.204V7.558h-1.708v7.224h1.764v-4.046c0-1.288.84-1.82 1.61-1.82.896 0 1.358.448 1.358 1.372v4.494h1.764V9.994c0-1.722-1.022-2.604-2.534-2.604Zm10.346 7.56c2.198 0 3.668-1.484 3.668-3.78s-1.47-3.78-3.668-3.78c-2.198 0-3.682 1.484-3.682 3.78s1.484 3.78 3.682 3.78Zm0-1.456c-1.148 0-1.876-.798-1.876-2.324 0-1.526.728-2.324 1.876-2.324 1.134 0 1.876.798 1.876 2.324 0 1.526-.742 2.324-1.876 2.324Zm7.742-7.322h.616V4.814a9.454 9.454 0 0 0-.91-.042c-1.736 0-2.366.966-2.366 2.24v.546h-1.12v1.344h1.12v5.88h1.75v-5.88h1.484V7.558h-1.484V7.04c0-.56.28-.868.91-.868Zm-56.232 13.581H99v17.088h4.056v-5.568h3.72c4.032 0 6.312-2.304 6.312-5.76s-2.28-5.76-6.312-5.76Zm-.264 8.088h-3.456v-4.656h3.456c1.56 0 2.52.816 2.52 2.328 0 1.536-.96 2.328-2.52 2.328Zm15.672-3.672c-1.728 0-2.976.816-3.792 1.92v-6.336h-3.744v17.088h3.744v-6.912c0-1.824 1.2-2.568 2.352-2.568 1.392 0 1.992.744 1.992 2.112v7.368h3.744v-8.112c0-3.072-1.848-4.56-4.296-4.56Zm14.112.288-.552 1.776c-.696 2.4-1.392 4.92-2.064 7.776-.672-2.832-1.392-5.376-2.112-7.8l-.552-1.752h-4.032l3.552 10.056c.288.816.576 1.704.576 2.4 0 .936-.48 1.728-1.872 1.728h-1.2v2.88c.384.024.744.048 1.464.048 3.672 0 5.088-1.128 6.168-4.248l4.488-12.864h-3.864Zm9.936 12.744c3.72 0 5.904-1.44 5.904-4.008 0-2.208-1.416-3.384-4.344-3.84l-1.848-.264c-1.2-.192-1.8-.504-1.8-1.248 0-.72.552-1.176 1.896-1.176 1.344 0 2.232.408 2.28 1.752h3.48c-.12-2.424-1.584-4.248-5.76-4.248-3.624 0-5.568 1.44-5.568 3.912 0 2.208 1.56 3.384 4.176 3.792l1.608.264c1.68.264 2.136.624 2.136 1.368 0 .744-.576 1.2-2.088 1.2-1.56 0-2.232-.456-2.376-1.8h-3.648c.216 3.072 2.16 4.296 5.952 4.296Zm7.368-14.16h3.576v-3.168H153.6v3.168Zm-.096 13.8h3.744V24.457h-3.744v12.384Zm11.784.288c3.432 0 5.856-1.968 6.12-5.16h-3.72c-.168 1.464-1.152 2.088-2.4 2.088-1.56 0-2.568-1.032-2.568-3.408s.984-3.432 2.568-3.432c1.2 0 2.112.576 2.328 1.896h3.72c-.336-3.048-2.64-4.944-6.048-4.944-3.888 0-6.36 2.544-6.36 6.48 0 3.936 2.496 6.48 6.36 6.48Zm19.632-.288c-.336-.48-.504-1.368-.504-2.28v-6.576c0-2.352-1.632-3.816-5.52-3.816-3.984 0-5.736 1.56-5.928 4.296h3.72c.12-1.272.72-1.632 2.184-1.632 1.488 0 1.896.504 1.896 1.248 0 .792-.552 1.104-1.608 1.224l-1.944.168c-3.576.312-4.848 1.728-4.848 3.864 0 2.472 1.92 3.792 4.512 3.792 1.824 0 3.168-.624 3.96-1.68.024.552.144 1.08.312 1.392h3.768Zm-6.912-2.232c-1.176 0-1.824-.552-1.824-1.416 0-.864.528-1.344 1.8-1.488l1.536-.168c.576-.072.984-.192 1.248-.48v.912c0 1.944-1.32 2.64-2.76 2.64Zm8.376-14.856h3.744v17.088h-3.744zm18.384 17.472c4.368 0 7.248-1.8 7.248-5.4 0-2.904-1.8-4.464-5.904-5.208l-1.44-.264c-2.112-.408-2.904-.888-2.904-2.088 0-1.08.84-1.728 2.616-1.728 2.28 0 3.12.816 3.216 2.4h3.84c-.144-3.504-2.472-5.568-7.128-5.568-4.464 0-6.672 2.16-6.672 5.064 0 3.096 2.112 4.728 5.712 5.352l1.392.264c2.352.432 3.072.888 3.072 2.04 0 1.272-.984 1.968-2.904 1.968-2.112 0-3.648-.504-3.696-2.832h-3.936c.024 3.696 2.616 6 7.488 6Zm15.048-.096c3.432 0 5.856-1.968 6.12-5.16h-3.72c-.168 1.464-1.152 2.088-2.4 2.088-1.56 0-2.568-1.032-2.568-3.408s.984-3.432 2.568-3.432c1.2 0 2.112.576 2.328 1.896h3.72c-.336-3.048-2.64-4.944-6.048-4.944-3.888 0-6.36 2.544-6.36 6.48 0 3.936 2.496 6.48 6.36 6.48Zm7.632-14.088h3.576v-3.168h-3.576v3.168Zm-.096 13.8h3.744V24.457h-3.744v12.384Zm18.192-5.832c0-4.176-2.52-6.84-6.384-6.84-3.864 0-6.384 2.568-6.384 6.48 0 3.936 2.592 6.48 6.432 6.48 2.976 0 5.376-1.536 6.048-4.152h-3.552c-.432.888-1.248 1.392-2.496 1.392-1.464 0-2.568-.84-2.832-2.616h9.168v-.744Zm-6.432-4.08c1.512 0 2.496.912 2.76 2.448H236.4c.288-1.728 1.344-2.448 2.712-2.448Zm15.72-2.76c-1.8 0-3.072.888-3.888 2.04v-1.752h-3.648v12.384h3.744v-6.912c0-1.824 1.2-2.568 2.352-2.568 1.392 0 1.992.744 1.992 2.112v7.368h3.744v-8.112c0-3.072-1.848-4.56-4.296-4.56Zm12.312 12.96c3.432 0 5.856-1.968 6.12-5.16h-3.72c-.168 1.464-1.152 2.088-2.4 2.088-1.56 0-2.568-1.032-2.568-3.408s.984-3.432 2.568-3.432c1.2 0 2.112.576 2.328 1.896h3.72c-.336-3.048-2.64-4.944-6.048-4.944-3.888 0-6.36 2.544-6.36 6.48 0 3.936 2.496 6.48 6.36 6.48Zm19.896-6.12c0-4.176-2.52-6.84-6.384-6.84-3.864 0-6.384 2.568-6.384 6.48 0 3.936 2.592 6.48 6.432 6.48 2.976 0 5.376-1.536 6.048-4.152H283.2c-.432.888-1.248 1.392-2.496 1.392-1.464 0-2.568-.84-2.832-2.616h9.168v-.744Zm-6.432-4.08c1.512 0 2.496.912 2.76 2.448h-5.472c.288-1.728 1.344-2.448 2.712-2.448Zm13.44 10.272c3.72 0 5.904-1.44 5.904-4.008 0-2.208-1.416-3.384-4.344-3.84l-1.848-.264c-1.2-.192-1.8-.504-1.8-1.248 0-.72.552-1.176 1.896-1.176 1.344 0 2.232.408 2.28 1.752h3.48c-.12-2.424-1.584-4.248-5.76-4.248-3.624 0-5.568 1.44-5.568 3.912 0 2.208 1.56 3.384 4.176 3.792l1.608.264c1.68.264 2.136.624 2.136 1.368 0 .744-.576 1.2-2.088 1.2-1.56 0-2.232-.456-2.376-1.8h-3.648c.216 3.072 2.16 4.296 5.952 4.296Z"/>
</svg>
      </a>
      
      
      <?php get_template_part( 'template-parts/navigation/menu'); ?>
      
    </div>
  </header>

  