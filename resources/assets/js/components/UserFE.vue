<template>
    <div>
        <div class="row">
            <div class="col-md-4">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</a>
                    <!-- <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Orders</a> -->
                    <!-- <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Addresses</a> -->
                    <!-- <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Account Details</a> -->
                    <a class="nav-link" id="v-pills-subs-tab" data-toggle="pill" href="#v-pills-subs" role="tab" aria-controls="v-pills-subs" aria-selected="false">Monthly Subscriptions</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane show active fade " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h3>Hello  {{userdata.name}}</h3>
                        <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <h2>Your Orders</h2>
                        <table class="table">
                            <th>
                                <td>Sr #</td>
                                <td>Product Name</td>
                                <td>Product Quantity</td>
                                <td>Product Price</td>
                                <td>Purchase Date</td>
                            </th>
                            <tr v-for="(order, index) in userorders" :key="index">
                                <td> {{ index+1 }} </td>
                                <td> {{ order}} </td>
                                <td> {{ order.quantity }} </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>

                    <div class="tab-pane fade" id="v-pills-subs" role="tabpanel" aria-labelledby="v-pills-subs-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Subscriptions Found</h3>
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Subscription ID</th>
                                    <th scope="col">Date Created</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(sub,n) in usersubs" :key="n">
                                    <th scope="row">{{n+1}}</th>
                                    <td>{{sub.paypal_billing_plan_id}}</td>
                                    <td>{{sub.created_at | moment("MMM Do YYYY")}}</td>
                                    <td><button class="btn-dark" @click="openmodal(n)">Details</button></td>
                                    </tr>
                                
                                </tbody>
                                </table>
                                <!-- <a @click="getAgreement" class="btn btn-pr">Load my Subscriptions</a>
                                <ul class="list-unstyled" v-for="(sub,n) in usersubs" :key="n">
                                    <li> {{n+1}}. Subscription ID - [ {{sub.paypal_billing_plan_id}} ]</li>
                                </ul> -->

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

                    <div class="tab-pane fade " id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <div class="row">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" v-model="userdata.name" name="name" id="ac_name" aria-describedby="helpId" placeholder="Email Address">
                                <small id="helpId" class="form-text text-muted">User Account Name</small>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input disabled type="text" class="form-control" v-model="userdata.email" name="ac_email" id="email" aria-describedby="helpId" placeholder="Email Address">
                                <small id="helpId" class="form-text text-muted">User Account Email - You cannot change this.</small>
                            </div>

                            <hr>
                            <p>Enter your current password in order to apply new one</p>
                            <div class="form-group">
                                <label for="email">Current Password</label>
                                <input  type="password" class="form-control" v-model="userdata.email" name="email" id="ac_password" aria-describedby="helpId" placeholder="Current Password">
                                <small id="helpId" class="form-text text-muted">User Account Old Password </small>
                            </div>
                            <div class="form-group">
                                <label for="email">New Password</label>
                                <input  type="password" class="form-control" v-model="userdata.email" name="email" id="ac_cf_password" aria-describedby="helpId" placeholder="Current Password">
                                <small id="helpId" class="form-text text-muted">User Account New Password </small>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
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
                    // this.$swal(
                    //     "Monthly Plan Created",
                    //     "Taking you to Paypal to complete the order",
                    //     "success"
                    // );

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