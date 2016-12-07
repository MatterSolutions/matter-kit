# Matter Kit
A base WordPress theme.

## Installation

First, install [Yeoman](http://yeoman.io) and generator-matter-kit using [npm](https://www.npmjs.com/) (we assume you have pre-installed [node.js](https://nodejs.org/)).

```bash
npm install -g yo
npm install -g generator-matter-kit
```

Then you can call the subgenerators!

```bash
yo matter-kit:install-core
yo matter-kit:install-theme
yo matter-kit:install-styleguide
yo matter-kit:install-components
yo matter-kit:create-component
```

## Setting up with Chassis
Firstly, cd to where your projects will be set up. We'll create a new directory for this project - change the variables to match your needs.
```bash
PROJECT="MyProject"
CODE="proj"
THEME="theme-name"
AUTHOREMAIL="helpdesk@mattersolutions.com.au"
AUTHORURL="https://www.mattersolutions.com.au"
mkdir "$PROJECT"
cd "$PROJECT"
git clone --recursive https://github.com/Chassis/Chassis
cd Chassis
yo matter-kit:setup
```
Fill out the prompts from the matter-kit:setup generator, which builds the local config file for Chassis. We've opted to use the WordPress default content folder names to better align with the usual live environments we face.
```bash
mkdir wp-content
cd wp-content
mkdir themes
mkdir plugins
cd themes
mkdir "$THEME"
cd "$THEME"
yo matter-kit:install-core
yo matter-kit:install-theme
```
Fill out the prompts for the theme installation.
```bash
git init
git add -A .
git commit -m "Initial commit"
yo matter-kit:install-styleguide
```
Fill out the prompts for the styleguide, choosing colours, the primary typeface and primary typeface sizing.
```bash
vagrant up --provision
vagrant ssh
wp site empty
```
Empty the WP installation of it's dummy data.
```bash
wp theme activate theme-name
wp user create mttr-test helpdesk@mattersolutions.com.au --role=administrator
wp user delete 1 --reassign=2
```
Note the password for the user so you can log in. 
```bash
wp option set default_comment_status closed;
wp post create --post_type=page --post_title='Home' --post_status=publish
wp post create --post_type=page --post_title='Blog' --post_status=publish
wp option update page_on_front 1
wp option update show_on_front page
wp option update page_for_posts 2
wp rewrite structure '/blog/%postname%/' --hard
wp option set blog_public 0
wp option update admin_email helpdesk@mattersolutions.com.au
wp option update blogname "My Project"
wp option update blogdescription ""
wp option update timezone_string "Australia/Brisbane"
wp core language install en_AU
wp option update WPLANG "en_AU"
wp plugin install akismet --activate
wp plugin install duplicate-post --activate
wp plugin install manual-image-crop --activate
wp plugin install regenerate-thumbnails --activate
wp plugin install stream --activate
wp plugin install shortpixel-image-optimiser --activate
wp plugin install wordpress-seo --activate
wp plugin install wp-author-slug --activate
wp plugin install https://github.com/MatterSolutions/matter-kit-plugin-gtm/archive/master.zip
wp plugin install https://github.com/MatterSolutions/matter-kit-plugin-shortcodes/archive/master.zip
wp plugin install https://github.com/MatterSolutions/matter-kit-plugin-ui-enhancements/archive/master.zip
wp menu create "Primary"
wp menu location assign Primary primary
wp menu create "Secondary"
wp menu location assign Secondary secondary
wp menu create "Footer"
wp menu location assign Footer footer
wp menu create "Legal"
wp menu location assign Legal legal
exit
yo matter-kit:install-components
```
Choose the components you wish to install. Several are checked by default, because they're commonly used across all installs.

**Note** that this installation process doesn't install Advanced Custom Fields Pro, which is a necessary WordPress plugin for using the Matter Kit theme base. We also recommend installing Gravity Forms, however the installation will work without that. 
```bash
npm install
```
Run the install to download the frontend dependencies and get the build process going.

## License

Dual licensed under MIT & GPLv2 

© 2016 Matter Solutions