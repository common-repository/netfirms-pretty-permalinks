<?php
/*
Plugin Name: Netfirms Pretty Permalinks
Plugin URI: http://www.joelika.com/netfirms-pretty-permalinks/
Description: This plugin brings "pretty permalinks" to Netfirms users
Version: 1.0 beta 2
Author: Joel Kline
Author URI: http://www.joelika.com
*/

/*  Copyright 2007  Joel Kline  (email : joel@joelika.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class netfirmsPermalinks{
	function netfirmsPermalinks(){
		add_action('activate_netfirms_permalinks.php', array(&$this, 'netfirmsPermalinksInstall'));
		add_action('deactivate_netfirms_permalinks.php', array(&$this, 'netfirmsPermalinksUninstall'));
		add_filter('rewrite_rules_array', array(&$this, 'permalinkRewrite'));
		add_filter('mod_rewrite_rules', array(&$this, 'htaccessRewrite'));
		remove_filter('template_redirect', 'redirect_canonical');
	}
	
	function netfirmsPermalinksInstall(){
		global $wp_rewrite;
		$wp_rewrite->flush_rules();
	}
	
	function netfirmsPermalinksUninstall(){
		global $wp_rewrite;
		remove_filter('rewrite_rules_array', array(&$this, 'permalinkRewrite'));
		remove_filter('mod_rewrite_rules', array(&$this, 'htaccessRewrite'));
		$wp_rewrite->flush_rules();
	}

	function permalinkRewrite($rewrite){
		$mod_rewrite = array();
	
		foreach ($rewrite as $match => $query)
		{
			$match = 'index.php/'.$match;
			$mod_rewrite[$match] = $query;
		}
		return $mod_rewrite;
	}
	
	function htaccessRewrite($rewite){
		$home_root = parse_url(get_option('home'));
		$home_root = trailingslashit($home_root['path']);
		
		$rules = "<IfModule mod_rewrite.c>\n";
		$rules .= "RewriteEngine On\n";
		$rules .= "RewriteBase $home_root\n";
		$rules .= "RewriteCond %{REQUEST_FILENAME} !-f\n" .
						"RewriteCond %{REQUEST_FILENAME} !-d\n" .
						"RewriteCond %{REQUEST_URI} !index.php\n".
						"RewriteRule ^(.*)$ {$home_root}index.php/$1 [L,QSA]\n";
		$rules .= "</IfModule>\n";
		return $rules;
	}
}

$netfirmsPermalinks =& new netfirmsPermalinks();


?>