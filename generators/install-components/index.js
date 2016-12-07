/**================================
 * Setting up the basics
 **===============================*/

// Requirements
var util = require('util'),
	path = require('path'),
	fs = require('fs'),
	yeoman = require('yeoman-generator'),
	chalk = require('chalk'),
	mkdirp = require('mkdirp'),
  yosay  = require('yosay');

// Export the module
module.exports = yeoman.Base.extend({

    prompting: function () {
      // Have Yeoman greet the user.
      this.log(yosay(
        'Set up some components!'
      ));

      var prompts = [

        // Basic project scaffolding
        {
          type: 'checkbox',
          name: 'componentsContent',
          message: 'Choose your content components',
            choices: [{

              name: 'StandardContent',
              value: 'includeContentStandardContent',
              checked: true

            },{

              name: 'FlexibleContent',
              value: 'includeContentFlexibleContent',
              checked: true

            },{

              name: 'Gallery',
              value: 'includeContentGallery',
              checked: true

            },{

              name: 'Grid',
              value: 'includeContentGrid',
              checked: true

            },{

              name: 'MediaList',
              value: 'includeContentMediaList',
              checked: true

            },{

              name: '404',
              value: 'includeContent404',
              checked: true

            },{

              name: 'No Content',
              value: 'includeContentNoContent',
              checked: true

            },{

              name: 'Map',
              value: 'includeContentMap',
              checked: true

            }]
        },
        {
          type: 'checkbox',
          name: 'componentsGrid',
          message: 'Choose your grid components',
            choices: [{

              name: 'Slat Text',
              value: 'includeGridSlatText',
              checked: true

            }]
        },
        {
          type: 'checkbox',
          name: 'componentsHeader',
          message: 'Choose your header components',
            choices: [{

              name: 'Masthead - Vanilla',
              value: 'includeHeaderMastheadVanilla',
              checked: true

            },
            {

              name: 'Menu Icon',
              value: 'includeHeaderMenuIcon',
              checked: true

            },
            {

              name: 'Brand',
              value: 'includeHeaderBrand',
              checked: true

            }]
        },
        {
          type: 'checkbox',
          name: 'componentsFooter',
          message: 'Choose your footer components',
            choices: [{

              name: 'Footer Vanilla',
              value: 'includeFooterFooterVanilla',
              checked: true

            }]
        },
        {
          type: 'checkbox',
          name: 'componentsHero',
          message: 'Choose your hero components',
            choices: [{

              name: 'Hero - Text',
              value: 'includeHeroText',
              checked: true

            }]
        },
        {
          type: 'checkbox',
          name: 'componentsMisc',
          message: 'Choose your misc components',
            choices: [{

              name: 'Standard Buttons (btn)',
              value: 'includeMiscBtn',
              checked: true

            },
            {

              name: 'Icon',
              value: 'includeMiscIcon',
              checked: true

            },
            {

              name: 'Menu',
              value: 'includeMiscMenu',
              checked: true

            },
            {

              name: 'Meta Data',
              value: 'includeMiscMetaData',
              checked: true

            },
            {

              name: 'Searchform - Mini',
              value: 'includeMiscSearchformMini',
              checked: true

            },
            {

              name: 'Siteblocker',
              value: 'includeMiscSiteblocker',
              checked: true

            },
            {

              name: 'Pagination - Square',
              value: 'includeMiscPaginationSquare',
              checked: true

            }]
        },
        {
          type: 'checkbox',
          name: 'componentsTypography',
          message: 'Choose your tyopgraphy components',
            choices: [{

              name: 'Title (title)',
              value: 'includeTypographyTitle',
              checked: true

            }]
        }

        // Components
      ];

      return this.prompt(prompts).then(function (props) {

      	this.props = props;

  	    var hasContentComponent = function ( component ) {

          return props.componentsContent.indexOf( component ) > -1;

        };

        var hasHeaderComponent = function ( component ) {

          return props.componentsHeader.indexOf( component ) > -1;

        };

        var hasFooterComponent = function ( component ) {

          return props.componentsFooter.indexOf( component ) > -1;

        };

        var hasMiscComponent = function ( component ) {

  	    	return props.componentsMisc.indexOf( component ) > -1;

  	    };

        var hasHeroComponent = function ( component ) {

          return props.componentsHero.indexOf( component ) > -1;

        };

        var hasGridComponent = function ( component ) {

          return props.componentsGrid.indexOf( component ) > -1;

        };

        var hasTypographyComponent = function ( component ) {

          return props.componentsTypography.indexOf( component ) > -1;

        };


        // Basic Project Scaffold
        this.includeMiscBtn = hasMiscComponent( 'includeMiscBtn' );
        this.includeMiscIcon = hasMiscComponent( 'includeMiscIcon' );
        this.includeMiscMenu = hasMiscComponent( 'includeMiscMenu' );
        this.includeMiscMetaData = hasMiscComponent( 'includeMiscMetaData' );
        this.includeMiscSearchformMini = hasMiscComponent( 'includeMiscSearchformMini' );
        this.includeMiscSiteblocker = hasMiscComponent( 'includeMiscSiteblocker' );
        this.includeMiscPaginationSquare = hasMiscComponent( 'includeMiscPaginationSquare' );


        // Header
        this.includeHeaderMastheadVanilla = hasHeaderComponent( 'includeHeaderMastheadVanilla' );
        this.includeHeaderBrand = hasHeaderComponent( 'includeHeaderBrand' );
        this.includeHeaderMenuIcon = hasHeaderComponent( 'includeHeaderMenuIcon' );


        // Footer
        this.includeFooterFooterVanilla = hasFooterComponent( 'includeFooterFooterVanilla' );


        // Hero
        this.includeHeroText = hasHeroComponent( 'includeHeroText' );


        // Content
        this.includeContentMap = hasContentComponent( 'includeContentMap' );
        this.includeContentStandardContent = hasContentComponent( 'includeContentStandardContent' );
        this.includeContentFlexibleContent = hasContentComponent( 'includeContentFlexibleContent' );
        this.includeContentGallery = hasContentComponent( 'includeContentGallery' );
        this.includeContentGrid = hasContentComponent( 'includeContentGrid' );
        this.includeContentMediaList = hasContentComponent( 'includeContentMediaList' );
        this.includeContent404 = hasContentComponent( 'includeContent404' );
        this.includeContentNoContent = hasContentComponent( 'includeContentNoContent' );


        // Typography
        this.includeTypographyTitle = hasTypographyComponent( 'includeTypographyTitle' );


      }.bind(this));

    },

    writing: function () {

      // // Basic project
      // var components = { 
      //     includeMiscBtn: this.props.includeMiscBtn,
      //     // includeMiscother: this.props.includeMiscother
      // };

      // ----------------------------------------------------
      //  Button component files
      // ----------------------------------------------------

      if ( this.includeMiscBtn == true ) {

	      // Main PHP file
	      this.fs.copy(
	        this.templatePath( 'misc/btn/_c.btn.php' ), 
	        this.destinationPath( 'components/misc/btn/_c.btn.php' )
	      );

	      // Main SCSS file
	      this.fs.copy(
	        this.templatePath( 'misc/btn/_c.btn.scss' ), 
	        this.destinationPath( 'components/misc/btn/_c.btn.scss' )
	      );

	      // Tools file
	      this.fs.copy(
	        this.templatePath( 'misc/btn/inc/_c.btn-tools.scss' ), 
	        this.destinationPath( 'components/misc/btn/inc/_c.btn-tools.scss' )
	      );

        // Vars file
        this.fs.copy(
          this.templatePath( 'misc/btn/inc/_c.btn-vars.scss' ), 
          this.destinationPath( 'components/misc/btn/inc/_c.btn-vars.scss' )
        );

        // Template file
        this.fs.copy(
          this.templatePath( 'misc/btn/inc/_c.btn-tpl.php' ), 
          this.destinationPath( 'components/misc/btn/inc/_c.btn-tpl.php' )
        );

	    }



      // ----------------------------------------------------
      //  Searchform mini files
      // ----------------------------------------------------

      if ( this.includeMiscSearchformMini == true ) {

        // Main PHP file
        this.fs.copy(
          this.templatePath( 'misc/searchform-mini/_c.searchform-mini.php' ), 
          this.destinationPath( 'components/misc/searchform-mini/_c.searchform-mini.php' )
        );

        // Main SCSS file
        this.fs.copy(
          this.templatePath( 'misc/searchform-mini/_c.searchform-mini.scss' ), 
          this.destinationPath( 'components/misc/searchform-mini/_c.searchform-mini.scss' )
        );

        // Vars file
        this.fs.copy(
          this.templatePath( 'misc/searchform-mini/inc/_c.searchform-mini-vars.scss' ), 
          this.destinationPath( 'components/misc/searchform-mini/inc/_c.searchform-mini-vars.scss' )
        );

        // Template file
        this.fs.copy(
          this.templatePath( 'misc/searchform-mini/inc/_c.searchform-mini-tpl.php' ), 
          this.destinationPath( 'components/misc/searchform-mini/inc/_c.searchform-mini-tpl.php' )
        );

      }




      // ----------------------------------------------------
      //  Siteblocker
      // ----------------------------------------------------

      if ( this.includeMiscSiteblocker == true ) {

        // Main PHP file
        this.fs.copy(
          this.templatePath( 'misc/site-blocker/_c.site-blocker.php' ), 
          this.destinationPath( 'components/misc/site-blocker/_c.site-blocker.php' )
        );

        // Main SCSS file
        this.fs.copy(
          this.templatePath( 'misc/site-blocker/_c.site-blocker.scss' ), 
          this.destinationPath( 'components/misc/site-blocker/_c.site-blocker.scss' )
        );

        // Vars file
        this.fs.copy(
          this.templatePath( 'misc/site-blocker/inc/_c.site-blocker-vars.scss' ), 
          this.destinationPath( 'components/misc/site-blocker/inc/_c.site-blocker-vars.scss' )
        );

        // Features file
        this.fs.copy(
          this.templatePath( 'misc/site-blocker/inc/_c.site-blocker-features.scss' ), 
          this.destinationPath( 'components/misc/site-blocker/inc/_c.site-blocker-features.scss' )
        );

        // Dependencies file
        this.fs.copy(
          this.templatePath( 'misc/site-blocker/inc/_c.site-blocker-dependencies.scss' ), 
          this.destinationPath( 'components/misc/site-blocker/inc/_c.site-blocker-dependencies.scss' )
        );

      }



      // ----------------------------------------------------
      //  Pagination square files
      // ----------------------------------------------------

      if ( this.includeMiscPaginationSquare == true ) {

        // Main PHP file
        this.fs.copy(
          this.templatePath( 'misc/pagination-square/_c.pagination-square.php' ), 
          this.destinationPath( 'components/misc/pagination-square/_c.pagination-square.php' )
        );

        // Main SCSS file
        this.fs.copy(
          this.templatePath( 'misc/pagination-square/_c.pagination-square.scss' ), 
          this.destinationPath( 'components/misc/pagination-square/_c.pagination-square.scss' )
        );

        // Vars file
        this.fs.copy(
          this.templatePath( 'misc/pagination-square/inc/_c.pagination-square-vars.scss' ), 
          this.destinationPath( 'components/misc/pagination-square/inc/_c.pagination-square-vars.scss' )
        );

        // Template file
        this.fs.copy(
          this.templatePath( 'misc/pagination-square/inc/_c.pagination-square-tpl.php' ), 
          this.destinationPath( 'components/misc/pagination-square/inc/_c.pagination-square-tpl.php' )
        );

      }


      // ----------------------------------------------------
      //  Brand
      // ----------------------------------------------------

      if ( this.includeHeaderBrand == true ) {

        // Main PHP file
        this.fs.copy(
          this.templatePath( 'header/brand/_c.brand.php' ), 
          this.destinationPath( 'components/header/brand/_c.brand.php' )
        );

        // Template file
        this.fs.copy(
          this.templatePath( 'header/brand/_c.brand-tpl.php' ), 
          this.destinationPath( 'components/header/brand/_c.brand-tpl.php' )
        );

      }


      // ----------------------------------------------------
      //  Menu Icon
      // ----------------------------------------------------

      if ( this.includeHeaderMenuIcon == true ) {

        // Main PHP file
        this.fs.copy(
          this.templatePath( 'header/menu-icon/_c.menu-icon.php' ), 
          this.destinationPath( 'components/header/menu-icon/_c.menu-icon.php' )
        );

        // Dependencies file
        this.fs.copy(
          this.templatePath( 'header/menu-icon/inc/_c.menu-icon-dependencies.scss' ), 
          this.destinationPath( 'components/header/menu-icon/inc/_c.menu-icon-dependencies.scss' )
        );

        // Features file
        this.fs.copy(
          this.templatePath( 'header/menu-icon/inc/_c.menu-icon-features.scss' ), 
          this.destinationPath( 'components/header/menu-icon/inc/_c.menu-icon-features.scss' )
        );

        // Vars file
        this.fs.copy(
          this.templatePath( 'header/menu-icon/inc/_c.menu-icon-vars.scss' ), 
          this.destinationPath( 'components/header/menu-icon/inc/_c.menu-icon-vars.scss' )
        );

        // SCSS file
        this.fs.copy(
          this.templatePath( 'header/menu-icon/_c.menu-icon.scss' ), 
          this.destinationPath( 'components/header/menu-icon/_c.menu-icon.scss' )
        );

        // Template file
        this.fs.copy(
          this.templatePath( 'header/menu-icon/inc/_c.menu-icon-tpl.php' ), 
          this.destinationPath( 'components/header/menu-icon/inc/_c.menu-icon-tpl.php' )
        );

      }



      // ----------------------------------------------------
      //  Masthead Vanilla
      // ----------------------------------------------------

      if ( this.includeHeaderMastheadVanilla == true ) {

        // Main PHP file
        this.fs.copy(
          this.templatePath( 'header/masthead-vanilla/_c.masthead-vanilla.php' ), 
          this.destinationPath( 'components/header/masthead-vanilla/_c.masthead-vanilla.php' )
        );

        // JS file
        this.fs.copy(
          this.templatePath( 'header/masthead-vanilla/inc/_c.masthead-vanilla.js' ), 
          this.destinationPath( 'components/header/masthead-vanilla/inc/_c.masthead-vanilla.js' )
        );

        // Dependencies file
        this.fs.copy(
          this.templatePath( 'header/masthead-vanilla/inc/_c.masthead-vanilla-dependencies.scss' ), 
          this.destinationPath( 'components/header/masthead-vanilla/inc/_c.masthead-vanilla-dependencies.scss' )
        );

        // Features file
        this.fs.copy(
          this.templatePath( 'header/masthead-vanilla/inc/_c.masthead-vanilla-features.scss' ), 
          this.destinationPath( 'components/header/masthead-vanilla/inc/_c.masthead-vanilla-features.scss' )
        );

        // Vars file
        this.fs.copy(
          this.templatePath( 'header/masthead-vanilla/inc/_c.masthead-vanilla-vars.scss' ), 
          this.destinationPath( 'components/header/masthead-vanilla/inc/_c.masthead-vanilla-vars.scss' )
        );

        // SCSS file
        this.fs.copy(
          this.templatePath( 'header/masthead-vanilla/_c.masthead-vanilla.scss' ), 
          this.destinationPath( 'components/header/masthead-vanilla/_c.masthead-vanilla.scss' )
        );

        // Template file
        this.fs.copy(
          this.templatePath( 'header/masthead-vanilla/inc/_c.masthead-vanilla-tpl.php' ), 
          this.destinationPath( 'components/header/masthead-vanilla/inc/_c.masthead-vanilla-tpl.php' )
        );

      }



      // ----------------------------------------------------
      //  Footer Vanilla
      // ----------------------------------------------------

      if ( this.includeFooterFooterVanilla == true ) {

        // Main PHP file
        this.fs.copy(
          this.templatePath( 'footer/footer-vanilla/_c.footer-vanilla.php' ), 
          this.destinationPath( 'components/footer/footer-vanilla/_c.footer-vanilla.php' )
        );

        // Dependencies file
        this.fs.copy(
          this.templatePath( 'footer/footer-vanilla/inc/_c.footer-vanilla-dependencies.scss' ), 
          this.destinationPath( 'components/footer/footer-vanilla/inc/_c.footer-vanilla-dependencies.scss' )
        );

        // Features file
        this.fs.copy(
          this.templatePath( 'footer/footer-vanilla/inc/_c.footer-vanilla-features.scss' ), 
          this.destinationPath( 'components/footer/footer-vanilla/inc/_c.footer-vanilla-features.scss' )
        );

        // Vars file
        this.fs.copy(
          this.templatePath( 'footer/footer-vanilla/inc/_c.footer-vanilla-vars.scss' ), 
          this.destinationPath( 'components/footer/footer-vanilla/inc/_c.footer-vanilla-vars.scss' )
        );

        // SCSS file
        this.fs.copy(
          this.templatePath( 'footer/footer-vanilla/_c.footer-vanilla.scss' ), 
          this.destinationPath( 'components/footer/footer-vanilla/_c.footer-vanilla.scss' )
        );

        // Template file
        this.fs.copy(
          this.templatePath( 'footer/footer-vanilla/inc/_c.footer-vanilla-tpl.php' ), 
          this.destinationPath( 'components/footer/footer-vanilla/inc/_c.footer-vanilla-tpl.php' )
        );

      }




      // ----------------------------------------------------
      //  Map component files
      // ----------------------------------------------------
      if ( this.includeMiscMap == true ) {

        // Flexible Map
        this.fs.copy(
          this.templatePath( 'content/map/_c.map.php' ), 
          this.destinationPath( 'components/content/map/_c.map.php' )
        );

        // Flexible Map Template
        this.fs.copy(
          this.templatePath( 'content/map/_c.map-tpl.php' ), 
          this.destinationPath( 'components/content/map/_c.map-tpl.php' )
        );

      }


      // ----------------------------------------------------
      //  Flexible component files
      // ----------------------------------------------------
      if ( this.includeContentFlexibleContent == true ) {

        // Flexible Content
        this.fs.copy(
          this.templatePath( 'content/flexible-content/_c.flexible-content.php' ), 
          this.destinationPath( 'components/content/flexible-content/_c.flexible-content.php' )
        );

        // Flexible Content Template
        this.fs.copy(
          this.templatePath( 'content/flexible-content/_c.flexible-content-tpl.php' ), 
          this.destinationPath( 'components/content/flexible-content/_c.flexible-content-tpl.php' )
        );

        // Flexible Content Scss
        this.fs.copy(
          this.templatePath( 'content/flexible-content/_c.flexible-content.scss' ), 
          this.destinationPath( 'components/content/flexible-content/_c.flexible-content.scss' )
        );

      }



      // ----------------------------------------------------
      //  404 component files
      // ----------------------------------------------------
      if ( this.includeContent404 == true ) {

        // Flexible Content
        this.fs.copy(
          this.templatePath( 'content/content-404/_c.content-404.php' ), 
          this.destinationPath( 'components/content/content-404/_c.content-404.php' )
        );

        // Flexible Content Template
        this.fs.copy(
          this.templatePath( 'content/content-404/inc/_c.content-404-tpl.php' ), 
          this.destinationPath( 'components/content/content-404/inc/_c.content-404-tpl.php' )
        );

      }



      // ----------------------------------------------------
      //  Gallery component files
      // ----------------------------------------------------
      if ( this.includeContentGallery == true ) {

        // Flexible Content
        this.fs.copy(
          this.templatePath( 'content/gallery/_c.gallery.php' ), 
          this.destinationPath( 'components/content/gallery/_c.gallery.php' )
        );

        // Flexible Content Template
        this.fs.copy(
          this.templatePath( 'content/gallery/_c.gallery-tpl.php' ), 
          this.destinationPath( 'components/content/gallery/_c.gallery-tpl.php' )
        );

      }



      // ----------------------------------------------------
      //  Grid component files
      // ----------------------------------------------------
      if ( this.includeContentGrid == true ) {

        // Flexible Content
        this.fs.copy(
          this.templatePath( 'content/grid/_c.grid.php' ), 
          this.destinationPath( 'components/content/grid/_c.grid.php' )
        );

        // Flexible Content Template
        this.fs.copy(
          this.templatePath( 'content/grid/_c.grid-tpl.php' ), 
          this.destinationPath( 'components/content/grid/_c.grid-tpl.php' )
        );

      }



      // ----------------------------------------------------
      //  Media List component files
      // ----------------------------------------------------
      if ( this.includeContentMediaList == true ) {

        // Flexible Content
        this.fs.copy(
          this.templatePath( 'content/media-list/_c.media-list.php' ), 
          this.destinationPath( 'components/content/media-list/_c.media-list.php' )
        );

        // Flexible Content Template
        this.fs.copy(
          this.templatePath( 'content/media-list/_c.media-list-tpl.php' ), 
          this.destinationPath( 'components/content/media-list/_c.media-list-tpl.php' )
        );

      }



      // ----------------------------------------------------
      //  No Content component files
      // ----------------------------------------------------
      if ( this.includeContentNoContent == true ) {

        // Flexible Content
        this.fs.copy(
          this.templatePath( 'content/content-none/_c.content-none.php' ), 
          this.destinationPath( 'components/content/content-none/_c.content-none.php' )
        );

        // Flexible Content Template
        this.fs.copy(
          this.templatePath( 'content/content-none/inc/_c.content-none-tpl.php' ), 
          this.destinationPath( 'components/content/content-none/inc/_c.content-none-tpl.php' )
        );

      }


      // ----------------------------------------------------
      //  Standard Content component files
      // ----------------------------------------------------
      if ( this.includeContentStandardContent == true ) {

        // Flexible Content
        this.fs.copy(
          this.templatePath( 'content/standard-content/_c.standard-content.php' ), 
          this.destinationPath( 'components/content/standard-content/_c.standard-content.php' )
        );

        // Flexible Content Template
        this.fs.copy(
          this.templatePath( 'content/standard-content/_c.standard-content-tpl.php' ), 
          this.destinationPath( 'components/content/standard-content/_c.standard-content-tpl.php' )
        );


        // Images
        this.fs.copy(
          this.templatePath( 'content/standard-content/img/_content-content-sidebar.png' ), 
          this.destinationPath( 'components/content/standard-content/img/content-content-sidebar.png' )
        );

        this.fs.copy(
          this.templatePath( 'content/standard-content/img/_content-one-col.png' ), 
          this.destinationPath( 'components/content/standard-content/img/content-one-col.png' )
        );

        this.fs.copy(
          this.templatePath( 'content/standard-content/img/_content-sidebar-content.png' ), 
          this.destinationPath( 'components/content/standard-content/img/content-sidebar-content.png' )
        );

        this.fs.copy(
          this.templatePath( 'content/standard-content/img/_content-three-cols.png' ), 
          this.destinationPath( 'components/content/standard-content/img/content-three-cols.png' )
        );

        this.fs.copy(
          this.templatePath( 'content/standard-content/img/_content-two-cols.png' ), 
          this.destinationPath( 'components/content/standard-content/img/content-two-cols.png' )
        );

      }





      // ----------------------------------------------------
      //  Slat Text component files
      // ----------------------------------------------------
      if ( this.includeContentGrid == true ) {

        // Flexible Content
        this.fs.copy(
          this.templatePath( 'grid/slat-text/_c.slat-text.php' ), 
          this.destinationPath( 'components/grid/slat-text/_c.slat-text.php' )
        );

        // Flexible Content Template
        this.fs.copy(
          this.templatePath( 'grid/slat-text/_c.slat-text-tpl.php' ), 
          this.destinationPath( 'components/grid/slat-text/_c.slat-text-tpl.php' )
        );

      }






      // ----------------------------------------------------
      //  Typography component files
      // ----------------------------------------------------
      if ( this.includeTypographyTitle == true ) {

        // Typography Title
        this.fs.copy(
          this.templatePath( 'typography/title/_c.title.php' ), 
          this.destinationPath( 'components/typography/title/_c.title.php' )
        );


        // Typography Title
        this.fs.copy(
          this.templatePath( 'typography/title/_c.title.scss' ), 
          this.destinationPath( 'components/typography/title/_c.title.scss' )
        );


        // Typography Title
        this.fs.copy(
          this.templatePath( 'typography/title/inc/_c.title-tpl.php' ), 
          this.destinationPath( 'components/typography/title/inc/_c.title-tpl.php' )
        );


        // Typography Title
        this.fs.copy(
          this.templatePath( 'typography/title/inc/_c.title-vars.scss' ), 
          this.destinationPath( 'components/typography/title/inc/_c.title-vars.scss' )
        );

      }



      // ----------------------------------------------------
      //  Hero text component files
      // ----------------------------------------------------
      if ( this.includeHeroText == true ) {

        // Flexible Content
        this.fs.copy(
          this.templatePath( 'hero/hero-text/_c.hero-text.php' ), 
          this.destinationPath( 'components/hero/hero-text/_c.hero-text.php' )
        );

        // Flexible Content Template
        this.fs.copy(
          this.templatePath( 'hero/hero-text/inc/_c.hero-text-tpl.php' ), 
          this.destinationPath( 'components/hero/hero-text/inc/_c.hero-text-tpl.php' )
        );

      }




      // ----------------------------------------------------
      //  Menu
      // ----------------------------------------------------

      if ( this.includeMiscMenu == true ) {

        // Main PHP file
        this.fs.copy(
          this.templatePath( 'misc/menu/_c.menu.php' ), 
          this.destinationPath( 'components/misc/menu/_c.menu.php' )
        );

        // Template file
        this.fs.copy(
          this.templatePath( 'misc/menu/_c.menu-tpl.php' ), 
          this.destinationPath( 'components/misc/menu/_c.menu-tpl.php' )
        );

      }

    }

});



// Core Theme Setup
// Generator.prototype.themeInitialSetup = function() {
		
// 		this.fs.copyTpl(
//       this.templatePath( '_style.css' ), 
//       this.destinationPath( 'style.css' ), 
//       { projectName: 'Project' }
//     );

// };