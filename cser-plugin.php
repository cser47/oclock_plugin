<?php
/*
* @package CserPlugin
*/
/*
    Plugin Name:    Cser Plugin
    Description:    Exo réalisé pour O'clock
    Version:        1.0.0
    Author:         Caroline Servissolle
    Author URI:     http://caroline.servissolle.com
    Text Domain:    cser-plugin
    Domain Path:    /languages
*/

/********************************
 * PROTECTION DU FICHIER
 *********************************/

defined( 'ABSPATH' ) or die( 'Vous n\'avez pas les autorisations nécessaires pour accéder à ce fichier !' );


/************************************
 * COMPOSER
 *************************************/

// composer autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/****************************************
 * ACTIVATION / DESACTIVATION DU PLUGIN
 ****************************************/

// code d'activation du plugin
function activate_cser_plugin() {
    Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_cser_plugin' );

// code de désactivation du plugin
function deactivate_cser_plugin() {
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_cser_plugin' );


/*****************************************
 * INITIALISATION DES CLASSES DU PLUGIN
 *****************************************/

// initialisation du plugin
if ( class_exists( 'Inc\\Init' ) ) {
    Inc\Init::register_services();
}
