<template>
    <div> 
        <h2 class="text-center">PRODUCTS</h2>
        <p class="text-center">Manage all your products.</p>
        <div class="br-section-wrapper">
            
            

            <div class="continer" v-show="!editMode">
                    <button class=" d-block btn btn-primary btn-pr mg-b-8" @click="newproduct()">New product</button>
                    <br>
            </div>

            <div class="row" v-show="editMode">
                <div class="col-md-12">
                    <form @submit.prevent="addproduct" class="mb-3">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="product Name" v-model="product.product_name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="product Email" v-model="product.product_email">
                        </div>
                        <div class="form-group">
                            <input type="text"  class="form-control" placeholder="product Website" v-model="product.product_web">
                        </div>
                        
                        <div class="form-group">
                            <textarea class="form-control" placeholder="product Message" v-model="product.product_message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark ">Save</button>
                        <button @click="goBack()" class="btn btn-light">Go Back</button>
                    </form>
                </div>
            </div>

            <div v-show="!editMode">
            <div class="container-fluid">
                <div class="row table-100">
        <table  id="product-table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-mid" v-for="(product) in filterproducts" :key="product.id">
                <td class="text-center"><img :src="product.img_path" width="40" alt="" srcset=""></td>
                <td>{{product.product_name}}</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td style="font-size:18px;">
                    <button class="btn-tra" @click="editproduct(product)">
                        <i class="icon-wrench"></i>
                    </button>
                    <button class="btn-tra" style="margin-left:10px;" @click="deleteproduct(product.id)">
                        <i class="icon-trash"></i>
                    </button>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
            data(){
        return{
            products: [],
            product: {
                _token: document.querySelector("meta[name='csrf-token']").getAttribute("content"),
                product_name: '',
                product_web:'',
                product_message: '',
                product_email:'',
                status:'',
            },
            product_id:'',
            search:'',
            pagination: {},
            flag: false,
            edit: false,
            editMode: false,
            createMode: true,
        };
    },
    computed:{
        filterproducts: function(){
            return this.products.filter((product)=>{
                return product.product_name.match(new RegExp(this.search, "i")) 
            });
        }
    },
    created() {
    this.fetchData();
    },
    methods: {
        fetchData(page_url) {
            let vm = this;
            page_url = page_url || '/api/products';
            fetch(page_url)
            .then(res => res.json())
            .then(res => {
            this.products = res.data;
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
        deleteproduct(id) {
            if (confirm('Are You Sure?')) {
                fetch(`/kemmet/api/products/${id}`, {
                method: 'delete'
                })
                .then(res => res.json())
                .then(data => {
                    alert('product Removed');
                    this.fetchData();
                })
                .catch(err => console.log(err));
            }
        },
        addproduct() {
            if (this.edit === false) {
                // Add
                fetch('/kemmet/api/products', {
                method: 'post',
                body: JSON.stringify(this.product),
                headers: {
                    'content-type': 'application/json'
                }
        })
          .then(res => res.json())
          .then(data => {
            this.product.product_name = '';
            this.product.product_web = '';
            this.product.product_email = '';
            this.product.product_message = '';
            alert('product Added');
            this.fetchData();
          })
          .catch(err => console.log(err));
        } else {
            // Update
            fetch('/api/products', {
            method: 'put',
            body: JSON.stringify(this.product),
            headers: {
                'content-type': 'application/json'
            }
            })
            .then(res => res.json())
            .then(data => {
                this.product.product_name = '';
                this.product.product_web = '';
                this.product.product_email = '';
                this.product.product_message = '';
                alert('product Updated');
                this.fetchData();
            })
            .catch(err => console.log(err));
        }
        this.editMode = false;
        },
        editproduct(product) {
        this.editMode = true;
        this.edit = true;
        this.product.id = product.id;
        this.product.product_id = product.id;
        this.product.product_name = product.product_name;
        this.product.product_web = product.product_web;
        this.product.product_email = product.product_email;
        this.product.product_message = product.product_message;
        this.product.status = product.status;
        },
        newproduct(){
            this.$toaster.success('Your toaster <strong>success</strong> message.', {timeout: 3000})
            this.editMode=true;
            this.edit = false;
            this.product.id = '';
            this.product.product_id = '';
            this.product.product_name = '';
            this.product.product_web = '';
            this.product.product_email = '';
            this.product.product_message = '';
            this.product.status = '';
        },
        goBack(){
            this.editMode= false;
            this.edit=false;
        }
    }
    }
</script>

