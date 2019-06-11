
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
import Multiselect from 'vue-multiselect';

Vue.component('multiselect', Multiselect);

// window.Vue = require('vue').default;
// window.VueRouter = require('vue-router').default;
// window.Axios = require('axios').default;
window.Vue = Vue;

Vue.use(BootstrapVue, VueRouter, axios, VueAxios, VueResource);
// Vue.use(VueRouter);

require('./bootstrap');
// Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
// Vue.http.options.emulateJSON = true;


//import components of Admin panel
import UserComponent from "./components/AdminDashboard/Users/Users.vue";
import UserProfileComponent from "./components/AdminDashboard/Users/Profile.vue";
import AnyUserProfileComponent from "./components/AdminDashboard/Users/AnyUserProfile.vue";
import PostComponent from "./components/AdminDashboard/Posts/Posts.vue";
import CategoryComponent from "./components/AdminDashboard/Category/Category.vue";
import HistoryComponent from "./components/AdminDashboard/History/History.vue";
//import components of User panel
import HomeComponent from "./components/UserDashboard/Home.vue";
import UserFavouriteComponent from "./components/UserDashboard/Favourite/Favourite.vue";
import UserPanelProfileComponent from "./components/UserDashboard/Users/AnyUserProfile";
import UserPanelPostProfileComponent from "./components/UserDashboard/Posts/Profile.vue";

// const routes = [
//     { path: '/user', component: User, name: 'UserList' },
//     { path: '/bar', component: Bar }
// ];
// const router = new VueRouter({ mode: 'history'});
const app = new Vue({
    el: "#app",
    components: {
        //Admin Panel Components
        "user-component": UserComponent,
        "user-profile": UserProfileComponent,
        "any-user-profile": AnyUserProfileComponent,
        "post-component": PostComponent,
        "category-component": CategoryComponent,
        "history-component": HistoryComponent,
    //    UserPanel Components
        "home-user-component": HomeComponent,
        "favourite-user-component": UserFavouriteComponent,
        "user-profile-component": UserPanelProfileComponent,
        "post-userpanel-profile": UserPanelPostProfileComponent,


    }
});

