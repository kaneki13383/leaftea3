import { createRouter, createWebHistory } from "vue-router";
import MainComponent from '../components/MainComponent.vue';
import CatalogView from '../components/CatalogView.vue';
import ShopView from '../components/ShopView.vue';
import AboutView from '../components/AboutView.vue';
import RegisterComponent from '../components/RegisterComponent.vue';
import LoginComponent from '../components/LoginComponent.vue';
import GetComponent from '../components/GetComponent.vue';
import DashboardComponent from '../components/DashboardComponent.vue';
import AdminView from '../components/AdminView.vue';

const router = new createRouter({
    base: "/",
    history: createWebHistory(),
    routes: [
        { path: "/", component: MainComponent},
        { path: "/catalog", component: CatalogView},
        { path: "/shop", component: ShopView},
        { path: "/about", component: AboutView},
        { path: "/register", component: RegisterComponent},
        { path: "/login", component: LoginComponent},
        { path: "/get", component: GetComponent},
        { path: "/dashboard", component: DashboardComponent},
        { path: "/admin", component: AdminView }
    ],
});

router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('x_xsrf_token')

    if(!token && to.path == '/dashboard'){
        if (to.path === '/login' || to.path === '/register'){
            return next();
        } else{
            return next({
                path: '/login'
            })
        }
    }

    if ((to.path === '/login' || to.path === '/register') && token){
        return next({
            path: '/dashboard'
        })
    }

    next()
})

export default router;