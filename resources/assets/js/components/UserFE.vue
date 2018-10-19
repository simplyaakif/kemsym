<template>
    <div>
        <div class="row">
            <div class="col-md-4">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Orders</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Addresses</a>
                    <a class="nav-link active" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Account Details</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h3>Hello  {{userdata.name}}</h3>
                        <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>

                    <div class="tab-pane fade show active" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
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

            }
        },
        props:{
            userdata: Object,
            userdetails: Object,
        }
    }
</script>