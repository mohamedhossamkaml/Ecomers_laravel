
// import Elementcomponents from './components/ElementComponents'
// Vue.component('spinner', require('vue-spinner/src/PulseLoader.vue'));
// import Spinner from 'vue-simple-spinner'
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('../sass/app.scss');

window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)
Vue.prototype.$host_url = "http://localhost/new_laravel/public/";

import home from './style/HomeComponents'
import routes from './routes'

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
});

// new Vue({
//     router,
//     render: h => h(home)
// }).$mount('#user')


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Swal from 'sweetalert2'
window.Swal = Swal
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
window.Toast = Toast

Vue.component('elements', require('./components/ElementComponents.vue'));

// const apps = new Vue({
//     el: '#apps',

// });
