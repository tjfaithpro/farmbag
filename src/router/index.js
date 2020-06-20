import Vue from 'vue'
import VueRouter from 'vue-router'

// Importing pages
import Home from '../views/Home.vue'
import farmProducts from '../views/farmProducts.vue'
import farmers from '../views/farmers.vue'
import agroBusiness from '../views/agrobusiness.vue'
import login from '../views/login.vue'
import signup from '../views/signup.vue'
import page404 from '../views/404.vue'

// Importing Dashboard
import dashboard_layout from '../views/dashboard/layout.vue'
import dashboard_index from '../views/dashboard/index.vue'
import dashboard_myCLient from '../views/dashboard/myClient.vue'
import dashboard_myProduct from '../views/dashboard/myProduct.vue'
import dashboard_newProduct from '../views/dashboard/newProduct.vue'
import dashboard_myProfile from '../views/dashboard/myProfile.vue'


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
    component:agroBusiness,
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
 
  },
  
  // Dashboard Routes
  {
    path:'/dashboard/',
    component:dashboard_layout,
    children:[
      {
        path:'/dashboard/',
        name:'dashboardIndex',
        component:dashboard_index,
      },
      {
        path:'/dashboard/myCLient',
        component:dashboard_myCLient,
      },
      {
        path:'/dashboard/myProduct',
        component:dashboard_myProduct,
      },
      {
        path:'/dashboard/myProduct/newProduct',
        component:dashboard_newProduct,
      },
      {
        path:'/dashboard/myProfile',
        component:dashboard_myProfile,
      }
    ]
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
  { 
    path: '*', 
    component: page404 
  }
]

const router = new VueRouter({
  mode: 'history',
  routes
})



export default router