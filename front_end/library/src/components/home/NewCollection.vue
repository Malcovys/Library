<script setup>
import IconScare from '../icons/IconScare.vue';
import ScrollableHorizontalItemVue from "../items/ScrollableHorizontalItem.vue";

import { useAuthStore } from '../../stores/AuthStore';
import { API_URL } from '../../composables/useApiUrl';
import { onMounted, ref } from 'vue';


const bookItem = ref(null);

onMounted(async () => {
  const authStore = useAuthStore();
  const requestParameter = authStore.token;
  
  const url = API_URL + 'livre/arrivage?token=' + requestParameter;

    fetch(url)
    .then(response => response.json())
    .then(data => {
      bookItem.value = data.items;
    })
    .catch(error => {
      console.error('NewCollection : Erreur lors de l\'envoi GET :', error);
    });
});
</script>

<template>
    <div class="flex-col sm:w-[39em] mt-5">
        <p class="md:text-2xl sm:text-2xl text-1xl mb-2 font-bold mobile-title">New this last 7 days</p>
        <div 
            v-if="!bookItem" 
            class="flex justify-center items-center h-[11em] flex-col">
            <IconScare class="w-20 h-20  text-gray-300"/>
            <p class="text-gray-500 font-medium">No new book</p>
        </div>
        <div v-else class="flex flex-col overflow-x-auto h-[17rem] items-center">
            <router-link
                v-for="item in bookItem" :key="item.isbn"
                    :to="{ name: 'bookDetails', params: { id: item.isbn } }"
            >
                <ScrollableHorizontalItemVue
                    class="flex ml-2 space-x-10 p-5 mt-2 sm:h-[7em] mb-5 sm:w-[37em]
                            rounded-lg
                            shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)]"
                    :imageSrc="item.imglink"
                    :title="item.titre"
                    :page="item.nombre_page"
                />
            </router-link>
        </div>
    </div>
</template>
  