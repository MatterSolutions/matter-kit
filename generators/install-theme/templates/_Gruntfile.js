module.exports = function( grunt ) {

	// Load all tasks
	require( 'load-grunt-tasks' )( grunt );

	// Show elapsed time
	require( 'time-grunt' )( grunt );

	var jsFileList = [
		'assets/js/plugins/*.js',
		'assets/js/main.js'
	];

	grunt.initConfig({

		pkg: grunt.file.readJSON( 'package.json' ),

		jshint: {
			options: {
				jshintrc: '.jshintrc'
			},
			all: [
				'Gruntfile.js',
				'htdocs/assets/js/main.js',
				'!assets/js/scripts.js',
				'!assets/**/*.min.*'
			]
		},
		sass: {
			dev: {
				files: [{
					expand: true,
			        cwd: 'assets/css/scss',
			        src: ['*.scss'],
			        dest: 'assets/css',
			        ext: '.css'
				}],
				options: {
					style: 'extended',
					precision: 7,
					sourceMap: false,
					sourceMapEmbed: false
				}
			},
			build: {
				files: [{
					expand: true,
			        cwd: 'assets/css/scss',
			        src: ['*.scss'],
			        dest: 'assets/css',
			        ext: '.css'
				}],
				options: {
					style: 'compressed',
					precision: 7,
					sourceMap: false,
					sourceMapEmbed: false
				}
			}
		},
		concat: {
			options: {
				separator: ';',
			},
			dist: {
				src: [jsFileList],
				dest: 'assets/js/scripts.min.js',
			},
		},
		uglify: {
			dist: {
				files: {
					'assets/js/scripts.min.js': 'assets/js/scripts.min.js'
				}
			}
		},
		cmq: {
		    options: {
		      log: false
		    },
		    your_target: {
		      files: {
		        'assets/css/': [ 'assets/css/*.css' ]
		      }
		    }
		},
		sass_globbing: {
		  your_target: {
		    files: {
		      'assets/css/scss/setup/_gen.component-list.scss': ['components/**/*.scss', '!components/**/*-dependencies.scss', '!components/**/**/inc/*-features.scss', '!components/**/**/inc/*-vars.scss', '!components/**/**/inc/*-tools.scss'],
		      'assets/css/scss/setup/_gen.component-dependencies.scss': ['components/**/*-dependencies.scss'],
		    }
		  }
		},
		postcss: {
			options: {
				map: {
					inline: false,
					annotation: 'assets/css/maps/' // ...to the specified directory
				},
				processors: [
					require('autoprefixer')({browsers: ['last 2 versions', 'ie 9', 'ie 10', 'android 4.3', 'android 4.4', 'firefox 34', 'firefox 35', 'opera 27', 'opera 26']}), // add vendor prefixes
					require('cssnano')() // minify the result
				]
			},
			build: {
				src: 'assets/css/*.css'
			}
		},
		modernizr: {
			build: {
				devFile		: 'bower_components/modernizr/modernizr.js',
				outputFile	: 'assets/js/vendor/modernizr.min.js',
				files 		: {
					'src': [
						['assets/js/scripts.min.js'],
						['assets/css/main.css']
					]
				},
				extra		: {
					shiv		: false,
					printshiv	: false,
					load		: true,
					mq			: false,
					cssclasses	: true
				},
				uglify		: true,
				parseFiles	: true
			}
		},
		simple_include: {

			options: {

				stripPrefix: '_',
				baseDir: ''

			},

			dev: {

				src: ['assets/js/_main.js'],
      			dest: 'assets/js/'

			},

		},
		watch: {
			sass: {
				files: [
					'*.scss',
					'**/*.scss'
				],
				tasks: ['sass:dev', 'postcss:dev']
			},
			js: {
				files: [
					'*.js',
					'**/*.js'
				],
				tasks: ['simple_include', 'concat']
			},
		},
		browserSync: {
		    dev: {
		        bsFiles: {

		            src : [
                        'assets/css/*.css',
                        'assets/js/*.js',
                        '<%= pkg.theme_name %>/*.php',
                        '**/*.php',
                    ],

		        },
		        options: {
		            proxy: "client-wp-<%= pkg.client_code %>.local",
		            watchTask: true,
		        }
		    }
		},
	});

	// Register tasks
	grunt.registerTask('default', [
		'dev'
	]);
	grunt.registerTask('dev', [
		'sass_globbing',
		'sass:dev',
		'cmq',
		'postcss:dev',
		'simple_include',
		'jshint',
		'concat',
		'browserSync',
		'watch',
	]);
	grunt.registerTask('build', [
		'sass_globbing',
		'sass:build',
		'cmq',
		'postcss:build',
		'simple_include',
		'jshint',
		'concat',
		'uglify',
		'modernizr',
	]);
};