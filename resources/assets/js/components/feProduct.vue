<template>
    <div> 
        <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <img :src="siteurl+'/'+product.img_path" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h2>{{product.product_name}}</h2>
                        <p>${{productpricemin}} - ${{productpricemax}}</p>
                        <div class="form-group">
                          <select class="form-control" v-model="selected" style="height:auto;" name="" id="">
                                <option disabled selected value="">Select one</option>
                                    <option v-for="(price,n) in productprice" :key="n" :data-id="price.id" :value="n">{{price.product_pricetype}}</option>
                            </select>
                        </div>
                        <br>
                            <h1 v-show="selectedcheck">${{currentprice}}</h1>
                        <div v-if="paymentType">
                            <a :href="siteurl+'/monthly-plan-checkout/'+product.id+'/'+price_id" class="btn-pr">Apply for Monthly Payment</a>
                            <p>The billing contract will be for 12 months. You will be charged ${{currentprice}}/month for the next 12 months.</p>
                        </div>
                        <div v-else>
                            <a :href="siteurl+'/add-to-carts/'+product.id+'/'+price_id" v-show="selectedcheck" @click="carts" class="btn-pr">Add to Cart</a>
                        </div>

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
            price:{
                value:'',
                id:''  ,
            },
        }
    },
    props:{
        product:Object,
        productprice:Array,
        productpricemax:Number,
        productpricemin:Number,
        siteurl:String,
    },
    watch:{
       
    },
    computed:{
        selectedcheck(){
            if(this.productprice[this.selected]){

                return true;
            }
            else{
                return false;
            }
        },
        currentprice(){
            if(this.selectedcheck){
            this.price.value = this.productprice[this.selected].product_price;
            this.price.id = this.productprice[this.selected].id;
            console.log(this.price.value);
            return this.price.value;
            }
            else{
                return 0;
            }
        },
        paymentType(){
            if(this.selectedcheck){
                if(this.productprice[this.selected].product_payment_type == 'Monthly'){
                    return true;
                }
                else{
                    return false;
                }
            }
            
        },
        price_id(){
            return this.price.id;
        }
    },
    mounted() {
        console.log(this);
        this.myAttribute = this.$el.getAttribute('data-attribute-name');
        },
  
    methods: {
       carts(){

       }
        }
    }
</script>

