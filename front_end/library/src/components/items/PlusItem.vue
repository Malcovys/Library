<script setup>
import { ref } from 'vue'

const show = ref(false)

</script>

<template>
    <nav 
        class="border-solid border-2 border-gray
        shadow-xl sm:shadow-none
            rounded-full
            absolute 
            bottom-5 
            right-5 
            w-10 ">
        <div class="flex flex-col ">
            <ul 
                v-if="show"
                class="flex flex-col items-center my-3">
                <button class="my-2 rounded-full py-1 px-1 duration-700 hover:bg-rose-400"><slot name="useradd_icon"></slot></button>
                <button class="my-2 rounded-full py-1 px-1 duration-700 hover:bg-rose-400"><slot name="addbook_icon"></slot></button>
                <button class="my-2 rounded-full py-1 px-1 duration-700 hover:bg-rose-400"><slot name="activities_icon"></slot></button>
            </ul>
            <button 
                @click="show = !show"
                class="rounded-full self-center my-2 py-1 px-1 duration-700 hover:bg-rose-400">
                <slot name="container_icon"></slot>
            </button>
        </div>
    </nav>
  </template>