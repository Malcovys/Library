<script setup>
import IconUserAdd from './icons/IconUserAdd.vue';
import IconAddBook from './icons/IconAddBook.vue';
import IconActivities from './icons/IconActivities.vue';
import IconPlus from './icons/IconPlus.vue';

import { ref } from 'vue'

const show = ref(false)
</script>

<template>
      <div class="rounded-full fixed bottom-5 right-5 w-[3.2rem] bg-white-200
        shadow-[0_2.8px_2.2px_rgba(0,_0,_0,_0.034),_0_6.7px_5.3px_rgba(0,_0,_0,_0.048),_0_12.5px_10px_rgba(0,_0,_0,_0.06),_0_22.3px_17.9px_rgba(0,_0,_0,_0.072),_0_41.8px_33.4px_rgba(0,_0,_0,_0.086),_0_100px_80px_rgba(0,_0,_0,_0.12)]">
        <div class="flex flex-col ">
            <ul id="#actionContainer"
                v-if="show"
                class="flex flex-col items-center my-3">
                <router-link to="/user/register" class="my-2 rounded-full py-1 px-1 duration-700 hover:bg-rose-400">
                    <IconUserAdd/>
                </router-link>
                <router-link to="/book/add" class="my-2 rounded-full py-1 px-1 duration-700 hover:bg-rose-400">
                    <IconAddBook/>
                </router-link>
                <router-link to="/library/activiry" class="my-2 rounded-full py-1 px-1 duration-700 hover:bg-rose-400">
                    <IconActivities/>
                </router-link>
            </ul>
            <button 
                @click="show = !show"
                class="rounded-full self-center my-2 py-1 px-1 duration-700 hover:bg-rose-400">
                <IconPlus/>
            </button>
        </div>
    </div>
</template>