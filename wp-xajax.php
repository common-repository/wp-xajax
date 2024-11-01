<?php 
/*
Plugin Name: WP-Xajax
Plugin URI: http://pirex.com.br/wordpress-plugins/wp-xajax
Description: Provides an easy way for plugin/theme developers to use Xajax framework to write ajax applications. 
Author: Leo Germani
Stable tag: 1.0
Author URI: http://pirex.com.br/wordpress-plugins

    WP-Xajax is released under the GNU General Public License (GPL)
    http://www.gnu.org/licenses/gpl.txt
	
	Please check xajax files for its specific license notes
    
*/
$MUorNOT = str_replace("wp-xajax.php", "", substr(__FILE__,strpos(__FILE__,"wp-content/")+11));
$ajaxPath = ABSPATH . "wp-content/" . $MUorNOT . "wp-xajax";
$ajaxUrl = get_option("siteurl") . "/wp-content/" . $MUorNOT . "wp-xajax";
require_once($ajaxPath."/xajax.inc.php");

function wpxajax_init(){
	global $xajax;
	$xajax = new xajax();
	
}

function wpxajax_process(){
	global $xajax;
	$xajax->processRequests();
}

function wpxajax_addJS(){
	global $xajax, $ajaxUrl;
	$xajax->printJavascript($ajaxUrl);
}	



add_action('init','wpxajax_init',1);
add_action('init','wpxajax_process',12);
add_action('wp_head','wpxajax_addJS');
add_action('admin_head','wpxajax_addJS');


?>
