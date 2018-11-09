
<template>
    <div>
        <h2 class="text-center">Monthly Subscriptions</h2>
        <p class="text-center">Here you can view all the monthly subscriptions made by your clients</p>

        
        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Client Name</th>
                                    <th scope="col">Client Email</th>
                                    <th scope="col">Subscription ID</th>
                                    <th scope="col">Date Created</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(sub,n) in usersubs" :key="n">
                                    <th scope="row">{{n+1}}</th>
                                    <td>{{sub.name}}</td>
                                    <td>{{sub.email}}</td>
                                    <td>{{sub.paypal_billing_plan_id}}</td>
                                    <td>{{sub.created_at | moment("MMM Do YYYY")}}</td>
                                    <td><button class="btn-dark" @click="openmodal(n)">Details</button></td>
                                    </tr>
                                
                                </tbody>
                                </table>

                                <modal name="example">
                                    <div class="basic-modal">
                                        <h1 class="title">Paypal Plan - {{plan_n}}</h1>

                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table v-show="sub" class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                <th scope="col">Parameters</th>
                                                                <th scope="col">Details</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <tr>
                                                                <td>Status</td>
                                                                <td>{{sub.state}}</td>
                                                                </tr>

                                                                <tr>
                                                                <td>Description</td>
                                                                <td>{{sub.description}}</td>
                                                                </tr>

                                                                <tr>
                                                                <td>Paypal Start Date</td>
                                                                <td>{{sub.start_date | moment("MMM Do YYYY")}}</td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                <td>Payer Name</td>
                                                                <td>{{sub.payer.payer_info.first_name }} {{sub.payer.payer_info.last_name }}</td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                <td>Payer Email</td>
                                                                <td>{{sub.payer.payer_info.email }}</td>
                                                                </tr>


                                                                <tr>
                                                                <td>Payment Method</td>
                                                                <td>{{sub.payer.payment_method}}</td>
                                                                </tr>

                                                                <tr>
                                                                <th class="text-center" colspan="2">Recurring Payment Details</th>
                                                                </tr>

                                                                <tr>
                                                                <td>Payment Cycles Completed</td>
                                                                <td>{{sub.agreement_details.cycles_completed}}</td>
                                                                </tr>

                                                                <tr>
                                                                <td>Payment Cycles Remaining</td>
                                                                <td>{{sub.agreement_details.cycles_remaining}}</td>
                                                                </tr>

                                                                <tr>
                                                                <td>Recent Payment Made On</td>
                                                                <td>{{sub.agreement_details.last_payment_date | moment("MMM Do YYYY") }}</td>
                                                                </tr>

                                                                <tr>
                                                                <td>Next Payment Date</td>
                                                                <td>{{sub.agreement_details.next_billing_date | moment("MMM Do YYYY")}}</td>
                                                                </tr>

                                                                <tr>
                                                                <td>Next Payment Amount</td>
                                                                <td>{{sub.plan.payment_definitions[0].amount.value}} {{sub.plan.payment_definitions[0].amount.currency}}</td>
                                                                </tr>

                                                                <tr>
                                                                <td>Final Payment Date</td>
                                                                <td>{{sub.agreement_details.final_payment_date | moment("MMM Do YYYY")}}</td>
                                                                </tr>

                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        <button class="btn btn-default" type="button" @click="close">Close Modal</button>
                                    </div>
                                </modal>

                            </div>
                        </div>
    </div>
</template>


<script>
    export default {
        data(){
            return{
                subs:'',
                plan_n:'',
                sub:{
                    plan:{
                        payment_definitions:[
                            {
                                amount:{
                                    value:'',
                                    currency:'',
                                }
                            }
                        ]
                    },
                    payer:{
                        payment_method:'',
                        payer_info:{
                            email:'',
                            first_name:'',
                            last_name:'',
                            payer_id:'',

                        }
                    },
                    agreement_details:{
                        cycles_remaining:'',
                        cycles_completed:'',
                        next_billing_date:'',
                        last_payment_date:'',
                        final_payment_date:'',
                        failed_payment_count:'',
                        last_payment_amount:{
                            currency:'',
                            value:'',
                        },
                    },

                },
                payer:'',
            }
        },

        props:{
            userdata: Object,
            userdetails: Object,
            userorders:Array,
            usersubs:Array,
        },

        methods:{
            getAgreement(){
                fetch("/api/get-agreements/", {
                method: "post",
                body: JSON.stringify(this.usersubs),
                headers: {
                    "content-type": "application/json"
                }
                })
                .then(res => res.json())
                .then(data => {

                    this.subs = data;
                    this.payer = this.sub.payer;

                })
                .catch(err => {
                    console.log(err);
                });
            },

            openmodal (n) {
                console.log(n);
                this.plan_n = this.usersubs[n].paypal_billing_plan_id
                this.$swal({
                    title: "Fetching Plan Information",
                    onOpen: () => {
                    this.$swal.showLoading();
                    }
                });

                this.$http.get('/get-agreement/?ag_id='+ this.usersubs[n].paypal_billing_plan_id).then(response => {
                    console.log(response.body);
                    this.sub = response.body;
                    this.$swal.close();
                    this.$swal(
                        "Details Found",
                        "Taking you to it",
                        "success"
                    );

                    this.$modal.push('example');

                }, response => {
                    // error callback
                });

            },
        
            close () {
            this.$modal.pop()
            }

        } 
    }
</script>


<style lang="sass">

</style>
