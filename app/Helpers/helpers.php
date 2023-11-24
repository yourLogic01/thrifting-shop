<?php
if (!function_exists('make_reference_id')) {
  function make_reference_id($prefix, $number)
  {
    $padded_text = $prefix . '-' . str_pad($number, 3, 0, STR_PAD_LEFT);

    return $padded_text;
  }
}

if (!function_exists('format_currency')) {
  function format_currency($value, $format = true)
  {
    if (!$format) {
      return $value;
    }

    $position = 'prefix';
    $symbol = 'Rp.';
    $decimal_separator = '.';
    $thousand_separator = ',';

    if ($position == 'prefix') {
      $formatted_value = $symbol . number_format((float) $value, 2, $decimal_separator, $thousand_separator);
    }

    return $formatted_value;
  }
}
