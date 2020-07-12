<?php
/*
* @package CserPlugin
*/

namespace Inc\Base;

class BaseController {
        
    public $plugin_path;
    
    public $plugin_url;
    
    public $plugin;
    
    public $managers = array();
    

    // fonction de construction qui initialise des variables d'url
    // et les noms des modules (managers) qui seront utilisés et activés selon les besoins par le plugin
    public function __construct() {
        $this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
        $this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) );
        $this->plugin = plugin_basename( dirname( __FILE__, 3 ) ) . '/cser-plugin.php';
        
        $this->managers = array(
            'cpt_manager'           => 'Créer/Gérer les Custom Post Types (compatibles WP-Rest)',
            'pt_manager'            => 'Etendre les options Rest de tous les Post Types'
        );
    }
    
    // fonction qui permet de vérifier si un (ou plusieurs) des modules est/sont activé-s.
    public function activated( string $key ) {
		$option = get_option( 'cser_plugin' );

		return isset( $option[ $key ] ) ? $option[ $key ] : false;
	}
    
}
