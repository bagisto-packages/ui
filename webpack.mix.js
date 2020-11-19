const mix = require("laravel-mix");

require("laravel-mix-merge-manifest");

const publicPath = mix.inProduction() ? 'publishable/assets' : "../../../public/vendor/packages/ui/assets";

mix.disableNotifications();
mix.setPublicPath(publicPath).mergeManifest();

mix.inProduction()

mix
    .js([__dirname + "/src/resources/assets/js/app.js", __dirname + "/src/resources/assets/js/dropdown.js"], "js/ui.js")
    .copy(__dirname + "/src/resources/assets/images", publicPath + "/images")
    .sass(__dirname + "/src/resources/assets/sass/app.scss", "css/ui.css")
    .options({
        processCssUrls: false
    });

if (!mix.inProduction()) {
    mix.sourceMaps();
}

if (mix.inProduction()) {
    mix.version();
}
