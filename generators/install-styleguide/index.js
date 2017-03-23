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
        'Welcome to the ' + chalk.red( 'generator-matter-kit' ) + ' styleguide generator!'
      ));

      var prompts = [

        // Basic project scaffolding
        {
          name: 'ColourPrimary',
          message: 'Colour - Primary',
          default: '#eee'
        },
        {
          name: 'ColourSecondary',
          message: 'Colour - Secondary',
          default: '#eee'
        },
        {
          name: 'ColourTertiary',
          message: 'Colour - Tertiary',
          default: '#eee'
        },
        {
          type: 'list',
          name: 'TypefaceHost',
          message: 'Typeface Host',
            choices: [{

              name: 'Typekit',
              value: 'Typekit',
              checked: true

            },{

              name: 'Google Fonts',
              value: 'GoogleFonts',
              checked: false

            }]
        },
        {
          name: 'TypefaceData',
          message: 'Enter the URL for Google Fonts, or the key for Typekit',
          default: 'Open+Sans:400,700'
        },
        {
          name: 'TypefacePrimaryName',
          message: 'Primary Typeface Name'
        },
        {
          name: 'TypefacePrimaryStack',
          message: 'Primary Typeface stack for CSS',
          default: 'Arial, sans-serif'
        },
        {
          name: 'TypefaceBaseFontSize',
          message: 'Base font size',
          default: '18px'
        },
        {
          name: 'TypefaceBaseLineHeight',
          message: 'Base line height',
          default: '28px'
        },
        {
          name: 'TypefaceBaseTypeScale',
          message: 'Base type scale factor',
          default: '1.2'
        }

        // Components
      ];

      return this.prompt(prompts).then(function (props) {
        
        this.props = props;

        // Basic Project Scaffold
        this.ColourPrimary = props.ColourPrimary;
        this.ColourSecondary = props.ColourSecondary;
        this.ColourTertiary = props.ColourTertiary;
        this.TypefaceHost = props.TypefaceHost;
        this.TypefaceData = props.TypefaceData;
        this.TypefacePrimaryName = props.TypefacePrimaryName;
        this.TypefacePrimarySlug = props.TypefacePrimarySlug;
        this.TypefaceBaseFontSize = props.TypefaceBaseFontSize;
        this.TypefacePrimaryStack = props.TypefacePrimaryStack;
        this.TypefaceBaseLineHeight = props.TypefaceBaseLineHeight;
        this.TypefaceBaseTypeScale = props.TypefaceBaseTypeScale;

      }.bind(this));

    },

    writing: function () {

      // Basic project
      var styleguideInfo = { 
          ColourPrimary: this.props.ColourPrimary,
          ColourSecondary: this.props.ColourSecondary,
          ColourTertiary: this.props.ColourTertiary,
          TypefaceHost: this.props.TypefaceHost,
          TypefaceData: this.props.TypefaceData,
          TypefacePrimaryName: this.props.TypefacePrimaryName,
          TypefacePrimarySlug: this.props.TypefacePrimarySlug,
          TypefaceBaseFontSize: this.props.TypefaceBaseFontSize,
          TypefaceBaseLineHeight: this.props.TypefaceBaseLineHeight,
          TypefacePrimaryStack: this.props.TypefacePrimaryStack,
          TypefaceBaseTypeScale: this.props.TypefaceBaseTypeScale
      };

      // ----------------------------------------------------
      //  Styleguide
      // ----------------------------------------------------

      // Styleguide
      this.fs.copyTpl(
        this.templatePath( '_page-styleguide.php' ), 
        this.destinationPath( 'page-styleguide.php' ), 
        { styleguideInfo }
      );

      // Styleguide
      this.fs.copyTpl(
        this.templatePath( 'common/_styleguide.php' ), 
        this.destinationPath( 'common/styleguide.php' ), 
        { styleguideInfo }
      );

      // Colours
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/config/_config.colors.scss' ), 
        this.destinationPath( 'assets/css/scss/config/_config.colors.scss' ), 
        { styleguideInfo }
      );
      
      // Typography
      this.fs.copyTpl(
        this.templatePath( 'assets/css/scss/config/_config.typography.scss' ), 
        this.destinationPath( 'assets/css/scss/config/_config.typography.scss' ), 
        { styleguideInfo }
      );

    }

});