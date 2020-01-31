# grunt-wp-plugins

> A Grunt wrapper for running WP-CLI to list plugins.

This convenience plugin wraps the [WP-CLI](http://wp-cli.org/) command `wp plugin list` in a grunt task. It provides a quick way for seeing the current state of your Wordpress site's plugin inventory, which is especially handy if you [manage plugins using Composer](http://composer.rarst.net/).

## Getting Started
This plugin requires Grunt `~0.4.0`

If you haven't used [Grunt](http://gruntjs.com/) before, be sure to check out the [Getting Started](http://gruntjs.com/getting-started) guide, as it explains how to create a [Gruntfile](http://gruntjs.com/sample-gruntfile) as well as install and use Grunt plugins. Once you're familiar with that process, you may install this plugin with this command:

```shell
npm install grunt-wp-plugins --save-dev
```

Once the plugin has been installed, it may be enabled inside your Gruntfile with this line of JavaScript:

```js
grunt.loadNpmTasks('grunt-wp-plugins');
```

## The "wp_plugins" task

### Overview
In your project's Gruntfile, add a section named `wp_plugins` to the data object passed into `grunt.initConfig()`.

```js
grunt.initConfig({
  wp_plugins: {
    your_target: {
      options: {
        wordpress_path: 'pubic/wp',
        wp_bin_path: 'vendor/bin' 
      }
    },
  },
});
```

### Options

#### options.wordpress_path
Type: `String`
Default value: `''`

The path, relative to Gruntfile.js, where Wordpress core file are installed.

#### options.wp_bin_path
Type: `String`
Default value: `''`

The path where your `wp` binary resides. (The process will pass your environment PATH, so you should not need to set this if you already have WP-CLI installed on your system.)

### Usage Examples

#### Default Options
A default configuration just requires an empty target to be defined.

```js
grunt.initConfig({
  wp_plugins: {
    blog: {
    }
  },
});
```

#### Custom Options
In this example, Wordpress has been installed in `public/wp` and WP-CLI is installed using Composer (which symlinks the wp binary into `vendor/bin`). 

```js
grunt.initConfig({
  wp_plugins: {
    blog: {
      options: {
        wordpress_path: 'public/wp',
        wp_bin_path: 'vendor/bin'
      }
    }
  },
});
```

## Contributing
In lieu of a formal styleguide, take care to maintain the existing coding style. 
