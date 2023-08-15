import { createRouter, createWebHistory } from 'vue-router'

import Home from '../views/dashboard/Home.vue'
import Settings from '../views/dashboard/Settings.vue'
import History from '../views/dashboard/History.vue'

import SingIn from '../views/SingIn.vue'

const  routes = [
    {
        path:'/',
        name:'SingIn',
        component: SingIn
    },
    {
        path:'/home',
        name:'Home',
        component: Home
    },
    {
        path:'/history',
        name:'History',
        component: History
    },
    {
        path:'/settings',
        name:'Settings',
        component: Settings
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router