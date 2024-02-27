const mix = require('laravel-mix');

    mix
      .setPublicPath('public')
      .sass('resources/assets/css/style.css', 'public/css')
      .js('resources/assets/js/main.js', 'public/js')
      .copy('resources/assets/images', 'public/images');
    
mix.sass('resources/assets/css/styles.scss', 'public/css')
    .styles([
        'node_modules/bootstrap/dist/css/bootstrap.min.css',
        'resources/assets/css/styles.css',
    ], 'public/css/app.css');
mix.js('resources/assets/js/app.js', 'public/js')
    .scripts([
        'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
        'resources/assets/js/app.js',
    ], 'public/js/app.js');


    
