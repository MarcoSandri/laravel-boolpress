import Vue from "vue";
import VueRouter from "vue-router";

//Vue utilizza questo componente
Vue.use(VueRouter);

import Home from "./pages/Home.vue";
import ListaPost from "./pages/ListaPost.vue";
import Faq from "./pages/Faq.vue";
import SinglePost from "./pages/SinglePost.vue";

const router = new VueRouter({
    mode: 'history',

    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/faq',
            name: 'faq',
            component: Faq
        },
        {
            path: '/posts',
            name: 'listaPost',
            component: ListaPost
        },
        {
            path: '/posts/:slug',
            name: 'singlePost',
            component: SinglePost
        }
    ]


});

export default router