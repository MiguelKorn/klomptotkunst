module.exports = function(grunt) {
  
  grunt.initConfig({
    compass: {
      dist: {
        options: {
          config: 'config.rb',
          'output-style': 'compressed'
        }
      },
      dev: {
        options: {
          config: 'config.rb',
          'output-style': 'expanded',
          watch: true
        }
      }
    },
      clean: {
        css: ['css']
      }
  });

  // Displays the elapsed execution time of grunt tasks
  require('time-grunt')(grunt);

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-clean');

  // Tasks
  grunt.registerTask('dev', ['clean:css','compass:dev']);

  grunt.registerTask('dist', ['clean:css','compass:dist']);


};