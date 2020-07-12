<?php

/*
* Fichier appelé lors de la désinstallation du plugin
*
* @package CserPlugin
*/

/************************************
 * PROTECTION DE L'ACCES AU FICHIER
*************************************/

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
}


/*********************************************
 * NETTOYAGE DES DONNEES STOCKEES DANS LA BDD
*********************************************/

global $wpdb;
// attention cette variable globale est vraiment dangereuse, si le fichier est compromis, cela pourrait permettre d'accéder à la BDD via SQL
$wpdb->query( "DELETE FROM wp_options WHERE options_name = 'cser_plugin'" );
$wpdb->query( "DELETE FROM wp_options WHERE options_name = 'cser_plugin_cpt'" );
