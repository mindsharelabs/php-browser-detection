=== Plugin Name ===
Contributors: mindshare, MartyThornley
Donate link: http://mind.sh/are/donate/
Tags: php, browser detection, browser, internet explorer, iphone, mobile, browscap, detection
Version: 3.1.3
Tested up to: 4.1.1
Stable tag: 3.1.3

PHP Browser Detection is a WordPress plugin used to detect a user's browser. Please report any bugs on the support forums.

== Description ==

Version 3 adds support for is_tablet(), is_desktop(), and is_browser() as well as numerous bug fixes and code improvements. As of version 3.1.2 automatic updates of browscap.ini are disabeld until we can deal with memory usage issues.

PHP Browser Detection is a WordPress plugin used to detect a user's browser. It can be used to send conditional CSS files for Internet Explorer, display different content or custom messages anywhere on the page, or to swap out Flash for an image for iPhones.

**Template Tags:**

*Test for specific browsers:*

$version is optional. Include a major version number, a single integer - 3,4,5, etc... Or leave it empty to test for any version.

`<?php if(is_firefox($version)) { /* your code here */ }; ?>`

`<?php if(is_safari($version)) { /* your code here */ }; ?>`

`<?php if(is_chrome($version)) { /* your code here */ }; ?>`

`<?php if(is_opera($version)) { /* your code here */ }; ?>`

`<?php if(is_ie($version)) { /* your code here */ }; ?>`

`<?php if(is_browser($name, $version)) { /* your code here */ }; ?>`

*Check for mobile, tablet, iPhone, iPad, iPod, etc...*

`<?php if(is_desktop()) { /* your code here */ }; ?>`

`<?php if(is_tablet()) { /* your code here */ }; ?>`

`<?php if(is_iphone($version)) { /* your code here */ }; ?>`

`<?php if(is_ipad($version)) { /* your code here */ }; ?>`

`<?php if(is_ipod($version)) { /* your code here */ }; ?>`

`<?php if(is_mobile()) { /* your code here */ }; ?>`

*Check for greater than / less than a specific version...*

Less than or equal to Firefox 19:
`<?php if(is_firefox() && get_browser_version() <= 19) { /* your code here */ }; ?>`

Less than or equal to IE 10:
`<?php if(is_ie() && get_browser_version() <= 10) { /* your code here */ }; ?>`

Greater than or equal to Safari 4:
`<?php if(is_safari() && get_browser_version() >= 4) { /* your code here */ }; ?>`

these are just a few examples, but this syntax will work for any browser or version.

*Check specific versions...*

Is the browser IE6?
`<?php if(is_ie(6)) { /* your code here */ }; ?>`

Is the browser IE10?
`<?php if(is_ie(10)) { /* your code here */ }; ?>`

**Or you can get all the info and do what you want with it:**

*Get just the name...*

`<?php $browser_name = get_browser_name(); ?>`

Get the full version number - 3.2, 5.0, etc...

`<?php $browser_version = get_browser_version(); ?>`

*Or get it all in array...*

`<?php $browser_info = php_browser_info(); ?>`

== Installation ==

1. Automatically install through the Plugin Browser or...
1. Upload entire `php-browser-detection` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

= I got a fatal error on activation. What gives? =

This most likely means your web host is running a very old version of PHP. As of version 3.0, only PHP 5.3 and above are supported. You can ask your host to upgrade PHP for you.

== Changelog ==

= 3.1.3 =
* Updated default browscap.ini
* Migrated Browscap.php to use asgrim's fork
* Added ID param for tests


= 3.1.2 =
* Disabled auto updates because of memory problems
* Minor bugfixes
* Add icons for WP 4.0  plugin installer
* Added development repo on github.com
* Updated Browscap library

= 3.1.1 =
* Fix for is_desktop()
* Added is_true

= 3.1 =
* Updated default browscap.ini
* Changed version of browscap to utilize less memory
* Updated Browscap to version 2.0 from 2b

= 3.0.1 =
* Added FAQ section

= 3.0 =
* Browscap.ini database auto-updates!
* Browscap database caching!
* Added is_tablet()
* Added is_desktop()
* Added is_browser()
* Various detection fixes (incl. Opera Mini and IE Mobile)
* Updated tests
* Refactored plugin structure
* Now utilizes Browser Capabilities PHP Project by Garet Jax

= 2.2.4 =
* updated php_browser_detection_browscap.ini to version 5027

= 2.2.3 =
* updated readme

= 2.2.2 =
* updated php_browser_detection_browscap.ini to version 5022
* bugfixes

= 2.2.1 =
* updated php_browser_detection_browscap.ini to version 5020
* bugfixes
* additional testing and QA

= 2.2 =
* updated php_browser_detection_browscap.ini to version 5020 (custom version)
* minor code cleanup
* added tests.php to check all plugin features
* added additional usage examples to readme.txt
* deprecated is_ie9() functions in favor is is_ie(9), etc.
* fixed issue with is_ipod
* fixed issue with is_mobile
* fixed issue with detecting Android 4.2.*
* fixed issue with boolean values
* other minor bug fixes reported on wordpress.org

= 2.1.3 =
* updated php_browser_detection_browscap.ini to version 5016

= 2.1.2 =

* updated php_browser_detection_browscap.ini to version 5004

= 2.1.1 =

* updated php_browser_detection_browscap.ini to version 4911

= 2.1 =

* fixed path info to work with 'mu-plugins' folder, version 2.0 didn't know how to find it.
* better recognition of iPad and iPhone with iOS 4

= 2.0 =

* Added tests for iPad, iPod, Chrome, Opera
* Added ability to test for any version for each browser
* Added ability to get browser name and get browser version

= 1.2 =

* fixed the lesser than statements.
* They had been looking for lesser than or equal to
* Fixed the is_safari() statement.

= 1.1 =
* Fixed error on line 156 preventing activation

