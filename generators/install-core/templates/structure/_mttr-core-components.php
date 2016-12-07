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
//    =Core - Components
//
//    Add the core component template files
//
// ---------------------------------------------------------------------------- *


// Load our core component declarations
require get_template_directory() . '/_core/components/brand/_c.brand.php';
require get_template_directory() . '/_core/components/icon/_c.icon.php';
require get_template_directory() . '/_core/components/menu/_c.menu.php';
require get_template_directory() . '/_core/components/404/_c.404.php';
require get_template_directory() . '/_core/components/no-content/_c.no-content.php';
require get_template_directory() . '/_core/components/meta-data/_c.meta-data.php';
require get_template_directory() . '/_core/components/gallery/_c.gallery.php';
require get_template_directory() . '/_core/components/searchform/_c.searchform.php';

// Flexible content base
require get_template_directory() . '/_core/components/flexible/_c.flexible-content.php';