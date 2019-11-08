
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

/*require('./bootstrap');*/
require('adminbsb-materialdesign/plugins/jquery/jquery.min.js');
/*
require('adminbsb-materialdesign/plugins/bootstrap/js/bootstrap.js');
require('adminbsb-materialdesign/plugins/jquery-slimscroll/jquery.slimscroll.js');
require('adminbsb-materialdesign/plugins/bootstrap-select/js/bootstrap-select.min.js');
require('adminbsb-materialdesign/plugins/node-waves/waves.js');
require('adminbsb-materialdesign/js/demo.js');
require('adminbsb-materialdesign/js/admin.js');*/
/*mix.scripts('adminbsb-materialdesign/plugins/jquery/jquery.min.js');*/
/*mix.copy('node_modules/adminbsb-materialdesign/plugins/jquery/jquery.min.js', 'public/js/jquery');*/


window.Vue = require('vue'); 

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});


/*const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});
window.toast = toast;*/






