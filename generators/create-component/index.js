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
        'Welcome to the ' + chalk.red( 'generator-matter-kit' ) + ' component generator!'
      ));

      var prompts = [

        // Basic project scaffolding
        {
          name: 'componentName',
          message: 'Component Name?',
        },
        {
          name: 'componentSlug',
          message: 'Component Slug? (Lowercase letters and dashes only)',
        },
        {
          name: 'componentDescription',
          message: 'Component Description?',
        },
        {
          type: 'list',
          name: 'componentType',
          message: 'Component Type?',
            choices: [{

              name: 'Header',
              value: 'header',
              checked: false

            },{

              name: 'Footer',
              value: 'footer',
              checked: false

            },{

              name: 'Hero',
              value: 'hero',
              checked: false

            },{

              name: 'Grid',
              value: 'grid',
              checked: true

            },{

              name: 'Misc',
              value: 'misc',
              checked: false

            },{

              name: 'Typography',
              value: '_typography',
              checked: false

            }]
        },
        {
          type: 'list',
          name: 'componentFlexible',
          message: 'Add this as a flexible component?',
            choices: [{

              name: 'Layout',
              value: 'layout',
              checked: true

            },{

              name: 'Grid Item',
              value: 'grid',
              checked: false

            },{

              name: 'None',
              value: 'none',
              checked: false

            }]
        }

        // Components
      ];

      return this.prompt(prompts).then(function (props) {
        
        this.props = props;

        // Basic Project Scaffold
        this.componentName = props.componentName;
        this.componentDescription = props.componentDescription;
        this.componentSlug = props.componentSlug;
        this.componentType = props.componentType;
        this.componentFlexible = props.componentFlexible;

      }.bind(this));

    },

    writing: function () {

      // Basic project
      var componentInfo = { 
          componentName: this.props.componentName,
          componentDescription: this.props.componentDescription,
          componentSlug: this.props.componentSlug,
          componentSlugClass: this.props.componentName.replace( / /g, '_' ),
          componentSlugUnderscore: this.props.componentSlug.replace( /-/g, '_' ),
          componentType: this.props.componentType,
          componentFlexible: this.props.componentFlexible
      };

      // ----------------------------------------------------
      //  Component Setup
      // ----------------------------------------------------

      // Main PHP File
      this.fs.copyTpl(
        this.templatePath( '_c.component-name.php' ), 
        this.destinationPath( 'components/' + componentInfo.componentType + '/' + componentInfo.componentSlug + '/_c.' + componentInfo.componentSlug + '.php' ), 
        { componentInfo }
      );



      // Main SCSS File
      this.fs.copyTpl(
        this.templatePath( '_c.component-name.scss' ), 
        this.destinationPath( 'components/' + componentInfo.componentType + '/' + componentInfo.componentSlug + '/_c.' + componentInfo.componentSlug + '.scss' ), 
        { componentInfo }
      );



      // SCSS Dependencies
      this.fs.copyTpl(
        this.templatePath( 'inc/_c.component-name-dependencies.scss' ), 
        this.destinationPath( 'components/' + componentInfo.componentType + '/' + componentInfo.componentSlug + '/inc/_c.' + componentInfo.componentSlug + '-dependencies.scss' ), 
        { componentInfo }
      );



      // SCSS Features
      this.fs.copyTpl(
        this.templatePath( 'inc/_c.component-name-features.scss' ), 
        this.destinationPath( 'components/' + componentInfo.componentType + '/' + componentInfo.componentSlug + '/inc/_c.' + componentInfo.componentSlug + '-features.scss' ), 
        { componentInfo }
      );


      // PHP Template
      this.fs.copyTpl(
        this.templatePath( 'inc/_c.component-name-tpl.php' ), 
        this.destinationPath( 'components/' + componentInfo.componentType + '/' + componentInfo.componentSlug + '/inc/_c.' + componentInfo.componentSlug + '-tpl.php' ), 
        { componentInfo }
      );



      // SCSS Vars
      this.fs.copyTpl(
        this.templatePath( 'inc/_c.component-name-vars.scss' ), 
        this.destinationPath( 'components/' + componentInfo.componentType + '/' + componentInfo.componentSlug + '/inc/_c.' + componentInfo.componentSlug + '-vars.scss' ), 
        { componentInfo }
      );

      

    }

});