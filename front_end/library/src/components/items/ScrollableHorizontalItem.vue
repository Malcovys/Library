<script setup>
import { defineProps } from 'vue';

const props = defineProps({
  imageSrc: String,
  title: String,
  page: [String, Number]
});
</script>

<template>
    <div class="flex ml-2 space-x-10 p-5 mt-2 sm:h-[7em] mb-5 sm:w-[37em]
        rounded-lg
        shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)]">
      <div class="flex items-center justify-center">
        <img class="h-[6em] w-[4em] 
            shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)]"
         :src="imageSrc" alt="Book Cover">
      </div>
      <div class="flex flex-col ml-5 font-bold">
        <h2 class="text-lg">{{ title }}</h2>
        <p class="text-gray-600">{{ page }} page</p>
      </div>
      
    </div>
  </template>
  