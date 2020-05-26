<template>
    <div class="pageWrapper authentication pt-5"> 
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-6 bg-light m-3 pt-3 shadow rounded">
                    <h4 class="text-muted text-center">USER SIGNUP</h4>
                        <form action="" method="post" class="m-3" v-on:submit.prevent="submitForm">
                      
                            <div class="form-group">
                                    <label for="" class="text-muted">Create a unique username</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                       <span class="text-success input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input v-model="username" v-on:keyup="checkUsername" class="form-control" type="text" name="username" id="login-username" placeholder="username" required>
                                </div>

                                    <span class="mt-3 text-success" v-if="status">{{usernameStatus}}</span>
                                    <span class="mt-3 text-danger" v-else>{{usernameStatus}}</span>
                            </div>

                            <div class="form-group">
                                    <label for="" class="text-danger">Minimum length is six(6) character</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                       <span class="text-success input-group-text"><i class="fa fa-key"></i></span>
                                    </div>
                                    <input v-on:keyup="confirmPasswordMTD" v-model="password" class="form-control" minlength="6" type="password" name="password" id="psd" placeholder="Password" required>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                       <span class="text-success input-group-text"><i class="fa fa-key"></i></span>
                                    </div>
                                    <input v-on:keyup="confirmPasswordMTD" v-model="confirmPassword" class="form-control" type="password" name="" id="confirmPsd" minlength="6" placeholder="Confirm your password" required>
                                </div>
                                <span v-if="passwordStatus" class="text-danger">{{passwordMsg}}</span>
                                <span v-else class="text-success">{{passwordMsg}}</span>
                            </div>

                             <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                       <span class="text-success input-group-text"><i class="fa fa-envelope-open-text"></i></span>
                                    </div>
                                    <input v-on:keyup="checkEmail" v-model="email" class="form-control" type="email" name="email" id="email" placeholder="Email" required>
                                </div>
                                 <span class="mt-3 text-success" v-if="eStatus">{{emailStatus}}</span>
                                <span class="mt-3 text-danger" v-else>{{emailStatus}}</span>
                            </div>
                                    
                        <hr>
                            <div class="form-group">
                                        <span class="ml-5 btn btn-white "><router-link class="text-success" to="/login">Login</router-link></span>
                                        <span class="text-muted ml-4">|</span>
                                      <input class="float-right btn btn-success w-50" :disabled="buttonStatus" type="submit" value="Sign Up">
                                    
                                
                                
                            </div>
                            
                        </form>
                        <div class="row mt-5 mb-5">
                            <div class="col-6">
                                <button class="shadow btn btn-white text-danger border border-danger"><i class="mr-3 fab fa-google"></i>SIGNUP WITH GOOGLE</button>
                            </div>
                            <div class="col-6 text-right">
                                 <button class="shadow btn btn-white text-primary border border-primary"><i class="mr-3 fab fa-facebook"></i>SIGNUP WITH FACEBOOK</button>
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
            username:'',
            usernameStatus:'',
            status:false,

            confirmPassword:'',
            password:'',
            passwordMsg:'',
            passwordStatus:false,

            email:'',
            emailStatus:'',
            eStatus:false,

            buttonStatus:true,
        }
    },
    methods:{
        checkUsername(){
       
            this.axios.post(this.$hostname+"api.php?action=checkUsername",{
                username:this.username,
            }).then((response)=>{
                if (this.username ==''){
                    this.usernameStatus='';
                }else{
                if (response.data == 1){
                    this.buttonStatus=false,
                this.usernameStatus='Great Username is available';
                this.status= true;
                }else if(response.data == 10){
                    this.buttonStatus=true,
                    this.usernameStatus ='Opps sorry user with this username exist';
                    this.status = false;
                }
                }
            }).catch(err => {err})
           },
           checkEmail(){
                this.axios.post(this.$hostname+"api.php?action=checkEmail",{
                email:this.email,
                }).then((response)=>{
                if (this.email ==''){
                    this.emailStatus='';
                }else{
                if (response.data == 2){
                this.buttonStatus=false;
                this.emailStatus='';
                this.estatus= true;
                }else if(response.data == 20){
                    this.buttonStatus=true,
                    this.emailStatus ='Opps sorry user with this email exist';
                    this.estatus = false;
                }
                }
            }).catch(err => {err})
           },
           confirmPasswordMTD(){
               if(this.confirmPassword != this.password){
                   this.passwordMsg ='Password does not match';
                   this.passwordStatus=true
                    this.buttonStatus=true;
               }else{
                    this.buttonStatus=false;
                   this.passwordMsg ='Password match';
                   this.passwordStatus=false;

               }
           },

            // Submit form
            submitForm(){
           
            this.axios.post(this.$hostname+"api.php?action=signUp", 
            {
                username:this.username, 
                password:this.password, 
                email:this.email
            
            }).then((response)=>{
                // let status = response.data;
                if (response.data == 'saved'){
                   this.$router.push({ name: "confirm"});
                    // this.$router.push('confirm');
                }else{
                alert('oops sorry an error occured, try registering again');

                //    this.$router.push({ name: "confirm"});

                }

                // console.log(status);
            }).catch(err => {err});
        },

        // Form Data
          toFormData(obj){
            var fd = new FormData();
                for(var i in obj){
                    fd.append(i,obj[i]);
            }
            return fd;
        },

        resetForm(){
            
        }

    }
}
</script>
