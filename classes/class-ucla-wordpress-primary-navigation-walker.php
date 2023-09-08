<?php

/**
 * Custom Navigation Walker
 *
 * @package WordPress
 */

/**
 * This class is in charge of the Primary Navigation HTML.
 */
class Ucla_Wordpress_Primary_Navigation_Walker extends Walker_Nav_Menu
{

  /**
   * @see Walker::display_element()
   * @since 2.5.0
   *
   * @param object $element           Data object.
   * @param array  $children_elements List of elements to continue traversing (passed by reference).
   * @param int    $max_depth         Max depth to traverse.
   * @param int    $depth             Depth of current element.
   * @param array  $args              An array of arguments.
   * @param string $output            Used to append additional content (passed by reference).
   */

  function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
  {
    $id_field = $this->db_fields['id'];
    if (is_object($args[0])) {
      $args[0]->has_children = !empty($children_elements[$element->$id_field]);
    }
    return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
  }

  /**
   * @see Walker::start_el()
   * @since 3.0.0
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param object $item Menu item data object.
   * @param int $depth Depth of menu item. Used for padding.
   * @param int $current_page Menu item ID.
   * @param object $args
   */

  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
  {
    if ($args->has_children && $depth == 0) {

      // Adds CSS class for parent nav items with sub-navigations
      $item->classes[] = 'ucla-main-nav__item--has-children';
    } elseif ($args->has_children && $depth > 0) {

      // Adds CSS class for nav items after the 2nd level with sub-navigations
      $item->classes[] = 'ucla-nav_sublist--has-children';
    }

    $indent = ($depth) ? str_repeat("\t", $depth) : '';
    $class_names = $value = '';
    $list_classes = empty($item->classes) ? array() : (array) $item->classes;
    $list_classes[] = 'ucla-main-nav__item menu-item-' . $item->ID;

    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($list_classes), $item, $args));
    $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
    $output .= $indent . '<li' . $class_names . '>';

    $link_attribute = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
    $link_attribute .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
    $link_attribute .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
    $link_attribute .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';
    $link_attribute .= ' class="ucla-main-nav__link' . (in_array("current_page_item", $item->classes) || in_array("current-menu-parent", $item->classes) ? ' ucla-main-nav__link--current-page' : '') . '"';
    $item_output = $args->before;
    $item_output .= '<a' . $link_attribute . '>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';

    if ($args->has_children) {
      $item_output .= '<button class="ucla-main-nav__toggle" aria-expanded="false" aria-label="toggle"><svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="12 17.2 24 14.8"><title>Arrow Down</title><path class="down-arrow--blue" d="m14.8 17.2 9.2 9.2 9.2-9.2L36 20 24 32 12 20l2.8-2.8z"></path></svg></button>';
    }
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }

  /**
   * @see Walker::start_lvl()
   * @since 3.0.0
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param int $depth Depth of page. Used for padding.
   */

  function start_lvl(&$output, $depth = 0, $args = array())
  {
    $indent = str_repeat("\t", $depth);
    $output .= "\n<ul class=\"ucla-main-nav__sublist\">$indent</li>\n";
  }

  /**
   * @see Walker::end_lvl()
   * @since 3.0.0
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param int $depth Depth of page. Used for padding.
   */

  function end_lvl(&$output, $depth = 0, $args = array())
  {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }

  /**
   * @see Walker::end_el()
   * @since 3.0.0
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param object $item Page data object. Not used.
   * @param int $depth Depth of page. Not Used.
   */

  function end_el(&$output, $item, $depth = 0, $args = array())
  {
    $output .= "</li>\n";
  }
}
