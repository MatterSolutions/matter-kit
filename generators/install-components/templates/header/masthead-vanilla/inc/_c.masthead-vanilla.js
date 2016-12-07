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
//	=Component - Masthead Vanilla
//
// 	A very basic masthead
//
// ---------------------------------------------------------------------------- */

/*
*	Masthead nav
*/
$( '.js-sliding-nav' ).find( '.sub-menu' ).prepend( '<li class="menu-item  js-toggle--sub-menu-up  js-toggle--sub-menu"><a href="#">Back</a></li>' );
$( '.js-sliding-nav' ).find( '.sub-menu' ).hide();



/*
*	Menu subitems
*/				
$( '.js-toggle--sub-menu' ).on( 'click', function( event ) {

	$( '.js-sliding-nav  .sub-menu' ).hide();

	var thisEl = $( this ),

		mobileNav = $( this ).closest( '.js-sliding-nav' ),
		mobileNavWidth = mobileNav.outerWidth( ),
		mobileNavOffset = mobileNav.attr( 'data-mk-menu-offset' ),
		currentSubNav,
		nearestSubNav,
		newMobileNavOffset;
		

	if ( mobileNavOffset === undefined || mobileNavOffset === false ) {

		mobileNavOffset = 0;

	}

	// Going up a level
	if ( mobileNavOffset > 0  &&  thisEl.hasClass( 'js-toggle--sub-menu-up' ) ) {

		currentSubNav = thisEl.parent();
		nearestSubNav = thisEl.parent().parent().parent();
		
		$( currentSubNav ).parentsUntil( '.c-masthead__secondary', '.sub-menu' ).show();
		currentSubNav.show();
		nearestSubNav.show();

		newMobileNavOffset = parseInt( mobileNavOffset ) - parseInt( mobileNavWidth );

	// Going down a level
	} else {

		currentSubNav = thisEl.parent().parent();
		nearestSubNav = thisEl.parent().find( '.sub-menu' );

		$( currentSubNav ).parentsUntil( '.c-masthead__secondary', '.sub-menu' ).show();	
		currentSubNav.show();
		nearestSubNav.show();

		newMobileNavOffset = parseInt( mobileNavOffset ) + parseInt( mobileNavWidth );

	}

	// Set the primary menu height
	mobileNav.css( 'height', nearestSubNav.outerHeight( ) + 'px' );

	if ( nearestSubNav.hasClass( 'o-nav' ) ) {

		mobileNav.css( 'height', 'auto' );

	}
	
	// Set the offset and position
	mobileNav.attr( 'data-mk-menu-offset', newMobileNavOffset );
	mobileNav.css( 'transform', 'translateX( -' + newMobileNavOffset + 'px )' );

});


$( window ).resize( function() {

	var $slidingNavEl = $( '.js-sliding-nav' );

	// On resize, remove mobileNav css
	$slidingNavEl.css( 'transform', 'none' );
	$slidingNavEl.css( 'height', 'auto' );
	$slidingNavEl.attr( 'data-mk-menu-offset', 0 );

	if ( $( 'body').hasClass( 'c-masthead--is-open' ) ) {

		$( '.c-site-blocker' ).trigger( 'click' );

	}

} );



/*
*	Show the 'hovered' nav on touch
*/
if ( $( window ).width() >= 992 ) {

	$( '.js-show-hover-on-touch > a,.menu-item-has-children > a' ).on( 'touchstart', function (e) {

		e.preventDefault();

		var item = $( this ).parent(),
			link = $( this );

		if ( link.hasClass( 'js-hover' ) ) {

			link.attr( "href", link.data( "href" ) );
			location.href = link.attr( "href" );

		} else {

			link.addClass( 'js-hover' );
			$( '.js-show-hover-on-touch,.menu-item-has-children' ).not( this ).removeClass( 'js-hover' );
			link.data( "href", link.attr( "href" ) ).removeAttr( "href" ).css( "cursor", "pointer" );
		
		}

	});

}