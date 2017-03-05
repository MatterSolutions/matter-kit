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
              checked: false

            },
            {

              name: 'Card',
              value: 'includeGridCard',
              checked: true

            },
            {

              name: 'Blog Card',
              value: 'includeGridBlogCard',
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

            },
            {

              name: 'Colophon Vanilla',
              value: 'includeFooterColophonVanilla',
              checked: true

            },
            {

              name: 'Attribution Vanilla',
              value: 'includeFooterAttributionVanilla',
              checked: true

            },
            {

              name: 'Social Share Menu',
              value: 'includeFooterSocialShareMenu',
              checked: false

            },]
        },
        {
          type: 'checkbox',
          name: 'componentsHero',
          message: 'Choose your hero components',
            choices: [{

              name: 'Hero - Text',
              value: 'includeHeroText',
              checked: true

            },
            {

              name: 'Hero - Vanilla',
              value: 'includeHeroVanilla',
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

              name: 'Title',
              value: 'includeTypographyTitle',
              checked: true

            },
            {

              name: 'Heading',
              value: 'includeTypographyHeading',
              checked: true

            },
            {

              name: 'Subheading',
              value: 'includeTypographySubheading',
              checked: true

            },
            {

              name: 'Lede',
              value: 'includeTypographyLede',
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


        // Grid Components
        this.includeGridCard = hasGridComponent( 'includeGridCard' );
        this.includeGridBlogCard = hasGridComponent( 'includeGridBlogCard' );


        // Footer
        this.includeFooterFooterVanilla = hasFooterComponent( 'includeFooterFooterVanilla' );
        this.includeFooterColophonVanilla = hasFooterComponent( 'includeFooterColophonVanilla' );
        this.includeFooterAttributionVanilla = hasFooterComponent( 'includeFooterAttributionVanilla' );
        this.includeFooterSocialShareMenu = hasFooterComponent( 'includeFooterSocialShareMenu' );


        // Hero
        this.includeHeroText = hasHeroComponent( 'includeHeroText' );
        this.includeHeroVanilla = hasHeroComponent( 'includeHeroVanilla' );


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
        this.includeTypographyHeading = hasTypographyComponent( 'includeTypographyHeading' );
        this.includeTypographySubheading = hasTypographyComponent( 'includeTypographySubheading' );
        this.includeTypographyLede = hasTypographyComponent( 'includeTypographyLede' );


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
      //  Meta files
      // ----------------------------------------------------

      if ( this.includeMiscMetaData == true ) {

        // Main PHP file
        this.fs.copy(
          this.templatePath( 'misc/meta/_c.meta.php' ), 
          this.destinationPath( 'components/misc/meta/_c.meta.php' )
        );

        // Main SCSS file
        this.fs.copy(
          this.templatePath( 'misc/meta/_c.meta.scss' ), 
          this.destinationPath( 'components/misc/meta/_c.meta.scss' )
        );

        // Vars file
        this.fs.copy(
          this.templatePath( 'misc/meta/inc/_c.meta-vars.scss' ), 
          this.destinationPath( 'components/misc/meta/inc/_c.meta-vars.scss' )
        );

        // Features file
        this.fs.copy(
          this.templatePath( 'misc/meta/inc/_c.meta-features.scss' ), 
          this.destinationPath( 'components/misc/meta/inc/_c.meta-features.scss' )
        );

        // Dependencies file
        this.fs.copy(
          this.templatePath( 'misc/meta/inc/_c.meta-dependencies.scss' ), 
          this.destinationPath( 'components/misc/meta/inc/_c.meta-dependencies.scss' )
        );

        // Template file
        this.fs.copy(
          this.templatePath( 'misc/meta/inc/_c.meta-tpl.php' ), 
          this.destinationPath( 'components/misc/meta/inc/_c.meta-tpl.php' )
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
      //  Colophon Vanilla
      // ----------------------------------------------------

      if ( this.includeFooterColophonVanilla == true ) {

        // Main PHP file
        this.fs.copy(
          this.templatePath( 'footer/colophon-vanilla/_c.colophon-vanilla.php' ), 
          this.destinationPath( 'components/footer/colophon-vanilla/_c.colophon-vanilla.php' )
        );

        // Dependencies file
        this.fs.copy(
          this.templatePath( 'footer/colophon-vanilla/inc/_c.colophon-vanilla-dependencies.scss' ), 
          this.destinationPath( 'components/footer/colophon-vanilla/inc/_c.colophon-vanilla-dependencies.scss' )
        );

        // Features file
        this.fs.copy(
          this.templatePath( 'footer/colophon-vanilla/inc/_c.colophon-vanilla-features.scss' ), 
          this.destinationPath( 'components/footer/colophon-vanilla/inc/_c.colophon-vanilla-features.scss' )
        );

        // Vars file
        this.fs.copy(
          this.templatePath( 'footer/colophon-vanilla/inc/_c.colophon-vanilla-vars.scss' ), 
          this.destinationPath( 'components/footer/colophon-vanilla/inc/_c.colophon-vanilla-vars.scss' )
        );

        // SCSS file
        this.fs.copy(
          this.templatePath( 'footer/colophon-vanilla/_c.colophon-vanilla.scss' ), 
          this.destinationPath( 'components/footer/colophon-vanilla/_c.colophon-vanilla.scss' )
        );

        // Template file
        this.fs.copy(
          this.templatePath( 'footer/colophon-vanilla/inc/_c.colophon-vanilla-tpl.php' ), 
          this.destinationPath( 'components/footer/colophon-vanilla/inc/_c.colophon-vanilla-tpl.php' )
        );

      }



      // ----------------------------------------------------
      //  Attribution Vanilla
      // ----------------------------------------------------

      if ( this.includeFooterAttributionVanilla == true ) {

        // Main PHP file
        this.fs.copy(
          this.templatePath( 'footer/attribution-vanilla/_c.attribution-vanilla.php' ), 
          this.destinationPath( 'components/footer/attribution-vanilla/_c.attribution-vanilla.php' )
        );

        // Dependencies file
        this.fs.copy(
          this.templatePath( 'footer/attribution-vanilla/inc/_c.attribution-vanilla-dependencies.scss' ), 
          this.destinationPath( 'components/footer/attribution-vanilla/inc/_c.attribution-vanilla-dependencies.scss' )
        );

        // Features file
        this.fs.copy(
          this.templatePath( 'footer/attribution-vanilla/inc/_c.attribution-vanilla-features.scss' ), 
          this.destinationPath( 'components/footer/attribution-vanilla/inc/_c.attribution-vanilla-features.scss' )
        );

        // Vars file
        this.fs.copy(
          this.templatePath( 'footer/attribution-vanilla/inc/_c.attribution-vanilla-vars.scss' ), 
          this.destinationPath( 'components/footer/attribution-vanilla/inc/_c.attribution-vanilla-vars.scss' )
        );

        // SCSS file
        this.fs.copy(
          this.templatePath( 'footer/attribution-vanilla/_c.attribution-vanilla.scss' ), 
          this.destinationPath( 'components/footer/attribution-vanilla/_c.attribution-vanilla.scss' )
        );

        // Template file
        this.fs.copy(
          this.templatePath( 'footer/attribution-vanilla/inc/_c.attribution-vanilla-tpl.php' ), 
          this.destinationPath( 'components/footer/attribution-vanilla/inc/_c.attribution-vanilla-tpl.php' )
        );

      }




      // ----------------------------------------------------
      //  Attribution Vanilla
      // ----------------------------------------------------

      if ( this.includeFooterSocialShareMenu == true ) {

        // Main PHP file
        this.fs.copy(
          this.templatePath( 'footer/social-menu/_c.social-menu.php' ), 
          this.destinationPath( 'components/footer/social-menu/_c.social-menu.php' )
        );

        // Dependencies file
        this.fs.copy(
          this.templatePath( 'footer/social-menu/inc/_c.social-menu-dependencies.scss' ), 
          this.destinationPath( 'components/footer/social-menu/inc/_c.social-menu-dependencies.scss' )
        );

        // Features file
        this.fs.copy(
          this.templatePath( 'footer/social-menu/inc/_c.social-menu-features.scss' ), 
          this.destinationPath( 'components/footer/social-menu/inc/_c.social-menu-features.scss' )
        );

        // Vars file
        this.fs.copy(
          this.templatePath( 'footer/social-menu/inc/_c.social-menu-vars.scss' ), 
          this.destinationPath( 'components/footer/social-menu/inc/_c.social-menu-vars.scss' )
        );

        // SCSS file
        this.fs.copy(
          this.templatePath( 'footer/social-menu/_c.social-menu.scss' ), 
          this.destinationPath( 'components/footer/social-menu/_c.social-menu.scss' )
        );

        // Template file
        this.fs.copy(
          this.templatePath( 'footer/social-menu/inc/_c.social-menu-tpl.php' ), 
          this.destinationPath( 'components/footer/social-menu/inc/_c.social-menu-tpl.php' )
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

        // Flexible Content
        this.fs.copy(
          this.templatePath( 'content/content-404/_c.content-404.scss' ), 
          this.destinationPath( 'components/content/content-404/_c.content-404.scss' )
        );

        // Flexible Content Template
        this.fs.copy(
          this.templatePath( 'content/content-404/inc/_c.content-404-vars.scss' ), 
          this.destinationPath( 'components/content/content-404/inc/_c.content-404-vars.scss' )
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
      //  Blog Card component files
      // ----------------------------------------------------
      if ( this.includeGridBlogCard == true ) {

        // Blog Card
        this.fs.copy(
          this.templatePath( 'grid/blog-card/_c.blog-card.php' ), 
          this.destinationPath( 'components/grid/blog-card/_c.blog-card.php' )
        );

        // Blog Card
        this.fs.copy(
          this.templatePath( 'grid/blog-card/_c.blog-card.scss' ), 
          this.destinationPath( 'components/grid/blog-card/_c.blog-card.scss' )
        );

        // Blog Card Template
        this.fs.copy(
          this.templatePath( 'grid/blog-card/inc/_c.blog-card-tpl.php' ), 
          this.destinationPath( 'components/grid/blog-card/inc/_c.blog-card-tpl.php' )
        );

        // Blog Card Dependencies (SCSS)
        this.fs.copy(
          this.templatePath( 'grid/blog-card/inc/_c.blog-card-dependencies.scss' ), 
          this.destinationPath( 'components/grid/blog-card/inc/_c.blog-card-dependencies.scss' )
        );

        // Blog Card Features (SCSS)
        this.fs.copy(
          this.templatePath( 'grid/blog-card/inc/_c.blog-card-features.scss' ), 
          this.destinationPath( 'components/grid/blog-card/inc/_c.blog-card-features.scss' )
        );

        // Blog Card Vars (SCSS)
        this.fs.copy(
          this.templatePath( 'grid/blog-card/inc/_c.blog-card-vars.scss' ), 
          this.destinationPath( 'components/grid/blog-card/inc/_c.blog-card-vars.scss' )
        );

      }




      // ----------------------------------------------------
      //  Card component files
      // ----------------------------------------------------
      if ( this.includeGridCard == true ) {

        // Card
        this.fs.copy(
          this.templatePath( 'grid/card/_c.card.php' ), 
          this.destinationPath( 'components/grid/card/_c.card.php' )
        );

        // Card
        this.fs.copy(
          this.templatePath( 'grid/card/_c.card.scss' ), 
          this.destinationPath( 'components/grid/card/_c.card.scss' )
        );

        // Card Template
        this.fs.copy(
          this.templatePath( 'grid/card/inc/_c.card-tpl.php' ), 
          this.destinationPath( 'components/grid/card/inc/_c.card-tpl.php' )
        );

        // Card Dependencies (SCSS)
        this.fs.copy(
          this.templatePath( 'grid/card/inc/_c.card-dependencies.scss' ), 
          this.destinationPath( 'components/grid/card/inc/_c.card-dependencies.scss' )
        );

        // Card Features (SCSS)
        this.fs.copy(
          this.templatePath( 'grid/card/inc/_c.card-features.scss' ), 
          this.destinationPath( 'components/grid/card/inc/_c.card-features.scss' )
        );

        // Card Vars (SCSS)
        this.fs.copy(
          this.templatePath( 'grid/card/inc/_c.card-vars.scss' ), 
          this.destinationPath( 'components/grid/card/inc/_c.card-vars.scss' )
        );

      }






      // ----------------------------------------------------
      //  Typography component files
      // ----------------------------------------------------
      if ( this.includeTypographyTitle == true ) {

        // Typography Title
        this.fs.copy(
          this.templatePath( '_typography/title/_c.title.php' ), 
          this.destinationPath( 'components/_typography/title/_c.title.php' )
        );


        // Typography Title
        this.fs.copy(
          this.templatePath( '_typography/title/_c.title.scss' ), 
          this.destinationPath( 'components/_typography/title/_c.title.scss' )
        );


        // Typography Title
        this.fs.copy(
          this.templatePath( '_typography/title/inc/_c.title-tpl.php' ), 
          this.destinationPath( 'components/_typography/title/inc/_c.title-tpl.php' )
        );


        // Typography Title
        this.fs.copy(
          this.templatePath( '_typography/title/inc/_c.title-vars.scss' ), 
          this.destinationPath( 'components/_typography/title/inc/_c.title-vars.scss' )
        );


        // Typography Title
        this.fs.copy(
          this.templatePath( '_typography/title/inc/_c.title-dependencies.scss' ), 
          this.destinationPath( 'components/_typography/title/inc/_c.title-dependencies.scss' )
        );


        // Typography Title
        this.fs.copy(
          this.templatePath( '_typography/title/inc/_c.title-features.scss' ), 
          this.destinationPath( 'components/_typography/title/inc/_c.title-features.scss' )
        );

      }


      // ----------------------------------------------------
      //  Typography component files
      // ----------------------------------------------------
      if ( this.includeTypographyHeading == true ) {

        // Typography Heading
        this.fs.copy(
          this.templatePath( '_typography/heading/_c.heading.php' ), 
          this.destinationPath( 'components/_typography/heading/_c.heading.php' )
        );


        // Typography Heading
        this.fs.copy(
          this.templatePath( '_typography/heading/_c.heading.scss' ), 
          this.destinationPath( 'components/_typography/heading/_c.heading.scss' )
        );


        // Typography Heading
        this.fs.copy(
          this.templatePath( '_typography/heading/inc/_c.heading-tpl.php' ), 
          this.destinationPath( 'components/_typography/heading/inc/_c.heading-tpl.php' )
        );


        // Typography Heading
        this.fs.copy(
          this.templatePath( '_typography/heading/inc/_c.heading-vars.scss' ), 
          this.destinationPath( 'components/_typography/heading/inc/_c.heading-vars.scss' )
        );


        // Typography Title
        this.fs.copy(
          this.templatePath( '_typography/heading/inc/_c.heading-dependencies.scss' ), 
          this.destinationPath( 'components/_typography/heading/inc/_c.heading-dependencies.scss' )
        );


        // Typography Title
        this.fs.copy(
          this.templatePath( '_typography/heading/inc/_c.heading-features.scss' ), 
          this.destinationPath( 'components/_typography/heading/inc/_c.heading-features.scss' )
        );

      }


      // ----------------------------------------------------
      //  Typography component files
      // ----------------------------------------------------
      if ( this.includeTypographySubheading == true ) {

        // Typography Heading
        this.fs.copy(
          this.templatePath( '_typography/subheading/_c.subheading.php' ), 
          this.destinationPath( 'components/_typography/subheading/_c.subheading.php' )
        );


        // Typography Heading
        this.fs.copy(
          this.templatePath( '_typography/subheading/_c.subheading.scss' ), 
          this.destinationPath( 'components/_typography/subheading/_c.subheading.scss' )
        );


        // Typography Heading
        this.fs.copy(
          this.templatePath( '_typography/subheading/inc/_c.subheading-tpl.php' ), 
          this.destinationPath( 'components/_typography/subheading/inc/_c.subheading-tpl.php' )
        );


        // Typography Heading
        this.fs.copy(
          this.templatePath( '_typography/subheading/inc/_c.subheading-vars.scss' ), 
          this.destinationPath( 'components/_typography/subheading/inc/_c.subheading-vars.scss' )
        );


        // Typography Title
        this.fs.copy(
          this.templatePath( '_typography/subheading/inc/_c.subheading-dependencies.scss' ), 
          this.destinationPath( 'components/_typography/subheading/inc/_c.subheading-dependencies.scss' )
        );


        // Typography Title
        this.fs.copy(
          this.templatePath( '_typography/subheading/inc/_c.subheading-features.scss' ), 
          this.destinationPath( 'components/_typography/subheading/inc/_c.subheading-features.scss' )
        );

      }


      // ----------------------------------------------------
      //  Typography component files
      // ----------------------------------------------------
      if ( this.includeTypographyLede == true ) {

        // Typography Heading
        this.fs.copy(
          this.templatePath( '_typography/lede/_c.lede.php' ), 
          this.destinationPath( 'components/_typography/lede/_c.lede.php' )
        );


        // Typography Heading
        this.fs.copy(
          this.templatePath( '_typography/lede/_c.lede.scss' ), 
          this.destinationPath( 'components/_typography/lede/_c.lede.scss' )
        );


        // Typography Heading
        this.fs.copy(
          this.templatePath( '_typography/lede/inc/_c.lede-tpl.php' ), 
          this.destinationPath( 'components/_typography/lede/inc/_c.lede-tpl.php' )
        );


        // Typography Heading
        this.fs.copy(
          this.templatePath( '_typography/lede/inc/_c.lede-vars.scss' ), 
          this.destinationPath( 'components/_typography/lede/inc/_c.lede-vars.scss' )
        );


        // Typography Title
        this.fs.copy(
          this.templatePath( '_typography/lede/inc/_c.lede-dependencies.scss' ), 
          this.destinationPath( 'components/_typography/lede/inc/_c.lede-dependencies.scss' )
        );


        // Typography Title
        this.fs.copy(
          this.templatePath( '_typography/lede/inc/_c.lede-features.scss' ), 
          this.destinationPath( 'components/_typography/lede/inc/_c.lede-features.scss' )
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

        // Flexible Content
        this.fs.copy(
          this.templatePath( 'hero/hero-text/_c.hero-text.scss' ), 
          this.destinationPath( 'components/hero/hero-text/_c.hero-text.scss' )
        );

        // Flexible Content Template
        this.fs.copy(
          this.templatePath( 'hero/hero-text/inc/_c.hero-text-tpl.php' ), 
          this.destinationPath( 'components/hero/hero-text/inc/_c.hero-text-tpl.php' )
        );

        // Flexible Content Template
        this.fs.copy(
          this.templatePath( 'hero/hero-text/inc/_c.hero-text-vars.scss' ), 
          this.destinationPath( 'components/hero/hero-text/inc/_c.hero-text-vars.scss' )
        );

      }



      // ----------------------------------------------------
      //  Hero vanilla component files
      // ----------------------------------------------------
      if ( this.includeHeroVanilla == true ) {

        // Flexible Content
        this.fs.copy(
          this.templatePath( 'hero/hero-vanilla/_c.hero-vanilla.php' ), 
          this.destinationPath( 'components/hero/hero-vanilla/_c.hero-vanilla.php' )
        );

        // Flexible Content
        this.fs.copy(
          this.templatePath( 'hero/hero-vanilla/_c.hero-vanilla.scss' ), 
          this.destinationPath( 'components/hero/hero-vanilla/_c.hero-vanilla.scss' )
        );

        // Flexible Content Template
        this.fs.copy(
          this.templatePath( 'hero/hero-vanilla/inc/_c.hero-vanilla-tpl.php' ), 
          this.destinationPath( 'components/hero/hero-vanilla/inc/_c.hero-vanilla-tpl.php' )
        );

        // Dependencies
        this.fs.copy(
          this.templatePath( 'hero/hero-vanilla/inc/_c.hero-vanilla-dependencies.scss' ), 
          this.destinationPath( 'components/hero/hero-vanilla/inc/_c.hero-vanilla-dependencies.scss' )
        );

        // Vars
        this.fs.copy(
          this.templatePath( 'hero/hero-vanilla/inc/_c.hero-vanilla-vars.scss' ), 
          this.destinationPath( 'components/hero/hero-vanilla/inc/_c.hero-vanilla-vars.scss' )
        );

        // Features
        this.fs.copy(
          this.templatePath( 'hero/hero-vanilla/inc/_c.hero-vanilla-features.scss' ), 
          this.destinationPath( 'components/hero/hero-vanilla/inc/_c.hero-vanilla-features.scss' )
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