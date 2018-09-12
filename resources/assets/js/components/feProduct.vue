<template>
    <div> 
        <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <img :src="'http://'+url+'/'+product.img_path" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h2>{{product.product_name}}</h2>
                        <p>${{productpricemin}} - ${{productpricemax}}</p>
                        <div class="form-group">
                          <select class="form-control" v-model="selected" style="height:auto;" name="" id="">
                                <option disabled selected value="">Select one</option>
                                    <option v-for="(price,n) in productprice" :key="n" :value="price.product_price">{{price.product_pricetype}}</option>
                            </select>
                        </div>
                        <br>
                            <h1>${{selected}}</h1>
                        <a class="btn-pr">Add to Cart</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <br><br>
                        <h3 class="h5 af-l ">Description</h3>
                        <p>{{product.product_description}}</p>
                    </div>
                </div>
            </div>
    </div>
</template>

<script>
    export default {
    
    data(){
        return{
            selected:'',
            url:window.location.hostname,
        }
    },
    props:{
        product:Array,
        productprice:Array,
        productpricemax:Number,
        productpricemin:Number,
    },
    watch:{
       
    },
    computed:{
        
    },
  
    methods: {
       
        }
    }
</script>

