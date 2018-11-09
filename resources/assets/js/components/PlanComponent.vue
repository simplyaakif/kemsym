

<template>
    <div>
            <button type="button" @click="getAgreement" class="btn btn-pr">{{btnTag}}</button>
    </div>
</template>
    

<script>
import {mapState} from 'vuex';
    export default{
        data(){
            return{
                btnTag:'CREATE BILLING PLAN',
                token:'',
                plan_id:'',
                dataJSON:'',
            }
        },
        props:{
            paymentid:''
        },

        computed:{
        },
        methods:{
            getAgreement(){
                
                this.btnTag = 'Processing Your Order';
                this.$swal({
                    title: "Creating Your Monthly Plan",
                    onOpen: () => {
                    this.$swal.showLoading();
                    }
                });

                this.$http.get('/create_paypal_plan?plans_id='+ this.paymentid).then(response => {
                    console.log(response.body);
                    this.plan_id = response.body;
                    var base_url = window.location.origin;
                    var plan_url = base_url + "/subscribe/paypal/?payment_id="+ this.plan_id + "&plans_id=" + this.paymentid;
                    // var plan_url = base_url + "/subscribe/paypal/?payment_id="+ this.plan_id;
                    
                    this.$swal.close();
                    this.$swal(
                        "Monthly Plan Created",
                        "Taking you to Paypal to complete the order",
                        "success"
                    );

                    window.location.href = plan_url;
                }, response => {
                    // error callback
                });

            },

        }
    }    
</script>
