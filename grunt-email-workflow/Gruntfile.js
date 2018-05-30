module.exports = function(grunt) {

  require('load-grunt-config')(grunt, {

    // Pass data to tasks
    data: {

      // Re-usable filesystem path variables
      paths: {
        style:      grunt.option('style'),
        src:        'src',
        src_img:    'src/img',
        dist:       grunt.option('dist'),
        dist_img:   'dist/img',
        preview:    'preview'
      },

      // secrets.json is ignored in git because it contains sensitive data
      // See the README for configuration settings
      secrets: grunt.file.readJSON('secrets.json')

    }
  });
};