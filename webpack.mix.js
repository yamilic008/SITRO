const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
   mix.copy('node_modules/adminbsb-materialdesign/plugins/jquery/jquery.min.js', 'public/js/jquery');
   mix.copy('node_modules/adminbsb-materialdesign/plugins/bootstrap/js/bootstrap.js', 'public/js/bootstrap');
   mix.copy('node_modules/adminbsb-materialdesign/plugins/bootstrap-select/js/bootstrap-select.min.js', 'public/js/bootstrap-select');
   mix.copy('node_modules/adminbsb-materialdesign/plugins/jquery-slimscroll/jquery.slimscroll.js', 'public/js/jquery-slimscroll');
   mix.copy('node_modules/adminbsb-materialdesign/plugins/node-waves/waves.js', 'public/js/node-waves');
   mix.copy('node_modules/adminbsb-materialdesign/js/admin.js', 'public/js');
   mix.copy('node_modules/adminbsb-materialdesign/js/demo.js', 'public/js');
   mix.copy('node_modules/adminbsb-materialdesign/plugins/bootstrap/css/bootstrap.css', 'public/css/bootstrap');
   mix.copy('node_modules/adminbsb-materialdesign/plugins/node-waves/waves.css', 'public/css/node-waves');
   mix.copy('node_modules/adminbsb-materialdesign/plugins/animate-css/animate.css', 'public/css/animate-css');
   mix.copy('node_modules/adminbsb-materialdesign/css/style.css', 'public/css');
   mix.copy('node_modules/adminbsb-materialdesign/css/materialize.css', 'public/css');
   mix.copy('node_modules/adminbsb-materialdesign/css/themes/all-themes.css', 'public/css/themes');
   mix.copy('node_modules/adminbsb-materialdesign/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css', 'public/plugins/jquery-datatable/skin/bootstrap/css/');
   mix.copy('node_modules/adminbsb-materialdesign/plugins/jquery-datatable/jquery.dataTables.js', 'public/plugins/jquery-datatable/');
   mix.copy('node_modules/adminbsb-materialdesign/js/pages/tables/jquery-datatable.js', 'public/js/tables/');
   mix.copy('node_modules/adminbsb-materialdesign/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js', 'public/plugins/jquery-datatable/skin/bootstrap/js/');
   mix.copy('node_modules/adminbsb-materialdesign/plugins/jquery-datatable/extensions/export/buttons.flash.min.js', 'public/plugins/jquery-datatable/extensions/export');
   mix.copy('node_modules/adminbsb-materialdesign/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js', 'public/plugins/jquery-datatable/extensions/export');
   mix.copy('node_modules/adminbsb-materialdesign/plugins/jquery-validation/jquery.validate.js', 'public/plugins/jquery-validation');
   mix.copy('node_modules/adminbsb-materialdesign/plugins/dropzone/dropzone.css', 'public/plugins/dropzone');
   mix.copy('node_modules/adminbsb-materialdesign/plugins/dropzone/dropzone.js', 'public/plugins/dropzone');
   mix.copy('node_modules/adminbsb-materialdesign/plugins/bootstrap-select/js/bootstrap-select.js', 'public/plugins/select');
   mix.copy('node_modules/adminbsb-materialdesign/plugins/bootstrap-select/css/bootstrap-select.css', 'public/plugins/select');
   mix.copy('node_modules/adminbsb-materialdesign/plugins/jquery-countto/jquery.countTo.js', 'public/plugins/jquery-countto');
   mix.copy('node_modules/adminbsb-materialdesign/js/pages/ui/tooltips-popovers.js', 'public/js/pages/ui');
   mix.copy('node_modules/adminbsb-materialdesign/plugins/jquery-inputmask/jquery.inputmask.bundle.js', 'public/plugins/jquery-inputmask');
   


