<template>
    <div class="mr-5 w-[7em] rounded-lg
    shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)]">
      <div class="flex items-center justify-center">
        <img class="h-[10em] "
         :src="imageSrc">
      </div>
      <h2 class="title-font mb-3">{{ title }}</h2>
    </div>
  </template>
  
  <script>
  export default {
    name: 'ScrollableItem',
    props: {
      imageSrc: String,
      title: String,
    },
  };
  </script>
  