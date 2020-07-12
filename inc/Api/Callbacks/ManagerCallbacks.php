<?php
/*
* @package CserPlugin
*/

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class ManagerCallbacks extends BaseController {

    public function checkboxSanitize( $input ) {

        $output = array();

        foreach ( $this->managers as $key => $value ) {
            $output[$key] = isset( $input[$key] ) ? true : false;
        }

        return $output;
    }

    public function adminSectionManager() {

        
        echo '<div>Le premier module vous permet de créer, modifier, supprimer des types de contenu personnalisé (custom post types) compatibles avec l\'API Rest de Wordpress.</div>';
        echo '<div>Le second module vous permet d\'étendre les options de l\'API Rest en ajoutant les fonctionnalités suivantes :';
        echo '<ul>';
        echo '<li>ajout de l\'url de l\'image à la une (featured image)</li>';
        echo '<li>ajout du nom de l\'auteur</li>';
        echo '<li>ajout de l\'avatar de l\'auteur</li>';
        echo '</ul></div>';

        echo 'Gestion des modules du plugin : activation en cochant les cases des modules';
    }

    public function checkboxField( $args ) {
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];
        $checkbox = get_option( $option_name );

        $checked = isset( $checkbox[$name] ) ? ( $checkbox[$name] ? true : false ) : false;

        echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="1" class="" ' . ( $checked ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
        
        
    }

}
