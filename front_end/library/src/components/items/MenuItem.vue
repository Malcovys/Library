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
          rounded-full sm:rounded-none
          w-[15em] sm:w-20 sm:h-screen
          flex items-center justify-center"
      >
        <div class="flex sm:flex-col">
          <a 
            class="my-2 rounded-full py-1 px-1 duration-300 hover:bg-rose-400 hover:text-white"
            :class="{ 'bg-rose-400 text-white': activeButton === 0 }"
            @click="updateActiveButton(0)"
          >
            <slot name="home_icon"></slot>
          </a>
  
          <a 
            class="my-2 rounded-full py-1 px-1 duration-300 hover:bg-rose-400 hover:text-white"
            :class="{ ' bg-rose-400 text-white': activeButton === 1 }"
            @click="updateActiveButton(1)"
          >
            <slot name="history_icon"></slot>
          </a>
          
          <a 
            class="my-2 rounded-full py-1 px-1 duration-300 hover:bg-rose-400 hover:text-white"
            :class="{ 'bg-rose-400 text-white': activeButton === 2 }"
            @click="updateActiveButton(2)"
          >
            <slot name="setting_icon"></slot>
          </a>
        </div>
      </nav>
    </div> 
</template>
  
<script>
import { ref } from 'vue';

const activeButton = ref(0);

const updateActiveButton = (index) => {
  activeButton.value = index;
};

export default {
  setup() {
    return {
      activeButton,
      updateActiveButton,
    };
  },
};
</script>
  