import Vue from 'vue';
import VeeValidate from 'vee-validate';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

Vue.use(VeeValidate);


window.Vue = Vue; //require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('pages-form', require('./components/admin/pages/PagesFormComponent.vue'));
Vue.component('user-list', require('./components/admin/users/UserListComponent.vue'));

const app = new Vue({
    el: '#app'
});
