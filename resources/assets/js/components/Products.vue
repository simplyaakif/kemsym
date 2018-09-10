
<template>
    <div>
        Hello world
        {{products}}
        <div v-for="(product) in productsdata.data" :key="product.id" >
            {{product_name}}

        </div>
        <!-- <div>{{productsdata}}</div>  -->
    </div>
</template>

<script>
    export default{
        data(){
           return{
               
           }
        },
        
        props:{
            productsdata:Array,
        },
        methods:{

        }
    }
</script>