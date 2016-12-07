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
//    =Styleguide Page - Styletiles - Footer
//
//    Add the website footer get_footer() to the styletile page
//
// ---------------------------------------------------------------------------- *


// Pull through the primary theme header
add_action( 'mttr_after_styleguide_loop_styleguide', 'mttr_outer_footer' );