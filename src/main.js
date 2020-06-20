import Vue from 'vue'
import App from './App.vue'

import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueSession from 'vue-session'
import VueGraph from 'vue-graph'
import firebase from 'firebase'
import 'firebase/firestore'
import CKEditor from '@ckeditor/ckeditor5-vue';


Vue.use(VueGraph)
Vue.use(VueAxios, axios)
Vue.use(VueSession)
Vue.use(CKEditor)


// Global Variables 
// -----firebase configuration
 // Your web app's Firebase configuration
// Initialize Firebase
firebase.initializeApp({
  apiKey: "AIzaSyCrEi2Y4GBYM17VDwObK4i8qrseeDs8XVA",
  authDomain: "farmbag.firebaseapp.com",
  databaseURL: "https://farmbag.firebaseio.com",
  projectId: "farmbag",
  storageBucket: "farmbag.appspot.com",
  messagingSenderId: "894667240573",
  appId: "1:894667240573:web:ce4cbd3e16f8162b05ed14",
  measurementId: "G-FQXCM0L6PL"
});



// GLOBAL VARIABLE
// loading icon variable 
Vue.prototype.$toggleLoding=true,
// -----variable for api
// Vue.prototype.$hostname = "http://localhost/MY_WEB_WORKS/farmbag_vue_cli/";
Vue.prototype.$hostname = 'https://farmbag.com.ng/';

// Include jQuery
window.$ = window.jQuery = require("jquery");
window.$ = require('jquery') 
// window.JQuery = require('jquery')

// import styles
import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'

// required internal file
require('@/assets/css/style.css') 
require('@/assets/css/animate.min.css')

// Import components
import Header from './components/header.vue'
import Navbar from './components/navbar.vue'
import Footer from './components/footer.vue'
import sidebar from './components/sidebar.vue'
import loadingIcon from './components/loadingIcon.vue'

// Vue.config.productionTip = false
// const navbar = Vue.prototype.$navbar = new Vue(Navbar).$mount()
// document.body.appendChild(navbar)
Vue.component('app-header',Header)
Vue.component('app-navbar',Navbar)
Vue.component('app-footer',Footer)
Vue.component('side-bar',sidebar)
Vue.component('loading-icon',loadingIcon)

new Vue({
  render: h => h(App),
  router,
}).$mount('#app')