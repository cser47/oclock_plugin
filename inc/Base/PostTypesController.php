<?php 
/**
 * @package  CserPlugin
 */
namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;



class PostTypesController extends BaseController
{
    public $settings;

    public $callbacks;

    public $subpages = array();

    public function register()
    {
        if ( ! $this->activated( 'pt_manager' ) ) return;

        $this->rest_add_new_fields();

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setSubpages();

        $this->settings->addSubPages( $this->subpages )->register();

    }

    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'cser_plugin', 
                'page_title' => 'Post Types Rest Options', 
                'menu_title' => 'Options REST', 
                'capability' => 'manage_options', 
                'menu_slug' => 'cser_pt', 
                'callback' => array( $this->callbacks, 'adminPt' )
            )
        );
    }

    // Fonction d'extension de l'API Rest
    public static function rest_add_new_fields() {

        // récupération de la liste des post types publics
        $post_types = get_post_types( array( 'public' => true ), 'objects' );

        // fonction s'appliquant à tous les posts types publics
        foreach ( $post_types as $post_type ) {

            $post_type_name     = $post_type->name;
            $show_in_rest       = ( isset( $post_type->show_in_rest ) && $post_type->show_in_rest ) ? true : false;
            $supports_thumbnail = post_type_supports( $post_type_name, 'thumbnail' );
            
            // si le post type est géré par REST et gère les images à la une
            if ( $show_in_rest && $supports_thumbnail ) {

                // ajout du champ de gestion des images à la une
                register_rest_field( $post_type_name, 'featured_image_src', array(
                    'get_callback' => function ( $post_arr ) {
                        $image_src_arr = wp_get_attachment_image_src( $post_arr['featured_media'], 'full' );

                        return $image_src_arr[0];
                    },
                    'update_callback' => null,
                    'schema' => null
                ) );
            }
            // si le post est géré par REST
            if ( $show_in_rest ) {

                // ajout du nom de l'auteur du post
                register_rest_field( $post_type_name, 'author_src', array(
                    'get_callback' => function ( $post_arr ) {
                        $author_str = get_the_author_meta('display_name');

                        return $author_str;
                    },
                    'update_callback' => null,
                    'schema' => null
                ) );
                
                // ajout de l'URL de l'avatar de l'auteur
                register_rest_field( $post_type_name, 'author_avatar_src', array(
                    'get_callback' => function ( $post_arr ) {
                        $author_avatar_str = get_avatar_url('user_ID');

                        return $author_avatar_str;
                    },
                    'update_callback' => null,
                    'schema' => null
                ) );
            }
        }
    }
}
