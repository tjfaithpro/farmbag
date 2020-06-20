<template>
    <div class="pageWrapper authentication pt-5">
    
  <div id="loadingIcon" :class="{'d-none':toggleLoding}">
     <img src="@/assets/images/loading.gif" alt="">
 </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-6 bg-light m-3 pt-3 shadow rounded">
                    <h4 class="text-muted text-center">USER LOGIN</h4>
                        <form action="" method="post" class="m-3"  v-on:submit.prevent="login">
                            <div class="form-group">
                                <label for="" class="text-success">Username <span class="text-danger">{{usernameError}}</span></label>
                                <input v-model="username" type="text" name="" id="" :class="{eorrForm:usernameError}" class="form-control" placeholder="Username or Email" required>
                            </div>

                             <div class="form-group">
                                <label for="" class="text-success">Password <span class="text-danger">{{passwordError}}</span></label>
                                <input v-model="password" type="password" name="" id="" :class="{eorrForm:passwordError}" class="form-control" placeholder="Password" required>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6"> <input type="checkbox" name="" id="" class=""><span class="text-muted ml-2">Keep me sign in</span>
                                </div>
                                <div class="col-6 text-right"> 
                                 <a href="#" class="text-danger">Frogotten Login Details</a>
                                </div>
                             </div>
                            </div>
                            
                           
                               
                            
                        <hr>
                            <div class="form-group">
                               
                                    <input class="btn btn-success w-50" type="submit" value="Login"><span class="text-muted ml-5">|</span>
                                    <span class="ml-5 btn btn-white "><router-link class="text-success" to="/signup">Sign up</router-link></span>
                                
                                
                            </div>
                        </form>
                        <div class="row mt-5 mb-5">
                            <div class="col-6">
                                <button class="shadow btn btn-white text-danger border border-danger"><i class="mr-3 fab fa-google"></i>LOGIN WITH GOOGLE</button>
                            </div>
                            <div class="col-6 text-right">
                                 <button class="shadow btn btn-white text-primary border border-primary"><i class="mr-3 fab fa-facebook"></i>LOGIN WITH FACEBOOK</button>
                            </div>
                            

                            
                        </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            username:"",
            password:"",
            usernameError:"",
            passwordError:"",
           toggleLoding:true,
           
        }
    },
    methods:{
        login(){
            this.toggleLoding =false;
            this.usernameError="";
             this.passwordError="";
            this.axios.post(this.$hostname+"api.php?action=login",{
                username:this.username, password:this.password
            }).then((response)=>{
            if(response.data.non_data){
                 this.toggleLoding =true;
                this.usernameError= ' | ' + response.data.non_data;
            }else if(response.data.incorrect_password){
                 this.toggleLoding =true;
                this.passwordError= ' | ' + response.data.incorrect_password;
            }else{
            
            this.toggleLoding =false;
                this.usernameError="";
                this.passwordError="";
                var da = response.data[0];
                this.$session.start();
                this.$session.set('user_id', da);
                this.$router.push({path: "/dashboard/"});
                this.$router.go();
                this.toggleLoding = true;
            }
            })
        }
    },
   
}
</script>