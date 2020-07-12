<?php
/**
 * @package  CserPlugin
 */
namespace Inc\Base;

// liste des fonctions déclenchées à l'activation du plugin
class Activate {
	public static function activate() {
		flush_rewrite_rules();

		$default = array();

        // gestion des options enregistrées dans la base de données
		if ( ! get_option( 'cser_plugin' ) ) {
			update_option( 'cser_plugin', $default );
		}

		if ( ! get_option( 'cser_plugin_cpt' ) ) {
			update_option( 'cser_plugin_cpt', $default );
		}
	}
}
