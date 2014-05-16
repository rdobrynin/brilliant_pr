<?php
/**
 * @file
 * menu-link.func.php
 */

/**
 * Overrides theme_menu_link().
 */
function brilliant_pr_menu_link(array $variables) {
  global $user;
  $element = $variables['element'];
  $sub_menu = '';
  if ($element['#below']) {
    // Prevent dropdown functions from being added to management menu so it
    // does not affect the navbar module.
    if (($element['#theme'] == 'menu_link__navigation') && (module_exists('navbar'))) {
      $element['#title'] .= '<span class="caret-icon">'._bootstrap_icon('chevron-down').'</span>';
      $sub_menu = drupal_render($element['#below']);
    }
    elseif($element['#theme'] == 'menu_link__navigation' && !empty($element['#original_link']['depth'])
      && ($element['#original_link']['depth'] == 1)) {
      unset($element['#below']['#theme_wrappers']);
//      $element['#title'] .= '<span class="caret-icon">'._bootstrap_icon('chevron-right').'</span>';
      $sub_menu = '<ul>' . drupal_render($element['#below']) . '</ul>';


      if($element['#original_link']['expanded'] == 0) {
        $element['#title'] .= '<span class="caret-icon">'._bootstrap_icon('chevron-down').'</span>';
      }

      else {
        $element['#title'] .= '<span class="caret-icon">'._bootstrap_icon('chevron-right').'</span>';
      }
      $element['#localized_options']['html'] = TRUE;
    }
    elseif ((!empty($element['#original_link']['depth'])) && ($element['#original_link']['depth'] == 1)) {
      // Add our own wrapper.
      unset($element['#below']['#theme_wrappers']);
      $element['#localized_options']['html'] = TRUE;
    }

  }
  // On primary navigation menu, class 'active' is not set on active menu item.
  // @see https://drupal.org/node/1896674
  if (($element['#href'] == $_GET['q'] || ($element['#href'] == '<front>' && drupal_is_front_page())) && (empty($element['#localized_options']['language']))) {
    $element['#attributes']['class'][] = 'active';
  }

  if($element["#theme"] == 'menu_link__menu_section_menu'){
    if($element["#href"] == '<front>'){
      $element['#title'] = _bootstrap_icon('home');
    }
    $element['#localized_options']['html'] = true;
  }
  if($element["#theme"] == 'menu_link__user_menu'){
    if($element["#href"] == 'user'){
      $element['#title'] = _bootstrap_icon('user').' '.get_name($user->uid);
    }
    if($element["#href"] == 'user/logout'){
      $element['#title'] = _bootstrap_icon('log-out').' '.$element['#title'];
    }
    if($element["#href"] == 'user/login'){
      $element['#title'] = _bootstrap_icon('log-in').' '.$element['#title'];
    }
    $element['#localized_options']['html'] = true;
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}
