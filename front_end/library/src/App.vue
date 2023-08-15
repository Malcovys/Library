<script setup>
import Dashboard from './views/Dashboard.vue';
</script>

<template>
<router-view></router-view>
</template>


<style scope>
.bg-gradient-gray-white {
  background: #fff;
}

#nav a.router-link-exact-active {
  color: white;
  background: #f87171;
}

@media (min-width: 640px) {
  .bg-gradient-gray-white {
    background: linear-gradient(to right, #e7e5e4 55%, #fff 50%);
  }}
</style>
