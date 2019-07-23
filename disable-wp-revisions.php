<?php
/**
 * Plugin Name:     Disable WordPress Post Revisions
 * Plugin URI:
 * Description:     Simple plugin to disable post revisions for any post type.
 * Version:         0.1.0
 * Author:          Andrey Mishchenko
 * Author URI:      https://www.msav.ru/
 * License:         GPLv3
 * License URI:     http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:     disable-wp-revisions
 */

if (!defined("DWPR_AUTOLOAD")) {
	define("DWPR_AUTOLOAD", true);
	try {
		spl_autoload_register( function ( $class ) {
			$pattern = '/^Msav\\\\WordPress\\\\Plugin\\\\DisableWPRevisions/';
			if ( preg_match($pattern, $class)
			     && ($filename = preg_replace($pattern, dirname( __FILE__ ) . "/lib", $class)) !== null
			     && ($filename = preg_replace('/\\\\/', '/', $filename)) !== null ) {

				$filename .= ".php";
				include_once($filename);

			}
		} );
	} catch ( Exception $e ) {
	}
}

include_once(dirname(__FILE__) . "/init.php");
