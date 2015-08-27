<?php
/**
 * admin.php - stuff for WordPress admin only
 *
 * @created   4/29/14 4:36 PM
 * @author    Mindshare Studios, Inc.
 * @copyright Copyright (c) 2014
 * @link      http://www.mindsharelabs.com/documentation/
 */

/**
 * Add links to the plugins screen
 *
 * @param $data
 * @param $page
 *
 * @return array
 */
if (is_admin()) {
	if (!empty($GLOBALS['pagenow']) && $GLOBALS['pagenow'] == sprintf('%s.php', 'plugins')) {
		add_filter('plugin_row_meta', 'php_browser_detection_plugin_links', 10, 2);
	}
}
function php_browser_detection_plugin_links($data, $page) {
	if ($page == plugin_basename(__FILE__)) {
		$data = array_merge(
			$data,
			array(
				sprintf(
					'and by <a href="http://martythornley.com/" target="_blank">%s</a>',
					esc_html__('Marty Thornley', 'php-browser-detection')
				),
				sprintf(
					'<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=11225299" target="_blank">%s</a>',
					esc_html__('Donate', 'php-browser-detection')
				)
			)
		);
	}

	return $data;
}
