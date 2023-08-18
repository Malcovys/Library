<script setup>
import { onMounted, ref } from 'vue';
import ScrollableHorizontalItemVue from "../items/ScrollableHorizontalItem.vue";
import { useAuthStore } from '../../stores/AuthStore';
import { API_URL } from '../../composables/useApiUrl';
import IconScare from '../icons/IconScare.vue';

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
        <p class="md:text-2xl sm:text-2xl text-1xl mb-2 font-bold mobile-title">Nouvelle collection</p>
        <div 
            v-if="!bookItem" 
            class="flex justify-center items-center h-[11em]">
            <IconScare class="w-[4rem] h-[4rem] rounded-lg text-gray-400 shadow-[rgba(0,_0,_0,_0.2)_0px_60px_40px_-7px]"/>
        </div>
        <div v-else class="flex flex-col overflow-x-auto h-[11rem] items-center">
            <router-link
                v-for="item in bookItem" :key="item.isbn"
                    :to="{ name: 'bookDetails', params: { id: item.isbn } }"
            >
                <ScrollableHorizontalItemVue
                    :imageSrc="item.imglink"
                    :title="item.titre"
                    :page="item.nombre_page"
                />
            </router-link>
        </div>
    </div>
</template>
  