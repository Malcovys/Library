<script setup>
import IconMain from '../icons/IconMain.vue';
</script>

<template>
<div>
    <IconMain class="z-10"/>
    <nav 
        class="border-solid border-2 sm:border-r-2 border-gray
            shadow-xl
            fixed bottom-2
          bg-stone-200
            rounded-full  sm:rounded-none
            w-[15em] sm:w-20 sm:h-screen
            flex items-center justify-center">
        <div class="flex sm:flex-col">
            <a
                :href="homeLink"
                class="my-2 rounded-full py-1 px-1 duration-700 hover:bg-rose-400">
            <slot name="home_icon"></slot></a>

            <a :href="historyLink"
                class="my-2 rounded-full py-1 px-1 duration-700 hover:bg-rose-400">
                <slot name="history_icon"></slot></a>
            <a :href="settingsLink"
                class="my-2 rounded-full py-1 px-1 duration-700 hover:bg-rose-400">
                <slot name="setting_icon"></slot></a>
        </div>
    </nav>
</div> 
</template>
<script>
  export default {
    props: {
        homeLink: String,
        historyLink: String,
        settingsLink: String,
    },
  };
  </script>