<script setup>
import IconSearch from '../../components/icons/IconSearch.vue';
import ButtonItem from '../../components/items/ButtonItem.vue';
import SuccessPopUpItem from '../../components/items/SuccessPopUpItem.vue';
</script>

<template>
  <div class="md:flex mx-2">
     <div class="md:mt-[5rem] md:pl-[5em]">
      <img v-if="imageElement" 
        :src="imageElement" 
        class="md:w-[20em] md:h-[20em] w-[10em] h-[11em]"
      >
    </div> 

    <SuccessPopUpItem v-if="success">
      <template #title>SUCCESS</template>
      <template #content>
        <div class="felx flex-col">
          <p>Put the following copy number for each:</p>
          <span>{{ success }}</span>
        </div>
      </template>
      <template #btn-legent>OK</template>
    </SuccessPopUpItem>
      
      <form 
        @submit.prevent="handleSubmit" 
        class=" bg-white m-2 md:ml-5 p-5 rounded-md 
          shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] ">
          <h1 class="text-base font-medium mb-5">New book 📚</h1>

          <span v-if="message" class="text-red-500 font-bold">{{ message }}</span>
          
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
                <label class="text-sm font-medium">ISBN (only the number)</label>
                <div class="lg:pr-8 lg:pt-4 flex items-center"> 
                  <form @submit.prevent="handleSearch" class="flex items-center">
                    <div class="relative mr-2 w-full">
                      <input type="text" v-model="isbn" class="border border-gray-300 text-sm rounded-lg h-[2em]" 
                      required>
                    </div>
                    <button type="submit" class="p-2.5 text-sm font-medium ml-auto duration-700 hover:bg-rose-400 rounded-full ">
                        <IconSearch/>
                    </button>
                  </form>
                </div>
              </div>
      
            <div class="sm:col-span-4">
              <label for="titre" class="text-sm font-medium">Title</label>
              <div class="mt-2">
                <input type="text" v-model="titre" class="w-full p-2 rounded-md py-1.5 ring-1 ring-inset ring-gray-300 sm:text-sm" 
                required>
              </div>
            </div>
    
            <div class="sm:col-span-2">
              <label for="num-maison" class="text-sm font-medium">Publisher</label>
              <div class="mt-2">
                <input type="text" v-model="maison" class="w-full p-2 rounded-md py-1.5 ring-1 ring-inset ring-gray-300 sm:text-sm" 
                required>
              </div>
            </div>

            <div class="sm:col-span-1">
                <label class="text-sm font-medium">Author</label>
                <div class="mt-2">
                  <input type="text" v-model="auteur" class="w-full p-2 rounded-md border-0 py-1.5 ring-1 ring-inset ring-gray-300 sm:text-sm" 
                  required>
                </div>
              </div>
      
              <div class="sm:col-span-3">
                <label class="text-sm font-medium">Category</label>
                <div class="mt-2">
                  <input type="text" v-model="categorie" class="w-full p-2 rounded-md border-0 py-1.5 ring-1 ring-inset ring-gray-300" 
                  required>
                </div>
              </div>

              <div class="sm:col-span-2">
                <label class="text-sm font-medium">Publication year</label>
                <div class="mt-2">
                  <input type="year" v-model="publication" class="w-full p-2 rounded-md border-0 py-1.5 ring-1 ring-inset ring-gray-300 sm:text-sm"
                  required>
                </div>
              </div>

              <div class="sm:col-span-6">
                <label for="note" class="text-sm font-medium">Page number</label>
                <div class="mt-2">
                    <input type="number" v-model="nombre_page" class="w-full p-2 rounded-md border-0 py-1.5 ring-1 ring-inset ring-gray-300  sm:text-sm"
                    required>
                </div>
              </div>

              <div class="sm:col-span-6">
                <label for="note" class="text-sm font-medium">Quantity</label>
                <div class="mt-2">
                    <input type="number" v-model="quantite" class="w-full p-2 rounded-md border-0 py-1.5 ring-1 ring-inset ring-gray-300  sm:text-sm"
                    required>
                </div>
              </div>

              <div class="sm:col-span-6">
                <label for="note" class="text-sm font-medium">About</label>
                <div class="mt-2">
                    <textarea 
                      v-model="note"  cols="6" rows="4"
                      class="w-full p-2 rounded-md border-0 py-1.5 ring-1 ring-inset ring-gray-300  sm:text-sm" required></textarea>
                </div>
              </div>

              <div class="sm:col-span-6">
                <label class="text-sm font-medium">Description</label>
                <div class="mt-2">
                    <textarea v-model="description"  cols="6" rows="7"
                class="w-full p-2 rounded-md border-0 py-1.5 ring-1 ring-inset ring-gray-300  sm:text-sm" required></textarea>
                </div>
              </div>
          </div>
          <div class="mt-10">
            <ButtonItem>
              <template #text>Validate</template>
            </ButtonItem>
          </div>    
    </form>
  </div>
</template>
    
<script>
import { API_URL} from '../../composables/useApiUrl';
import { useAuthStore } from '../../stores/AuthStore';

export default {
  data () {
    return {
      imageElement:'',
      isbn : '',
      titre :'' , 
      maison :'' ,
      quantite: 1, 
      categorie : '',
      publication:'',
      note : '',
      description:'', 
      message: null,
      auteur: '',
      nombre_page: null,
      success: null
    }
  },
  methods: {
    async handleSearch() {

      await fetch("https://www.googleapis.com/books/v1/volumes?q=isbn:"+this.isbn)
      .then(response => response.json())
      .then(data => {
        
        // console.log(data);

          if (data.items && data.items.length > 0) {
            const bookInfo = data.items[0].volumeInfo;
            this.imageElement = bookInfo.imageLinks ? bookInfo.imageLinks.thumbnail : '';
            this.titre = bookInfo.title;
            this.maison= bookInfo.publisher || 'Unknown';
            this.categorie = bookInfo.categories ? bookInfo.categories.join(', ') : 'Unknown';
            this.publication = bookInfo.publishedDate || 'Unknown';
            this.note = data.items[0].searchInfo.textSnippet;
            this.description = bookInfo.description || 'Unknown';
            this.auteur = bookInfo.authors || 'Unknown';
            this.nombre_page = bookInfo.pageCount || 'Unknown';

            this.message = null;

          } else {
            this.message = "Not found";
            this.isbn = "";
          }
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
    },
    async handleSubmit() {

      const authStore = useAuthStore();

      const inputData = { 
        isbn: this.isbn,
        img: this.imageElement, 
        titre: this.titre,
        maison_edition: this.maison,
        categorie: this.categorie, 
        date_publication: this.publication, 
        note: this.note, 
        description: this.description,
        auteur: this.auteur,
        nombre_page: this.nombre_page,
        quantite: this.quantite
      };
      
      const postData = { 'livre': inputData, 'staff': authStore.token }

      const url = API_URL+'livre/ajout'
      const requestOption = {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(postData)
      }

      await fetch(url, requestOption)
          .then(response => response.json())
          .then(data => {
            // console.log(data);
            if(data.message){
              this.message = data.message;
              // console.log(data.message);
            } else if(data.new) {
              console.log(data.new);
              this.success = data.new;
            } else {
                this.message = 'Une erreur est survenue.';
              }
            })
          .catch(error => { console.error('Error fetching data:', error); });
    },

  },
}
  </script>
