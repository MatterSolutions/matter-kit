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
//    =Theme Core - Imports
//
//    corelude the core theme files
//
// ---------------------------------------------------------------------------- *


// Structure
require get_template_directory() . '/_core/structure/mttr-core-setup.php';
require get_template_directory() . '/_core/structure/mttr-core-page-hooks.php';
require get_template_directory() . '/_core/structure/mttr-core-page-structure.php';


// Component API
require get_template_directory() . '/_core/functions/mttr-component-layer.php';
require get_template_directory() . '/_core/structure/mttr-core-flexible.php';


// Customiser
require get_template_directory() . '/_core/customiser/mttr-customiser-setup.php';
require get_template_directory() . '/_core/customiser/mttr-brand.php';
require get_template_directory() . '/_core/customiser/mttr-social.php';


// Misc
require get_template_directory() . '/_core/functions/mttr-acf.php';
require get_template_directory() . '/_core/functions/mttr-images.php';
require get_template_directory() . '/_core/functions/mttr-social.php';
require get_template_directory() . '/_core/functions/mttr-misc.php';
require get_template_directory() . '/_core/functions/mttr-contact.php';
require get_template_directory() . '/_core/functions/mttr-brand.php';


// Styleguide
require get_template_directory() . '/_core/styleguide/inc/mttr-styleguide.php';
require get_template_directory() . '/_core/styleguide/styleguide.php';