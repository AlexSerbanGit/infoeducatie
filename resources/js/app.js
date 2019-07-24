/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// import Vue from 'vue'
// import VueRouter from 'vue-router'
//
// Vue.use(VueRouter)

Vue.component('scanner-component', require('./components/ScannerComponent.vue').default);
Vue.component('autocomplete-component', require('./components/AutocompleteComponent.vue').default);
Vue.component('user-login-register-component', require('./components/UserLoginRegisterComponent.vue').default);

// const router = new VueRouter({
//   routes: [
//     {
//       path: '/home',
//       component: require('./components/UserHomeComponent.vue')
//     }
//   ]
// })

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
    // router
});
