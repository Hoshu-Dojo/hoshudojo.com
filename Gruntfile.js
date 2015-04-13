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
					'wp-content/themes/hoshu-dojo-theme/stylesheet.css': 'wp-content/themes/hoshu-dojo-theme/assets/styles/stylesheet.scss',
				}
			}
		},
		watch: {
			css: {
				files: '**/*.scss',
				tasks: ['sass']
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.registerTask('default',['watch']);
}
