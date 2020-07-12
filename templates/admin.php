<div class="wrap">
    <h1>Administration du plugin Cser</h1>
    <?php settings_errors(); ?>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-1">Réglages</a></li>
        <li><a href="#tab-2">A propos</a></li>
    </ul>

    <div class="tab-content">
        <div id="tab-1" class="tab-pane active">

            <form method="post" action="options.php">
                <?php 
                settings_fields( 'cser_plugin_settings' );
                do_settings_sections( 'cser_plugin' );
                submit_button();
                ?>
            </form>

            <?php

            echo '<h3>A titre d\'info, voici la liste des Post Types existants : </h3>';

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

        <div id="tab-2" class="tab-pane">
            <h2>A propos</h2>
            Bla bla bla
        </div>

    </div>
</div>
