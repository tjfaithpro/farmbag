<template>
    <div>
        <div class="pageWrapper" id="farmers">
        <div class="container">
            <div class="row">
                <div class="col-md-2"  v-for="(user, index) in users" :key="index" >
                    <div class="row">
                        <div class="col-md-12">
                            <img class="card-img-top farm-icon" src="@/assets/images/tata-chemicals-eyes-fmcg-agro-business.jpg" alt="">
                            <div class="farm-footer"><h6>{{user.username}}</h6><hr>
                                Product Uploaded: &nbsp; &nbsp;{{user.total_product_upload}}
                                <!-- <a :href="'farmers/'+ user.username"> -->
                                <br><router-link :to="'farmers/'+ user.username"><button class="btn btn-white" @click="selectUser(user.user_id);  postid();" >View Farmer</button></router-link>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <router-view/>
        </div>
        </div>
 </div>
</template>
<script>
export default {
        data(){
            return{
                users:{},
                currentUser:{},
                custom_url:""
            }
        },
        methods:{
            
        
            userData(){
               this.axios.get( this.$hostname+"api.php?action=users").then((response)=>{
                this.users= response.data;
             
            }).catch(err => {err});
            },

            postid(){
                  this.axios.post(this.$hostname+"api.php?action=getUserData", this.currentUser).then(function(response){
                this.currentUser = {};
                console.log(response);
                if(response.data.error){
                    console.log(response.data.message);
                }
              
            });
            },

            selectUser(user){
            this.currentUser=user;
            
            
        }
         
        },
        created() {
        this.userData();
      }
    }
            // export default this.currentUser.username;

</script>