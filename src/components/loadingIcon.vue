<template>
    <div>
         <div style="z-index:3" id="loadingIcon" :class="{'d-none':toggleLoding}">
     <img src="@/assets/images/loading.gif" alt="">
     
    </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
        toggleLoding:true,
        }
    }
}
</script>