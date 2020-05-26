
<template>
    <div id="index">
           <div class="carousel-caption scrollDown">
                 <i class="animated pulse fa fa-angle-double-down arrow-down" style="font-size:10vh"></i>
          </div>
          <div id="sliderImage" class="carousel slide carousel-animation bg-dark" data-ride="carousel">
              
              <div class="carousel-inner">
                  <div class="carousel-item active" :style="{ backgroundImage: 'url(\'' + require('@/assets/images/slider/img2.jpg') + '\')' } "> 
                          <div class="overlay">
                                  <div class="caption-text d-md-block">
                                      <!-- <img src="@/assets/images/slider/img2.jpg" alt="dddd"> -->
                                      <h1 class="el1 animated bounceInDown">WELCOME TO FARMBAG</h1>
                                      <h3 class="el2 animated flipInY">GET ONLINE MEET EXPERTS AND PROMOTE YOUR BUSINESS</h3>
                                      <p class="el3 animated slideInUp">HERE ON OUR PLATFORM</p>
                                      <button class="el4 btn btn-success animated zoomInLeft">SIGN UP AND UPDATE </button>
                                  </div>
                          </div>

                  
                  </div>
                  <div class="carousel-item" :style="{ backgroundImage: 'url(\'' + require('@/assets/images/slider/img1.jpg') + '\')' } ">
                   <div class="overlay">
                        <div class="caption-text d-md-block">
                                      <h1 class="el1 animated bounceInDown">ARE YOU A FARMER!</h1>
                                      <h3 class="el2 animated flipInY">PUSH YOUR PRODUCT TO THE NEXT LEVEL</h3>
                                      <p class="el3 animated slideInUp">IN JUST THREE STEPS</p>
                                      <button class="el4 btn btn-success animated zoomInLeft">SIGN UP AND UPDATE </button>
                                  </div>
                   </div>
                  </div>
                  <div class="carousel-item" :style="{ backgroundImage: 'url(\'' + require('@/assets/images/slider/img3.jpg') + '\')' } ">
                   <div class="overlay">
                       <div class="caption-text d-md-block">
                                      <h1 class="el1 animated bounceInDown">GET INVLOLVED! JOIN!</h1>
                                      <h3 class="el2 animated flipInY">AGRICULTURAL EXPERTS AND PROFESSIONALS</h3>
                                      <p class="el3 animated slideInUp">WITH A CLICK AWAY</p>
                                      <button class="el4 btn btn-success animated zoomInLeft">GET IN</button>
                                  </div>
                   </div>
                  
                  </div>
                          <div class="carousel-item" :style="{ backgroundImage: 'url(\'' + require('@/assets/images/slider/img4.jpg') + '\')' } ">
                   <div class="overlay">
                       <div class="caption-text d-md-block">
                                      <h1 class="el1 animated bounceInDown">GET INVLOLVED! JOIN!</h1>
                                      <h3 class="el2 animated flipInY">AGRICULTURAL EXPERTS AND PROFESSIONALS</h3>
                                      <p class="el3 animated slideInUp">WITH A CLICK AWAY</p>
                                      <button class="el4 btn btn-success animated zoomInLeft">GET IN</button>
                                  </div>
                   </div>
                  
                  </div>
              </div>
              
          </div>

           <div class="main">
           
          <div class="page">
              <div class="container">
              <div class="row">

                      <div class="col-md-4 mb-4 d-flex justify-content-center">
                          <a href="#" style="text-decoration:none">
                         <div class="card" style="width: 18rem;">
                              <img class="card-img-top" src="@/assets/images/farm-product.png" alt="Card image cap">
                              <div class="card-body">
                                  <h5 class="card-title">UPLOAD PICTURS OF FARM PRODUCTS</h5>
                              </div>
                      </div>
                      </a>
                      </div>
                      <div class="col-md-4 mb-4 d-flex justify-content-center">
                          <a href="#" style="text-decoration:none">
                          <div class="card" style="width: 18rem;">
                              <img class="card-img-top" src="@/assets/images/tata-chemicals-eyes-fmcg-agro-business.jpg" alt="Card image cap">
                              <div class="card-body">
                                  <h5 class="card-title">JOIN AN AGROBUSINESS</h5>
                              </div>
                      </div>
                      </a>
                      </div>
                      <div class="col-md-4 mb-4 d-flex justify-content-center">
                          <a href="#" style="text-decoration:none">
                          <div class="card" style="width: 18rem;">
                              <img class="card-img-top" src="@/assets/images/two-young-farmers-shake-hands-background-soil-spring_78774-21.jpg" alt="Card image cap">
                              <div class="card-body">
                                  <h5 class="card-title">FARMERS CONTACT</h5>
                              </div>
                      </div>
                          </a>
                      </div>
                
              </div>
          </div>
          </div>

               <!-- CURRENT POST SECTION -->
         <div class="postSection">
             <div class="container">
                 <div class="row">
                     <div class="col-md-6">
                         <div class="heading"><h3>Recent Products</h3></div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-group">
                         
                              <select id="product_category" class="form-control" v-model="product_categorys.id" @change="selectCategory($event)">
                                  <option value="0" selected>All</option>
                              <option v-for="(product_category, index) in product_categorys" :key="index.id" :value="product_category.id">{{product_category.category_name}}</option>
                              
                              </select> 
                          </div>
                     </div>
                 </div>
                 <div class="row mt-4">
                       <!-- PRODUCT POST CARD -->
                       <div class="mb-4 d-flex" style="justify-content:center;" v-for="(product, index) in productComputed" :key="index.id">
                       <div class="col-md-4 mb-4" v-if="products_to_show==product.category_id | products_to_show == 0" >
                       <a href="#" style="text-decoration:none; color:black" >
                            <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="@/assets/images/two-young-farmers-shake-hands-background-soil-spring_78774-21.jpg" alt="Card image cap">
                            <h4 class="card-title mt-3">{{product.product_title}}</h4>
                            <div class="card-body">
                            <h5 class="card-text">
                            <h6 class="text-muted">Product Description</h6>
                            <div v-if="product.product_discription.length<100">{{ product.product_discription }}</div>
                            <div v-else>{{ product.product_discription.substring(0,100)+" ..." }}</div>
                            </h5>
                            </div>
                            <div class="card-footer w-100 text-muted">
                                    <ul class="list-inline text-center">
                                        <li class="list-inline-item"><a href="#"><i class="fas fas-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fas fa-facebook"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fa fa-phone"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fa fa-thumbs-up"><span class="ml-1">{{product.product_likes}}</span></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fa fa-eye"><span class="ml-1">{{product.total_view}}</span></i></a></li>
                                    </ul>
                                </div>
                            </div>
                       </a>
                       </div>
                     </div>

                 </div>
                 <div class="row">
                     <div class="col-md-12 text-center">
                         <button class="btn btn-dark p-2">VIEW ALL</button>
                     </div>
                 </div>
             </div>
         </div>

           </div>
           <!-- END OF MAIN -->

</div>

</template>

<script scope>
import $ from 'jquery'

export default {
    data(){
              return{
                products:[],
                 limitProduct:9,
                 product_categorys:{
                     id:0,
                 },
                 products_to_show:0,
              }
          },
           computed:{
          productComputed(){
              return this.limitProduct ? this.products.slice(0,this.limitProduct) : this.products;
              
          }
          },
           methods:{
           loadProducts(){
            console.log(this.$hostname);
            this.axios.get(this.$hostname+"api.php?action=products").then((response)=>{
                this.products=response.data;
                // console.log(response.data);
            }).catch(err => {console.log(err)})
           },
           loadProductCategory(){
           this.axios.get(this.$hostname+"api.php?action=product_category").then((response)=>{
                this.product_categorys=response.data;
                // console.log(response.data);
            }).catch(err => {console.log(err)})
            
           },
           selectCategory(event){
              this.products_to_show=event.target.value;
           }
       },
       created() {
           $(document).ready(function(){
            $('.navbar').removeClass('navbar-light bg-white');
            $('.footer').addClass('d-none');
            // JS CODE FOR SCROLLING
                $(window).scroll(function(){
                var winOffset = document.documentElement.scrollTop || document.body.scrollTop;
                if(winOffset>50){
                    $('.navbar').addClass('fadeIn navbar-light bg-white');
                    $('.footer').removeClass('d-none');

                }else{
                    $('.navbar').removeClass('fadeIn navbar-light bg-white');

                }
                });

                $('.arrow-down').click(function(){
                    $('.main').fadeIn();
                    $('html,body').animate({
                    scrollTop: $(".page").offset().top
                    },2000);
                });
                //   END OF JS CODE FOR SCROLLING 
                // END OF JAVASCRIPT CODE
            });


        this.loadProducts();
       this.loadProductCategory();
       
         
      },
      destroyed(){
        $('.navbar').addClass('navbar-light bg-white');

      }
      
      
}
</script>

