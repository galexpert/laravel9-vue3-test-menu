import {createRouter, createWebHistory} from "vue-router";
//import Container from "../views/layouts/Container.vue";
//import Dashboard from "../views/Pages/Dashboard.vue";
//import UserProfile from "../views/Pages/UserProfile.vue";

import store from "../store";

import DashboardAdmin from "../views/layouts/DashboardAdmin.vue";
import UsersPermissions from "../views/layouts/UsersPermissions.vue";
import UsersManagement from "../views/layouts/UsersManagement.vue";


const routes = [
    {
        path: '/',
        name: DashboardAdmin,
        component: DashboardAdmin
    },
    {
        path: '/users/list',
        name: DashboardAdmin,
        component: DashboardAdmin
    },
    {
        path: '/users/permissions',
        name: UsersPermissions,
        component: UsersPermissions
    },
    {
        path: '/users/management',
        name: UsersManagement,
        component: UsersManagement
    },

  /*  {
        path: '/tags/:id',
        name: 'tags',
        component: ArticleComponent
    },*/
/*    {
        path: '/admin',
        name: HomeAdmin,
        component: HomeAdmin
    },*/


]
console.log('routes', routes)
// создаем роутер
const router = createRouter({
    // createWebHistory убирает # из ссылок
    routes, history: createWebHistory(import.meta.env.APP_URL),
})


export default router
