<?php 

/* --------------------------------------------------------
*        __ __  __
*      /  /   /   /     __/__/__
*      \ /   /   /  __   /  /  __  (/__
*       /   /   / /  /  /  /  /__) /  /
*      /   /   / (__/__/_ /__/____/  /_/
*              \ 
*                SOLUTIONS
*
*	Flexible Content
*	Output the flexible content blocks from ACF
*
 ---------------------------------------------------------- */

// ------------------------------------------------
//	Setup the template partial vars
// ------------------------------------------------

$id = mttr_get_template_var( 'id' );
$data = mttr_get_template_var( 'data' );
$modifiers = mttr_get_template_var( 'modifiers' );



// ------------------------------------------------
//	Render the bands
// ------------------------------------------------

if ( is_array( $data ) ) {

	echo '<section id="' . esc_attr( $id ) . '" class="c-flexible-content  o-band  ' . implode( '  ', $modifiers ) .  '">';

		echo '<div class="c-flexible-content__body  o-band__body  o-tint__body">';

			// Used to create consistent space between each row layout
			echo '<ul class="c-flexible-content__items  o-ltg  o-lyt">';

				foreach ( $data as $item ) {

					echo '<li class="o-ltg__item  o-lyt__item">';

						mttr_get_template( $item['template'], $item['data'] );

					echo '</li>';

				}

			echo '</ul><!-- /.c-flexible-content__items -->';

		echo '</div><!-- /.c-flexible-content__body -->';

	echo '</section><!-- /.c-flexible-content -->';

}