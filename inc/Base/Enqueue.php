<?php
/*
* @package CserPlugin
*/

namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueue extends BaseController {

    public function register() {

        // charge les scripts et styles du plugin dans la partie back-office
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );

    }

    //méthode pour ajouter tous nos scripts et styles
    function enqueue() {
        wp_enqueue_style( 'cserpluginstyle', $this->plugin_url . 'assets/cser_style.min.css' );
        wp_enqueue_script( 'cserpluginscript', $this->plugin_url . 'assets/cser_script.min.js' );
    }
}
