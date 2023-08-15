User
<script setup>
import IconHome from './components/icons/IconHome.vue';
import IconHistory from './components/icons/IconHistory.vue';
import IconSetting from './components/icons/IconSetting.vue';
import MenuItem from './components/items/MenuItem.vue';
import Header from './components/Header.vue';

import { useAuthStore } from './stores/AuthStore'

const authStore = useAuthStore()

</script> 

<template>
  <div id="nav" 
    v-if="authStore.isAuthenticated" 
    class="bg-gradient-gray-white sm:bg-gradient-none min-h-screen">
    <Header/>
    <MenuItem>
      <template
        #home_icon>
        <router-link to="/home"><IconHome /></router-link>
      </template>
      <template #history_icon>
        <router-link to="/history"><IconHistory /></router-link>
      </template>
      <template #setting_icon>
        <router-link to="/settings"><IconSetting /></router-link>
      </template>
    </MenuItem>
      <router-view></router-view>
  </div>
  <div v-else>
    <router-view></router-view>
  </div>
</template>


<style scope>
.bg-gradient-gray-white {
  background: #fff;
}

@media (min-width: 640px) {
  .bg-gradient-gray-white {
    background: linear-gradient(to right, #e7e5e4 55%, #fff 50%);
  }}
</style>