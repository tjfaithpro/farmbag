<template>
    <div>
        <!-- template div -->

<div class="pageWrapper"  id="farmProduct">

       
        <div id="sidebar" :class="{toggleBar:toggleBar}">
        <h6 style="text-align:center">PRODUCT CATEGORY</h6>
        <hr style="background-color:#fff">
            <div class="toggle-btn" @click="toggleBar=!toggleBar">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <ul>
                <li>All</li>
                <li v-for="(product_category, index) in product_categorys" :key="index">{{product_category.category_name}}</li>
                
            </ul>
        </div>
    
        <div class="container-fluid productList">
        <div class="row mt-4" style="display:flex; justify-content-center" >
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
        </div>

</div>




        <!-- /template div -->
    </div>
</template>


<script>
export default {
        data(){
         return{
             product_categorys:{},
             products:{},
             products_to_show:0,
            toggleBar:false,

            }
        },
        computed:{
          productComputed(){
              return this.limitProduct ? this.products.slice(0,this.limitProduct) : this.products;
              
          }
          },
        methods:{
            loadProducts(){
            this.axios.get( this.$hostname+"api.php?action=products").then((response)=>{
                this.products=response.data;
            }).catch(err => {err})
           },
            loadProductCategory(){
            this.axios.get(this.$hostname+'api.php?action=product_category').then((response)=>{
                this.product_categorys=response.data;
            }).catch(err => {err})
        },
        
        
        },
        created() {
        this.loadProducts();
       this.loadProductCategory();
       
         
      }
     
};

</script>