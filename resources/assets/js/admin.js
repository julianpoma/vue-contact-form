require('./bootstrap');
window.Vue = require('vue');

Vue.component('datatable', require('./components/admin/ServicesRequest/Datatable.vue'));

const admin = new Vue({
    el: '#admin'
});