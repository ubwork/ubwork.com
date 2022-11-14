const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js").postCss(
    "resources/css/app.css",
    "public/css",
    [
        //
    ]
);

mix.js("resources/js/admin/candidate.js", "public/js/admin");
mix.js("resources/js/admin/skills.js", "public/js/admin");
mix.js("resources/js/admin/blacklist.js", "public/js/admin");
mix.js("resources/js/remove-ajax.js", "public/js");
mix.css("resources/js/client/feedback.js", "public/js");

mix.css("resources/css/client_style.css", "public/css");
