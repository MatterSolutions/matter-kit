<?php

$heading = mttr_get_template_var( 'heading' );
$content = mttr_get_template_var( 'content' );
$template = mttr_get_template_var( 'template' );
$show_test = mttr_get_template_var( 'show_test' );
$data = mttr_get_template_var( 'data' );

echo '<div class="s-component">';

	echo '<h4 class="s-v-meta">' . esc_html( $heading ) . '</h4>';

	echo apply_filters( 'the_content', $content );

	if ( $template && $data ) {

		mttr_get_component_template( $template, $data );

	}

	if ( $show_test ){

		mttr_output_styleguide_component_test_details( $data );

	}

echo '</div>';