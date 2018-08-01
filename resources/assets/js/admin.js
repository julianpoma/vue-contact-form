import router from './routes';
import VueRouter from 'vue-router';

require('./bootstrap');
window.Vue = require('vue');

Vue.use(VueRouter);

Vue.component('index-contact', require('./components/admin/Contact/Index.vue'));
Vue.component('show-contact', require('./components/admin/Contact/Show.vue'));
Vue.component('index-dataplans', require('./components/admin/DataPlan/Index.vue'));
Vue.component('create-dataplans', require('./components/admin/DataPlan/Create.vue'));
Vue.component('edit-dataplans', require('./components/admin/DataPlan/Edit.vue'));

new Vue({
    el: '#admin',
    router: router
});