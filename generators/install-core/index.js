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

    writing: function () {

      // ----------------------------------------------------
      //  Core Files
      // ----------------------------------------------------

      // Main PHP file
      this.fs.copy(
        this.templatePath( '_mttr-core.php' ), 
        this.destinationPath( '_core/mttr-core.php' )
      );




      // ----------------------------------------------------
      //  Customiser
      // ----------------------------------------------------

      // Brand
      this.fs.copy(
        this.templatePath( 'customiser/_mttr-brand.php' ), 
        this.destinationPath( '_core/customiser/mttr-brand.php' )
      );


      // Setup
      this.fs.copy(
        this.templatePath( 'customiser/_mttr-customiser-setup.php' ), 
        this.destinationPath( '_core/customiser/mttr-customiser-setup.php' )
      );


      // Social
      this.fs.copy(
        this.templatePath( 'customiser/_mttr-social.php' ), 
        this.destinationPath( '_core/customiser/mttr-social.php' )
      );


      // Contact
      this.fs.copy(
        this.templatePath( 'customiser/_mttr-contact.php' ), 
        this.destinationPath( '_core/customiser/mttr-contact.php' )
      );



      // ----------------------------------------------------
      //  Functions
      // ----------------------------------------------------

      // ACF
      this.fs.copy(
        this.templatePath( 'functions/_mttr-acf.php' ), 
        this.destinationPath( '_core/functions/mttr-acf.php' )
      );


      // Brand
      this.fs.copy(
        this.templatePath( 'functions/_mttr-brand.php' ), 
        this.destinationPath( '_core/functions/mttr-brand.php' )
      );


      // Component Layer
      this.fs.copy(
        this.templatePath( 'functions/_mttr-component-layer.php' ), 
        this.destinationPath( '_core/functions/mttr-component-layer.php' )
      );


      // Contact
      this.fs.copy(
        this.templatePath( 'functions/_mttr-contact.php' ), 
        this.destinationPath( '_core/functions/mttr-contact.php' )
      );


      // Images
      this.fs.copy(
        this.templatePath( 'functions/_mttr-images.php' ), 
        this.destinationPath( '_core/functions/mttr-images.php' )
      );


      // Misc
      this.fs.copy(
        this.templatePath( 'functions/_mttr-misc.php' ), 
        this.destinationPath( '_core/functions/mttr-misc.php' )
      );


      // Social
      this.fs.copy(
        this.templatePath( 'functions/_mttr-social.php' ), 
        this.destinationPath( '_core/functions/mttr-social.php' )
      );



      // ----------------------------------------------------
      //  Structure
      // ----------------------------------------------------

      // Structure of the core components
      this.fs.copy(
        this.templatePath( 'structure/_mttr-core-components.php' ), 
        this.destinationPath( '_core/structure/mttr-core-components.php' )
      );


      // Core flex functions
      this.fs.copy(
        this.templatePath( 'structure/_mttr-core-flexible.php' ), 
        this.destinationPath( '_core/structure/mttr-core-flexible.php' )
      );


      // Core page hooks
      this.fs.copy(
        this.templatePath( 'structure/_mttr-core-page-hooks.php' ), 
        this.destinationPath( '_core/structure/mttr-core-page-hooks.php' )
      );


      // Core structure
      this.fs.copy(
        this.templatePath( 'structure/_mttr-core-page-structure.php' ), 
        this.destinationPath( '_core/structure/mttr-core-page-structure.php' )
      );


      // Core setup
      this.fs.copy(
        this.templatePath( 'structure/_mttr-core-setup.php' ), 
        this.destinationPath( '_core/structure/mttr-core-setup.php' )
      );





      // ----------------------------------------------------
      //  Styleguide
      // ----------------------------------------------------

      // Styleguide
      this.fs.copy(
        this.templatePath( 'styleguide/_styleguide.php' ), 
        this.destinationPath( '_core/styleguide/styleguide.php' )
      );


        // Setup
        this.fs.copy(
          this.templatePath( 'styleguide/assets/_styleguide-setup.scss' ), 
          this.destinationPath( '_core/styleguide/assets/_styleguide-setup.scss' )
        );

          // Colour Swatch
          this.fs.copy(
            this.templatePath( 'styleguide/assets/scss/_s.colour-swatch.scss' ), 
            this.destinationPath( '_core/styleguide/assets/scss/_s.colour-swatch.scss' )
          );


          // Dock
          this.fs.copy(
            this.templatePath( 'styleguide/assets/scss/_s.dock.scss' ), 
            this.destinationPath( '_core/styleguide/assets/scss/_s.dock.scss' )
          );


          // Header
          this.fs.copy(
            this.templatePath( 'styleguide/assets/scss/_s.header.scss' ), 
            this.destinationPath( '_core/styleguide/assets/scss/_s.header.scss' )
          );


          // Nav
          this.fs.copy(
            this.templatePath( 'styleguide/assets/scss/_s.nav.scss' ), 
            this.destinationPath( '_core/styleguide/assets/scss/_s.nav.scss' )
          );


          // Note
          this.fs.copy(
            this.templatePath( 'styleguide/assets/scss/_s.note.scss' ), 
            this.destinationPath( '_core/styleguide/assets/scss/_s.note.scss' )
          );


          // Page
          this.fs.copy(
            this.templatePath( 'styleguide/assets/scss/_s.page.scss' ), 
            this.destinationPath( '_core/styleguide/assets/scss/_s.page.scss' )
          );


          // Structure
          this.fs.copy(
            this.templatePath( 'styleguide/assets/scss/_s.structure.scss' ), 
            this.destinationPath( '_core/styleguide/assets/scss/_s.structure.scss' )
          );


          // Tabs
          this.fs.copy(
            this.templatePath( 'styleguide/assets/scss/_s.tabs.scss' ), 
            this.destinationPath( '_core/styleguide/assets/scss/_s.tabs.scss' )
          );


          // Typography
          this.fs.copy(
            this.templatePath( 'styleguide/assets/scss/_s.typography.scss' ), 
            this.destinationPath( '_core/styleguide/assets/scss/_s.typography.scss' )
          );


          // Utility
          this.fs.copy(
            this.templatePath( 'styleguide/assets/scss/_s.utility.scss' ), 
            this.destinationPath( '_core/styleguide/assets/scss/_s.utility.scss' )
          );


      // Styleguide pages
      this.fs.copy(
        this.templatePath( 'styleguide/inc/_styleguide.pages.php' ), 
        this.destinationPath( '_core/styleguide/inc/_styleguide.pages.php' )
      );


      // Styleguide tile
      this.fs.copy(
        this.templatePath( 'styleguide/inc/_styleguide.page-tile.php' ), 
        this.destinationPath( '_core/styleguide/inc/_styleguide.page-tile.php' )
      );


      // Styleguide typography
      this.fs.copy(
        this.templatePath( 'styleguide/inc/_styleguide.page-typography.php' ), 
        this.destinationPath( '_core/styleguide/inc/_styleguide.page-typography.php' )
      );


      // Styleguide main
      this.fs.copy(
        this.templatePath( 'styleguide/inc/_mttr-styleguide.php' ), 
        this.destinationPath( '_core/styleguide/inc/mttr-styleguide.php' )
      );


        // Styletile Footer
        this.fs.copy(
          this.templatePath( 'styleguide/inc/styletile/_styleguide.styletile-footer.php' ), 
          this.destinationPath( '_core/styleguide/inc/styletile/_styleguide.styletile-footer.php' )
        );


        // Styletile Header
        this.fs.copy(
          this.templatePath( 'styleguide/inc/styletile/_styleguide.styletile-header.php' ), 
          this.destinationPath( '_core/styleguide/inc/styletile/_styleguide.styletile-header.php' )
        );


        // Styletile Styles
        this.fs.copy(
          this.templatePath( 'styleguide/inc/styletile/_styleguide.styletile-styles.php' ), 
          this.destinationPath( '_core/styleguide/inc/styletile/_styleguide.styletile-styles.php' )
        );


      // Template Parts
      this.fs.copy(
        this.templatePath( 'styleguide/template-parts/_s.header.php' ), 
        this.destinationPath( '_core/styleguide/template-parts/_s.header.php' )
      );


        // Generic Template Parts - Component
        this.fs.copy(
          this.templatePath( 'styleguide/template-parts/generic/_s.component.php' ), 
          this.destinationPath( '_core/styleguide/template-parts/generic/_s.component.php' )
        );


        // Generic Template Parts - Note
        this.fs.copy(
          this.templatePath( 'styleguide/template-parts/generic/_s.note.php' ), 
          this.destinationPath( '_core/styleguide/template-parts/generic/_s.note.php' )
        );


        // Generic Template Parts - Page Content
        this.fs.copy(
          this.templatePath( 'styleguide/template-parts/generic/_s.page-content.php' ), 
          this.destinationPath( '_core/styleguide/template-parts/generic/_s.page-content.php' )
        );


        // Generic Template Parts - Page Header
        this.fs.copy(
          this.templatePath( 'styleguide/template-parts/generic/_s.page-header.php' ), 
          this.destinationPath( '_core/styleguide/template-parts/generic/_s.page-header.php' )
        );


    }

});