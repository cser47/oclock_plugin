<?php
/*
* @package CserPlugin
*/
namespace Inc;

// final interdit l'extension de notre classe
// protection de la classe contre la modification de méthodes
final class Init {

    // tableau des services (classes) que l'on va utiliser dans le plugin
    public static function get_services() {
        return array(
            Pages\Dashboard::class,
			Base\Enqueue::class,
			Base\SettingsLinks::class,
			Base\PostTypesController::class,
			Base\CustomPostTypeController::class,
        );
    }
    
    // lancer la fonction register qui initialise chaque service (classe) et appelle la méthodde register
    public static function register_services() {
        
        foreach ( self::get_services() as $class ) {
            $service = self::instantiate( $class );
            if ( method_exists( $service, 'register' ) ) {
                $service->register();
            }
        }
    }
    
    // initialise une classe depuis le tableau services et on instancie la classe
    private static function instantiate( $class ) {
        $service = new $class();
        return $service;
    }
    
}
