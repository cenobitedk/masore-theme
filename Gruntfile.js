module.exports = function(grunt) {

  grunt.initConfig({
    less: {
      default: {
        options: {
          paths: ['src/less'],
          compress: true
        },
        files: {
          'assets/main.css': 'src/less/main.less'
        }
      }
    },
    postcss: {
        options: {
            parser: require('postcss-less-engine').parser,
            processors: [
                require('postcss-less-engine')({ /* Less.js options */ })
            ]
        },
        dist: {
            src: 'css/*.css'
        }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-postcss');

  grunt.registerTask('default', [
    'less'
  ]);
};
