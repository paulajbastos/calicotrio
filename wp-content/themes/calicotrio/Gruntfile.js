module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),

    copy: {
      main: {
        files: [
          {
            expand: true,
            cwd: 'node_modules/nib/',
            src: ['index.styl', 'lib/**'],
            dest: 'assets/css/nib'
          },
          {
            expand: true,
            cwd: 'node_modules/rupture/rupture/',
            src: ['index.styl'],
            dest: 'assets/css/rupture'
          }
        ]
      }
    }
    ,stylus: {
      compile: {      
        files: {
          'style.css': 'assets/css/theme.styl'
        }
      }
    }
    ,cssmin: {
      minify: {
        
          options:{
             banner: '/*\n' +
                    'Theme Name: Calicotrio\n' +
                    'Theme URI: http://www.calicotrio.com/\n' +
                    'Author: Paula Bastos\n' +
                    'Author URI: hhttp://paulajbastos.com.br/\n' +
                    'Description: Tema exclusivamente criado e desenvolvido para a Calocotrio.\n' +
                    'Version: 1.0\n' +
                    'License: GNU General Public License v2 or later\n' +
                    'License URI: http://www.gnu.org/licenses/gpl-2.0.html\n' +
                    'Tags: blue, brown, responsive\n' +
                    'Text Domain: calicotrio\n' +
                    '\n' +
                    'This theme, like WordPress, is licensed under the GPL.\n' +
                    'Use it to make something cool, have fun, and share what you\'ve learned with others.\n' +
                    '*/'
          }
          ,files: {
            'style.css': ['style.css']
          }
        
      }
    }
    ,watch: {
      scripts: {
        files: ['assets/css/*.styl']
        ,tasks: ['stylus', 'cssmin']
      }
    }
  });

  // Load the plugin that provides the "uglify" task.
  //grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-stylus'); 
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('default', ['copy', 'stylus', 'watch', 'cssmin']);

};
