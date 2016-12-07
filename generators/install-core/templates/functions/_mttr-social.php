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
//    =Functions - Social
//
//    Functions for generating social media share links
//
// ---------------------------------------------------------------------------- *



/* ---------------------------------------------------------
*	Output the social menu
	@TODO: Refactor this and move to template
 --------------------------------------------------------- */
function mttr_social_menu( ) {

	$social_menu = mttr_get_social_share_menu_global_default_order();

	if ( $social_menu ) {

		$output = '';

		$output .= '<ul class="c-social-menu  o-lyt  ' . apply_filters( 'mttr_social_menu_layout_modifier_classes', 'o-lyt--auto  o-lyt--tiny  o-list  o-list--inline' ) . '">';

			foreach( $social_menu as $social_media ) {

				if ( function_exists( 'mttr_get_social_share_icon_' . esc_attr( $social_media ) ) ) {

					$function = 'mttr_get_social_media_url_' . esc_attr( $social_media );
					$url = $function( $id );

				} else {

					continue;

				}

				if ( $url ) {

					$output .= '<li class="o-lyt__item  o-list__item  c-social-menu__item">';

						$output .= '<a class="ga--social" href="' . esc_url( $url ) . '">';

							$output .= '<i class="o-icon' . apply_filters( 'mttr_social_menu_icon_modifiers', '  o-icon--middle' ) . '">';

								if ( function_exists( 'mttr_get_social_share_icon_' . esc_attr( $social_media ) ) ) {

									$function = 'mttr_get_social_share_icon_' . esc_attr( $social_media );
									$icon = $function( $id );

									$output .= mttr_get_icon( esc_html( $icon ) );

								}

							$output .= '</i>';

						$output .= '</a>';

					$output .= '</li>';

				}

			}

		$output .= '</ul>';

		return $output;

	}

	return false;

}











/* ---------------------------------------------------------
*	Social Sharing
 --------------------------------------------------------- */

if ( !function_exists( 'mttr_get_social_share_data' ) ) {

	function mttr_get_social_share_data( $network, $id = null ) {

		if ( empty( $id ) ) $id = get_the_ID();

		if ( function_exists( 'mttr_get_social_share_data_' . esc_attr( $network ) ) ) {

			$function = 'mttr_get_social_share_data_' . esc_attr( $network );
			return $function( $id );

		}

		return false;

	}

}




/* ---------------------------------------------------------
*	Facebook
 --------------------------------------------------------- */

if ( !function_exists( 'mttr_get_social_share_data_facebook' ) ) {

	function mttr_get_social_share_data_facebook( $id = null ) {

		if ( empty( $id ) ) $id = get_the_ID();

		$name = 'Facebook';
		$name = apply_filters( 'mttr_filter_social_share_data_facebook_name', $name );

		$link = 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink( $id );
		$link = apply_filters( 'mttr_filter_social_share_data_facebook_url', $link );

		$icon = mttr_get_social_share_icon_facebook();
		
		$data = array(

			'link' => $link,
			'name' => $name,
			'icon' => $icon,

		);	

		return $data;

	}

}




if ( !function_exists( 'mttr_get_social_share_icon_facebook' ) ) {

	function mttr_get_social_share_icon_facebook( $id = null ) {

		return apply_filters( 'mttr_get_social_share_icon_facebook_image', 'facebook.svg' );

	}

}



if ( !function_exists( 'mttr_get_social_media_url_facebook' ) ) {

function mttr_get_social_media_url_facebook() {

		return esc_url( get_theme_mod( 'mttr_social_facebook_url' ) );

	}
	
}





/* ---------------------------------------------------------
*	Twitter
 --------------------------------------------------------- */

if ( !function_exists( 'mttr_get_social_share_data_twitter' ) ) {

	function mttr_get_social_share_data_twitter( $id = null ) {

		if ( empty( $id ) ) $id = get_the_ID();

		$name = 'Twitter';
		$name = apply_filters( 'mttr_filter_social_share_data_twitter_name', $name );

		$link = 'http://twitter.com/share?text=' . get_the_title( $id ) . '&url=' . get_the_permalink( $id ) . '&hashtags=' . strtolower( get_bloginfo( 'name' ) );
		$link = apply_filters( 'mttr_filter_social_share_data_twitter_url', $link );

		$icon = mttr_get_social_share_icon_twitter();
		
		$data = array(

			'link' => $link,
			'name' => $name,
			'icon' => $icon,

		);	

		return $data;

	}

}




if ( !function_exists( 'mttr_get_social_share_icon_twitter' ) ) {

function mttr_get_social_share_icon_twitter() {

		return apply_filters( 'mttr_get_social_share_icon_twitter_image', 'twitter.svg' );

	}
	
}




if ( !function_exists( 'mttr_get_social_media_url_twitter' ) ) {

function mttr_get_social_media_url_twitter() {

		return esc_url( get_theme_mod( 'mttr_social_twitter_url' ) );

	}
	
}






/* ---------------------------------------------------------
*	Google Plus
 --------------------------------------------------------- */

if ( !function_exists( 'mttr_get_social_share_data_googleplus' ) ) {

	function mttr_get_social_share_data_googleplus( $id = null ) {

		if ( empty( $id ) ) $id = get_the_ID();

		$name = 'Google +';
		$name = apply_filters( 'mttr_filter_social_share_data_googleplus_name', $name );

		$link = 'https://plus.google.com/share?url=' . get_the_permalink( $id );
		$link = apply_filters( 'mttr_filter_social_share_data_googleplus_url', $link );

		$icon = mttr_get_social_share_icon_googleplus();
		
		$data = array(

			'link' => $link,
			'name' => $name,
			'icon' => $icon,

		);	

		return $data;

	}

}



if ( !function_exists( 'mttr_get_social_share_icon_googleplus' ) ) {

function mttr_get_social_share_icon_googleplus() {

		return apply_filters( 'mttr_get_social_share_icon_google_image', 'google.svg' );

	}
	
}



if ( !function_exists( 'mttr_get_social_media_url_googleplus' ) ) {

function mttr_get_social_media_url_googleplus() {

		return esc_url( get_theme_mod( 'mttr_social_googleplus_url' ) );

	}
	
}






/* ---------------------------------------------------------
*	LinkedIn
 --------------------------------------------------------- */

if ( !function_exists( 'mttr_get_social_share_data_linkedin' ) ) {

	function mttr_get_social_share_data_linkedin( $id = null ) {

		if ( empty( $id ) ) $id = get_the_ID();

		$name = 'LinkedIn';
		$name = apply_filters( 'mttr_filter_social_share_data_linkedin_name', $name );

		$link = 'https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink( $id ) . '&title=' . get_the_title( $id );
		$link = apply_filters( 'mttr_filter_social_share_data_linkedin_url', $link );

		$icon = mttr_get_social_share_icon_linkedin();
		
		$data = array(

			'link' => $link,
			'name' => $name,
			'icon' => $icon,

		);	

		return $data;

	}

}


if ( !function_exists( 'mttr_get_social_share_icon_linkedin' ) ) {

function mttr_get_social_share_icon_linkedin() {

		return apply_filters( 'mttr_get_social_share_icon_linkedin_image', 'linkedin.svg' );

	}
	
}



if ( !function_exists( 'mttr_get_social_media_url_linkedin' ) ) {

function mttr_get_social_media_url_linkedin() {

		return esc_url( get_theme_mod( 'mttr_social_linkedin_url' ) );

	}
	
}





/* ---------------------------------------------------------
*	Pinterest
 --------------------------------------------------------- */

if ( !function_exists( 'mttr_get_social_share_data_pinterest' ) ) {

	function mttr_get_social_share_data_pinterest( $id = null ) {

		if ( empty( $id ) ) $id = get_the_ID();

		if ( has_post_thumbnail( $id ) ) {

			$image = wp_get_attachment_image_src( get_post_thumbnail( $id ) );

			$name = 'Pinterest';
			$name = apply_filters( 'mttr_filter_social_share_data_pinterest_name', $name );

			$link = 'https://pinterest.com/pin/create/button/?url=' . get_the_permalink( $id ) . '&media=' . esc_url( $image[ 0 ] );
			$link = apply_filters( 'mttr_filter_social_share_data_pinterest_url', $link );

			$icon = mttr_get_social_share_icon_pinterest();

			$data = array(

				'link' => $link,
				'name' => $name,
				'icon' => $icon,

			);	

			return $data;

		}

		return false;

	}

}



if ( !function_exists( 'mttr_get_social_share_icon_pinterest' ) ) {

function mttr_get_social_share_icon_pinterest() {

		return apply_filters( 'mttr_get_social_share_icon_pinterest_image', 'pinterest.svg' );

	}
	
}



if ( !function_exists( 'mttr_get_social_media_url_pinterest' ) ) {

function mttr_get_social_media_url_pinterest() {

		return esc_url( get_theme_mod( 'mttr_social_pinterest_url' ) );

	}
	
}






/* ---------------------------------------------------------
*	Email
 --------------------------------------------------------- */

if ( !function_exists( 'mttr_get_social_share_data_mail' ) ) {

	function mttr_get_social_share_data_mail( $id = null ) {

		if ( empty( $id ) ) $id = get_the_ID();

		$name = 'Email';
		$name = apply_filters( 'mttr_filter_social_share_data_mail_name', $name );

		$link = 'mailto:&subject=' . get_the_title( $id ) . '&body=' . get_the_permalink( $id );
		$link = apply_filters( 'mttr_filter_social_share_data_mail_url', $link );

		$icon = mttr_get_social_share_icon_email();
		
		$data = array(

			'link' => $link,
			'name' => $name,
			'icon' => $icon,

		);	

		return $data;

	}

}


if ( !function_exists( 'mttr_get_social_share_icon_email' ) ) {

function mttr_get_social_share_icon_email() {

		return apply_filters( 'mttr_get_social_share_icon_mail_image', 'mail.svg' );

	}
	
}





/* ---------------------------------------------------------
*	Other social icons
 --------------------------------------------------------- */


// Instagram
if ( !function_exists( 'mttr_get_social_share_icon_instagram' ) ) {

function mttr_get_social_share_icon_instagram() {

		return apply_filters( 'mttr_get_social_share_icon_instagram_image', 'instagram.svg' );

	}
	
}


if ( !function_exists( 'mttr_get_social_media_url_instagram' ) ) {

function mttr_get_social_media_url_instagram() {

		return esc_url( get_theme_mod( 'mttr_social_instagram_url' ) );

	}
	
}




// Youtube
if ( !function_exists( 'mttr_get_social_share_icon_youtube' ) ) {

function mttr_get_social_share_icon_youtube() {

		return apply_filters( 'mttr_get_social_share_icon_youtube_image', 'youtube.svg' );

	}
	
}


if ( !function_exists( 'mttr_get_social_media_url_youtube' ) ) {

function mttr_get_social_media_url_youtube() {

		return esc_url( get_theme_mod( 'mttr_social_youtube_url' ) );

	}
	
}






/* ---------------------------------------------------------
*	Get Default Share Order
 --------------------------------------------------------- */

if ( !function_exists( 'mttr_get_social_share_default_order' ) ) {

	function mttr_get_social_share_default_order() {

		$order = array(

			'facebook',
			'twitter',
			'linkedin',
			'googleplus',
			'pinterest',
			'email',

		);

		return $order;

	}

}





/* ---------------------------------------------------------
*	Get Defined Global Share Order
 --------------------------------------------------------- */

if ( !function_exists( 'mttr_get_social_share_global_default_order' ) ) {

	function mttr_get_social_share_global_default_order() {

		$share_order = mttr_textarea_to_array( get_theme_mod( 'mttr_social_share_order' ) );
		
		if ( $share_order ) {

			return $share_order;

		}

		return false;

	}

}






/* ---------------------------------------------------------
*	Get Defined Global Share Menu Order
 --------------------------------------------------------- */

if ( !function_exists( 'mttr_get_social_share_menu_global_default_order' ) ) {

	function mttr_get_social_share_menu_global_default_order() {

		$share_order = mttr_textarea_to_array( get_theme_mod( 'mttr_social_menu_share_order' ) );
		
		if ( $share_order ) {

			return $share_order;

		}

		return false;

	}

}







/* ---------------------------------------------------------
*	Get Defined Global Share Order
 --------------------------------------------------------- */

if ( !function_exists( 'mttr_textarea_to_array' ) ) {

	function mttr_textarea_to_array( $text ) {

		$array = explode( "\n", str_replace( "\r", '', $text ) );

		if ( $array ) {

			$order = array();

			foreach ( $array as $array_item ) {

				$array_item = trim( $array_item );

				if ( !empty( $array_item ) ) {

					$order[] = esc_attr( $array_item );

				}

			}

			return $order;

		}

		return false;

	}

}






/* ---------------------------------------------------------
*	Get Share Array
 --------------------------------------------------------- */

if ( !function_exists( 'mttr_get_social_share_array' ) ) {

	function mttr_get_social_share_array( $networks = array(), $id = null ) {

		if ( empty( $id ) ) $id = get_the_ID();

		// Get the global default array
		if ( empty( $networks ) ) $networks = mttr_get_social_share_global_default_order();

		// Get the default array if no global is set
		if ( empty( $networks ) ) $networks = mttr_get_social_share_default_order();

		if ( is_array( $networks ) ) {

			$data = array();

			foreach( $networks as $network ) {

				if ( function_exists( 'mttr_get_social_share_data_' . esc_attr( $network ) ) ) {

					$function = 'mttr_get_social_share_data_' . esc_attr( $network );
					$share_data = $function( $id );

					if ( $share_data ) {

						$data[ $network ] = $share_data;

					}

				}

			}

			return $data;

		}

		return false;

	}

}





/* ---------------------------------------------------------
*	Output open graph tags
 --------------------------------------------------------- */
add_action( 'wp_head', 'mttr_open_graph_tags' );
function mttr_open_graph_tags() {

	if ( !is_archive() ) {

		// Main front page
		if ( is_front_page() ) {

			if ( has_post_thumbnail( get_option( 'page_on_front' ) ) ) {

				$hero_image = mttr_get_image_url( get_option( 'page_on_front' ), 'large' );

			}

		// Blog
		} elseif ( is_home() ) {

			if ( has_post_thumbnail( get_option( 'page_for_posts' ) ) ) {

				$hero_image = mttr_get_image_url( get_option( 'page_for_posts' ), 'large' );

			}

		// Everything else
		} else {
			
			if ( has_post_thumbnail( get_the_ID() ) ) {

				$hero_image = mttr_get_image_url( get_the_ID(), 'large' );

			}

		}

		echo '<meta property="og:title" content="' . get_the_title() . '">';
		echo '<meta property="og:site_name" content="' . get_the_title() . '">';
		echo '<meta property="og:url" content="' . get_the_permalink() . '">';
		
		if ( !empty( $hero_image ) ) {

			echo '<meta property="og:image" content="' . esc_url( $hero_image ) . '">';

		}

	}

}