<template>
    <div>
                  <div style="z-index:3" id="loadingIcon" :class="{'d-none':toggleLoding}">
     <img src="@/assets/images/loading.gif" alt="">
     
    </div>
        <div class="container" style="padding-left:15%">
  

            <h6 class="text-muted"><router-link to="/dashboard">Dashboard</router-link> / <router-link to="/dashboard/myProduct">My Product</router-link> / <router-link to="/dashboard/myProduct/newProduct">New Product</router-link></h6>
            <hr>
        <h1></h1>

        <div class="row shadow">
            <div class="col-12">
            <form @submit.prevent="submitForm" action="" method="post" class="m-3">
                      
                            <div class="form-group">
                                    <label for="" class="text-muted">Uplaod New Product</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                       <span class="text-success input-group-text"><i class="fa fa-product"></i></span>
                                    </div>
                                    <input class="form-control" type="text" name="productTitle" id="login-username" v-model="productData.productTitle" placeholder="Product Title" required>
                                </div>  
                            </div>
                        
                        <div class="form-group">
                                    <label for="" class="text-muted">Product Description</label>
                        <br>
                        <ckeditor 
                            :editor="editor" 
                            v-model="productData.productDescription" 
                            :config="editorConfig"
                            @click ="test()"
                            >
                        </ckeditor>

                               <!-- <textarea required style="border:1px solid green;" v-model="productData.productDescription" class="w-100 fomr-control" name="productDescription" id="" cols="30" rows="10"></textarea>   -->
                         </div>

                         
                            <div class="form-group">
                                <label for="" class="text-muted">Farm product category</label>
                                <div class="form-check">
                                
                                    <label class="checkbox-inline mr-3" v-for="(product_category, index) in product_categorys" :key="index">
                                    <input required v-model="productData.productCategory" type="radio" :value="product_category.id" class="mr-2">{{product_category.category_name}}</label>
                              
                                </div>
                            </div>
                         <div class="form-group">
                             <div class="container alert alert-danger">
                                 <div class="row">
                                     <div class="col-md-12">
                                         <b>Note:</b>
                                     </div>
                                 </div>
                              <div class="row">
                                  
                                 <div class="col-md-4">Maximum File Size is 2MB</div>
                                <div class="col-md-4">File type should be an image file</div>
                                <div class="col-md-4">Maximum number of image files is Six(6)</div>
                            </div>
                       
                            </div>
                                    <label for="" class="text-muted">Product Images</label>
                                 <div class="input-group col-12" >
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input required @change="filechange" name="file[]" multiple="multiple" ref="file"  type="file" class="custom-file-input" id="inputGroupFile01"
                                            aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                           
                                        </div>
                                         
                                    </div>
                                    <br>
                                    <div class="container">
                                        <div v-if="showMessage" class="alert alert-danger" role="alert">
                                                    {{errorMessage}}
                                            </div>
                                    </div>
                                    
                            </div>
                            <div class="container">
                                <div class="form-group col-12">

                                <ul style="list-style-type:none">
                                    <li class="shadow shadow-xs p-2 rounded my-2" v-for="(attachment, index) in productData.attachments" :key="index">
                                        <span  @click="setDefault(index)"  :class="{disabled: index === disable_default_btn}" class="btn btn-danger"> Set Default</span>
                                        
                                        {{attachment.name}}
                                      <span @click="removeItem(index)" style="cursor:pointer;" class="close text-muted shadow">
                                          <span aria-hidden="true">&times;</span>
                                          </span>  
                                    </li>
                                </ul>
                            </div>
                            </div>
                            
                            <hr>
                            <div class="form-group text-center">
                                <input type="submit" class="w-50 btn btn-danger" value="Upload">
                            </div>
                        </form>
            </div>
        </div>
            <hr>
        </div>
    </div>
</template>
<script>
import firebase from 'firebase';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
export default {
    data(){
        return{
            product_categorys:[],
            productData:{
                productTitle:"",
                user_id:null,
                productDescription:"",
                product_icon:null,
                productCategory:0,
                attachments:[],
                product_id:''
            },
             editorConfig: {
                    // The configuration of the editor.
                },
            editor:ClassicEditor,
            fileType:['jpg','png','svg','jpeg','gif'],
            form:new FormData,
            showMessage:false,
            errorMessage:null,
            disable_default_btn:null,
            toggleLoding:true,
        }
    },
    methods: {
        reset(){
            this.showMessage=false;
            this.errorMessage=null;
        },
        test(){
            alert(this.productData.productDescription);
            console.log(this.productData.productDescription);
        },
            filechange(e){
                this.reset();
                let selectedFile=e.target.files;
                 
                 for (let i=0;i<selectedFile.length;i++){
                // check file type
                 let loopFileType = selectedFile[i].type;
                 loopFileType = loopFileType.split('/');
               
                if(this.fileType.indexOf(loopFileType[1]) !== -1){
                    this.reset();
                       // check file size 
                        var fileSize = selectedFile[i].size/1024/1024;
                        fileSize = fileSize.toFixed(2);
                        if(fileSize >2.00){
                            // this.productData.attachments.splice(i,1);
                            this.errorMessage = 'The size of '+selectedFile[i].name+' is '+fileSize + 'MB and it is too high, it should be less than 2MB';
                            this.showMessage=true;
                        }else{
                            this.reset();
                             
                            if (this.productData.attachments.length == 6){
                                this.errorMessage="Sorry! You can only upload maximum of Six(6) images";
                                this.showMessage=true;
                            }else{
                               
                            this.productData.attachments.push(selectedFile[i]);
                            let lastIndex = this.productData.attachments.lastIndexOf(selectedFile[i])
                            if (lastIndex == 0){
                            this.disable_default_btn =lastIndex;
                            
                            }else{
                            // this.productData.attachments[lastIndex].btnStatus = false;
                            }
                            
                            this.productData.product_icon= this.productData.attachments[0].name;
                            }
                        }
                } else{
                        this.errorMessage = 'The file '+selectedFile[i].name+' is not a valid image file it is of type '+ loopFileType[0]+"/"+loopFileType[1];
                        this.showMessage=true;
                }

                } 
            
            
            },
            removeItem(currentItem){
                this.productData.attachments.splice(currentItem,1);
            },
            setDefault(currentItem){
                this.productData.product_icon= this.productData.attachments[currentItem].name;
                this.productData.attachments[currentItem].btnStatus = true;
                this.disable_default_btn =currentItem;
            },
           resetForm(){
                this.productData.productTitle="";
                this.productData.user_id=null;
                this.productData.productDescription="";
                this.productData.product_icon=null;
                this.productData.productCategory=0;
                this.productData.attachments=[];
                this.productData.product_id='';
           },
          submitForm(){
              this.toggleLoding=false;
            let sessionData = this.$session.get('user_id');
            this.productData.user_id = sessionData.user_id;
                // this.form.append('files[' + i + ']', this.productData.attachments[i]);

                let idType = {'id_type':'product'};
                // Get product id
                this.axios.post(this.$hostname+"api.php?action=generateId",idType).then(response=>{
                    this.productData.product_id = response.data;
                       this.productData.attachments.forEach(element => {

                        // Save Images to firbase
                     return firebase.storage().ref('user/'+this.productData.user_id+'/products/'+this.productData.product_id+'/'+element.name).put(element).then(singImg=>{
                         {singImg}
                         // Retrive the url of one image
                         if (element.name == this.productData.product_icon){
                                firebase.storage().ref('user/'+this.productData.user_id+'/products/'+this.productData.product_id+'/'+this.productData.product_icon).getDownloadURL().then(imgUrl=>{
                                     this.productData.product_icon = imgUrl;

                                    //  UPLOAD OTHER PRODUCTS
                                      this.axios.post(this.$hostname+"api.php?action=new_Product_Uplaod",this.productData).then(response => {
                                    // this.$router.push("/");
                                    {response}
                                   this.resetForm();
                                    alert('Product uplaoded successfully');

                                    this.toggleLoding=true;
                                      });
                             })
                            }

                     }).catch(errr=>{
                         alert('Product fail to upload, please retry')
                          this.toggleLoding=true;
                         console.log(errr)
                         });
                    })



                    
                });
                // this.axios.post(this.$hostname+"api.php?action=new_Product_Uplaod",this.productData)
                //     .then(response => {
                //     // this.$router.push("/");
                //     let product_id = response.data;
                //     // GET FILES IN A FOLDER
                //     // var storageRef = firebase.storage().ref('user/'+sessionData.username+'/products/product__v620200615/');
                //     // // console.log(storageRef.listAll());
                //     //  storageRef.listAll().then(function(result) {
                //     //      result.items.forEach(imageList => {
                //     //          imageList.getDownloadURL().then(function(url){
                //     //              console.log(url);
                //     //          }).catch(err=>{console.log(err)})
                //     //      });
                    
                //     // }).catch(function(error) {
                //     //   console.log(error);
                //     // });
                //     // upload image
                   
                //     // for(var element in this.productData.attachments){
                //     //   firebase.storage().ref('user/'+this.productData.user_id+'/products/'+product_id+'/'+element.name).put(element);
                //     // }

                //     //    // GET JUST ONE FILE URL
                //     //      if (element.name == this.productData.product_icon){
                //     //          console.log(element.name);
                //     //          console.log(this.productData.product_icon);
                //     //              firebase.storage().ref('user/'+this.productData.user_id+'/products/'+product_id+'/'+this.productData.product_icon).getDownloadURL().then(imgUrl=>{
                //     //         return console.log(imgUrl);
                //     //          })
                //     //         }

                    
                //     this.productData.attachments.forEach(element => {

                //         // Save Images to firbase
                //      return firebase.storage().ref('user/'+this.productData.user_id+'/products/'+product_id+'/'+element.name).put(element).then(singImg=>{
                //          console.log(singImg);


                //          // Retrive the url of one image
                //          if (element.name == this.productData.product_icon){
                //              console.log(element.name);
                //              console.log(this.productData.product_icon);
                //                 firebase.storage().ref('user/'+this.productData.user_id+'/products/'+product_id+'/'+this.productData.product_icon).getDownloadURL().then(imgUrl=>{
                                     
                //            console.log(imgUrl);
                //              })
                //             }

                //      });
                //     })
                        
                             

                       
                //     //     //   completion()
                              
                    
                        
                  
                    
                      
                //     }).catch(err => {err});
       
            }, 
        

          loadProductCategory(){
           this.axios.get(this.$hostname+"api.php?action=product_category").then((response)=>{
                this.product_categorys=response.data;
            }).catch(err => {err})
            
           },
        },
        mounted(){
            this.loadProductCategory();
            
        },
        updated(){
          
          
        }
}
</script>



