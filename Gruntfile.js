module.exports = function (grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    // concat - combine files to production version
    concat: {
      js: {
        // add/remove/edit files and order to project needs
        src: ['assets/js/glacier.js'],
        dest: 'assets/prod/glacier.js'
      }
    },
    //LESS
    less: {
      development: {
        options: {
          paths: ["assets/less"]
        },
        files: {
          "assets/prod/glacier.css": "assets/less/source.less"
        }
      },
      production: {
        options: {
          paths: ["assets/less"],
          cleancss: true
        },
        files: {
          "assets/prod/glacier.css": "assets/less/source.less"
        }
      }
    },
    // cssmin - minify production css file created through LESS
    cssmin: {
      css: {
          src: 'assets/prod/glacier.css',
          dest: 'assets/prod/glacier.min.css'
        }
      },
      // uglify - minify production js file created through concat
      uglify: {
      js: {
        files: {
          'assets/prod/glacier.js': ['assets/prod/glacier.js']
        }
      }
    },
    // watch - tasks triggered with [grunt watch] is initiated in the cli
    watch:{
      cssmin: {
        files: ['assets/prod/glacier.css'],
        tasks: ['cssmin']
      },
      jsconcat:{
        files:['assets/js/glacier.js'],
        tasks:['concat']
      },
      jsuglify:{
        files: ['assets/js/glacier.js'],
        tasks: ['uglify']
      },
      less:{
        files: ['assets/less/*.less'],
        tasks: ['less']
      }
    }

  });
  // load tasks from node_modules
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-less');
  // tasks that will be triggered with [grunt] in the cli
  grunt.registerTask('default', ['cssmin:css', 'concat:js', 'uglify:js','less:development']);
};
