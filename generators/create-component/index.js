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
          message: 'Component Name: ',
        },
        {
          name: 'componentSlug',
          message: 'Component Slug (Lowercase letters and dashes only): ',
        },
        {
          name: 'componentDescription',
          message: 'Component Description: ',
        },
        {
          type: 'list',
          name: 'componentFolder',
          message: 'Choose a component Folder: ',
            choices: [{

              name: 'Typography',
              value: '_typography',
              checked: false

            },{

              name: 'Grid',
              value: 'grid',
              checked: false

            },{

              name: 'Content',
              value: 'content',
              checked: false

            },{

              name: 'Misc',
              value: 'misc',
              checked: true

            },{

              name: 'Hero',
              value: 'hero',
              checked: false

            },{

              name: 'Header',
              value: 'header',
              checked: false

            },{

              name: 'Footer',
              value: 'footer',
              checked: false

            }]
        },
        {
          type: 'list',
          name: 'componentFields',
          message: 'What kind of ACF fields does this component need? ',
            choices: [{

              name: 'Grid',
              value: 'grid',
              checked: false

            },{

              name: 'Layout',
              value: 'layout',
              checked: true

            },{

              name: 'Global',
              value: 'global',
              checked: false

            },{

              name: 'None',
              value: 'none',
              checked: false

            }]
        },
        {
          type: 'list',
          name: 'componentStyles',
          message: 'Does this component need dynamic styles? ',
            choices: [{

              name: 'Yes',
              value: 'yes',
              checked: false

            },{

              name: 'No',
              value: 'no',
              checked: true

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
        this.componentFolder = props.componentFolder;
        this.componentFields = props.componentFields;
        this.componentStyles = props.componentStyles;

      }.bind(this));

    },

    writing: function () {

      // Basic project
      var componentInfo = { 
          componentName: this.props.componentName,
          componentDescription: this.props.componentDescription,
          componentSlug: this.props.componentSlug,
          componentFolder: this.props.componentFolder,
          componentSlugClass: this.props.componentName.replace( / /g, '_' ),
          componentSlugUnderscore: this.props.componentSlug.replace( /-/g, '_' ),
          componentFields: this.props.componentFields,
          componentStyles: this.props.componentStyles
      };

      // ----------------------------------------------------
      //  Component Setup
      // ----------------------------------------------------

      // Main PHP File
      this.fs.copyTpl(
        this.templatePath( '_c.component-name.php' ), 
        this.destinationPath( 'components/' + componentInfo.componentFolder + '/' + componentInfo.componentSlug + '/_c.' + componentInfo.componentSlug + '.php' ), 
        { componentInfo }
      );



      // Main SCSS File
      this.fs.copyTpl(
        this.templatePath( '_c.component-name.scss' ), 
        this.destinationPath( 'components/' + componentInfo.componentFolder + '/' + componentInfo.componentSlug + '/_c.' + componentInfo.componentSlug + '.scss' ), 
        { componentInfo }
      );



      // SCSS Dependencies
      this.fs.copyTpl(
        this.templatePath( 'inc/_c.component-name-dependencies.scss' ), 
        this.destinationPath( 'components/' + componentInfo.componentFolder + '/' + componentInfo.componentSlug + '/inc/_c.' + componentInfo.componentSlug + '-dependencies.scss' ), 
        { componentInfo }
      );



      // SCSS Features
      this.fs.copyTpl(
        this.templatePath( 'inc/_c.component-name-features.scss' ), 
        this.destinationPath( 'components/' + componentInfo.componentFolder + '/' + componentInfo.componentSlug + '/inc/_c.' + componentInfo.componentSlug + '-features.scss' ), 
        { componentInfo }
      );


      // PHP Template
      this.fs.copyTpl(
        this.templatePath( 'inc/_c.component-name-tpl.php' ), 
        this.destinationPath( 'components/' + componentInfo.componentFolder + '/' + componentInfo.componentSlug + '/inc/_c.' + componentInfo.componentSlug + '-tpl.php' ), 
        { componentInfo }
      );



      // SCSS Vars
      this.fs.copyTpl(
        this.templatePath( 'inc/_c.component-name-vars.scss' ), 
        this.destinationPath( 'components/' + componentInfo.componentFolder + '/' + componentInfo.componentSlug + '/inc/_c.' + componentInfo.componentSlug + '-vars.scss' ), 
        { componentInfo }
      );

    }

});