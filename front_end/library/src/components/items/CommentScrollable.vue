<template>
    <div class="sm:flex flex-col w-[20em]">
        <div class="flex">
            <img class="sm:w-20 sm:h-20 w-14 h-14  rounded-full"
            :src="imageSrc">
            <div class="flex flex-col ml-5 self-center">
                <h2 class="font-semibold">{{ name }}</h2>
                <p class="pt-1">Il y a {{ comment }}</p>
            </div>
        </div>
        <span class="text-gray-600 ml-[30rem]">{{ time }}</span>
    </div>
  </template>
  
  <script>
  export default {
    name: 'ScrollableItem',
    props: {
      imageSrc: String,
      name: String,
      comment: String,
      time: String
    },
  };
  </script>
  