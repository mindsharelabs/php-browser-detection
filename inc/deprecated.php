<?php
/**
 * deprecated.php
 * Do not use these functions, included for backward compatibility only.
 *
 * @created   4/29/14 4:26 PM
 * @author    Mindshare Studios, Inc.
 * @copyright Copyright (c) 2014
 * @link      http://www.mindsharelabs.com/documentation/
 */

/**
 * Conditional to test for IE6.
 *
 * @return bool
 * @deprecated Use the future-proof syntax instead of this function: if(is_ie(6)) { }
 */
function is_ie6() {
	_deprecated_function(__FUNCTION__, '3.6', 'is_ie');

	return is_ie(6);
}

/**
 * Conditional to test for IE7.
 *
 * @return bool
 * @deprecated Use the future-proof syntax instead of this function: if(is_ie(7)) { }
 */
function is_ie7() {
	_deprecated_function(__FUNCTION__, '3.6', 'is_ie');

	return is_ie(7);
}

/**
 * Conditional to test for IE8.
 *
 * @return bool
 * @deprecated Use the future-proof syntax instead of this function: if(is_ie(8)) { }
 */
function is_ie8() {
	_deprecated_function(__FUNCTION__, '3.6', 'is_ie');

	return is_ie(8);
}

/**
 * Conditional to test for IE9.
 *
 * @return bool
 * @deprecated Use the future-proof syntax instead of this function: if(is_ie(9)) { }
 */
function is_ie9() {
	_deprecated_function(__FUNCTION__, '3.6', 'is_ie');

	return is_ie(9);
}

/**
 * Conditional to test for IE10.
 *
 * @return bool
 * @deprecated Use the future-proof syntax instead of this function: if(is_ie(10)) { }
 */
function is_ie10() {
	_deprecated_function(__FUNCTION__, '3.6', 'is_ie');

	return is_ie(10);
}

/**
 * Conditional to test for less than IE8.
 *
 * @return bool
 * @deprecated Use the future-proof syntax instead of this function: if(is_ie() && get_browser_version() < 6) { }
 */
function is_lt_IE6() {
	_deprecated_function(__FUNCTION__, '3.6', 'is_ie');
	if (is_ie() && get_browser_version() < 6) {
		return TRUE;
	} else {
		return FALSE;
	}
}

/**
 * Conditional to test for less than IE7.
 *
 * @return bool
 * @deprecated Use the future-proof syntax instead of this function: if(is_ie() && get_browser_version() < 7) { }
 */
function is_lt_IE7() {
	_deprecated_function(__FUNCTION__, '3.6', 'is_ie');
	if (is_ie() && get_browser_version() < 7) {
		return TRUE;
	} else {
		return FALSE;
	}
}

/**
 * Conditional to test for less than IE8.
 *
 * @return bool
 * @deprecated Use the future-proof syntax instead of this function: if(is_ie() && get_browser_version() < 8) { }
 */
function is_lt_IE8() {
	_deprecated_function(__FUNCTION__, '3.6', 'is_ie');
	if (is_ie() && get_browser_version() < 8) {
		return TRUE;
	} else {
		return FALSE;
	}
}

/**
 * Conditional to test for less than IE9.
 *
 * @return bool
 * @deprecated Use the future-proof syntax instead of this function: if(is_ie() && get_browser_version() < 9) { }
 */
function is_lt_IE9() {
	_deprecated_function(__FUNCTION__, '3.6', 'is_ie');
	if (is_ie() && get_browser_version() < 9) {
		return TRUE;
	} else {
		return FALSE;
	}
}

/**
 * Conditional to test for less than IE10.
 *
 * @return bool
 * @deprecated Use the future-proof syntax instead of this function: if(is_ie() && get_browser_version() < 10) { }
 */
function is_lt_IE10() {
	_deprecated_function(__FUNCTION__, '3.6', 'is_ie');
	if (is_ie() && get_browser_version() < 10) {
		return TRUE;
	} else {
		return FALSE;
	}
}

/**
 * Conditional to test for less than IE11.
 *
 * @return bool
 * @deprecated Use the future-proof syntax instead of this function: if(is_ie() && get_browser_version() < 11) { }
 */
function is_lt_IE11() {
	_deprecated_function(__FUNCTION__, '3.6', 'is_ie');
	if (is_ie() && get_browser_version() < 11) {
		return TRUE;
	} else {
		return FALSE;
	}
}
