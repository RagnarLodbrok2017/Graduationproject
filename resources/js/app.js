
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


//import components
import UserComponent from "./components/AdminDashboard/Users/Users.vue";
import UserProfileComponent from "./components/AdminDashboard/Users/Profile.vue";


// const routes = [
//     { path: '/user', component: User, name: 'UserList' },
//     { path: '/bar', component: Bar }
// ];
// const router = new VueRouter({ mode: 'history'});
const app = new Vue({
    el: "#app",
    components: {
        "user-component": UserComponent,
        "user-profile": UserProfileComponent,
    }
});
