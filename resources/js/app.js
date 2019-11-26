/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('impl-create', require('./components/impl/create.vue').default);
Vue.component('access-create', require('./components/access/create.vue').default);
Vue.component('unit-create', require('./components/unit/create.vue').default);

Vue.component('vend-otc', require('./components/vend/otc.vue').default);
Vue.component('vend-unit', require('./components/vend/unit.vue').default);

Vue.component('customer-create', require('./components/customer/create.vue').default);
Vue.component('customer-show', require('./components/customer/show.vue').default);
Vue.component('document-upload', require('./components/document/upload.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue)

import Toasted from 'vue-toasted';
Vue.use(Toasted, {
    duration: 5000,
    position: "top-right",
});






const app = new Vue({
    el: '#app',
});
