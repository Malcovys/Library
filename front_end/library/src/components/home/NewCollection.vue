<script setup>
import { onMounted, ref } from 'vue';
import ScrollableHorizontalItemVue from "../items/ScrollableHorizontalItem.vue";
import { useAuthStore } from '../../stores/AuthStore';
import { API_URL } from '../../composables/useApiUrl';

const bookItem = ref(null);

onMounted(async () => {
    const authStore = useAuthStore();
    const requestParameter = authStore.token;
    const url = API_URL + 'livre/arrivage?token=' + requestParameter;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            bookItem.value = data;
        })
        .catch(error => {
            console.error('Erreur lors de l\'envoi POST :', error);
        });
});
</script>
<template>
    <div class="flex-col sm:w-[39em]">
        <p class="md:text-2xl sm:text-2xl text-1xl top-5 font-bold mobile-title">Nouvelle collection</p>
        <h1 v-if="!bookItem">{{ bookItem }}</h1>
        <div v-else class="flex flex-col overflow-x-auto mt-5 h-[10em]">
            <div v-for="bookItem in book" :key="bookItem.isbn">
                <ScrollableHorizontalItemVue
                    :imageSrc="book.imglink"
                    :title="book.titre"
                    :chapter="book.nombre_page"/>
            </div>
        </div>        
</div>
</template>