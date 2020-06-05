<template>
    <div>
        <div class="container" style="padding-left:15%">
            <h6 class="text-muted"><router-link to="/dashboard">Dashboard</router-link> / <router-link to="/dashboard/myProduct">My Product</router-link> / <router-link to="/dashboard/myProduct/newProduct">New Product</router-link></h6>
            <hr>
        <h1></h1>

        <div class="row shadow">
            <div class="col-12">
            <form action="" method="post" class="m-3">
                      
                            <div class="form-group">
                                    <label for="" class="text-muted">Uplaod New Product</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                       <span class="text-success input-group-text"><i class="fa fa-product"></i></span>
                                    </div>
                                    <input class="form-control" type="text" name="username" id="login-username" placeholder="Product Title" required>
                                </div>  
                            </div>
                        
                        <div class="form-group">
                                    <label for="" class="text-muted">Product Description</label>
                        <br>
                               <textarea style="border:1px solid green;" class="w-100 fomr-control" name="" id="" cols="30" rows="10"></textarea>  
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

                         <div class="form-group">
                                    <label for="" class="text-muted">Product Icon</label>

                                 <div class="input-group col-12" >
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
                            
                                    
                    
                            
                            
                        </form>
            </div>
        </div>
            <hr>
        </div>
    </div>
</template>
<script>
export default {
    
}
</script>