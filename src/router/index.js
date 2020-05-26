import Vue from 'vue'
import VueRouter from 'vue-router'

// Importing pages
import Home from '../views/Home.vue'
import farmProducts from '../views/farmProducts.vue'
import farmers from '../views/farmers.vue'
import agroBusiness from '../views/agrobusiness.vue'
import login from '../views/login.vue'
import signup from '../views/signup.vue'

// -----dashboard pages
import dashboardHome from '../views/dashboard/index.vue'

//Importing components
import indFarm from '../components/individualFarmer.vue'
import confirmSignUp from '../components/confirmation.vue'
 
Vue.use(VueRouter)

  const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },

  {
    path:'/farmProducts',
    name:'FarmProducts',
    component:farmProducts
  },
  {
    path:'/farmers',
    name:'farmers',
    component:farmers
  },
  {
    path:'/agroBusiness',
    name:'agroBusiness',
    component:agroBusiness
  },
  {
    path:'/login',
    name:'login',
    component:login
  },
  {
    path:'/signup',
    name:'signup',
    component:signup
  },
  {
    path: '/about',
    name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  },
  // Dashboard routes
  {
    path:'/dashboard/',
    name:'dashboardIndex',
    component:dashboardHome,
  },

  // Components routes
  {
    path:'/indFarm',
    name:'indFarm',
    component:indFarm
  },
  {
    path:'/confirmSignUp',
    name:'confirm',
    component:confirmSignUp
  },
  // { path: '*', redirect: '/404', } 
]

const router = new VueRouter({
  routes,
  mode: 'history'
})

export default router
