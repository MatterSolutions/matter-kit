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
//    =Customiser - Setup
//
//    Remove unnecessary customiser settings
//
// ---------------------------------------------------------------------------- *

add_action( 'customize_register', 'mttr_unhook_customiser_settings', 30 );

function mttr_unhook_customiser_settings( $wp_customize ) {

	// Remove some panels/controls
	// $wp_customize->remove_control( 'header_image' );
	// $wp_customize->remove_panel( 'widgets' );

	// // Remove sections
	// $wp_customize->remove_section( 'colors' );
	// $wp_customize->remove_section( 'background_image' );
	// $wp_customize->remove_section( 'static_front_page' );

}







if ( class_exists( 'WP_Customize_Control' ) ) {

	class Mttr_Customize_Textarea_Control extends WP_Customize_Control {
		
		public $type = 'mttr_textarea';
		public function render_content() {

		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<textarea class="large-text" cols="20" rows="5" <?php $this->link(); ?>>
					<?php echo esc_textarea( $this->value() ); ?>
				</textarea>
			</label>
		<?php

		}

	}

}