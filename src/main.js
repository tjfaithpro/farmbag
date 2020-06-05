import Vue from 'vue'
import App from './App.vue'

import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueSession from 'vue-session'
import VueGraph from 'vue-graph'
 
Vue.use(VueGraph)
Vue.use(VueAxios, axios)
Vue.use(VueSession)

// Global Variables 

// -----variable for api
// Vue.prototype.$hostname = "http://localhost/MY_WEB_WORKS/farmbag_vue_cli/";
Vue.prototype.$hostname = 'https://farmbag.com.ng/';

// -----variable for session
Vue.prototype.$sessionPresent=false;
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

Vue.config.productionTip = false

Vue.component('app-header',Header)
Vue.component('app-navbar',Navbar)
Vue.component('app-footer',Footer)
Vue.component('side-bar',sidebar)

new Vue({
  render: h => h(App),
  router,
}).$mount('#app')
 
