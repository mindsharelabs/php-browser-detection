<?php
/**
 * php-browser-detection / shortcodes.php
 *
 * @created   9/7/15 11:59 AM
 * @author    Mindshare Studios, Inc.
 * @copyright Copyright (c) 2015
 * @link      https://mind.sh/are/
 */

/**
 * @param        $browser
 * @param string $content
 *
 * @return bool|string
 */
function is_browser_shorcode($browser, $content = "") {
	$browser = shortcode_atts(array(
		'name'    => '',
		'version' => ''
	), $browser, 'is_browser');

	if (is_browser($browser['name'], $browser['version'])) {
		return ($content);
	} else {
		return FALSE;
	}
}

add_shortcode('is_browser', 'is_browser_shorcode');

function browser_info_shorcode() {

	$browser_info = php_browser_info();

	$output = apply_filters('browser_info_start', '<div class="php-browser-info"><pre>');
	$output .= apply_filters('browser_info_middle', print_r($browser_info, TRUE));
	$output .= apply_filters('browser_info_end', '</pre></div>');

	return $output;
}

add_shortcode('browser_info', 'browser_info_shorcode');
