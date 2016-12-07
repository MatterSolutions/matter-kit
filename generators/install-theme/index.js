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
        'Welcome to the ' + chalk.red( 'generator-matter-kit' ) + ' generator!'
      ));

      var prompts = [

        // Basic project scaffolding
        {
          name: 'projectName',
          message: 'Project Name?',
        },
        {
          name: 'projectSlug',
          message: 'Project Slug? (dashes and alphanumeric)',
        },
        {
          name: 'projectTextDomain',
          message: 'Project Code? (4 character identifier)',
        },
        {
          name: 'projectDescription',
          message: 'Project Description?',
        },
        {
          name: 'projectVersion',
          message: 'Project Version',
          default: '0.9.0',
        },
        {
          type: 'list',
          name: 'projectLicense',
          message: 'Project License',
            choices: [{

              name: 'GPLv2',
              value: 'GPLv2',
              checked: true

            },{

              name: 'MIT',
              value: 'MIT',
              checked: false

            }]
        },
        {
          name: 'projectAuthor',
          message: 'Author Name?',
          default: 'Matter Solutions',
          store: true
        },
        {
          name: 'projectAuthorEmail',
          message: 'Author Email Address?',
          store: true
        },
        {
          name: 'projectAuthorURL',
          message: 'Author URL?',
          default: 'http://www.mattersolutions.com.au',
          store: true
        }

        // Components
      ];

      return this.prompt(prompts).then(function (props) {
        
        this.props = props;

        // Basic Project Scaffold
        this.projectName = props.projectName;
        this.projectSlug = props.projectSlug;
        this.projectDescription = props.projectDescription;
        this.projectTextDomain = props.projectTextDomain;
        this.projectLicense = props.projectLicense;
        this.projectVersion = props.projectVersion;
        this.projectAuthor = props.projectAuthor;
        this.projectAuthorEmail = props.projectAuthorEmail;
        this.projectAuthorURL = props.projectAuthorURL;

      }.bind(this));

    },

    writing: function () {

      // Basic project
      var projectInfo = { 
          projectName: this.props.projectName,
          projectSlug: this.props.projectSlug,
          projectDescription: this.props.projectDescription,
          projectTextDomain: this.props.projectTextDomain,
          projectLicense: this.props.projectLicense,
          projectVersion: this.props.projectVersion,
          projectAuthor: this.props.projectAuthor,
          projectAuthorEmail: this.props.projectAuthorEmail,
          projectAuthorURL: this.props.projectAuthorURL
      };

      // ----------------------------------------------------
      //  Project Setup
      // ----------------------------------------------------

      // Package JSON
      this.fs.copyTpl(
        this.templatePath( '_package.json' ), 
        this.destinationPath( 'package.json' ), 
        { projectInfo }
      );

      // JS Hint
      this.fs.copy(
        this.templatePath( 'jshintrc' ), 
        this.destinationPath( '.jshintrc' )
      );

      // Gitignore
      this.fs.copy(
        this.templatePath( 'gitignore' ), 
        this.destinationPath( '.gitignore' )
      );

      // Bower
      this.fs.copyTpl(
        this.templatePath( '_bower.json' ), 
        this.destinationPath( 'bower.json' ), 
        { projectInfo }
      );

      // Gruntfile
      this.fs.copy(
        this.templatePath( '_gruntfile.js' ), 
        this.destinationPath( 'gruntfile.js' )
      );


      // ----------------------------------------------------
      //  Theme files
      // ----------------------------------------------------

      // Style.css
      this.fs.copyTpl(
        this.templatePath( '_style.css' ), 
        this.destinationPath( 'style.css' ), 
        { projectInfo }
      );


      // 404
      this.fs.copyTpl(
        this.templatePath( '_404.php' ), 
        this.destinationPath( '404.php' ), 
        { projectInfo }
      );


      // Functions
      this.fs.copyTpl(
        this.templatePath( '_functions.php' ), 
        this.destinationPath( 'functions.php' ), 
        { projectInfo }
      );


      // Footer
      this.fs.copyTpl(
        this.templatePath( '_footer.php' ), 
        this.destinationPath( 'footer.php' ), 
        { projectInfo }
      );


      // Front Page
      this.fs.copyTpl(
        this.templatePath( '_front-page.php' ), 
        this.destinationPath( 'front-page.php' ), 
        { projectInfo }
      );


      // Header
      this.fs.copyTpl(
        this.templatePath( '_header.php' ), 
        this.destinationPath( 'header.php' ), 
        { projectInfo }
      );


      // Index
      this.fs.copyTpl(
        this.templatePath( '_index.php' ), 
        this.destinationPath( 'index.php' ), 
        { projectInfo }
      );


      // Page
      this.fs.copyTpl(
        this.templatePath( '_page.php' ), 
        this.destinationPath( 'page.php' ), 
        { projectInfo }
      );


      // Searchform
      this.fs.copyTpl(
        this.templatePath( '_searchform.php' ), 
        this.destinationPath( 'searchform.php' ), 
        { projectInfo }
      );


      // Single
      this.fs.copyTpl(
        this.templatePath( '_single.php' ), 
        this.destinationPath( 'single.php' ), 
        { projectInfo }
      );




      // ----------------------------------------------------
      //  Theme - Common PHP Files
      // ----------------------------------------------------

      // Aside
      this.fs.copyTpl(
        this.templatePath( 'common/_aside.php' ), 
        this.destinationPath( 'common/aside.php' ), 
        { projectInfo }
      );


      // Content
      this.fs.copyTpl(
        this.templatePath( 'common/_content.php' ), 
        this.destinationPath( 'common/content.php' ), 
        { projectInfo }
      );


      // Header
      this.fs.copyTpl(
        this.templatePath( 'common/_header.php' ), 
        this.destinationPath( 'common/header.php' ), 
        { projectInfo }
      );



      // ----------------------------------------------------
      //  Theme - JS Files
      // ----------------------------------------------------

      // Main JS
      this.fs.copyTpl(
        this.templatePath( 'assets/js/_main.js' ), 
        this.destinationPath( 'assets/js/_main.js' ), 
        { projectInfo }
      );


      // Partials JS
      this.fs.copyTpl(
        this.templatePath( 'assets/js/inc/_partials.js' ), 
        this.destinationPath( 'assets/js/inc/_partials.js' ), 
        { projectInfo }
      );




      // ----------------------------------------------------
      //  Theme - SCSS Files - Config
      // ----------------------------------------------------

      // Effects
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/config/_config.effects.scss' ), 
        this.destinationPath( 'assets/css/scss/config/_config.effects.scss' ), 
        { projectInfo }
      );


      // Grid
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/config/_config.grid.scss' ), 
        this.destinationPath( 'assets/css/scss/config/_config.grid.scss' ), 
        { projectInfo }
      );


      // Misc
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/config/_config.misc.scss' ), 
        this.destinationPath( 'assets/css/scss/config/_config.misc.scss' ), 
        { projectInfo }
      );


      // Objects
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/config/_config.objects.scss' ), 
        this.destinationPath( 'assets/css/scss/config/_config.objects.scss' ), 
        { projectInfo }
      );


      // Utility
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/config/_config.utility.scss' ), 
        this.destinationPath( 'assets/css/scss/config/_config.utility.scss' ), 
        { projectInfo }
      );




      // ----------------------------------------------------
      //  Theme - SCSS Files - Elements
      // ----------------------------------------------------

      // Headings
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/elements/_e.headings.scss' ), 
        this.destinationPath( 'assets/css/scss/elements/_e.headings.scss' ), 
        { projectInfo }
      );


      // Page
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/elements/_e.page.scss' ), 
        this.destinationPath( 'assets/css/scss/elements/_e.page.scss' ), 
        { projectInfo }
      );


      // HR
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/elements/_e.hr.scss' ), 
        this.destinationPath( 'assets/css/scss/elements/_e.hr.scss' ), 
        { projectInfo }
      );


      // Table
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/elements/_e.table.scss' ), 
        this.destinationPath( 'assets/css/scss/elements/_e.table.scss' ), 
        { projectInfo }
      );


      // Form
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/elements/_e.forms.scss' ), 
        this.destinationPath( 'assets/css/scss/elements/_e.forms.scss' ), 
        { projectInfo }
      );


      // Checkbox Radio
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/elements/_e.checkbox-radio.scss' ), 
        this.destinationPath( 'assets/css/scss/elements/_e.checkbox-radio.scss' ), 
        { projectInfo }
      );





      // ----------------------------------------------------
      //  Theme - SCSS Files - Objects
      // ----------------------------------------------------

      // Objects
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/objects/_obj.layout.scss' ), 
        this.destinationPath( 'assets/css/scss/objects/_obj.layout.scss' ), 
        { projectInfo }
      );



      // ----------------------------------------------------
      //  Theme - SCSS Files - Setup
      // ----------------------------------------------------

      // Component Objects
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/setup/_setup.component-objects.scss' ), 
        this.destinationPath( 'assets/css/scss/setup/_setup.component-objects.scss' ), 
        { projectInfo }
      );


      // Dependencies
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/setup/_setup.dependencies.scss' ), 
        this.destinationPath( 'assets/css/scss/setup/_setup.dependencies.scss' ), 
        { projectInfo }
      );


      // Effects
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/setup/_setup.effects.scss' ), 
        this.destinationPath( 'assets/css/scss/setup/_setup.effects.scss' ), 
        { projectInfo }
      );


      // Elements
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/setup/_setup.elements.scss' ), 
        this.destinationPath( 'assets/css/scss/setup/_setup.elements.scss' ), 
        { projectInfo }
      );



      // Objects
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/setup/_setup.objects.scss' ), 
        this.destinationPath( 'assets/css/scss/setup/_setup.objects.scss' ), 
        { projectInfo }
      );



      // Utilities
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/setup/_setup.utilities.scss' ), 
        this.destinationPath( 'assets/css/scss/setup/_setup.utilities.scss' ), 
        { projectInfo }
      );


      // ----------------------------------------------------
      //  Theme - SCSS Files - Vendor
      // ----------------------------------------------------

      // WordPress
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/vendor/_vendor.wordpress.scss' ), 
        this.destinationPath( 'assets/css/scss/vendor/_vendor.wordpress.scss' ), 
        { projectInfo }
      );


      // Gravity Forms
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/vendor/_vendor.gravity-forms.scss' ), 
        this.destinationPath( 'assets/css/scss/vendor/_vendor.gravity-forms.scss' ), 
        { projectInfo }
      );


      // Magnific
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/vendor/_vendor.magnific.scss' ), 
        this.destinationPath( 'assets/css/scss/vendor/_vendor.magnific.scss' ), 
        { projectInfo }
      );


      // ----------------------------------------------------
      //  Theme - Primary SCSS Files
      // ----------------------------------------------------

      // Main
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/_main.scss' ), 
        this.destinationPath( 'assets/css/scss/main.scss' ), 
        { projectInfo }
      );


      // Editor
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/_editor.scss' ), 
        this.destinationPath( 'assets/css/scss/editor.scss' ), 
        { projectInfo }
      );


      // Styleguide
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/_styleguide.scss' ), 
        this.destinationPath( 'assets/css/scss/styleguide.scss' ), 
        { projectInfo }
      );


      // Wires
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/_wires.scss' ), 
        this.destinationPath( 'assets/css/scss/wires.scss' ), 
        { projectInfo }
      );

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