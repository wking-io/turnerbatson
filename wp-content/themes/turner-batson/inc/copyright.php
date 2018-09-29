<?php

/**
 * Auto-copywrite year.
 *
 */
function tb_copyright() {
  $year_one = '2018';
	$current_year = date("Y");
  $copyright = '&copy; ';
  $copyright .= ($year_one >= $current_year) ? $year_one : $year_one . '-' . $current_year;

	return $copyright;
}