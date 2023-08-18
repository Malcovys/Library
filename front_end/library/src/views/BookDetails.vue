<script setup>
import { useAuthStore } from '../stores/AuthStore';
import { onMounted, ref, defineProps } from 'vue';
import { API_URL } from '../composables/useApiUrl';


const props = defineProps(['id']);

const bookDetails = ref(null);

onMounted(async() => {
    const authStore = useAuthStore();
    const isbn = props.id;
    const token = authStore.token;
    const url = API_URL + 'livre/infos?token=' + token + '&isbn=' + isbn;

    await fetch(url)
    .then(response => response.json())
    .then(data => {

      console.log(data);

      if(data.message) {

        bookDetails.value = {
          isNotFound: true
        };
      } else {
        bookDetails.value = data;
      }
      
      console.log(bookDetails);
    })
    .catch(error => {
      console.error('BookDetails: Erreur lors de l\'envoi GET :', error);
    });
});
</script>

<template>
  <div v-if="bookDetails"
    class="flex flex-col h-screen+[2rem]">

    <div class="grid md:grid-cols-2 items-center">
      <div class="mx-auto md:basis-1/2 lg:basis-2/5">
          <img 
            class="md:lg:sm:absolute z-1 top-20 w-[12rem] h-[17rem]
            shadow-[rgba(0,_0,_0,_0.25)_0px_25px_50px_-12px] " 
            :src="bookDetails.img" alt="coverBook">
        </div>
        <div class="text-center md:pl-[6.5em] md:basis-1/2 md:text-start lg:basis-3/5">
          <h1 class="md:text-4xl text-2xl font-bold font-pacifico">{{ bookDetails.titre }}</h1>
          <p  v-if="bookDetails.nom_auteur" class="text-gray-700 py-2">{{ bookDetails.nom_auteur }}</p>
          <p class="pr-5">{{ bookDetails.note }}</p>
        </div>

    </div>

    <div class="bg-white h-screen
      shadow-[0px_10px_1px_rgba(221,_221,_221,_1),_0_10px_20px_rgba(204,_204,_204,_1)]
      rounded-2xl ml-[7rem] mr-[2rem] mt-[8rem] p-10">
    <div class="flex flex-row ml-16">
      <div class="flex flex-col space-y-10 w-[50rem]">
        <div class="flex flex-col">
          <p class="font-bold">Description</p>
          <p class="md:lg:sm:mr-8 pt-8 mr-8" >{{ bookDetails.description }}</p>
        </div>
        
        <div>
          <div class=" container flex flex-row pt-10">
            <img class="w-[50px] h-[50px] rounded-full gap-2" src="../assets/images/deadpool.jpg" alt="">
            <div class="flex flex-col">
              <p class="pl-10 font-semibold" >Mamitiana</p>
              <p class="text-center pl-10 pt-5">Comments</p>
            </div>
          </div>
        </div>

      </div>

      <div class="flex flex-col space-y-[1rem]">
        <p class="font-bold">Editors</p>
        <p> {{ bookDetails.maison_edition }}</p>
        <p class="font-bold">Details :</p>
        <p>category : {{ bookDetails.categorie }}</p>
        <p>Page count : {{ bookDetails.nombre_page }}</p>
        <p>Publishing date : {{ bookDetails.date_publication }}</p>
        <p class="font-bold">Paperback</p>
        <p>ISBN : {{ bookDetails.isbn }}</p>
      </div>
      </div>
    </div>
  </div>
</template>

<style>
.font-pacifico {
font-family: 'Pacifico', cursive;
}
</style>