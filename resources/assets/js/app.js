
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'vuex'

import 'v-toaster/dist/v-toaster.css';

import VueResource      from 'vue-resource';
import Toaster          from 'v-toaster';
import VShowSlide       from 'v-show-slide';
import VueSession       from 'vue-session';
import VueSweetalert2   from 'vue-sweetalert2';
import {store}          from './store/store'

const VueUploadComponent = require('vue-upload-component');
Vue.component('file-upload', VueUploadComponent);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(VueSession);
Vue.use(VueResource);
Vue.use(Toaster, {timeout: 5000});
Vue.use(VShowSlide);
Vue.use(VueSweetalert2);
Vue.use(Vuex);


// Front End Components
Vue.component('example-component',          require('./components/ExampleComponent.vue'));
Vue.component('contact-form',               require('./components/ContactForm.vue'));
Vue.component('contact-section',            require('./components/ContactSection.vue'));
Vue.component('products',                   require('./components/Products.vue'));
Vue.component('products-section',           require('./components/ProductsSection.vue'));
Vue.component('fe-product',                 require('./components/feProduct.vue'));
Vue.component('fe-checkout',                require('./components/Checkout.vue'));
Vue.component('fe-dashboard',               require('./components/UserFE.vue'));
Vue.component('bill-plan',                  require('./components/PlanComponent.vue'));
Vue.component('monthly-return-details',     require('./components/monthlyDetails.vue'));


// Admin Components 
Vue.component('users-section',              require('./components/UsersSection.vue'));
Vue.component('admin-subs',     require('./admin/subs.vue'));

const app = new Vue({
    el: '#app',
    store,

});

