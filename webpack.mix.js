const mix = require('laravel-mix');

mix.postCss('resources/css/site.css', 'public/css', [
    require('autoprefixer')
]);

// mix.postCss('resources/css/colorbox.css', 'public/css');
//
// mix.postCss('resources/css/filepond.css', 'public/css');
//
// mix.postCss('resources/css/tailwind.css', 'public/css');
//
// mix.js('resources/js/app.js', 'public/js/app.js');
    // .sass('resources/assets/sass/app.scss', 'public/css/app.css');
