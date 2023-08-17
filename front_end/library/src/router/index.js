import { createRouter, createWebHistory } from 'vue-router';
import { useAuthStore } from '../stores/AuthStore';

import NotFound from '../views/404/NotFound.vue';

import Home from '../views/dashboard/Home.vue';
import Settings from '../views/dashboard/Settings.vue';
import History from '../views/dashboard/History.vue';
import SingIn from '../views/SingIn.vue';
import BookDetails from '../views/BookDetails.vue';

import AddUser from '../views/librarian/AddUser.vue';
import AddBook from '../views/librarian/AddBook.vue';

const  routes = [
    { 
        path:'/', name: "SingIn", component: SingIn, meta: { requiresAuth: false, requirePrivilege: false } 
    },
    { 
        path:'/home', name: "Home", component: Home, meta: { requiresAuth: true , requirePrivilege: false} 
    },
    { 
        path:'/history', name: "History", component: History, meta: { requiresAuth: true, requirePrivilege: false } 
    },
    { 
        path:'/settings', name: "Settings", component: Settings, meta: { requiresAuth: true, requirePrivilege: false } 
    },
    { 
        path:'/book/:id', name: "bookDetails", component: BookDetails, props: true, meta: { requiresAuth: true , requirePrivilege: false} 
    },
    { 
        path:'/:catchAll(.*)', name: "NotFound", component: NotFound, meta: { requiresAuth: true, requirePrivilege: false } 
    },
    { 
        path:'/user/register', name: "AddUser", component: AddUser, meta: { requiresAuth: true, requirePrivilege: true } 
    },
    { 
        path:'/book/add', name: "AddBook", component: AddBook, meta: { requiresAuth: true, requirePrivilege: true } 
    },
    // { 
    //     path:'/library/activiry', name: "Activity", component: Activity, meta: { requiresAuth: true, requirePrivilege: true } 
    // },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    
    const user = useAuthStore();

    if (to.meta.requiresAuth && !user.isAuthenticated) {
        next({ name: "SingIn" });
    } else if (!to.meta.requiresAuth && user.isAuthenticated) {
        next({ name: "Home" });
    } else {
        next();
    }
});



export default router;