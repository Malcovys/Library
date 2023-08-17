<script setup>
import { ref } from "vue";
import IconArrowRight from "../../components/icons/IconArrowRight.vue";
import IconCog from "../../components/icons/IconCog.vue";
import ChangePassword from "../ChangePassword.vue";
import ChangeProfilPhoto from "../ChangeProfilPhoto.vue";

const activeButton = ref(null);

function setActiveButton(index) {
  if (activeButton.value === index) {
    activeButton.value = null;
  } else {
    activeButton.value = index;
  }
}
</script>

<template>
  <div id="settingsContent" class="bg-white min-h-screen flex items-center pl-[6rem]">
    <div class="item absolute top-0 left-[3rem] blur-xl"></div>
    <div class="item absolute top-0 -right-4 blur-xl"></div>
    <div class="item absolute -bottom-32 left-20 blur-xl"></div>
  
    <div class="flex flex-col space-y-10">
      <div class="flex items-center justify-center">
        <IconArrowRight/>
        <button
          @click="setActiveButton(0)"
          :style="{
            background: activeButton === 0 ? '#f87171' : 'initial',
            color: activeButton === 0 ? '#ffffff' : 'initial'
          }"
          class="w-[20rem]
            rounded px-6 pb-2 pt-2.5 text-xs 
            font-semibold uppercase shadow-[0 4px 9px -4px #3b71ca] 
            transition duration-150 ease-in-out hover:bg-primary-600
            hover:shadow-[0 8px 9px -4px rgba(59,113,202,0.3),0 4px 18px 0 rgba(59,113,202,0.2)]"
        >Change Password
        </button>
      </div>
      
      <div class="flex items-center">
          <IconArrowRight />
        <button
          @click="setActiveButton(1)"
          :style="{
            background: activeButton === 1 ? '#f87171' : 'initial',
            color: activeButton === 1 ? '#ffffff' : 'initial'
          }"
          class="w-[20rem] rounded px-6 pb-2 pt-2.5 text-xs font-semibold uppercase 
          shadow-[0 4px 9px -4px #3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 
          hover:shadow-[0 8px 9px -4px rgba(59,113,202,0.3),0 4px 18px 0 rgba(59,113,202,0.2)]"
        >
          Edit Profile Photo
        </button>
      </div>
    </div>

    <ChangePassword v-if="activeButton === 0"/>
    <ChangeProfilPhoto v-else-if="activeButton === 1"/>
    <div v-else
      class="absolute right-[16rem] flex flex-col space-y-[-6rem] top-[9rem]">
      <IconCog class="w-[10rem] ml-[1.8rem] animate-custom-spin"/>
      <div class="flex space-x-[-2.5em]">
        <IconCog class="w-[10rem] mt-[3.7rem] animate-custom-spin-reverse"/>
        <IconCog class="w-[10rem] animate-custom-spin"/>
      </div>
    </div>
  </div>
</template>

<style scoped>
#settingsContent div.item {
  height: 18rem;
  width: 18rem;
  background: #a8a29e;
  border-radius: 50%;
  mix-blend-mode: multiply;
  opacity: 0.7;
}

@keyframes custom-spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes custom-spin-reverse {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(-360deg);
  }
}

.animate-custom-spin {
  animation: custom-spin 4s linear infinite;
}

.animate-custom-spin-reverse {
  animation: custom-spin-reverse 5s linear infinite;
}
</style>