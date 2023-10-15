<script setup>
import { ref } from 'vue';
import { useAuthStore } from '../stores/AuthStore';

import IconNotification from './icons/IconNotification.vue';
import IconSearch from './icons/IconSearch.vue';
import UserCard from './header/UserCard.vue'
import SearchBar from './header/SearchBar.vue'

const show = ref(0)

// Nom de l'user a afficher
const authStore = useAuthStore();
</script>

<template>
  <header class="sm:pl-[6rem] pl-[2em]">  
    <div class="flex flex-row py-2">
      <div class="w-full px-3">
        <nav class="relative flex flex-row items-center justify-between px-1 py-3">
          <div class="container px-4 mx-auto flex flex-row items-center justify-between">
            <div class="relative max-w-md w-full">
              <div class="absolute top-1 left-2 inline-flex items-center p-2">
                <IconSearch/>
              </div>
              <SearchBar/>
            </div>
            <div class="flex lg:flex-grow items-center">
              <ul class="flex flex-row lg:flex-row list-none ml-auto">
                <li class="nav-item">
                  <span @click="show = !show"  class="mx-2 text-xs uppercase font-bold leading-snug text-black hover:opacity-75 cursor-pointer">{{ authStore.user }}</span>
                  <div v-if="show" >
                    <UserCard
                      class="flex flex-col items-center justify-center
                        md:w-[30em] md:h-[20em] w-[18em] 
                        rounded-3xl bg-slate-900 border border-black 
                        absolute md:lg:sm:top-[3em] top-[4em] right-0"
                    />
                  </div>
                </li>
                <li class="nav-item">
                  <button><IconNotification/></button>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>
</template>