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
          name: 'projectCode',
          message: 'Project code? (4 character identifier)',
        },
        {
          name: 'projectTablePrefix',
          message: 'Project Database Table Prefix?',
          default: 'mttr_',
        },

        // Components
      ];

      return this.prompt(prompts).then(function (props) {
        
        this.props = props;

        // Basic Project Scaffold
        this.projectCode = props.projectCode;
        this.projectTablePrefix = props.projectTablePrefix;

      }.bind(this));

    },

    writing: function () {

      // Basic project
      var projectInfo = { 
          projectCode: this.props.projectCode,
          projectTablePrefix: this.props.projectTablePrefix,
      };

      // ----------------------------------------------------
      //  Component Setup
      // ----------------------------------------------------

      // Local config file
      this.fs.copyTpl(
        this.templatePath( '_local-config.php' ), 
        this.destinationPath( 'local-config.php' ), 
        { projectInfo }
      );



      // Local config file
      this.fs.copyTpl(
        this.templatePath( '_config.local.yaml' ), 
        this.destinationPath( 'config.local.yaml' ), 
        { projectInfo }
      );

    }

});