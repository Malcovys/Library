<script setup>
import IconMain from '../icons/IconMain.vue';
</script>

<template>
    <div>
      <IconMain class="z-10 absolute"/>
      <nav 
        class="border-solid border-2 sm:border-r-2 border-gray
          shadow-xl
          fixed bottom-2
          bg-stone-200
          rounded-full sm:rounded-none
          w-[15em] sm:w-20 sm:h-screen md:lg:mt-[14em] sm:pt-[10em] flex justify-center
          "
      >
        <div class="flex sm:flex-col">
            <slot name="home_icon"></slot>
            <slot name="history_icon"></slot>
            <slot name="setting_icon"></slot>
        </div>
      </nav>
    </div> 
</template>