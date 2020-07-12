<div class="wrap">
    <h1>Administration des CPT (Custom Post Types) - Types de contenu personnalisés</h1>
    <?php settings_errors(); ?>

    <ul class="nav nav-tabs">
        <li class="<?php echo !isset($_POST["edit_post"]) ? 'active' : '' ?>">
            <a href="#tab-1">Liste des Custom Post Types</a>
        </li>
        <li class="<?php echo isset($_POST["edit_post"]) ? 'active' : '' ?>">
            <a href="#tab-2">
                <?php echo isset($_POST["edit_post"]) ? 'Modifier' : 'Ajouter' ?> Custom Post Type
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="tab-1" class="tab-pane <?php echo !isset($_POST["edit_post"]) ? 'active' : '' ?>">

            <h2>Gérez les Custom Post Types</h2>

            <?php 
            $options = get_option( 'cser_plugin_cpt' ) ?: array();

            echo '<table class="cpt-table"><tr><th>ID</th><th>Nom au singulier</th><th>Nom au pluriel</th><th class="text-center">Public</th><th class="text-center">Archive</th><th class="text-center">Actions</th></tr>';

            foreach ($options as $option) {
                $public = isset($option['public']) ? "OUI" : "NON";
                $archive = isset($option['has_archive']) ? "OUI" : "NON";

                echo "<tr><td>{$option['post_type']}</td><td>{$option['singular_name']}</td><td>{$option['plural_name']}</td><td class=\"text-center\">{$public}</td><td class=\"text-center\">{$archive}</td><td class=\"text-center\">";

                echo '<form method="post" action="" class="inline-block">';
                echo '<input type="hidden" name="edit_post" value="' . $option['post_type'] . '">';
                submit_button( 'Modifier', 'primary small', 'submit', false);
                echo '</form> ';

                echo '<form method="post" action="options.php" class="inline-block">';
                settings_fields( 'cser_plugin_cpt_settings' );
                echo '<input type="hidden" name="remove" value="' . $option['post_type'] . '">';
                submit_button( 'Supprimer', 'delete small', 'submit', false, array(
                    'onclick' => 'return confirm("Etes-vous sûr(e) de vouloir supprimer ce Type de contenu ? Attention, les données associées ne seront pas supprimées.");'
                ));
                echo '</form></td></tr>';
            }

            echo '</table>';
            echo '<br><h2>Liste de tous les Post Types : </h2>';

            $args = array( 'public' => true );
            $output = 'names';
            $operator = 'and';

            $all_post_types = get_post_types( $args, $output, $operator );
            unset($all_post_types[ array_search( 'attachment' , $all_post_types ) ]);

            if ( $all_post_types ) {
                echo '<ul class="pt-list">';
                foreach ( $all_post_types  as $post_type ) {
                    echo '<li class="pt-list-item">' . $post_type . '</li>';
                }
                echo '<ul>';
            }
            ?>

        </div>

        <div id="tab-2" class="tab-pane <?php echo isset($_POST["edit_post"]) ? 'active' : '' ?>">
            <form method="post" action="options.php">
                <?php 
                    settings_fields( 'cser_plugin_cpt_settings' );
                    do_settings_sections( 'cser_cpt' );
                    submit_button();
                ?>
            </form>

            <?php 
            echo '<br><h2>Liste de tous les Post Types : </h2>';

            $args = array( 'public' => true );
            $output = 'names';
            $operator = 'and';

            $all_post_types = get_post_types( $args, $output, $operator );
            unset($all_post_types[ array_search( 'attachment' , $all_post_types ) ]);

            if ( $all_post_types ) {
                echo '<ul class="pt-list">';
                foreach ( $all_post_types  as $post_type ) {
                    echo '<li class="pt-list-item">' . $post_type . '</li>';
                }
                echo '<ul>';
            }
            ?>
        </div>
    </div>
</div>
