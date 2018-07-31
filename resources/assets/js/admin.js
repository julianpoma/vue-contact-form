import router from './routes';
import VueRouter from 'vue-router';

require('./bootstrap');
window.Vue = require('vue');

Vue.use(VueRouter);
Vue.component('index-requests', require('./components/admin/ServicesRequest/Index.vue'));
Vue.component('show-requests', require('./components/admin/ServicesRequest/Show.vue'));
Vue.component('index-dataplans', require('./components/admin/DataPlans/Index.vue'));
Vue.component('create-dataplans', require('./components/admin/DataPlans/Create.vue'));
Vue.component('edit-dataplans', require('./components/admin/DataPlans/Edit.vue'));

new Vue({
    el: '#admin',
    router: router
});