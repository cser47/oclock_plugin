<?php
/*
* @package CserPlugin
*/

namespace Inc\Pages;

// utilisation des classes externes
use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;

class Dashboard extends BaseController {

    public $settings;

    public $callbacks;    
    public $callbacks_mgr;

    public $pages = array();

    public function register() {

        // activation des différentes classes utilisées
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();        
        $this->callbacks_mgr = new ManagerCallbacks();

        $this->setPages();

        $this->setSettings();        
        $this->setSections();        
        $this->setFields();

        // ajout d'une sous-page Réglages
        // qui ne sera visible que si d'autres modules du plugin sont activés.
        $this->settings->addPages( $this->pages )->withSubPage( 'Réglages' )->register();
    }

    /*
    * PAGE PRINCIPALE DES REGLAGES DU PLUGIN
    */
    public function setPages() {

        $this->pages = array(
            array(
                'page_title'    => 'Cser Plugin',
                'menu_title'    => 'Cser WP-Rest',
                'capability'    => 'manage_options',
                'menu_slug'     => 'cser_plugin',
                'callback'      => array( $this->callbacks, 'adminDashboard' ),
                'icon_url'      => 'dashicons-rest-api',
                'position'      => 110
            )
        );
    }


    /*
    * PAGE DES REGLAGES DES MODULES SUPPLEMENTAIRES DU PLUGIN
    */

    public function setSettings() {
        $args = array(
            array(
                'option_group' => 'cser_plugin_settings',
                'option_name' => 'cser_plugin',
                'callback' => array( $this->callbacks_mgr, 'checkboxSanitize' )
            )
        );

        $this->settings->setSettings( $args );
    }

    public function setSections() {

        $args = array(
            array(
                'id'        => 'cser_admin_index',
                'title'     => 'Activez les options du plugin :',
                'callback'  => array( $this->callbacks_mgr, 'adminSectionManager'),
                'page'      => 'cser_plugin'
            )
        );

        $this->settings->setSections( $args );
    }

    public function setFields() {

        $args = array();

        foreach ( $this->managers as $key => $value ) {
            $args[] = array(
                'id'        => $key,
                'title'     => $value,
                'callback'  => array( $this->callbacks_mgr, 'checkboxField' ),
                'page'      => 'cser_plugin',
                'section'   => 'cser_admin_index',
                'args'      => array(
                    'option_name'   => 'cser_plugin',
                    'label_for'     => $key,
                    'class'         => 'ui-toggle'
                )
            );
        }

        $this->settings->setFields( $args );
    }
}
