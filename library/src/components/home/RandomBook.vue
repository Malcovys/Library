<script setup>
import { useAuthStore } from '../../stores/AuthStore';
import { API_URL } from '../../composables/useApiUrl';
import { onMounted, ref } from 'vue';


const randomBook = ref(0);

onMounted(async () => {

  const authStore = useAuthStore();
  const requestParameter = authStore.token;
  const url = API_URL + 'livre/aleatoire?token=' + requestParameter;

    await fetch(url)
    .then(response => response.json())
    .then(data => {
        if(data.message) {

            console.log('RamdomBook : ', data.message);

        } else {

            randomBook.value = data;
            // console.log('RamdomBook : ', data);
        }
        
    })
    .catch(error => {
      console.error('RamdomBook : Erreur lors de l\'envoi GET :', error);
    });
});
</script>
<template>
    <div v-if="randomBook" class="sm:pl-[2em] sm:ml-[5em]">
      <router-link :to="{ name: 'bookDetails', params: { id: randomBook.isbn } }">
        <img class="sm:h-[10em] lg:h-[17em] sm:w-[15em] w-[10em] h-[14em] items-center justify-center 
          shadow-[0_2.8px_2.2px_rgba(0,_0,_0,_0.034),_0_6.7px_5.3px_rgba(0,_0,_0,_0.048),_0_12.5px_10px_rgba(0,_0,_0,_0.06),_0_22.3px_17.9px_rgba(0,_0,_0,_0.072),_0_41.8px_33.4px_rgba(0,_0,_0,_0.086),_0_100px_80px_rgba(0,_0,_0,_0.12)]" 
          :src="randomBook.img">
      </router-link>
    </div>
    <div v-if="randomBook" class="flex flex-col sm:ml-[10em] md:basis-1/2 lg:basis-2/5 sm:basis-3/5 basisi-4/5">
        <div class="flex flex-row">
            <div class="mx-2">
                <p class="text-2xl font-bold">{{ randomBook.titre }}</p>
                <div class="flex-col py-2">
                 <div class="flex">
                  <span class="text-red-700">{{ randomBook.nombre_page }} pages</span>
                 </div>
                </div>
                <div>
                  <p>{{ randomBook.note }}</p>
              </div>
            </div>
        </div>
    </div>
</template>