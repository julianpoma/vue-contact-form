import VueRouter from 'vue-router';

const routes = [
    { path: '', redirect: '/contacts'},
    { path: '/contacts', name: 'contacts', component: require('./components/admin/Contact/Index.vue') },
    { path: '/contact/:id', name: 'contact-show', component: require('./components/admin/Contact/Show.vue') },
    { path: '/dataplans/', name: 'dataplans', component: require('./components/admin/DataPlan/Index.vue') },
    { path: '/dataplan/create', name: 'dataplan-create', component: require('./components/admin/DataPlan/Create.vue') },
    { path: '/dataplan/:id/edit', name: 'dataplan-edit', component: require('./components/admin/DataPlan/Edit.vue') },
];

export default new VueRouter({
    routes
});

