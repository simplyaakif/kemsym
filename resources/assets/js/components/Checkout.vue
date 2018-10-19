<template>
    <div>
        <hr class="mb-4">

                            <h4 class="mb-3">Payment</h4>

                            <div class="d-block my-3">
                                <div class="custom-contro custom-radio">
                                    <input id="credit" name="paymentMethod" type="radio" class="custom-contro-input" value="card" v-model="paymentmethod" checked="" required="">
                                    <label class="custom-contro-label" for="credit">Credit card</label>
                                </div>
                                <div class="custom-contro custom-radio">
                                    <input id="paypal" name="paymentMethod" checked="" type="radio" v-model="paymentmethod" value="paypal" class="custom-contro-input" required="">
                                    <label class="custom-contro-label" for="paypal">Paypal</label>
                                </div>
                            </div>
                            <div class="carddetails" v-show-slide="paymentmethod=='card'">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="cc-name">First Name</label>
                                        <input type="text" class="form-control" v-model="card.name.first" id="cc-name" placeholder="" required="">
                                        <small class="text-muted">Full name as displayed on card</small>
                                        <div class="invalid-feedback">
                                            First Name on card is required
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="cc-name">Last Name</label>
                                        <input type="text" class="form-control" v-model="card.name.last" id="cc-name" placeholder="" required="">
                                        <small class="text-muted">Full name as displayed on card</small>
                                        <div class="invalid-feedback">
                                            Last Name on card is required
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="cc-number">Credit card number</label>
                                        <input type="text" class="form-control" id="cc-number"  v-model="card.number" placeholder="" required="">
                                        <div class="invalid-feedback">
                                            Credit card number is required
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3 mb-3">
                                        <label for="cc-expiration">Expiration Month</label>
                                        <input type="text" class="form-control" id="cc-expiration" v-model="card.month" placeholder="" required="">
                                        <div class="invalid-feedback">
                                            Expiration date required
                                        </div>
                                    </div>
                                    <div class="col-3 mb-3">
                                        <label for="cc-expiration">Expiration Year</label>
                                        <input type="text" class="form-control" id="cc-expiration" v-model="card.year" placeholder="" required="">
                                        <div class="invalid-feedback">
                                            Expiration date required
                                        </div>
                                    </div>
                                    <div class="col-3 offset-1 mb-3">
                                        <label for="cc-expiration">CVV</label>
                                        <input type="text" class="form-control" id="cc-cvv" v-model="card.ccv" placeholder="" required="">
                                        <div class="invalid-feedback">
                                            Security code required
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            
        <button class="btn btn-primary btn-lg btn-block" type="submit" @click="checkout">
            {{btn_checkout}}
            </button>
        
    </div>
</template>

<script>
    export default{
        data(){
            return{
                payment:[],
                btn_checkout:'Continue to checkout',
                bars:'',
                paymentmethod:'',
                card:{
                    number:'4758411877817150',
                    ccv:'456',
                    month:'05',
                    year:'2019',
                    name:{
                        first:'Humza',
                        last:'Ali',
                    },
                }
            }
        },
        props:{
            products:Object,
        },
      
        methods:{
            checkout(){
                this.btn_checkout='Completing your Order';
                this.$swal({
                    title:'Processing Your Transaction',
                    onOpen: () => {
                        this.$swal.showLoading();
                    },
                    });


                if(this.paymentmethod=='card'){
                    Vue.set(this.products, 'card', this.card);
                    console.log('paywithcardlive');
                    fetch('pays/paywithcardlive', {
                    method: 'post',
                    body: JSON.stringify(this.products),
                    headers: {
                        'content-type': 'application/json'
                    }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.payment=data;
                        if(this.payment[0].state=='approved'){
                            console.log('Payment Approved.')
                        }
                        this.$swal.close();
                        this.$swal(
                            'Transaction Completed',
                            'We are processing your order now.',
                            'success'
                            );
                        window.location.href =  'http://127.0.0.1:8000/payments/success';
                    })
                    .catch(err => {
                        this.btn_checkout='Error';
                        console.log(err)
                    });

                }
                else{
                    fetch('pays/paywithpaypallive', {
                    method: 'post',
                    body: JSON.stringify(this.products),
                    headers: {
                        'content-type': 'application/json'
                    }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.payment=data;
                        console.log('Data Sent & Json Recieved');
                        window.location.href =this.payment.approval_url;
                    })
                    .catch(err => {
                        this.btn_checkout='Error';
                        console.log(err)
                    });
                }
            }
        }
    }
</script>

<style>

</style>
