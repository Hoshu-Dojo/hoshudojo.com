module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		sass: {
			dist: {
                options: {
                    bundleExec: true,
                    style: 'compressed',
                    sourcemap: 'none',
                    loadPath: [
                        'wp-content/themes/hoshu-dojo-theme/',
                        'wp-content/themes/hoshu-dojo-theme/assets/styles/',
                        'bower_components/'
                    ]
                },
				files: {
					'wp-content/themes/hoshu-dojo-theme/style.css': 'wp-content/themes/hoshu-dojo-theme/src/styles/style.scss',
				}
			}
		},
		watch: {
			css: {
				files: '**/*.scss',
				tasks: ['sass', 'autoprefixer']
			}
		},
		autoprefixer: {
	        options: {
	            browsers: [
					'iOS >= 6.0',
					'Android >= 4',
					'last 4 ChromeAndroid versions',
					'ie >= 10',
					// 'Edge >= 12',
					'Firefox >= 38'
				]
	        },
	        multiple_files: {
	            flatten: true,
	            src: 'wp-content/themes/hoshu-dojo-theme/*.css'
	        }
	    }
	});

	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.registerTask('default', ['watch']);
}
