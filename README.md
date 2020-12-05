=== WP Redirect url ===
Plugin Name : WP Redirect url
Tags: wp redirect url, redirect post, redirect plugin, redirection , 301 redirect, 302 redirect,404, 404 redirect, redirect page,
Requires at least: 5.0
Requires PHP at least : 5.6
Tested up to: 5.5.3
Stable tag: 5.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easy to redirect any url anywhere as per request . Create And manage 301 redirects

== Description ==

Easily manage or create 301 redirects with this WP Redirect url plugin .
If you want, you can easily redirect URL you need through this WP Redirect url plugin .
You do not have to do any kind of coding for showing recent posts with thumbnail .However, if you have any problems with the installation or use of the plugin, 
you can contact us without any hesitation.Support Email arafatrahmank@gmail.com
Give us feedback, suggestions, bug reports, and any other contributions on the in
the plugin's [GitHub repository](https://github.com/arafatrahman/wp-redirect-url).
WP Latest Posts Widget With Thumbnails plugin does not collect any personal data, so it is 
**ready for EU General Data Protection Regulation (GDPR) compliance**.

== Installation ==

You can install from within WordPress using the Plugin/Add New feature, or if you wish to manually install:

1. Download the plugin.
2. Upload the entire `wp-redirect-url` directory to your plugins folder
3. Activate the plugin from the plugin page in your WordPress Dashboard
4. Then Go to 'WP Redirect url' => Click 'Add Request' and fill Request url to Destination url
5. Congratulations! you are now ready to work


== Screenshots ==
1. The first screenshot shows WP Redirect url Settings Section.

= for developers: Supported Hooks =

add_action('send_headers', 'wpru_redirect');
=> this action hook use to redirect url

register_deactivation_hook(__FILE__, 'delete_wpru_database');
=> register_deactivation_hook use for delete wpru datatable

wpru-main.css
=> this css file use for design WP Redirect url Settings Section

wpru-main.js
=> this js file use for WP Redirect url Settings Section maintain (like append url request , add request , remove request , delete request)
