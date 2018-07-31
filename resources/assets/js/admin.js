import router from './routes';
import VueRouter from 'vue-router';

require('./bootstrap');
window.Vue = require('vue');

Vue.use(VueRouter);
Vue.component('index-requests', require('./components/admin/ServicesRequest/Index.vue'));
Vue.component('show-requests', require('./components/admin/ServicesRequest/Show.vue'));
Vue.component('index-dataplans', require('./components/admin/DataPlans/Index.vue'));

new Vue({
    el: '#admin',
    router: router
});