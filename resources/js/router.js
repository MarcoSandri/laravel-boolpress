import Vue from "vue";
import VueRouter from "vue-router";

//Vue utilizza questo componente
Vue.use(VueRouter);

import Home from "./pages/Home.vue";
import ListaPost from "./pages/ListaPost.vue";
import Faq from "./pages/Faq.vue";

const router = new VueRouter({
    mode: 'history',

    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/posts',
            name: 'listaPost',
            component: ListaPost
        },
        {
            path: '/faq',
            name: 'faq',
            component: Faq
        },
    ]


});

export default router