<script setup>
import IconWallet from '../icons/IconWallet.vue';

import { onMounted, ref } from 'vue';
import ScrollableItem from '../items/ScrollableItem.vue';
import { useAuthStore } from '../../stores/AuthStore';
import { API_URL } from '../../composables/useApiUrl';

const bookItem =ref(0);

onMounted(async () => {

  const authStore = useAuthStore();
  const requestParameter = authStore.token
  const url = API_URL + 'livre/populaire?token=' + requestParameter;

  fetch(url)
    .then(response => response.json())
    .then(data => {
      if(data.length > 0) {
        bookItem.value = data.items;
      } 
      // console.log(data);
    })
    .catch(error => {
      console.error('PopularComponent : Erreur lors de l\'envoi GET :', error);
    });
})
</script>

<template>
  <div>
    <div>
      <p class="md:text-2xl sm:text-2xl text-1xl top-2 font-bold mobile-title">Popular Now</p>
    </div>
    <div v-if="!bookItem" class="px-5 py-10 sm:h-[14em] sm:w-[39em] flex flex-col items-center justify-center">
        <IconWallet class="w-20 h-20 text-gray-300"/>
        <p class="text-gray-500 font-medium">No popular book</p>
      </div>
    <div v-else class="px-5 py-10 sm:h-[17em] sm:w-[39em] flex flex-row overflow-y-auto rounded-lg">
      <div class="flex flex-row sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">
        <router-link 
         v-for="item in bookItem" :key="item.isbn"
          :to="{ name: 'bookDetails', params: { id: item.isbn } }"
        >
          <ScrollableItem
            :imageSrc="item.imglink"
            :title="item.titre"
          />
        </router-link>
      </div>
    </div>
  </div>
</template>
