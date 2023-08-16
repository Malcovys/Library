import { createRouter, createWebHistory } from 'vue-router'
import { useAuthStore } from '../stores/AuthStore'

import Home from '../views/dashboard/Home.vue'
import Settings from '../views/dashboard/Settings.vue'
import History from '../views/dashboard/History.vue'
import SingIn from '../views/SingIn.vue'

const  routes = [
    { path:'/', name: "SingIn", component: SingIn, meta: { requiresAuth: false } },
    { path:'/home', name: "Home", component: Home, meta: { requiresAuth: true } },
    { path:'/history', name: "History", component: History, meta: { requiresAuth: true } },
    { path:'/settings', name: "Settings", component: Settings, meta: { requiresAuth: true } }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

router.beforeEach((to, from, next) => {

    const user = useAuthStore()

   if (to.meta.requiresAuth && !user.isAuthenticated){ next({ name: "SingIn" }) } 
   else if (!to.meta.requiresAuth && user.isAuthenticated) { next({ name: "Home" }) }
   else { next() }
   
})

export default router