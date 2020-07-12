<?php
/*
* @package CserPlugin
*/

namespace Inc\Base;

use \Inc\Base\BaseController;

class SettingsLinks extends BaseController {

    public function register() {
        add_filter("plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
    }

    // Cette fonction permet d'ajouter le lien "Options" dans la liste des liens
    // sur la page d'affichage des Extensions
    public function settings_link( $links ) {
        
        $settings_link = '<a href="admin.php?page=cser_plugin">Options</a>';
        array_push( $links, $settings_link );
        return $links;
    }
}
