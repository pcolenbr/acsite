'use strict';

module.exports = function (grunt) {

  // Load grunt tasks automatically
  require('load-grunt-tasks')(grunt);

  // Time how long tasks take. Can help when optimizing build times
  require('time-grunt')(grunt);

	// Define the configuration for all the tasks
	grunt.initConfig({

		// Project information
		pkg: grunt.file.readJSON('package.json'),

		// Make sure there are no obvious mistakes in your JS
		jshint: {
		  options: {
			jshintrc: '.jshintrc',
			reporter: require('jshint-stylish')
		  },
		  all: {
			src: [
			  'Gruntfile.js',
			  'scripts/src/*/*.js'
			]
		  }
		},
		
		// Concat and minify our JS
		uglify: {
			options: {
				banner: '/* <%= pkg.name %> - v<%= pkg.version %> - ' + '<%= grunt.template.today("yyyy-mm-dd") %> */\n',
				mangle: false
			},
			dist: {
				files: {
					'scripts/dist/main_script.min.js': [
						'scripts/src/**/*.js'
					]
				}
			}
		},

		// Compile your sass
		sass: {
			dev: {
				files: [{
			        expand: true,
			    	cwd: 'sass',
			        src: ['**/*.scss'],
			        dest: 'styles/src',
			        ext: '.css'
			      }]
			}
		},
		
		// Mimify css
		cssmin: {
			options: {
				banner: '/* <%= pkg.name %> - v<%= pkg.version %> - ' + '<%= grunt.template.today("yyyy-mm-dd") %> */\n'
			},
			dist: {
				files: [{
					expand: true,
					cwd: 'styles/src',
					src: ['*.css', '!*.min.css'],
					dest: 'styles/src/min',
					ext: '.min.css'
				}]
			}
		},

		// Concat css files
		concat_css: {
			'styles/dist/ac_styles.min.css': ['styles/src/min/**/*.css']
		},
		
		// Notify cross-OS
		notify_hooks: {
			options: {
				enabled: true,
				max_js_hint_notifications: 5,
				title: 'Notifications'
			}
		},
		notify: {
			scss: {
				options: {
					title: 'Grunt, grunt!',
					message: 'SCSS is all gravy'
				}
			},
			js: {
				options: {
					title: 'Grunt, grunt!',
					message: 'JS is all good'
				}
			},
			dist: {
				options: {
					title: 'Grunt, grunt!',
					message: 'Theme ready for production'
				}
			}
		},
		
		// Watches files for changes and runs tasks based on the changed files
		watch: {
		  js: {
			files: ['scripts/src/**/*.js'],
			tasks: [
				'jshint:all', 
				'uglify',
				'notify:js'
			]
		  },
		  scss: {
				files: ['sass/**/*.scss'],
				tasks: [
					'sass:dev',
					'cssmin',
					'concat_css',
					'notify:scss'
				]
			}
		}
	});

	// Development task
	grunt.registerTask('default', [
		'coffee:all',
		'uglify',
		'sass:dev',
		'cssmin'
	]);
	
	// Production task
	grunt.registerTask('dist', function() {
		grunt.task.run([
			'clean:dist',
			'uglify',
			'sass:prod',
			'cssmin',
			'cssmin:dist',
			'notify:dist'
		]);
	});

};