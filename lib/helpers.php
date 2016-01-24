<?php

namespace Roots\Sage\Helpers;

// THEME HELPERS

/**
 * Format image from WP image array.
 * @param $image_arr - array or empty string
 * @param $alt - bool, adds alt if present
 * @param $classes - array of classes to add to img element
 * @param $lazy_load - bool, 
 */
function format_image($image_arr, $alt = false, $classes = null, $lazy_load = false) {

  if (!empty($image_arr) && $image_arr['url'] !== '') {

    $alt = $alt && $image_arr['alt'] !== '' ? 'alt="'.$image_arr['alt'].'"' : '';
    $classes = $classes && !empty($classes) ? 'class="'.implode($classes, ' ').'"' : '';

    if ($lazy_load) {

      $src = 'data-src="'.$image_arr['url'].'"';
    } else {
      $src = 'src="'.$image_arr['url'].'"';
    }

    return  "<img $classes $src $alt />";
  }

  return '';

}