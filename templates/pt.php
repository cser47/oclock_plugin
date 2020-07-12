<div class="wrap">
    <h1>Options REST des post types</h1>
    <?php settings_errors(); ?>

    <h2>Les options REST de tous les post types ci-dessous ont été étendues :</h2>
    <div>
        <p>Les options ajoutées et accessibles via l'API Rest sont : </p>
        <ul>
            <li class="pt-list-item2"><strong>featured_image_src</strong> : ajout de l'url de l'image à la une (featured image)</li>
            <li class="pt-list-item2"><strong>author_src</strong> : ajout du nom de l'auteur</li>
            <li class="pt-list-item2"><strong>author_avatar_src</strong> : ajout de l'avatar de l'auteur</li>
        </ul>
    </div>
    <div>
        <?php 
        echo '<br><h3>Liste de tous les post types : </h3>';

        $args = array( 'public' => true );
        $output = 'names';
        $operator = 'and';

        $all_post_types = get_post_types( $args, $output, $operator );
        unset($all_post_types[ array_search( 'attachment' , $all_post_types ) ]);

        if ( $all_post_types ) {
        echo '<ul class="pt-list">';
            foreach ( $all_post_types as $post_type ) {
            echo '<li class="pt-list-item">' . $post_type . '</li>';
            }
            echo '<ul>';
                }
        ?>
    </div>
</div>
</div>
