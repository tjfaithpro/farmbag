<template>
                  

    <div class="pageWrapper confirmation">
        <div class="container">
            <div class="row d-flex;" style="justify-content:center">
                <div class="col-md-8 bg-white mt-5 p-5">
                <div>
                    <span class="text-center">
                    <h5 class="text-success">THANK YOU FOR SIGNING UP WITH <br><span class="border-bottom"><b><i>Farmbag</i></b></span></h5>
                    <br>
                    <p class="text-danger">Please fill the form bellow, so you can upload your farm products for marketing and also for access to join our growing community of Agro business</p>
                   
                       <p> or you can <span class="text-danger"><router-link to="/login">Skipp this session</router-link> | to continue as just a user</span></p>
               
                    </span>
                 </div>
                    <hr>
                   <form action="" method="post" class="m-3" v-on:submit.prevent="submitForm">
                      <div :class="{'d-none':div1}">
                              <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                       <span class="text-success input-group-text"><i class="fas fa-address-card"></i></span>
                                    </div>
                                    <input class="form-control" type="text" name="username" id="login-username" placeholder="Business Name" required>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="" class="text-muted">Farm Address</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                       <span class="text-success input-group-text"><i class="fa fa-address-book"></i></span>
                                    </div>
                                    <textarea required class="form-control" placeholder="Farm Address" name="" id="" cols="1" rows="3"></textarea>
                                  
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label for="">Telephone</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                       <span class="text-success input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input class="form-control" type="tel" name="" id="tel"  placeholder="Business Telepone Number" required>
                                </div>
                        
                            </div>

                            <div class="form-group">
                                <label for="" class="text-muted">Farm produce category</label>
                                <div class="form-check">
                                <label class="checkbox-inline mr-3"><input type="checkbox" value="" class="mr-2">Fibres</label>
                                <label class="checkbox-inline mr-3"><input type="checkbox" value="" class="mr-2">Food</label>
                                <label class="checkbox-inline mr-3"><input type="checkbox" value="" class="mr-2">Fuels</label>
                                <label class="checkbox-inline mr-3"><input type="checkbox" value="" class="mr-2">Raw materials</label>
                                <label class="checkbox-inline mr-3"><input type="checkbox" value="" class="mr-2">Others</label>
                                
                                </div>
                            </div>
                                 <label for="" >Solial Media handles</label>

                            <div class="d-inline-flex flex-wrap">
                             <div class="form-group col-md-4 ">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                       <span class="bg-primary text-white input-group-text"><i class="fab fa-facebook"></i></span>
                                    </div>
                                    <input class="form-control" type="text" name="facebook" id="fb" placeholder="Facebook ID">
                                </div>
                                
                            </div>

                             <div class="form-group col-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                       <span class="bg-danger text-white input-group-text"><i class="fab fa-instagram"></i></span>
                                    </div>
                                    <input class="form-control" type="text" name="instagram" id="ig" placeholder="Instagram ID">
                                </div>
                                
                            </div>
        
                             <div class="form-group col-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                       <span class="bg-info text-white input-group-text"><i class="fab fa-twitter"></i></span>
                                    </div>
                                    <input class="form-control" type="text" name="twitter" id="tw" placeholder="twitter ID">
                                </div>
                                
                            </div>

                             <div class="form-group col-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                       <span class="bg-info text-white input-group-text"><i class="fas fa-globe"></i></span>
                                    </div>
                                    <input class="form-control" type="url" name="sebsite" id="tw" placeholder="Website Address">
                                </div>
                                
                            </div>

                            </div>  
                        
                           
                            </div>

                           <div :class="{'d-none':div2}">
                               <div class="row">
                               <div class="col-6 rounded" style="">
                                   <div class="form-group">
                                       <label for="">User Icon</label>
                                       <div class="text-center p-3 shadow-sm">
                                          <i class="fa fa-user" style="font-size:10vw"></i>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-6 ">
                                   
                                   <div class="input-group" style="top: 50%;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                            aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                               </div>
                               </div>
                            <hr>
                                <div class="row">
                                <div class="col-12 rounded" style="">
                                   <div class="form-group">
                                       <label for="">Cover Image</label>
                                       <div :style="{ backgroundImage: 'url(\'' + require('@/assets/images/farm-product.png') + '\')' }" style="height:30vh" class="text-center p-3 shadow-sm coverImage shadow-sm">
                                          
                                       </div>
                                   </div>
                               </div>
                                <div class="input-group col-12 my-4" >
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                            aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                      <input class="w-100 btn btn-success"  type="submit" value="Sign Up">

                            </div>

                             <div class="form-group my-4">
                                     <div class="d-flex justify-content-center">
                                        <span class="btn btn-light text-success shadow-sm" :class="{'disabled':div2}" @click="prv">PREVIOUS</span>
                                        <span class="text-muted btn btn-white">|</span>            
                                        <span class="float-right btn btn-light shadow-sm text-success" :class="{'disabled':div1}" @click="nxt">NEXT</span>
                                    </div>
                            </div>

                        </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            div1:false,
            div2:true,
            userData: [
                    {bizName:"",farmAddress:"",bizTel:""},
                    {
                        productCategory :[],
                        socialHandle:[]
                    }
                ]
        }
    },
    methods:{
        prv(){
            this.div1= false; 
            this.div2 = true;
        },
        nxt(){
            this.div1 = true;
            this.div2 = false;
        },
        sumbitData(){
              var formData = this.toFormData(this.userData);
            this.axios.post("http://localhost/my_web_works/crud-vue-php/process.php?action=fullData", formData).then((response)=>{
                this.userData = {name:"",email:"",phone:""};
                console.log(response.data);
            }).catch(err => {err});
        },
        toFormData(obj){
            var fd = new FormData();
                for(var i in obj){
                    fd.append(i,obj[i]);
            }
            return fd;
        },
    },


}
</script>