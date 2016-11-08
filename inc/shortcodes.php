<?php
/**
 * php-browser-detection / shortcodes.php
 *
 * @created   9/7/15 11:59 AM
 * @author    Mindshare Labs, Inc.
 * @copyright Copyright (c) 2017
 * @link      https://mind.sh/are/
 */

if (!function_exists('is_browser_shortcode')) :

	/**
	 * @param        $browser
	 * @param string $content
	 *
	 * @return bool|string
	 */
	function is_browser_shortcode($browser, $content = "") {
		$browser = shortcode_atts(array(
									  'name'    => '',
									  'version' => '',
								  ), $browser, 'is_browser');

		if (is_browser($browser[ 'name' ], $browser[ 'version' ])) {
			return ($content);
		} else {
			return FALSE;
		}
	}
endif;

if (!function_exists('is_os_shortcode')) :

	/**
	 * @param        $os
	 * @param string $content
	 *
	 * @return bool|string
	 */
	function is_os_shortcode($os, $content = "") {
		$os = shortcode_atts(array(
								 'name'    => '',
								 'version' => '',
							 ), $os, 'is_os');

		if (is_browser($os[ 'name' ], $os[ 'version' ])) {
			return ($content);
		} else {
			return FALSE;
		}
	}

	add_shortcode('is_browser', 'is_os_shortcode');
endif;

if (!function_exists('browser_info_shortcode')) :

	/**
	 * @return mixed|string|void
	 */
	function browser_info_shortcode() {

		$browser_info = php_browser_info();

		$output = apply_filters('browser_info_start', '<div class="php-browser-info"><pre>');
		$output .= apply_filters('browser_info_middle', print_r($browser_info, TRUE));
		$output .= apply_filters('browser_info_end', '</pre></div>');

		return $output;
	}

	add_shortcode('browser_info', 'browser_info_shortcode');
endif;
