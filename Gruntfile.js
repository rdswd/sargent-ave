'use strict';
module.exports = function (grunt) {

  // Configuration goes here  
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        concat: {
            options: {
                separator: ';'
            },
            dist: {
                src: [
                    'js/theme.js', // Theme specific js
                    'js/navigation.js', // From _s
                    'js/skip-link-focus-fix.js' // From _s   
                ],
                dest: 'js/build/production.js'
            }
        },
        uglify: {
            build: {
                src: 'js/build/production.js',
                dest: 'js/build/production.min.js'
            }
        },
        imagemin: {
            dynamic: {
                file: [{
                    expand: true,
                    cwd: 'images/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'images/build/'
                }]
            }
        },
        sass: {
            dist: {
                files: {
                    'sass/style.noprefix.css': 'sass/style.scss'
                }
            }
        },
        autoprefixer: {
            dist: {
                options: {
                    browsers: ['last 2 versions', 'ie 8', 'ie 9']
                },
                files: {
                    'style.css': 'sass/style.noprefix.css'
                }
            }
        },
          /*
           * WATCH
           * Leaving watch last for my own sanity to ensure it isn't forgotten with new plugins
          */
        watch: {
            options: {
                livereload: true
            },
            scripts: {
                files: ['js/*.js'],
                tasks: ['concat', 'uglify'],
                options: {
                    spawn: false
                }
            },
            css: {
                files: ['sass/**/*.scss'],
                tasks: ['sass', 'autoprefixer'],
                options: {
                    spawn: false
                }
            }
        }
    });

    // Plugins
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-watch');
    
    // Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['concat', 'uglify', 'imagemin', 'sass', 'autoprefixer', 'watch']);
};
