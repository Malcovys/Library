<script setup>
import EnlargableItem from './items/EnlargableItem.vue';

import { useAuthStore } from '../../stores/AuthStore';
import { onMounted, ref } from 'vue';
import { API_URL } from '../../composables/useApiUrl';


const bookList = ref(null);

onMounted(async() => {
    const authStore = useAuthStore();
    const token = authStore.token;
    const url = API_URL + 'livre/list?token=' + token;

    await fetch(url)
    .then(response => response.json())
    .then(data => {
        console.log(data);
        bookList.value = data;
        console.log(bookList);
    })
    .catch(error => {
      console.error('SwitchComponent: Erreur lors de l\'envoi GET :', error);
    });
});

</script>
<template>
    <section class="text-gray-600 body-font md:ml-[6em]">
    <div class="px-5 py-10 scrolling-container flex">
      <router-link 
        v-for="book in bookList" :key="book.isbn"
        :to="{ name: 'bookDetails', params: { id: book.isbn } }"
      >
        <EnlargableItem class="enlarge-image" :imageSrc="book.img" :title="book.titre"/>
      </router-link>
      </div>
  </section>
</template>

<style scoped>
.scrolling-container {
  overflow-x: scroll;
  white-space: nowrap;
}

@keyframes movingY {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-10px);
  }
}

/* Ajout de la classe pour l'effet d'agrandissement */
.enlarge-image {
  transition: transform 1s ease-in-out;
}

.enlarge-image:hover {
  transform: scale(1.2);
}

.scroll-controls {
  position: sticky;
  display: flex;
  justify-content: flex-end;
  background-color: transparent;
  padding: 8px;
}

.scroll-controls button {
  margin-left: 8px;
}
</style>