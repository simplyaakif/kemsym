<template>
<div> 
        <h2 class="text-center">Product Form Messages</h2>
        <p class="text-center">Manage all your product form queries in a blink of an eye.</p>
        <div class="br-section-wrapper">
            
            

            <div class="continer" v-show="!editMode">
                    <button class="btn btn-primary mg-b-8" @click="newproduct()">New Product</button>
                <div class="row">
                    <div class="col-md-12">
                    
                    </div>
                </div>
            </div>

            <div class="row" v-show="editMode">
                <div class="col-md-8 offset-md-2">
                    <form @submit.prevent="addproduct" class="mb-3">

                        <h3 class="text-uppercase">Product Details</h3>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Product Name" v-model="product.product_name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Product Sub Heading" v-model="product.product_subHeading">
                        </div>

                        <div v-if="edit">
                            <img :src="product.img_path" alt="" srcset="">
                            <div class="form-group">
                                <ul>
                                    <li v-for="(file, index) in file" :key="file.id">
                                    <span>{{index}}</span> -
                                    <span>{{file.name}}</span> -
                                    <span>{{file.size}}</span> -
                                    <span>{{file.response}}</span> -
                                    <span v-if="file.error">{{file.error}}</span>
                                    <span v-else-if="file.success">success</span>
                                    <span v-else-if="file.active">active</span>
                                    <span v-else-if="file.active">active</span>
                                    <span v-else></span>
                                    <div v-if="file.success">
                                        <img :src="'images/'+file.response" alt="" srcset="">
                                    </div>
                                    </li>
                                </ul>
                                <file-upload
                                    class="btn btn-primary mg-b-0"
                                    post-action="/kemmet/api/products/image"
                                    extensions="gif,jpg,jpeg,png,webp"
                                    accept="image/png,image/gif,image/jpeg,image/webp"
                                    :multiple="false"
                                    :size="1024 * 1024"
                                    v-model="file"
                                    @input-filter="inputFilter"
                                    @input-file="inputFile"
                                    ref="upload">
                                    <i class="fa fa-plus"></i>
                                    Select files
                                </file-upload>
                                <button type="button" class="btn btn-success" v-if="!$refs.upload || !$refs.upload.active" @click.prevent="$refs.upload.active = true">
                                <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                Start Upload
                                </button>
                                <button type="button" class="btn btn-danger"  v-else @click.prevent="$refs.upload.active = false">
                                <i class="fa fa-stop" aria-hidden="true"></i>
                                Stop Upload
                                </button>
                               
                            </div>
                        </div>
                        <div v-else>
                            <div class="form-group">
                                <ul>
                                    <li v-for="(file, index) in file" :key="file.id">
                                    <span>{{index}}</span> -
                                    <span>{{file.name}}</span> -
                                    <span>{{file.size}}</span> -
                                    <!-- <input type="text" :value="file.response" v-model="product.img_path"> -->
                                    <span>{{file.response}}</span> -
                                    <span v-if="file.error">{{file.error}}</span>
                                    <span v-else-if="file.success">success</span>
                                    <span v-else-if="file.active">active</span>
                                    <span v-else-if="file.active">active</span>
                                    <span v-else></span>
                                    <div v-if="file.success">
                                        <img :src="'images/'+file.response" alt="" srcset="">
                                    </div>
                                    </li>
                                </ul>
                                <file-upload
                                    class="btn btn-primary mg-b-0"
                                    post-action="/kemmet/api/products/image"
                                    extensions="gif,jpg,jpeg,png,webp"
                                    accept="image/png,image/gif,image/jpeg,image/webp"
                                    :multiple="false"
                                    :size="1024 * 1024"
                                    v-model="file"
                                    @input-filter="inputFilter"
                                    @input-file="inputFile"
                                    ref="upload">
                                    <i class="fa fa-plus"></i>
                                    Select files
                                </file-upload>
                                <button type="button" class="btn btn-success" v-if="!$refs.upload || !$refs.upload.active" @click.prevent="$refs.upload.active = true">
                                <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                Start Upload
                                </button>
                                <button type="button" class="btn btn-danger"  v-else @click.prevent="$refs.upload.active = false">
                                <i class="fa fa-stop" aria-hidden="true"></i>
                                Stop Upload
                                </button>
                               
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Product Description" rows="10" v-model="product.product_description"></textarea>
                        </div>
                        <br>

                        <div class="row">
                        <h3 class="text-uppercase col-md-4">Pricing Methods</h3> 
                        <div class="col-md-8 text-right">
                            <span>Add More Price Options</span> <button class="btn btn-primary" type="button" @click="addpricenum()">Add One</button>
                        </div>
                        </div>
                        <br>
                            
                        <div class="row" v-for="(pricenum,n) in product.price" :key="n">

                        <div class="form-group col-sm-6">
                            <input class="form-control" v-model="pricenum.product_pricetype" type="text" placeholder="Product Price Type">
                        </div>
                        <div class="form-group col-sm-4">
                            <input class="form-control" v-model="pricenum.product_price" type="text" placeholder="Product Price Value">
                        </div>
                         <div class="form-group col-sm-2">
                            <button class="btn btn-dark" type="button" @click="removepricenum(n)">Remove</button>
                        </div>

                        </div>
                        <br>
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
            <div class="row">
                <div class="col-md-10 offset-md-1">
                        <input class="form-control mg-b-20" type="text" placeholder="Search for some data in here." v-model="search">
                    <table class="table table-striped ">
                        <tr>
                            <th>Sr. No</th>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Product Sub Heading</th>
                            <!-- <th>Date</th> -->
                            <th>Actions</th>
                        </tr>
                        <tr v-for="(product,n) in filterproducts" :key="product.id">
                            <td>{{n+1}}</td>
                            <td> <img :src="product.img_path" width="30" alt="" srcset=""> </td>
                            <td>{{product.product_name.substring(0,30)+".."}}</td>
                            <td>{{product.product_subHeading.substring(0,50)+".."}}</td>
                            <td style="font-size:18px;">
                                <button class="btn-tra" @click="editproduct(product)">
                                    <i class="icon-wrench"></i>
                                </button>
                                <button class="btn-tra" style="margin-left:10px;" @click="deleteproduct(product.id)">
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
            file: [],
            products: [],
            product: {
                _token: document.querySelector("meta[name='csrf-token']").getAttribute("content"),
                product_name: '',
                product_subHeading:'',
                product_description: '',
                img_path:'',
                status:'',
                price:[
                    {
                        product_pricetype: '',
                        product_price:''
                    },
                ],
            },
            product_id:'',
            search:'',
            fileadd:'',
            pagination: {},
            flag: false,
            edit: false,
            editMode: false,
            fileuploaded: false,
            createMode: true,
        };
    },
    watch:{
        file:{
           handler(val){
            // console.log('Val Changed');
            this.product.img_path = 'images/'+this.file[0].response;
            // console.log(this.product.img_path);
            },
            deep: true
        }
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
        inputFilter(newFile, oldFile, prevent) {
            if (newFile && !oldFile) {
                // Before adding a file
                // 添加文件前
                // Filter system files or hide files
                // 过滤系统文件 和隐藏文件
                if (/(\/|^)(Thumbs\.db|desktop\.ini|\..+)$/.test(newFile.name)) {
                return prevent()
                }
                // Filter php html js file
                // 过滤 php html js 文件
                if (/\.(php5?|html?|jsx?)$/i.test(newFile.name)) {
                return prevent()
                }
            }
        },
        inputFile(newFile, oldFile) {
            if (newFile && !oldFile) {
                // add
                console.log('add', newFile)
            }
            if (newFile && oldFile) {
                // update
                console.log('update', newFile)
            }
            if (!newFile && oldFile) {
                // remove
                console.log('remove', oldFile)
            }
            this.fileuploaded = true;
        },
        removepricenum(n){
            this.product.price.splice(n, 1);
            // this.product.price.push({pricetype: '',value:''});
        },
        addpricenum(){
            this.product.price.push({product_pricetype: '',product_price:''});
        },
        fetchData(page_url) {
            let vm = this;
            page_url = page_url || 'kemmet/api/products';
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
                    this.$toaster.success('Product Removed', {timeout: 1500})
                    // alert('Product Removed');
                    this.fetchData();
                })
                .catch(err => console.log(err));
            }
        },
        addproduct() {
            

        if(this.product.img_path && this.product.product_name && this.product.product_subHeading && this.product.product_description){

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
            this.product.product_subHeading = '';
            this.product.img_path = '';
            this.product.product_description = '';
            this.product.price.productype = '';
            this.product.price.value = '';
            this.$toaster.success('Product Added', {timeout: 3000})
            this.fetchData();
            this.product.price = [{product_pricetype: '',product_price:''}];
          })
          .catch(err => console.log(err));
        } else {
            // Update
            fetch('kemmet/api/products', {
            method: 'put',
            body: JSON.stringify(this.product),
            headers: {
                'content-type': 'application/json'
            }
            })
            .then(res => res.json())
            .then(data => {
                this.product.product_name = '';
                this.product.product_subHeading = '';
                this.product.img_path = '';
                this.product.product_description = '';
                this.$toaster.success('Product Updated', {timeout: 3000})
                this.fetchData();
            })
            .catch(err => console.log(err));
        }
        this.editMode = false;
        
        }

        else{
            this.$toaster.success('Either Image or Somefield missing', {timeout: 3000})
        }

        },
        editproduct(product) {
        this.editMode = true;
        this.edit = true;
        this.product.id = product.id;
        this.product.product_id = product.id;
        this.product.product_name = product.product_name;
        this.product.product_subHeading = product.product_subHeading;
        this.product.img_path = product.img_path;
        this.product.product_description = product.product_description;
        this.product.status = product.status;
        this.product.price = product.price;
        },
        newproduct(){
            this.$toaster.success('Create New Product', {timeout: 3000})
            this.editMode=true;
            this.edit = false;
            this.product.id = '';
            this.product.product_id = '';
            this.product.product_name = '';
            this.product.product_subHeading = '';
            this.product.img_path = '';
            this.product.product_description = '';
            this.product.status = '';
            
        },
        goBack(){
            this.editMode= false;
            this.edit=false;
            this.product.price = [{product_pricetype: '',product_price:''}];
        }
    }
    }
</script>

