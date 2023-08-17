<script setup>

import IconSearch from '../../components/icons/IconSearch.vue';
import ButtonItem from '../../components/items/ButtonItem.vue';


</script>

<template>
  <div 
    class="pt-12 pr-2
      md:flex
      shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)]">
     <div class="flex md:items-center justify-center md:pl-[5em]">
      <img v-if="imageElement" 
        :src="imageElement" 
        class="md:w-[23em] md:h-[20em] w-[10em] h-[11em]">
        <!-- <input type="hidden" v-model="imageElement"> -->
     </div> 
      
      <form @submit.prevent="handleSubmit" class="m-2 md:ml-5 w-full p-5 rounded-md shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] ">
          <h1 class="text-base font-medium">Nouveau livre</h1>
          
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
                <label class="text-sm font-medium">ISBN</label>
                <div class="lg:pr-8 lg:pt-4 flex items-center"> 
                  <form @submit.prevent="handleSearch" class="flex items-center">
                    <div class="relative mr-2 w-full">
                      <input type="text" v-model="isbn" id="isbn" class="border border-gray-300 text-sm rounded-lg h-[2em]" required>
                    </div>
                    <button type="submit" id="searchButton" class="p-2.5 text-sm font-medium ml-auto duration-700 hover:bg-rose-400 rounded-full ">
                        <IconSearch/>
                    </button>
                  </form>
                </div>
              </div>
      
            <div class="sm:col-span-4">
              <label for="titre" class="text-sm font-medium">Titre</label>
              <div class="mt-2">
                <input type="text" v-model="titre" id="titre" class="w-full p-2 rounded-md py-1.5 ring-1 ring-inset ring-gray-300 sm:text-sm">
              </div>
            </div>
    
            <div class="sm:col-span-2">
              <label for="num-maison" class="text-sm font-medium">Maison de publication</label>
              <div class="mt-2">
                <input type="text" v-model="maison" id="maison" class="w-full p-2 rounded-md py-1.5 ring-1 ring-inset ring-gray-300 sm:text-sm">
              </div>
            </div>

            <div class="sm:col-span-1">
                <label class="text-sm font-medium">Quanité</label>
                <div class="mt-2">
                  <input type="number" v-model="quantite" class="w-full p-2 rounded-md border-0 py-1.5 ring-1 ring-inset ring-gray-300 sm:text-sm">
                </div>
              </div>
      
              <div class="sm:col-span-3">
                <label class="text-sm font-medium">Catégorie</label>
                <div class="mt-2">
                  <input type="text" v-model="categorie" id="categorie" class="w-full p-2 rounded-md border-0 py-1.5 ring-1 ring-inset ring-gray-300">
                </div>
              </div>

              <div class="sm:col-span-2">
                <label class="text-sm font-medium">Année de publication</label>
                <div class="mt-2">
                  <input type="year" v-model="publication" id="publication" class="w-full p-2 rounded-md border-0 py-1.5 ring-1 ring-inset ring-gray-300 sm:text-sm">
                </div>
              </div>

              <div class="sm:col-span-6">
                <label for="note" class="text-sm font-medium">Note</label>
                <div class="mt-2">
                    <textarea 
                      v-model="note"  cols="6" rows="4"
                      class="w-full p-2 rounded-md border-0 py-1.5 ring-1 ring-inset ring-gray-300  sm:text-sm"></textarea>
                </div>
              </div>

              <div class="sm:col-span-6">
                <label class="text-sm font-medium">Description</label>
                <div class="mt-2">
                    <textarea v-model="description"  cols="6" rows="7"
                class="w-full p-2 rounded-md border-0 py-1.5 ring-1 ring-inset ring-gray-300  sm:text-sm"></textarea>
                </div>
              </div>
          </div>
          <div class="mt-10">
            <ButtonItem>
              <template #text>Ajouter</template>
            </ButtonItem>
          </div>    
    </form>
  </div>
  </template>


 
    
  <script>

  import { API_URL} from '../../composables/useApiUrl';
    export default {

      data () {
        return {
          imageElement:'',
          isbn : '',
          titre :'' , 
          maison :'' ,
          quantite: null,
          categorie : '',

          publication:'',
          note : '',
          description:''
          
        }
      },
      methods: {
        async handleSearch() {

         await fetch(`https://www.googleapis.com/books/v1/volumes?q=isbn:${this.isbn}`)
          .then(response => {
            if (!response.ok) {
              throw new Error('Livre non trouvé');
            }
            return response.json();
          })
          .then(data => {
            if (data.items && data.items.length > 0) {
              const bookInfo = data.items[0].volumeInfo;
              this.imageElement = bookInfo.imageLinks ? bookInfo.imageLinks.thumbnail : '';
              this.titre = bookInfo.title;
              this.maison= bookInfo.publisher || 'Pas de maison de publication';
              this.categorie = bookInfo.categories ? bookInfo.categories.join(', ') : 'Catégorie inconnue';
              this.publication = bookInfo.publishedDate || 'année de publication non mentionnée';
              this.note = data.items[0].searchInfo.textSnippet;
              this.description = bookInfo.description || 'pas de description';
              this.errorMessage = '';
            } else {
              errorMessage.value = 'Livre non trouvé';
              clearFields();
            }
          })
          .catch(error => {
            console.error('Error fetching data:', error);
            errorMessage.value = 'Une erreur s\'est produite lors de la recherche';
            clearFields();
          });
        }, 

       clearFields () {
          this.imageElement = '';
          this.titre = '';
          this.maison = '';
          this.categorie = '';
          this.publication = '';
          this.note = '';
          this.description = '';
        },

        async handleSubmit() {
        const inputData = { 
          img: this.imageElement, 
          titre: this.titre,
          maison_edition: this.maison,
          categorie: this.categorie, 
          date_publication: this.publication, 
          note: this.note, 
          description: this.description
         };

         const token = 'test';

         const postData = {
          'livre': inputData, 
          'staff': token 
         }
         
          const url = API_URL+'livre/ajout'
          const requestOption = {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
              },
              body: JSON.stringify(postData)
          }

          fetch(url, requestOption)
              .then(response => response.json())
              .then(data => {
                  this.treate(data);

                })
              .catch(error => {
                  console.error('Erreur lors de l\'envoi POST :', error);
            })
          

      }


      },
      


      
      
    }
  </script>
  
  <style scoped>
  /* Your scoped styles here */
  </style>

