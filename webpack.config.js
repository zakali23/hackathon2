var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('web/build/')
    .setPublicPath('/web')
    .addEntry('app', './assets/js/app.js')
    .addEntry('jquery', './assets/js/style.js')
    .addEntry('style', './assets/scss/main.scss')

    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSassLoader(function(sassOptions) {}, {
              resolveUrlLoader: false});


module.exports = Encore.getWebpackConfig();
