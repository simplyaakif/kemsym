<template lang="html">
    <div> 
        <h2 class="text-center">Active Users</h2>
        <p class="text-center">Manage all your user form queries in a blink of an eye.</p>
        <div class="br-section-wrapper">
            
            

            <div class="continer" v-show="!editMode">
                    <button class="btn btn-primary mg-b-8" @click="newuser()">New User</button>
            </div>

            <div class="row" v-show="editMode">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            User Details
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="adduser" class="mb-3">
                                <div class="form-row">
                                        <div class="form-group col-md-6">
                                                <label for="">User Name</label>
                                                <input type="text" class="form-control" placeholder="User Name" v-model="user.name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">User Email Address</label>
                                                <input type="text" class="form-control" placeholder="User Email" v-model="user.email">
                                            </div>
                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-6">
                                                <label for="">User Role</label>
                                                <select name="" id="" class="form-control" v-model="user.role">
                                                    <option value="" disabled>Choose...</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="visitor">Visitor</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">User Active Status</label>
                                                <select name="" id="" class="form-control" v-model="user.verified">
                                                    <option value="" disabled>Choose...</option>
                                                    <option value="0">Not Active</option>
                                                    <option value="1">Active</option>
                                                </select>
                                            </div>
                                </div>
                                
                                
                                <button type="submit" class="btn btn-sm btn-primary "><i class="fa fa-dot-circle-o"></i> Save</button>
                                <button @click="goBack()" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Go Back</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div v-show="!editMode">
            <div class="ht-60 mg-b-20 bd d-flex align-items-center justify-content-center">
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-basic mg-b-0">
                    <li class="page-item">
                        <button class="page-link" @click="fetchData(pagination.first_page_url)" aria-label="First">
                        <i class="fa fa-angle-double-left"></i>
                        </button>
                    </li>
                    <li class="page-item" v-bind:class="[{disabled: !pagination.prev_page_url}]">
                        <button class="page-link" @click="fetchData(pagination.prev_page_url)" aria-label="Prev">
                        <i class="fa fa-angle-left"></i>
                        </button>
                    </li>
                    <li class="page-item active"><button class="page-link" style=" min-width: 250px;margin: 0px 10px;">Page {{ pagination.current_page }} of {{ pagination.last_page }}</button></li>
                    <li class="page-item" v-bind:class="[{disabled: !pagination.next_page_url}]" >
                        <button class="page-link" @click="fetchData(pagination.next_page_url)" aria-label="Next">
                        <i class="fa fa-angle-right"></i>
                        </button>
                    </li>
                    <li class="page-item">
                        <button class="page-link" @click="fetchData(pagination.last_page_url)" aria-label="Last">
                        <i class="fa fa-angle-double-right"></i>
                        </button>
                    </li>
                    </ul>
                </nav>
            </div>
            <div class="containe">
                <div class="ro">
                        <input class="form-control mg-b-20" type="text" placeholder="Search for some data in here." v-model="search">
                    <table class="table table-striped ">
                        <tr>
                            <th>Sr. No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Verified</th>
                            <th>Role</th>
                            <!-- <th>Date</th> -->
                            <th>Actions</th>
                        </tr>
                        <tr v-for="(user,n) in filterusers" :key="user.id">
                            <td>Q-{{user.id}}</td>
                            <td>{{user.name}}</td>
                            <td>{{user.email}}</td>
                            <td>{{user.verified}}</td>
                            <td class="text-uppercase">{{user.role}}</td>
                            <!-- <td>{{user.updated_at | moment("from", "now") }}</td> -->
                            <td style="font-size:18px;">
                                <button class="btn-tra" @click="edituser(user)">
                                    <i class="icon-wrench"></i>
                                </button>
                                <button class="btn-tra" style="margin-left:10px;" @click="deleteuser(user.id)">
                                    <i class="icon-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
                <div class="ht-60 mg-b-20 bd d-flex align-items-center justify-content-center">
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-basic mg-b-0">
                    <li class="page-item">
                        <button class="page-link" @click="fetchData(pagination.first_page_url)" aria-label="First">
                        <i class="fa fa-angle-double-left"></i>
                        </button>
                    </li>
                    <li class="page-item" v-bind:class="[{disabled: !pagination.prev_page_url}]">
                        <button class="page-link" @click="fetchData(pagination.prev_page_url)" aria-label="Prev">
                        <i class="fa fa-angle-left"></i>
                        </button>
                    </li>
                    <li class="page-item active"><button class="page-link" style=" min-width: 250px;margin: 0px 10px;">Page {{ pagination.current_page }} of {{ pagination.last_page }}</button></li>
                    <li class="page-item" v-bind:class="[{disabled: !pagination.next_page_url}]" >
                        <button class="page-link" @click="fetchData(pagination.next_page_url)" aria-label="Next">
                        <i class="fa fa-angle-right"></i>
                        </button>
                    </li>
                    <li class="page-item">
                        <button class="page-link" @click="fetchData(pagination.last_page_url)" aria-label="Last">
                        <i class="fa fa-angle-double-right"></i>
                        </button>
                    </li>
                    </ul>
                </nav>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
            data(){
        return{
            users: [],
            user: {
                _token: document.querySelector("meta[name='csrf-token']").getAttribute("content"),
                name: '',
                email:'',
                verified:'',
                role:'',
                status:'',
            },
            user_id:'',
            search:'',
            pagination: {},
            flag: false,
            edit: false,
            editMode: false,
            createMode: true,
        };
    },
    computed:{
        filterusers: function(){
            return this.users.filter((user)=>{
                return user.name.match(new RegExp(this.search, "i")) || user.role.match(new RegExp(this.search, "i"))
            });
        }
    },
    created() {
    this.fetchData();
    },
    methods: {
        fetchData(page_url) {
            let vm = this;
            page_url = page_url || '/kemmet/api/users';
            fetch(page_url)
            .then(res => res.json())
            .then(res => {
            this.users = res.data;
            vm.makePagination(res.meta, res.links);
            })
            .catch(err => console.log(err));
        },
        makePagination(meta, links) {
            let paginate = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                first_page_url: links.first,
                last_page_url: links.last,
                next_page_url: links.next,
                prev_page_url: links.prev,
            }
            this.pagination = paginate;
        },
        deleteuser(id) {
            if (confirm('Are You Sure?')) {
                fetch(`/kemmet/api/users/${id}`, {
                method: 'delete'
                })
                .then(res => res.json())
                .then(data => {
                    alert('user Removed');
                    this.fetchData();
                })
                .catch(err => console.log(err));
            }
        },
        adduser() {
            if (this.edit === false) {
                // Add
                fetch('/kemmet/api/users', {
                method: 'post',
                body: JSON.stringify(this.user),
                headers: {
                    'content-type': 'application/json'
                }
        })
          .then(res => res.json())
          .then(data => {
            this.user.user_name = '';
            this.user.user_web = '';
            this.user.user_email = '';
            this.user.user_message = '';
            alert('user Added');
            this.fetchData();
          })
          .catch(err => console.log(err));
        } else {
            // Update
            fetch('/kemmet/api/users', {
            method: 'put',
            body: JSON.stringify(this.user),
            headers: {
                'content-type': 'application/json'
            }
            })
            .then(res => res.json())
            .then(data => {
                this.user.user_name = '';
                this.user.user_web = '';
                this.user.user_email = '';
                this.user.user_message = '';
                alert('user Updated');
                this.fetchData();
            })
            .catch(err => console.log(err));
        }
        this.editMode = false;
        },
        edituser(user) {
        this.editMode = true;
        this.edit = true;
        this.user.id = user.id;
        this.user.user_id = user.id;
        this.user.name = user.name;
        this.user.email = user.email;
        this.user.verified = user.verified;
        this.user.verified = user.verified;
        this.user.role = user.role;
        this.user.status = user.status;
        },
        newuser(){
            this.editMode=true;
            this.edit = false;
            this.user.id = '';
            this.user.user_id = '';
            this.user.name = '';
            this.user.email = '';
            this.user.password = '';
            this.user.verified = '';
            this.user.role = '';
        },
        goBack(){
            this.editMode= false;
            this.edit=false;
        }
    }
    }
</script>

<style lang="scss">
.btn-tra{
    background: transparent;
    border:0;
    color:inherit;
}
</style>