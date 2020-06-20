<template>
    <div>
      
        <div id="sidebar" :class="{toggleBar:toggleBar}">
              <div class="toggle-btn" @click="toggleBar=!toggleBar">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
               
            
                <ul class="p-3 sidbar-links">
                    <router-link to="/dashboard/admin/"><li><i class="fas fa-tachometer-alt"></i><span class="ml-3">Dashboard</span></li></router-link>
                    <router-link to="/dashboard/myProduct"><li @click="menuTransition.myProduct = !menuTransition.myProduct"><i class="fas fa-shopping-basket"></i><span class="ml-3">My Product</span><span ><i class="float-right mt-1 fa fa-angle-right"></i></span></li></router-link>
                    <div class="submenu ml-3">
                        <transition name="menuTransit">
                            <div v-if="menuTransition.myProduct">
                             <router-link to="/dashboard/myProduct">
                                <li><i class="fas fa-id-badge"></i><span class="ml-3">Manage Product</span></li>
                            </router-link>
                            
                             <router-link to="/dashboard/myProduct/newProduct">
                            <li><i class="fas fa-id-badge"></i><span class="ml-3">Upload New Product</span></li>
                             </router-link>

                            </div>
                        </transition>

                    </div>
                     <router-link to="/dashboard/myClient/">
                    <li><i class="fa fa-users"></i><span class="ml-3">My Client</span></li>
                     </router-link>

                     <router-link to="/dashboard/myProfile/"> 
                    <li><i class="fas fa-id-badge"></i><span class="ml-3"> My Profile</span></li>
                     </router-link>


                  
                </ul>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            toggleBar:true,
            menuTransition:{myProfile:false, myProduct:false}
        }
    },
     beforeCreate: function () {
    if (!this.$session.exists()) {
    
    //   this.$router.push('/')
    }
  },
}
</script>