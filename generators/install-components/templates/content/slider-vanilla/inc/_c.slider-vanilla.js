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
//	=Component - Slider Vanilla
//
// 	A very basic slider
//
// ---------------------------------------------------------------------------- */

/*
*	Sliders
*/
$( '.js-slider-vanilla' ).slick({
	
	dots: true,
	speed: 500,
	appendDots: '.c-slider-vanilla__dots',
	appendArrows: '.c-slider-vanilla__arrows',
	prevArrow: '<a class="c-slider-vanilla__arrow  c-slider-vanilla__arrow--prev"><span></span><i class="u-sr">Previous Slide</i></a>',
	nextArrow: '<a class="c-slider-vanilla__arrow  c-slider-vanilla__arrow--next"><span></span><i class="u-sr">Next Slide</i></a>'

});