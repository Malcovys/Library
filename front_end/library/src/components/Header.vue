<script setup>
import { ref } from 'vue';
const show = ref(0)
</script>

<template>
  <header class="sm:pl-[4em] pl-[2em]">  
    <div class="flex flex-row py-2">
      <div class="w-full px-3">
        <nav class="relative flex flex-row items-center justify-between px-1 py-3">
          <div class="container px-4 mx-auto flex flex-row items-center justify-between">
            <div class="relative max-w-md w-full ">
              <div class="absolute top-1 left-2 inline-flex items-center p-2">
                <IconSearch/>
              </div>
              <input class="w-full h-10 pl-10 pr-4 py-1 text-base placeholder-gray-500 border rounded-full" type="search" placeholder="Chercher un livre">
            </div>
            <div class="flex lg:flex-grow items-center">
              <ul class="flex flex-row lg:flex-row list-none ml-auto">
                <li class="nav-item">
                  <span @click="show = !show"  class="mx-2 text-xs uppercase font-bold leading-snug text-black hover:opacity-75 cursor-pointer">Mamitiana</span>
                  <div v-if="show" class="md:w-[30em] md:h-[20em] w-[18em]  rounded-3xl bg-slate-900 border border-black absolute md:lg:sm:top-[3em] top-[4em] right-0">
                    <!-- Contenu du conteneur généré -->
                    <div class="flex flex-col items-center justify-center py-4 ">
                        <div class="flex items-center justify-center mb-5 text-white">mamitiana.hajaniaina@esti.mg
                        </div>
                        <div class="flex items-center justify-center rounded-full w-[6em] h-[6em] bg-white relative">
                            <img class="rounded-full w-[6em] h-[6em]" src="../assets/images/user.png" alt="">
                        </div>
                        <span class="mb-5 mt-2 text-white">Mamitiana</span>
                        <button class="bg-gray-100 m-5 w-[6em] h-10 rounded-lg">Log out</button>
                    </div>
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

<script>
import IconSearch from './icons/IconSearch.vue';
import IconNotification from './icons/IconNotification.vue';
</script>
