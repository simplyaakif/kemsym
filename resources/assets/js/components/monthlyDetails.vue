

<template>
    <div>
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">
                        Congratulations your billing plan has been created.
                    </p>
                </div>
                
            </div>
    </div>
</template>
    

<script>
import {mapState} from 'vuex';
    export default{
        data(){
            return{
                billing_plan:'',
            }
        },
        props:{
            paypal_id:''
        },

        methods:{
            getAgreement(){
                
                // this.$swal({
                //     title: "Creating Your Monthly Plan",
                //     onOpen: () => {
                //     this.$swal.showLoading();
                //     }
                // });

                // this.$http.get('/create_paypal_plan?plans_id='+ this.paymentid).then(response => {
                //     console.log(response.body);
                //     this.plan_id = response.body;
                //     var base_url = window.location.origin;
                //     var plan_url = base_url + "/subscribe/paypal/?payment_id="+ this.plan_id + "&plans_id=" + this.paymentid;
                //     // var plan_url = base_url + "/subscribe/paypal/?payment_id="+ this.plan_id;
                    
                //     this.$swal.close();
                //     this.$swal(
                //         "Monthly Plan Created",
                //         "Taking you to Paypal to complete the order",
                //         "success"
                //     );

                //     window.location.href = plan_url;
                // }, response => {
                //     // error callback
                // });

            },

        }
    }    
</script>
