<template>
    <div>
        <div class="container">
            <div v-show="cartBtn" class="row mb-5">
                <div class="col-md-6">
                    {{inCart}}
                </div>
                <div class="col-md-6 text-right">
                    <a :href="siteurl+'/shopping-cart'" style="color:#fff;text-decoration:none;margin:0;" class="btn-pr">
                        View Cart
                    </a>
                </div>
            </div>
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
                        <br>
                        <div v-show="selectedcheck"  class="quantity-toggle">
                            <button @click="decrement()">&mdash;</button>
                            <input type="text" v-model="price.quantity" readonly>
                            <button @click="increment()">&#xff0b;</button>
                        </div>
                    </div>

                    <br>
                    <h1 v-show="selectedcheck">${{currentprice}}</h1>
                    <!-- <div v-if="paymentType">
                        <a :href="siteurl+'/monthly-plan-checkout/'+product.id+'/'+price_id" class="btn-pr">Apply for
                            Monthly Payment</a>
                        <p>The billing contract will be for 12 months. You will be charged ${{currentprice}}/month for
                            the next 12 months.</p>
                    </div> -->
                    <div v-show="selectedcheck">
                        <!-- <a :href="siteurl+'/add-to-carts/'+product.id+'/'+price_id+'/'+ price.quantity" v-show="selectedcheck"@click="carts" class="btn-pr">Add to Cart</a> -->
                        <a v-show="selectedcheck" @click="carts" class="btn-pr" style="cursor:pointer">Add to Cart</a>
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
        data() {
            return {
                selected: "",
                cartBtn:false,
                inCart:'',
                url: window.location.hostname,
                price: {
                    value: "",
                    id: "",
                    quantity: 1
                }
            };
        },
        props: {
            product: Object,
            productprice: Array,
            productpricemax: Number,
            productpricemin: Number,
            siteurl: String
        },
        computed: {
            selectedcheck() {
                if (this.productprice[this.selected]) {
                    return true;
                } else {
                    return false;
                }
            },
            currentprice() {
                if (this.selectedcheck) {
                    this.price.value = this.productprice[this.selected].product_price;
                    this.price.id = this.productprice[this.selected].id;
                    if (this.productprice[this.selected].product_payment_type == "Monthly") {
                        this.price.quantity = 12;
                    }
                    if(this.product.product_name=="CONSULTING"){
                            this.price.quantity = 10;
                        }
                    console.log(this.price.value);
                    return this.price.value;
                } else {
                    return 0;
                }
            },
            paymentType() {
                if (this.selectedcheck) {
                    if (
                        this.productprice[this.selected].product_payment_type == "Monthly"
                    ) {
                        return true;
                    } else {
                        return false;
                    }
                }
            },
            price_id() {
                return this.price.id;
            }
        },
        mounted() {
            console.log(this);
            this.myAttribute = this.$el.getAttribute("data-attribute-name");
        },

        methods: {
            carts(){
                this.$http.get(this.siteurl+'/add-to-carts/'+this.product.id+'/'+this.price_id+'/'+ this.price.quantity).then(response => {
                    console.log(response.body);
                    this.cartBtn = true;
                    this.inCart = this.price.quantity + ' x ' + this.product.product_name + ' have been added to cart.';

                }, response => {
                    // error callback
                });
            },
            increment () {
                this.price.quantity++
            },
            decrement () {
                
                if(this.price.quantity === 1) {
                    this.$swal('Note','Negative quantity not allowed','info');
                } else {
                    if(this.productprice[this.selected].product_payment_type == "Monthly"){
                        if(this.price.quantity == 12 ){
                            // alert('Minimum 12 orders are required for this cost type.');
                            this.$swal('Note','Minimum 12 orders are required for this cost type','info');
                        }
                        else{
                            this.price.quantity--
                        }
                    }else if(this.productprice[this.selected].product_payment_type == "Standard"){
                        if(this.price.quantity == 10 && this.product.product_name =="CONSULTING" ){
                            // alert('Minimum 12 orders are required for this cost type.');
                            this.$swal('Note','Minimum 10 orders are required for this cost type','info');
                        }else{
                            this.price.quantity--
                        }
                    }else{
                        this.price.quantity--
                    }
                    
                    
                }
                
            }
        },
        
    };

</script>
