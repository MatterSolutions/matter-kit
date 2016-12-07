<?php

// * ---------------------------------------------------------------------------    
// 
//       __ __  __
//     /  /   /   /     __/__/__
//     \ /   /   /  __   /  /  __  (/__
//      /   /   / /  /  /  /  /__) /  /
//     /   /   / (__/__/_ /__/____/  /_/
//             \
//               SOLUTIONS
// 
// 
//    =Styleguide Template - Note
//
//    Display a decorative note
//
// ---------------------------------------------------------------------------- *


$heading = mttr_get_template_var( 'heading' );
$content = mttr_get_template_var( 'content' );



echo '<div class="s-note">';

	echo '<div class="s-note__body">';

		echo '<div class="s-note__content">';

			echo '<h6 class="s-note__heading">' . esc_html( $heading ) . '</h6>';

			if ( $content ) {

				echo '<div class="u-negate-btm-margin">';

					echo apply_filters( 'the_content', $content );

				echo '</div>';

			}

		echo '</div><!-- /.s-note__content -->';

	echo '</div><!-- /.s-note__body -->';

echo '</div><!-- /.s-note -->';