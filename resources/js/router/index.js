import Vue from "vue";
import VueRouter from "vue-router";
import articleRoutes from "Modules/article/routes";

Vue.use(VueRouter);

/**
 * Routes.
 * @type {*[]}
 */
const routes = [
    ...articleRoutes,
];

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

export default router;
