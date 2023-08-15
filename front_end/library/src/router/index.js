import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import History from '../views/History.vue'
import Settings from '../views/Settings.vue'
import SingIn from '../views/SingIn.vue'

const  routes = [
    {
        path: '/',
        name: 'SingIn',
        component: SingIn
    },
    {
        path: '/home',
        name: 'Home',
        component: Dashoard
    },
    {
        path: '/history',
        name: 'History',
        component: History
    },
    {
        path: '/settings',
        name: 'Settings',
        component: Settings
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router