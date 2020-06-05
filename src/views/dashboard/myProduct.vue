<template>
    <div>
        <div class="container" style="padding-left:7em">
          <div class="row mt-4 pl-5 text-center d-flex" style="justify-content:center">
            <div class="col-7 input-group">
               
                    <input type="text" name="" id="" class="form-control" required>
                  <div class="input-group-prepend">
                  <button type="submit" class="btn btn-transparent text-success input-group-text">
                    <i class="fa fa-search"></i>
                    </button>
                 </div>
            </div>
            
          </div>
          
            <div class="row mt-4" style="display:flex; justify-content-center" >
                       <!-- PRODUCT POST CARD -->
                       <div class="mb-4 d-flex" style="justify-content:center;" v-for="(product, index) in productComputed" :key="index.id">
                       <div class="col-md-2 mb-4" v-if="products_to_show==product.category_id | products_to_show == 0" >
                       <a href="#" style="text-decoration:none; color:black" >
                            <div class="card" style="width: 15rem;">
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
</template>
<script>
export default {
    data(){
        return{
          product_categorys:{},
          products:{},
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
            this.axios.post( this.$hostname+"api.php?action=inidvidual_products",{
              userId:this.$session.get('user_id'),
            }).then((response)=>{
                this.products=response.data;
                console.log(response.data);
        }).catch(err => {err})
    }
  },
  created(){
    this.loadProducts();
  }
}
</script>