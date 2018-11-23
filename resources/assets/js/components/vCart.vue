<template>
    <div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-mid">
                            <thead>
                                <tr>
                                    <th scope="col"> </th>
                                    <th scope="col">Product</th>
                                    <th scope="col" class="text-center">Quantity</th>
                                    <th scope="col" class="text-right">Single Price</th>
                                    <th scope="col" class="text-right">Total Price</th>
                                    <th scope="col" class="text-center"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr v-for="(product,n) in products" :key="n">
                                    <td><img width="60" class="img-fluid" :src="product.item.img_path"  /> </td>
                                    <td class="my-auto"> {{product.item.product_name  }} - {{product.pricetype}} </td>
                                    <td class="text-center quantity-toggle">

                                            <input style="border-left:2px solid #ddd;" type="text" v-model="products[n].qty">
                                            <button  @click="increment(n)"><i class="fas fa-sync-alt"></i></button>

                                    </td>
                                    <td class="text-right">{{product.singleprice}}</td>
                                    <td class="text-right">{{product.price | decimal}}</td>
                                    <td class="text-center">
                                    <a :href="siteurl+'/remove/'+product.product_prices_id" class="btn btn-sm btn-danger" 
                                    style="color:white" >
                                            <i class="fa fa-trash"></i>
                                    </a>

                                    </td>
                                </tr>
                                
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Sub-Total</td>
                                    <td class="text-right">$ {{totalItem | decimal}}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>HST</td>
                                    <td class="text-right">$ {{totalItem*.13 | decimal}}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    <td class="text-right"><strong>$ {{totalItem + (totalItem*.13) |decimal }}</strong></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="row">
                        <div class="input-group col-md-3 mb-3">
                            <input type="text" class="form-control" placeholder="Coupon" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" @click="vcoupon()" type="button">Apply Coupon</button>
                            </div>
                        </div>
                        <div class="col-sm-12  col-md-3 offset-md-3">
                            <a :href="siteurl+'/subs'" class="btn btn-block btn-dark">Continue Shopping</a>
                        </div>
                        <div class="col-sm-12 col-md-3 text-right">
                            <a :href="siteurl+'/checkout'"  class="btn btn-lg btn-block btn-success text-uppercase">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                current:''
            };
        },
        computed: {
            totalItem: function(){
                let sum = 0;
                for(let i = 0; i < this.products.length; i++){
                    sum += (parseFloat(this.products[i].price));
                }

                return sum;
            },
        },
        filters: {
            truncate: function (text, length, suffix) {
                return text.substring(0, length) + suffix;
            },
            decimal(amount) {
            const amt = Number(amount)
            return amt && amt.toLocaleString(undefined, {maximumFractionDigits:2}) || '0'
            }
        },
        props: {
            products:Array,
            totals:Number,
            siteurl: String
        },
        watch:{
            products(){
                return this.products;
            }
        },
        methods:{
            vcoupon(){
                this.$swal('Error','Wrong coupon entered','error')
            },
            increment (n) {
                console.log(n);
                // this.products[n].qty++
                console.log(this.products[n].qty);

                if(this.products[n].qty <= 0) {
                    this.$swal('Note','Negative or Zero quantity not allowed','info');

                }else {
                    if(this.products[n].pro.product_payment_type == "Monthly"){
                        if(this.products[n].qty <= 11 ){
                            // alert('Minimum 12 orders are required for this cost type.');
                            this.$swal('Note','Minimum 12 orders are required for this cost type','info');
                        }
                        else{
                            window.location.href = window.location.href;
                            this.$swal({
                                title: "Updating quantity",
                                onOpen: () => {
                                this.$swal.showLoading();
                                }
                            });


                            this.$http.get('/qty-update/'+ this.products[n].product_prices_id+'/'+ this.products[n].qty).then(response => {
                                console.log(response.body);
                                
                                
                                this.$swal.close();
                                this.$swal(
                                    "Quantity Updated",
                                    "",
                                    "success"
                                );

                            }, response => {
                                // error callback
                            });
                        }
                    }else{
                            this.$swal({
                                title: "Updating quantity",
                                onOpen: () => {
                                this.$swal.showLoading();
                                }
                            });

                            this.$http.get('/qty-update/'+ this.products[n].product_prices_id+'/'+ this.products[n].qty).then(response => {
                                console.log(response.body);
                                
                                this.$swal.close();
                                this.$swal(
                                    "Quantity Updated",
                                    "",
                                    "success"
                                );

                            }, response => {
                                // error callback
                            });
                                // window.location.href = window.location.href;
                    }
                }

                

            },
        }
    };
</script>
