<template>
    <div class="pageWrapper">
      <side-bar></side-bar>
      
        <router-view></router-view>     
    
    </div>
</template>
<script>
export default {
    data(){
      return{

      }
    },
    mounted(){
      if (!this.$session.exists()) {
                this.sessionPresent=false;
                this.$router.push('/login').catch(err => {err})
      }
    }
}
</script>