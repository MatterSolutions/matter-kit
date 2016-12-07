<?php

$title = mttr_get_template_var( 'name' );
$content = mttr_get_template_var( 'content' );

echo '<header class="s-page__header">';

	echo '<h2 class="s-page__title">' . esc_html( $title ) . '</h2>';

	if ( $content ) {

		echo apply_filters( 'the_content', $content );

	}

echo '</header>';