<script setup>
import Menu from './components/Menu.vue';
import ApiTest from './view/ApiTest.vue';
import SingIn from './view/SingIn.vue';
import Header from './components/Header.vue';
import Home from './view/Home.vue';

</script>

<template>
    <div class="bg-gradient-gray-white sm:bg-gradient-none">
        <Menu/>
        <Header/>
        <Home/>
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
