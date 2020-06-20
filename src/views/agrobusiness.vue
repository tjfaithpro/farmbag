<template>
    <div class="pageWrapper">
       
        <h1 style="text-align:center">OOPS! Sorry this page is under construction</h1>
    </div>
</template>
<script>
export default {
    data(){
        return{
            
        }
    },
    methods:{
        setSession(){
            let da ='this is a new data';
             this.$session.start();
                this.$session.set('user_id', da);
        }
    },
    mounted(){
        this.setSession();
    }
}
</script>