=== Netfirms Pretty Permalinks ===
Contributors: joelika
Tags: permalinks
Requires at least: 2.1
Tested up to: 2.3.3
Stable tag: 0.9.1

IMPORTANT NOTE: It seems as if Netfirms has enable support for WordPress pretty permalinks out of the box, rendering this plugin obsolete. Please visit http://www.joelika.com/2008/03/24/266 for more details and how to enable Netfirms pretty permalink support if you've been using this plugin.

This plugin brings pretty permalinks functionality to Netfirms users for both PHP 4 and PHP 5.

== Installation ==

Achieve pretty permalinks in Netfirms with three easy steps:

1. Upload `netfirms_permalinks.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Choose your permalink structure through the 'Permalinks' submenu under the 'Options' menu.

== Important Update ==

It seems as if Netfirms has enable support for WordPress pretty permalinks out of the box, rendering this plugin obsolete. Please visit http://www.joelika.com/2008/03/24/266 for more details and how to enable Netfirms pretty permalink support if you've been using this plugin.

== Release Notes ==

= 1.0 Beta 2 =
Added "RewriteCond %{REQUEST_URI} !index.php" line to mod_rewrite rules for better sub directory support. Thanks [Harsha](http://greysquare.org/blog "Harsha") for testing!

= 1.0 Beta 1 =
Initial Release.

== Troubleshooting ==

1. Check that your .htaccess file is writeable since this new plugin will insert new rewrite rules.
2. Check that you didn't already add your own rules into your .htaccess file. WordPress may have added another set, causing problems.
3. Try refreshing your permalink structure via the "Permalinks" submenu under the "Options" menu.

Visit http://www.joelika.com/netfirms-pretty-permalinks/ for more troubleshooting or updates.