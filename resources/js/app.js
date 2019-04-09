
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



import Vue from 'vue'
import BootstrapVue from "bootstrap-vue"
// import App from './App.vue'
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap-vue/dist/bootstrap-vue.css"
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import VueRouter from 'vue-router'
import VueAxios from "vue-axios";
import axios from "axios";
import VueResource from 'vue-resource';

// window.Vue = require('vue').default;
// window.VueRouter = require('vue-router').default;
// window.Axios = require('axios').default;
window.Vue = Vue;

Vue.use(BootstrapVue, VueRouter, axios, VueAxios, VueResource);
// Vue.use(VueRouter);

require('./bootstrap');
// Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
// Vue.http.options.emulateJSON = true;
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('User', require('./components/Users/Users.vue'));
// import user from'./components/Users/Users.vue'
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//import components
import UserComponent from "./components/AdminDashboard/Users/Users.vue";


// const routes = [
//     { path: '/user', component: User, name: 'UserList' },
//     { path: '/bar', component: Bar }
// ];
// const router = new VueRouter({ mode: 'history'});
const app = new Vue({
    el: "#app",
    components: {
        "user-component": UserComponent,
    }
});
