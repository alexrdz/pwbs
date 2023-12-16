<?php

/**
 * Dump and die function.
 *
 * @param mixed $value The value to be dumped.
 * @throws None This function does not throw any exceptions.
 * @return void
 */
function dd($value)
{
  echo '<pre>';
  print_r($value);
  echo '</pre>';

  die ();
}

/**
 * Check if the current URL matches a given value.
 *
 * @param mixed $value The value to compare the current URL against.
 * @return bool Returns true if the current URL matches the given value, false otherwise.
 */
function urlIs($value)
{
  return $_SERVER['REQUEST_URI'] === $value;
}

/**
 * Checks whether the request is an AJAX request.
 *
 * @return bool Returns true if the request is an AJAX request, false otherwise.
 */
function isAjax()
{
  $isAjax = false;
  if (!empty($_SERVER['HTTP_HX_REQUEST']) || !empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    $isAjax = true;
  }
  return $isAjax;
}

/**
 * Retrieves a segment from a URI.
 *
 * @param string $uri The URI to retrieve the segment from.
 * @param int $index The index of the segment to retrieve (optional, default: 1).
 * @throws InvalidArgumentException If the $index is less than 0 or greater than the number of segments.
 * @return string The segment at the specified index.
 */
function getSegement($index = 1)
{
  $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  $uri_segments = explode('/', $uri_path);
  return $uri_segments[$index];
}
