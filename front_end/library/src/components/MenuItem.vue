<script setup>
import { ref } from 'vue'

const show = ref(false)

</script>

<template>
    <nav 
        class="border-solid border-2 border-gray
            shadow-xl sm:shadow-none 
            rounded-full  sm:rounded-none 
            absolute sm:fixed 
            bottom-5 sm:bottom-0
            right-5 sm:left-0 
            w-10 sm:w-20 sm:h-full">
        <div class="flex flex-col ">
            <ul 
                v-if="show"
                class="flex flex-col items-center my-3">
                <button class="my-2 rounded-full py-1 px-1 duration-700 hover:bg-rose-400"><slot name="home_icon"></slot></button>
                <button class="my-2 rounded-full py-1 px-1 duration-700 hover:bg-rose-400"><slot name="history_icon"></slot></button>
                <button class="my-2 rounded-full py-1 px-1 duration-700 hover:bg-rose-400"><slot name="setting_icon"></slot></button>
            </ul>
            <button 
                @click="show = !show"
                class="rounded-full self-center my-2 py-1 px-1 duration-700 hover:bg-rose-400">
                <slot name="container_icon"></slot>
            </button>
        </div>
    </nav>
  </template>