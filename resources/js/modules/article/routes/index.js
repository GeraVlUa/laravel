import Home from 'Modules/article/components/Home.vue';
import Test from 'Modules/article/components/Test.vue';
import SingleArticle from "Modules/article/components/article/SingleArticle";

/**
 * Routes.
 * @type {*}
 */
const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
    }
];

/**
 * @param url
 * @param component
 */
const addRoute = (url, component) => {
    routes.push({
        path: '/' + url,
        name: url,
        component: component
    });
}

addRoute('test', Test);
addRoute('article/:id', SingleArticle);

export default routes;
