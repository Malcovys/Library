<template>
    <div class="px-[6.2em] flex flex-col items-center justify-center">
        <img class="enlarge-image w-[9rem] h-[14rem]
        shadow-[rgba(0,_0,_0,_0.2)_0px_60px_40px_-7px]" 
        :src="imageSrc">
        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">{{ title }}</h2>
    </div>
</template>

<script>
export default {
  props: {
    imageSrc: String,
    title: String,
  },
};
</script>