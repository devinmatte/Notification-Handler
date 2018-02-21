module.exports = function (grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        realFavicon: {
            favicons: {
                src: './images/logo.svg',
                dest: './',
                options: {
                    iconsPath: './',
                    design: {
                        ios: {
                            pictureAspect: 'backgroundAndMargin',
                            backgroundColor: '#ffffff',
                            margin: '14%',
                            assets: {
                                ios6AndPriorIcons: false,
                                ios7AndLaterIcons: false,
                                precomposedIcons: false,
                                declareOnlyDefaultIcon: true
                            }
                        },
                        desktopBrowser: {},
                        windows: {
                            pictureAspect: 'whiteSilhouette',
                            backgroundColor: '#ff83e5',
                            onConflict: 'override',
                            assets: {
                                windows80Ie10Tile: true,
                                windows10Ie11EdgeTiles: {
                                    small: true,
                                    medium: true,
                                    big: true,
                                    rectangle: true
                                }
                            }
                        },
                        androidChrome: {
                            pictureAspect: 'noChange',
                            themeColor: '#ff83e5',
                            manifest: {
                                display: 'standalone',
                                orientation: 'notSet',
                                onConflict: 'override',
                                declared: true
                            },
                            assets: {
                                legacyIcon: true,
                                lowResolutionIcons: false
                            }
                        },
                        safariPinnedTab: {
                            pictureAspect: 'silhouette',
                            themeColor: '#ff83e5'
                        }
                    },
                    settings: {
                        scalingAlgorithm: 'Mitchell',
                        errorOnImageTooSmall: false,
                        readmeFile: false,
                        htmlCodeFile: false,
                        usePathAsIs: false
                    }
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-real-favicon');

    grunt.registerTask('default', ['realFavicon']);

};
