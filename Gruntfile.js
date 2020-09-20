'use strict';

module.exports = function( grunt ) {
	const matchdep = require( 'matchdep' );
	const sass     = require( 'node-sass' );

	grunt.initConfig(
		{
			pkg: grunt.file.readJSON( 'package.json' ),
			sass: {
				dist: {
					files: {
						'style.css': 'src/sass/style.scss',
					},
				},
				options: {
					implementation: sass,
					sourceMap: false,
					indentType: 'tab',
					indentWidth: 1,
				},
			},
			svgstore: {
				dist: {
					options: {
						includeTitleElement: false,
						cleanup: [ 'id', 'style', 'fill', 'stroke' ],
						prefix: 'icon-',
						svg: {
							style: 'position: absolute; width: 0; height: 0; overflow: hidden;',
						},
					},
					files: {
						'images/icons.svg': [ 'src/icons/**/*.svg' ],
					},
				},
			},
		}
	);

	matchdep.filterDev( 'grunt-*' ).map( grunt.loadNpmTasks );

	grunt.registerTask( 'default', [ 'sass', 'svgstore' ] );
};