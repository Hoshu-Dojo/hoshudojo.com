/*
 * grunt-wp-plugins
 * https://github.com/jnweaver/grunt-wp-plugins
 *
 * Copyright (c) 2014 Nick Weaver
 * Licensed under the MIT license.
 */

'use strict';

var env = process.env,
    exec = require('child_process').exec;

module.exports = function(grunt) {

  grunt.registerMultiTask('wp_plugins', 'List Wordpress plugins using WP-CLI', function() {
    // Merge task-specific and/or target-specific options with these defaults.
    var options = this.options({
      wordpress_path: '',
      wp_cli_path: ''
    });

    var cb = this.async();

    env.PATH = options.wp_cli_path + ":" + env.PATH;

    var args = '';

    if (options.wordpress_path !== '') {
      args = " --path=" + options.wordpress_path;
    }

    var cmd = "wp plugin list" + args;

    var cp = exec(cmd, {env: env}, function (err, stdout, stderr) {
      if (stderr.indexOf("No such file or directory") > -1) {
        grunt.log.errorlns("WP-CLI's wp binary could not be found. Make sure it's installed - see http://wp-cli.org/ - and/or set the wp_cli_path option.");
        return false;
      }
      if (stderr.indexOf("This does not seem to be a WordPress install.") > -1) {
        grunt.log.errorlns("A Wordpress install was not found. Set the 'wordpress_path' option to the path of your Wordpress install relative to Gruntfile.js.");
        return false;
      }
      if (stderr) {
        grunt.log.errorlns(stderr);
        return false;
      }

      var plugin_list = stdout.split('\n'); // one line per plugin
      plugin_list.shift(); // drop header line

      formatter(plugin_list);

      cb();
    });

    var formatter = function(plugin_list){
      var sprintf = require("sprintf-js").sprintf;
      var longest_name_length = 0; // determine width needed for name column
      plugin_list.forEach(function(l){
        var name_length = l.split('\t')[0].length;
        longest_name_length = (name_length > longest_name_length) ? name_length + 2 : longest_name_length;
      });

      // row separator
      var separator = sprintf("+%'--" + (longest_name_length + 2) + "s+%'--13s+%'--14s+%'--14s+","","","","");

      // log results
      grunt.log.writeln(separator);
      grunt.log.writeln(sprintf("| %-" + longest_name_length + "s | %-11s | %-12s | %-12s |","Name","Status","Update","Version"));
      grunt.log.writeln(separator);
      plugin_list.forEach(function(l){
        var cols = l.split('\t');
        if (cols[0] !== "") {
          grunt.log.writeln(sprintf("| %-" + longest_name_length + "s | %-11s | %-12s | %-12s |", cols[0], cols[1], cols[2], cols[3]));
        }
      });
      grunt.log.writeln(separator);
    };

  });

};
