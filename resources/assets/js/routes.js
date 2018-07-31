import VueRouter from 'vue-router';

const routes = [
    { path: '/requests', name: 'requests', component: require('./components/admin/ServicesRequest/Index.vue') },
    { path: '/requests/:id', name: 'requests-show', component: require('./components/admin/ServicesRequest/Show.vue') },
    { path: '/dataplans/', name: 'dataplans', component: require('./components/admin/DataPlans/Index.vue') },
    { path: '/', redirect: '/requests'},
];

export default new VueRouter({
    routes
});

