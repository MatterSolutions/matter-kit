<?php

/*
*	Styleguide header
*/

$pages = mttr_get_template_var( 'pages' );

echo '<header class="s-header">';

    echo '<ul class="s-nav">';

        foreach ( $pages as $page ) {

            echo '<li class="s-nav__item">';

                echo '<a class="s-nav__link  js-toggle" data-toggle-type="tab" data-toggle-class="s-tab--is-active" href="' . esc_html( $page[ 'link' ] ) . '">' . $page[ 'icon' ] . '</a>';

            echo '</li>';

        }

    echo '</ul>';

echo '</header><!-- /.s-header -->';