<?php
/*
Plugin Name: PHP Browser Detection
Plugin URI: http://wordpress.org/extend/plugins/php-browser-detection/
Description: Use PHP to detect browsers for conditional CSS or to detect mobile phones.
Version: 3.1.8
Author: Mindshare Studios, Inc.
Author URI: https://mind.sh/are
License: GNU General Public License v3
License URI: LICENSE
Text Domain: php-browser-detection
*/

/**
 * Copyright 2009-2015 Mindshare Studios, Inc.
 * Based on code originally by Marty Thornley
 * Since version 3 making use of the BROWSCAP-PHP library by Garet Jax / asgrim
 *
 * @link https://github.com/browscap/browscap-php
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 3, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 */

// TODO refactor into class using object oriented code, filters aren't currently working

if (!defined('PBD_DIR_PATH')) {
	define('PBD_DIR_PATH', plugin_dir_path(__FILE__)); // /.../wp-content/plugins/php-browser-detection/
}

/**
 * Global variable with browser information.
 *
 * @global
 */
$browser_info = array();

/**
 * PHP Browser Detection initialization
 *
 * @private
 */

require_once('inc/admin.php');
require_once('lib/Browscap.php');

$browser_info = php_browser_info();

require_once('inc/deprecated.php');
include_once('inc/shortcodes.php');

/**
 * Returns array of all browser info.
 *
 * @usage global $browser_info;
 *
 * @return array
 */
function php_browser_info() {

	$browscap = new \phpbrowscap\Browscap(apply_filters('php_browser_detection_cache_dir', PBD_DIR_PATH . 'cache'));
	$browscap->doAutoUpdate = apply_filters('php_browser_detection_autoupdate', TRUE);
	$browscap->updateInterval = apply_filters('php_browser_detection_cache_time', 2592000);  // 30 days, default is 5
	$browscap->remoteIniUrl = apply_filters('php_browser_detection_version', "http://browscap.org/stream?q=Lite_PHP_BrowsCapINI");

	//	die(var_export($browscap->remoteIniUrl));
	//	die(var_export($browscap->getBrowser(NULL, TRUE)));

	return $browscap->getBrowser(NULL, TRUE);
}

/**
 * Returns the name of the browser.
 *
 * @return string
 */
function get_browser_name() {
	global $browser_info;

	return $browser_info['Browser'];
}

/**
 * Returns the browser version number.
 *
 * @return mixed
 */
function get_browser_version() {
	global $browser_info;

	return $browser_info['Version'];
}

/**
 * Conditional to test for any browser.
 *
 * @param string $name
 * @param string $version
 *
 * @return bool
 */
function is_browser($name = '', $version = '') {
	global $browser_info;

	$name = ucwords(trim($name));

	if (isset($browser_info['Browser']) && (strpos($browser_info['Browser'], $name) !== FALSE)) {
		if ($version == '') {
			return TRUE;
			// check MajorVer from full browscap first
		} elseif (isset($browser_info['MajorVer']) && $browser_info['MajorVer'] == $version) {
			return TRUE;
			// fallback to Version in lite version
		} elseif (isset($browser_info['Version']) && $browser_info['Version'] == $version) {
			return TRUE;
		} else {
			return FALSE;
		}
	} else {
		return FALSE;
	}
}

/**
 * Conditional to test for Firefox.
 *
 * @param string $version
 *
 * @return bool
 */
function is_firefox($version = '') {
	return is_browser('Firefox', $version);
}

/**
 * Conditional to test for Safari.
 *
 * @param string $version
 *
 * @return bool
 */
function is_safari($version = '') {
	return is_browser('Safari', $version);
}

/**
 * Conditional to test for Chrome.
 *
 * @param string $version
 *
 * @return bool
 */
function is_chrome($version = '') {
	return is_browser('Chrome', $version);
}

/**
 * Conditional to test for Opera.
 *
 * @param string $version
 *
 * @return bool
 */
function is_opera($version = '') {
	return is_browser('Opera', $version);
}

/**
 * Conditional to test for IE.
 *
 * @param string $version
 *
 * @return bool
 */
function is_ie($version = '') {
	return is_browser('IE', $version);
}

/**
 * Conditional to test for desktop devices.
 *
 * @return bool
 */
function is_desktop() {
	global $browser_info;

	// later than 3.1.1 version
	if (!is_tablet() && !is_mobile()) {
		return TRUE;
	}

	// pre 3.1 version
	if (isset($browser_info['Device_Type']) && strpos($browser_info['Device_Type'], "Desktop") !== FALSE) {
		return TRUE;
	}

	return FALSE;
}

/**
 * Conditional to test for tablet devices.
 *
 * @return bool
 */
function is_tablet() {
	global $browser_info;
	if (isset($browser_info['isTablet'])) {
		if ($browser_info['isTablet'] == 1 || $browser_info['isTablet'] == "true" || isset($browser_info['Device_Type']) && strpos($browser_info['Device_Type'], "Tablet") !== FALSE) {
			return TRUE;
		}
	}

	return FALSE;
}

/**
 * Conditional to test for mobile devices.
 *
 * @return bool
 */
function is_mobile() {
	global $browser_info;
	if (isset($browser_info['isMobileDevice'])) {
		if ($browser_info['isMobileDevice'] == 1 || $browser_info['isMobileDevice'] == "true" || isset($browser_info['Device_Type']) && strpos($browser_info['Device_Type'], "Mobile") !== FALSE) {
			return TRUE;
		}
	}

	return FALSE;
}

/**
 * Conditional to test for iPhone.
 *
 * @param string $version
 *
 * @return bool
 */
function is_iphone($version = '') {
	global $browser_info;
	if ((isset($browser_info['Browser']) && $browser_info['Browser'] == 'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone')) {
		if ($version == '') {
			return TRUE;
		} elseif ($browser_info['MajorVer'] == $version) {
			return TRUE;
		} else {
			return FALSE;
		}
	} else {
		return FALSE;
	}
}

/**
 * Conditional to test for iPad.
 *
 * @param string $version
 *
 * @return bool
 */
function is_ipad($version = '') {
	global $browser_info;
	if (preg_match("/iPad/", $browser_info['browser_name_pattern'], $matches) || strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')) {
		if ($version == '') {
			return TRUE;
		} elseif ($browser_info['MajorVer'] == $version) {
			return TRUE;
		} else {
			return FALSE;
		}
	} else {
		return FALSE;
	}
}

/**
 * Conditional to test for iPod.
 *
 * @param string $version
 *
 * @return bool
 */
function is_ipod($version = '') {
	global $browser_info;
	if (preg_match("/iPod/", $browser_info['browser_name_pattern'], $matches)) {
		if ($version == '') {
			return TRUE;
		} elseif ($browser_info['MajorVer'] == $version) {
			return TRUE;
		} else {
			return FALSE;
		}
	} else {
		return FALSE;
	}
}

/**
 * Conditional to test for JavaScript support.
 *
 * @return bool
 */
function browser_supports_javascript() {
	global $browser_info;
	if (isset($browser_info['JavaScript'])) {
		if ($browser_info['JavaScript'] == 1 || $browser_info['JavaScript'] == "true") {
			return TRUE;
		}
	}

	return FALSE;
}

/**
 * Conditional to test for cookie support.
 *
 * @return bool
 */
function browser_supports_cookies() {
	global $browser_info;
	if (isset($browser_info['Cookies'])) {
		if ($browser_info['Cookies'] == 1 || $browser_info['Cookies'] == "true") {
			return TRUE;
		}
	}

	return FALSE;
}

/**
 * Conditional to test for CSS support.
 *
 * @return bool
 */
function browser_supports_css() {
	global $browser_info;
	if (isset($browser_info['CssVersion'])) {
		if ($browser_info['CssVersion'] >= 1) {
			return TRUE;
		}
	}

	return FALSE;
}

/**
 * Evaluates natural language strings to boolean equivalent
 * All values defined as TRUE will return TRUE, anything else is FALSE.
 * Boolean values will be passed through.
 *
 * @since  3.1.1
 *
 * @param string $string        The natural language value
 * @param array  $true_synonyms A list strings that are TRUE
 *
 * @return boolean The boolean value of the provided text
 **/
function pbd_is_true($string, $true_synonyms = array('yes', 'y', 'true', '1', 'on', 'open', 'affirmative', '+', 'positive')) {
	if (is_array($string)) {
		return FALSE;
	}
	if (is_bool($string)) {
		return $string;
	}

	return in_array(strtolower(trim($string)), $true_synonyms);
}
