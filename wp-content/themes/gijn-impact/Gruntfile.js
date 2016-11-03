module.exports = function(grunt) {
  'use strict';

  // Load all tasks
  require('load-grunt-tasks')(grunt);
  // Show elapsed time
  require('time-grunt')(grunt);

  // Force use of Unix newlines
  grunt.util.linefeed = '\n';

  // Find what the current theme's directory is, relative to the WordPress root
  var path = process.cwd().replace(/^[\s\S]+\/wp-content/, "\/wp-content");

  var cssLessFiles = {
    'style.css': 'less/style.less',
    'homepages/assets/css/gijn.css': 'homepages/assets/less/gijn.less',
  };

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    less: {
      compile: {
        options: {
          paths: ['less', '../largo-dev/less/inc'],
          sourceMap: true,
          outputSourceFiles: true,
          sourceMapBasepath: path,
        },
        files: cssLessFiles
      }
    },

    watch: {
      less: {
        files: [
          'less/**/*.less',
          'homepages/assets/less/*.less',
          'homepages/assets/less/**/*.less',
        ],
        tasks: [
          'less:compile',
        ]
      },
    },
  });
}
