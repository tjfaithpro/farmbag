
import Vue from 'vue'
import App from './App.vue'
// import dashboard from './dashboard.vue'
import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueSession from 'vue-session'

Vue.use(VueAxios, axios)
Vue.use(VueSession)

// export const bus = new Vue();
Vue.prototype.$hostname = 'http://localhost/MY_WEB_WORKS/farmbag_vue_cli/';
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

Vue.config.productionTip = false
Vue.component('app-header',Header)
Vue.component('app-navbar',Navbar)
Vue.component('app-footer',Footer)
new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
 
// new Vue({
//   router,
//   render:h=>h(dashboard)
// }).$mount('#app-dashboard')