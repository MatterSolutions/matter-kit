<?php

$sidebar = mttr_get_template_var( 'sidebar' );
$content = mttr_get_template_var( 'content' );

echo '<div class="s-page__section">';

	echo '<div class="s-o-lyt">';

		if ( $sidebar ) {

			echo '<div class="s-page__sidebar">';

				echo '<h3 class="s-v-meta">';

					echo $sidebar[ 'heading' ];

				echo '</h3>';

				echo '<div class="s-v-caption">';

					echo apply_filters( 'the_content', $sidebar[ 'content' ] );

				echo '</div>';

			echo '</div>';

		}

		echo '<div class="s-page__content">';

			if ( is_array( $content ) ) {

				echo '<ul class="o-ltg  o-lyt  o-lyt--large  o-ltg--large">';
				foreach ( $content as $item ) {

					if ( !empty( $item[ 'size' ] ) ) {

						echo '<li class="o-ltg__item  o-lyt__item  s-item--' . esc_attr( $item[ 'size' ] ) . '">';

					} else {

						echo '<li class="o-ltg__item  o-lyt__item">';

					}

						if ( !empty( $item[ 'template' ] && !empty( $item[ 'data' ] ) ) ) {

							$component = array(

								'heading' => $item[ 'name' ],
								'content' => $item[ 'content' ],
								'template' => $item[ 'template' ],
								'data' => $item[ 'data' ],

							);

							mttr_get_template( 'core/styleguide/template-parts/generic/_s.component', $component );

						} else {

							echo $item[ 'content' ];

						}

					echo '</li>';

				}

				echo '</ul>';

			}

		echo '</div>';

	echo '</div>';

echo '</div>';