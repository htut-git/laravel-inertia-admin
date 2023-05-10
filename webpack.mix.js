const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
      require('postcss-import'),
      require('tailwindcss'),
      require('autoprefixer'),
   ])
   .webpackConfig(require('./webpack.config'));

mix.alias({
   '@': path.join(__dirname, './resources/js'),
});
