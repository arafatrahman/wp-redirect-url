=== WP Redirect url ===

Plugin Name : WP Redirect url
Tags: wp redirect url, redirect post, redirect plugin, redirection , 301 redirect, 302 redirect,404, 404 redirect, redirect page,
Contributors: arafatrahmanbd,abushoaib
Requires at least: 5.0
Requires PHP: 5.6
Tested up to: 5.6
Stable tag: 5.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Make And manage 301 redirects with WP Redirect url plugin . Now you can easily redirect any wp url . 

== Description ==

Easily manage or create 301 redirects with this WP Redirect url plugin .
If you want, you can easily redirect URL you need through this WP Redirect url plugin .
You do not have to do any kind of coding for anage or create 301 redirection .
Name of redirect field is optional . If You want Redirect properly you can added Request url 
(old url) And added destination url (new url) . If you removed url you need to click removed url
button and then save settings.Redirection is compatible with PHP from 5.6 and upwards (including 7.4).



== WHY WP Redirect url ==

WP Redirect url plugin is useful for any wordpress users.You can easily create and manage 301 redirects these plugins . 
We have a nice user interface in this plugin . Where you can redirect and delete your desired URL from a section .And for
that you don't need to know any minimum coding.

= What's the plugin do =

If you are suffering from URL redirection problem then this plugin of ours is a blessing for you.
The plugin works in a similar manner to how WordPress handles permalinks works . it's  just Redirect url as per request . 

== Support ==

However, if you have any problems with the installation or use of the plugin, 
you can contact us without any hesitation.Support Email arafatrahmank@gmail.com
Give us feedback, suggestions, bug reports, and any other contributions on the in
the plugin's [https://github.com/arafatrahman/wp-redirect-url](https://github.com/arafatrahman/wp-redirect-url).
WP Latest Posts Widget With Thumbnails plugin does not collect any personal data, so it is 
**ready for EU General Data Protection Regulation (GDPR) compliance**.

== Installation ==

The plugin is simple to install:

You can install from within WordPress using the Plugin/Add New feature, or if you wish to manually install:

1. Download the plugin.
2. Upload the entire `wp-redirect-url` directory to your plugins folder
3. Activate the plugin from the plugin page in your WordPress Dashboard
4. Then Go to 'WP Redirect url' => Click 'Add Request' and fill Request url to Destination url
5. Congratulations! you are now ready to work

Full documentation Will be Uploaded [WP Redirect url](http://kauniaweb.com/) site


== Screenshots ==
1. First select WP Redirect url from the left side of the admin dashboard . Then see WP Redirect url management interface
2. Here you can added redirect request and remove request . After fill fields you just need to save setings.

= for developers: Supported Hooks =

add_action('send_headers', 'wpru_redirect');
=> this action hook use to redirect url

register_deactivation_hook(__FILE__, 'delete_wpru_database');
=> register_deactivation_hook use for delete wpru datatable

wpru-main.css
=> this css file use for design WP Redirect url Settings Section

wpru-main.js
=> this js file use for WP Redirect url Settings Section maintain (like append url request , add request , remove request , delete request)
