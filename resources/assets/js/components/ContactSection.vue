<template lang="html">
    <div> 
        <h2 class="text-center">Contact Form Messages</h2>
        <p class="text-center">Manage all your contact form queries in a blink of an eye.</p>
        <div class="br-section-wrapper">
            
            

            <div class="continer" v-show="!editMode">
                    <button class="btn btn-primary mg-b-8" @click="newContact()">New Contact</button>
                <div class="row">
                    <div class="col-md-12">
                    
                    </div>
                </div>
            </div>

            <div class="row" v-show="editMode">
                <div class="col-md-12">
                    <form @submit.prevent="addContact" class="mb-3">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Contact Name" v-model="contact.contact_name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Contact Email" v-model="contact.contact_email">
                        </div>
                        <div class="form-group">
                            <input type="text"  class="form-control" placeholder="Contact Website" v-model="contact.contact_web">
                        </div>
                        
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Contact Message" v-model="contact.contact_message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark ">Save</button>
                        <button @click="goBack()" class="btn btn-light">Go Back</button>
                    </form>
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
                    <li class="page-item active"><a class="page-link" style=" min-width: 250px;margin: 0px 10px;" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
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
                            <th>Website</th>
                            <!-- <th>Date</th> -->
                            <th>Actions</th>
                        </tr>
                        <tr v-for="(contact,n) in filterContacts" :key="contact.id">
                            <td>Q-{{contact.id}}</td>
                            <td>{{contact.contact_name}}</td>
                            <td>{{contact.contact_email}}</td>
                            <td>{{contact.contact_web}}</td>
                            <!-- <td>{{contact.updated_at | moment("from", "now") }}</td> -->
                            <td style="font-size:18px;">
                                <button class="btn-tra" @click="editContact(contact)">
                                    <i class="icon-wrench"></i>
                                </button>
                                <button class="btn-tra" style="margin-left:10px;" @click="deleteContact(contact.id)">
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
                        <a class="page-link" href="#" @click="fetchData(pagination.first_page_url)" aria-label="First">
                        <i class="fa fa-angle-double-left"></i>
                        </a>
                    </li>
                    <li class="page-item" v-bind:class="[{disabled: !pagination.prev_page_url}]">
                        <a class="page-link" href="#" @click="fetchData(pagination.prev_page_url)" aria-label="Prev">
                        <i class="fa fa-angle-left"></i>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" style=" min-width: 250px;margin: 0px 10px;" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
                    <li class="page-item" v-bind:class="[{disabled: !pagination.next_page_url}]" >
                        <a class="page-link" href="#" @click="fetchData(pagination.next_page_url)" aria-label="Next">
                        <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#" @click="fetchData(pagination.last_page_url)" aria-label="Last">
                        <i class="fa fa-angle-double-right"></i>
                        </a>
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
            contacts: [],
            contact: {
                _token: document.querySelector("meta[name='csrf-token']").getAttribute("content"),
                contact_name: '',
                contact_web:'',
                contact_message: '',
                contact_email:'',
                status:'',
            },
            contact_id:'',
            search:'',
            pagination: {},
            flag: false,
            edit: false,
            editMode: false,
            createMode: true,
        };
    },
    computed:{
        filterContacts: function(){
            return this.contacts.filter((contact)=>{
                return contact.contact_name.match(new RegExp(this.search, "i")) || contact.contact_message.match(new RegExp(this.search, "i"))
            });
        }
    },
    created() {
    this.fetchData();
    },
    methods: {
        fetchData(page_url) {
            let vm = this;
            page_url = page_url || '/kemmet/api/contacts';
            fetch(page_url)
            .then(res => res.json())
            .then(res => {
            this.contacts = res.data;
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
        deleteContact(id) {
            if (confirm('Are You Sure?')) {
                fetch(`kemmet/api/contacts/${id}`, {
                method: 'delete'
                })
                .then(res => res.json())
                .then(data => {
                    alert('Contact Removed');
                    this.fetchData();
                })
                .catch(err => console.log(err));
            }
        },
        addContact() {
            if (this.edit === false) {
                // Add
                fetch('kemmet/api/contacts', {
                method: 'post',
                body: JSON.stringify(this.contact),
                headers: {
                    'content-type': 'application/json'
                }
        })
          .then(res => res.json())
          .then(data => {
            this.contact.contact_name = '';
            this.contact.contact_web = '';
            this.contact.contact_email = '';
            this.contact.contact_message = '';
            alert('Contact Added');
            this.fetchData();
          })
          .catch(err => console.log(err));
        } else {
            // Update
            fetch('kemmet/api/contacts', {
            method: 'put',
            body: JSON.stringify(this.contact),
            headers: {
                'content-type': 'application/json'
            }
            })
            .then(res => res.json())
            .then(data => {
                this.contact.contact_name = '';
                this.contact.contact_web = '';
                this.contact.contact_email = '';
                this.contact.contact_message = '';
                alert('Contact Updated');
                this.fetchData();
            })
            .catch(err => console.log(err));
        }
        this.editMode = false;
        },
        editContact(contact) {
        this.editMode = true;
        this.edit = true;
        this.contact.id = contact.id;
        this.contact.contact_id = contact.id;
        this.contact.contact_name = contact.contact_name;
        this.contact.contact_web = contact.contact_web;
        this.contact.contact_email = contact.contact_email;
        this.contact.contact_message = contact.contact_message;
        this.contact.status = contact.status;
        },
        newContact(){
            this.editMode=true;
            this.edit = false;
            this.contact.id = '';
            this.contact.contact_id = '';
            this.contact.contact_name = '';
            this.contact.contact_web = '';
            this.contact.contact_email = '';
            this.contact.contact_message = '';
            this.contact.status = '';
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