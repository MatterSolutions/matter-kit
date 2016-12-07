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
//    =Functions
//
//    Import file for the main website functions. Ideally any additional functions
//    should be added in one of the sub files for consistency.
//
// ---------------------------------------------------------------------------- */


/* ---------------------------------------------------------
*	Load core files
 --------------------------------------------------------- */
require get_template_directory() . '/common/styleguide.php';
require get_template_directory() . '/_core/mttr-core.php';





/* ---------------------------------------------------------
*	Load project components
 --------------------------------------------------------- */

mttr_load_components( 'header' );
mttr_load_components( 'footer' );
mttr_load_components( 'hero' );
mttr_load_components( 'content' );
mttr_load_components( 'grid' );
mttr_load_components( 'misc' );
mttr_load_components( 'typography' );



/* ---------------------------------------------------------
*	Load structural outer layout
 --------------------------------------------------------- */

require get_template_directory() . '/common/header.php';
require get_template_directory() . '/common/content.php';
require get_template_directory() . '/common/aside.php';

