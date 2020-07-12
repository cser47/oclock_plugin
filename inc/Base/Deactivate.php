<?php
/*
* @package CserPlugin
*/

namespace Inc\Base;

// gestion de la désactivation du plugin
class Deactivate {

    public static function deactivate()
    {
        // public = accessible partout
        // static = peut être déclenché sans initialiser la classe

        // mise à jour des permaliens
        flush_rewrite_rules();
        
        // d'autres règles peuvent être ajoutées si on veut étendre les fonctions et fonctionnalités du plugin.
    }
}
