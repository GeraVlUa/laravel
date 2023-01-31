import Vue from "vue";
import router from 'App/router';
import store from 'App/store';
import Layout from "App/Layout/Layout.vue";
import 'App/plugins';

const app = new Vue({
    el: '#app',
    router: router,
    store: store,
    render: h => h(Layout),
});

export default app;
