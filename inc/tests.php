<?php
/*
 * Template Name: PHP Browser Detection Tests
 *
 * This file contains tests and is not used in production.
 *
 *
 * @created 4/9/13 4:00 PM
 * @author Mindshare Studios, Inc.
 * @copyright Copyright (c) 2014
 * @link http://www.mindsharelabs.com/kb/
 * 
 */
include_once('../../../../wp-blog-header.php');
/*
function browser_detection_version($version) {
	$version = 'http://browscap.org/stream?q=PHP_BrowsCapINI';
	return $version;
}

add_filter('php_browser_detection_version', 'browser_detection_version');*/

if (array_key_exists('test-id', $_GET) && isset($_GET['test-id'])) {
	$id = $_GET['test-id'];
} else {
	$id = 2;
}
$q = new WP_Query('page_id=' . $id);

get_header();

?>
<div id="main" class="site-main">
	<div id="main-content" class="main-content">
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
				<?php if ($q->have_posts()) : ?>
					<?php while ($q->have_posts()) : $q->the_post(); ?>

						<h1>PHP Browser Detection Tests<?php //the_title(); ?></h1>

						<?php //the_content(); ?>

						<div style="padding:5px; margin:10px 0; border-radius:5px; background:#E6E6E6">
							<p>Get all browser info:</p>
							<?php
							$browser_info = php_browser_info();
							echo '<pre>php_browser_info() = ';
							print_r($browser_info);
							echo '</pre>';
							?>
						</div>

						<div style="padding:5px; margin:10px 0; border-radius:5px; background:#E6E6E6">
							<p>Get browser name:</p>
							<?php
							echo '<pre>get_browser_name() = ';
							echo get_browser_name();
							echo '</pre>';
							?>
						</div>

						<div style="padding:5px; margin:10px 0; border-radius:5px; background:#E6E6E6">
							<p>Get browser version:</p>
							<?php
							echo '<pre>get_browser_version() = ';
							echo get_browser_version();
							echo '</pre>';
							?>
						</div>

						<div style="padding:5px; margin:10px 0; border-radius:5px; background:#E6E6E6">
							<p>Test for specific browsers:</p>
							<?php
							echo '<pre>is_firefox() = ';
							echo is_firefox();
							echo '</pre>';

							echo '<pre>is_safari() = ';
							echo is_safari();
							echo '</pre>';

							echo '<pre>is_chrome() = ';
							echo is_chrome();
							echo '</pre>';

							echo '<pre>is_opera() = ';
							echo is_opera();
							echo '</pre>';

							echo '<pre>is_ie() = ';
							echo is_ie();
							echo '</pre>';
							?>
						</div>

						<div style="padding:5px; margin:10px 0; border-radius:5px; background:#E6E6E6">
							<p>Test for mobile/iphone/ipad:</p>
							<?php
							echo '<pre>is_desktop() = ';
							echo is_desktop();
							echo '</pre>';

							echo '<pre>is_tablet() = ';
							echo is_tablet();
							echo '</pre>';

							echo '<pre>is_mobile() = ';
							echo is_mobile();
							echo '</pre>';

							echo '<pre>is_ipad() = ';
							echo is_ipad();
							echo '</pre>';

							echo '<pre>is_ipod() = ';
							echo is_ipod();
							echo '</pre>';

							echo '<pre>is_iphone() = ';
							echo is_iphone();
							echo '</pre>';

							?>
						</div>

						<div style="padding:5px; margin:10px 0; border-radius:5px; background:#E6E6E6">
							<p>Test for browser support:</p>
							<?php
							echo '<pre>browser_supports_javascript() = ';
							echo browser_supports_javascript();
							echo '</pre>';

							echo '<pre>browser_supports_cookies() = ';
							echo browser_supports_cookies();
							echo '</pre>';

							echo '<pre>browser_supports_css() = ';
							echo browser_supports_css();
							echo '</pre>';

							?>
						</div>

						<div style="padding:5px; margin:10px 0; border-radius:5px; background:#E6E6E6">
							<p>Test for higher or lower versions of a browser:</p>
							<?php
							echo '<pre>if(is_ie() && get_browser_version() < 10) = ';
							if (is_ie() && get_browser_version() < 10) {
								echo TRUE;
							};
							echo '</pre>';

							echo '<pre>if(is_firefox() && get_browser_version() >= 19) = ';
							if (is_firefox() && get_browser_version() >= 19) {
								echo TRUE;
							};
							?>
						</div>

						<div style="padding:5px; margin:10px 0; border-radius:5px; background:#E6E6E6">
							<p>Test for specific versions of a browser:</p>
							<?php
							echo '<pre>if(is_ie(11)) = ';
							if (is_ie(11)) {
								echo TRUE;
							};
							echo '</pre>';

							echo '<pre>if(is_firefox(35)) = ';
							if (is_firefox(35)) {
								echo TRUE;
							};
							echo '</pre>';

							echo '<pre>if(is_chrome(44)) = ';
							if (is_chrome(44)) {
								echo TRUE;
							};
							echo '</pre>';
							?>
						</div>

						<div style="padding:5px; margin:10px 0; border-radius:5px; background:#E6E6E6">
							<p>Shortcodes:</p>

							<div class="post"><p>I've implemented 2 basic shortcodes, if you care to test the new version:
									<a href="https://github.com/mindsharestudios/php-browser-detection/archive/master.zip" rel="nofollow">https://github.com/mindsharestudios/php-browser-detection/archive/master.zip</a></p>
								<p>Show content to specific browsers:<br>
								</p><pre><code>[is_browser name="chrome" version="45"]
											   &lt;p&gt;You are using Chrome 45 or above.&lt;/p&gt;
											   [/is_browser]</code></pre>
								<?php echo do_shortcode('[is_browser name="chrome" version="45"]<strong>You are using Chrome 45 or above.</strong>[/is_browser]'); ?>
								<hr />
								<p>Output all browser info:<br></p>
								<pre><code>[browser_info]</code></pre>
								<?php echo do_shortcode('[browser_info]'); ?>
							</div>

						</div>

					<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
	<div id="secondary">
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
