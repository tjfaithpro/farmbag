<template>
    <div class="pageWrapper">
        <H1>welcome to dashboard</H1>
    </div>
</template>
<script>
export default {
    data(){
        return{

        }
    },
     beforeCreate: function () {
    if (!this.$session.exists()) {
        console.log
    //   this.$router.push('/')
    }
  },
}
</script>