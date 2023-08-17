User
<script setup>
import IconHome from './components/icons/IconHome.vue';
import IconHistory from './components/icons/IconHistory.vue';
import IconSetting from './components/icons/IconSetting.vue';
import MenuItem from './components/items/MenuItem.vue';
import Header from './components/Header.vue';
import librarianActionComponent from './components/librarianActionComponent.vue';

import { useAuthStore } from './stores/AuthStore'

const authStore = useAuthStore()

</script> 

<template>
  <div id="nav" 
    v-if="authStore.isAuthenticated" 
    class="bg-gradient-gray-white sm:bg-gradient-none min-h-screen">
    <Header v-if="this.$route.path != '/settings'"/>
    <main>
      <MenuItem>
        <template #home_icon>
          <router-link to="/home" class="my-2 rounded-full py-1 px-1 duration-300 hover:bg-rose-400 hover:text-white">
            <IconHome />
          </router-link>
        </template>
        <template #history_icon>
          <router-link 
            to="/history"
            class="my-2 rounded-full py-1 px-1 duration-300 hover:bg-rose-400 hover:text-white"
            >
            <IconHistory />
          </router-link>
        </template>
        <template #setting_icon>
          <router-link 
            to="/settings"
            class="my-2 rounded-full py-1 px-1 duration-300 hover:bg-rose-400 hover:text-white"
            >
            <IconSetting />
          </router-link>
        </template>
      </MenuItem>
      <router-view></router-view>
      <librarianActionComponent v-if="this.$route.path !== '/settings' && authStore.isAdmin"/>
    </main>
  </div>
  <div v-else>
    <router-view></router-view>
  </div>
</template>


<style scope>
.bg-gradient-gray-white {
  background: #fff;
}

#nav a.router-link-exact-active {
  color: white;
  background: #fb7185;
}

@media (min-width: 640px) {
  .bg-gradient-gray-white {
    background: linear-gradient(to right, #e7e5e4 55%, #fff 50%);
  }}
</style>