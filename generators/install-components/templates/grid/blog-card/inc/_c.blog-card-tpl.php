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
//	=Components - Blog Card
//
// 	Main template file for including the Blog Card
//
// ---------------------------------------------------------------------------- *

// Component vars
$heading = mttr_get_template_var( 'heading' );
$image = mttr_get_template_var( 'image' );
$date = mttr_get_template_var( 'date' );
$categories = mttr_get_template_var( 'categories' );
$excerpt = mttr_get_template_var( 'content' );
$link = mttr_get_template_var( 'link' );
$id = mttr_get_template_var( 'id' );


// Component namespace, in case we've changed it
$namespace = mttr_get_template_var( 'namespace' );

if ( !$namespace ) {

	$namespace = 'c-blog-card';

}


// Setup a unique identifier
if ( !$id ) {

	$id = rand( 0000, 9999 ) . date( 'His' );

}


// Modifiers
$modifiers = mttr_get_template_var( 'modifiers' );

// Add spaces before modifiers
if ( $modifiers ) {

	$modifiers = '  ' . $modifiers;

}



// ------------------------------------------------
//	Begin outputting component
// ------------------------------------------------

echo '<div id="' . esc_html( $namespace ) . '--' . esc_attr( $id ) . '" class="' . esc_html( $namespace ) . esc_html( $modifiers ) . '">';

	echo '<ul class="o-lyt  o-lyt--middle  o-ltg">';

		if ( $image ) {

			echo '<li class="o-lyt__item  o-ltg__item  g-one-half@lap  g-one-third@desk">';

			if ( $link ) {

				echo '<a class="u-text--undecorated  u-display--block" href="' . esc_url( $link ) . '">';

			}

				echo '<div class="' . esc_html( $namespace ) . '__media">';

					echo '<img alt="" src="' . $image . '">';

				echo '</div>';

			if ( $link ) {

				echo '</a>';

			}

			echo '</li>';

			echo '<li class="o-lyt__item  o-ltg__item  g-one-half@lap  g-two-thirds@desk">';

		} else {

			echo '<li class="o-lyt__item  o-ltg__item">';

		}

			echo '<div class="' . esc_html( $namespace ) . '__body">';

				if ( $heading ) {

					echo '<h3 class="c-subheading  ' . esc_html( $namespace ) . '__heading  u-flush--bottom">';

						if ( $link ) {

							echo '<a class="u-text--undecorated" href="' . esc_url( $link ) . '">';

						}

							echo esc_html( $heading );

						if ( $link ) {

							echo '</a>';

						}

					echo '</h3><!-- /.' . esc_html( $namespace ) . '__heading -->';

				}

				if ( $date ) {
				
					echo '<p class="' . esc_html( $namespace ) . '__date  u-text--small">';

						echo '<time pubdate="pubdate">' . esc_html( $date ) . '</time>';

					echo '</p>';

				}

				if ( $categories ) {

					echo '<div class="' . esc_html( $namespace ) . '__categories">';

						foreach ( $categories as $category ) {

							echo '<a class="c-btn  c-btn--tiny" href="' . get_term_link( $category->term_id ) . '">' . $category->name . '</a> ';

						}

					echo '</div>';

				}

				if ( $excerpt ) {

					echo '<p class="' . esc_html( $namespace ) . '__content  u-push--top">';

						echo esc_html( $excerpt );

					echo '</p><!-- /.' . esc_html( $namespace ) . '__content -->';

				}

				if ( $link ) {

					echo ' <a href="' . esc_url( $link ) . '" class="' . esc_html( $namespace ) . '__readmore  c-cta-link  c-cta-link--primary">Read More</a><!-- /.' . esc_html( $namespace ) . '__readmore -->';

				}

			echo '</li>';

	echo '</ul>';

echo '</div><!-- /.' . esc_html( $namespace ) . ' -->';