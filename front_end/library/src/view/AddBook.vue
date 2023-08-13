<script setup>
import IconSearch from '../components/icons/IconSearch.vue';
import ButtonItem from '../components/items/ButtonItem.vue';
</script>

<template>
  <div 
    class="pt-12 pr-2
      md:flex
      shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)]">
     <div class="flex md:items-center justify-center md:pl-[5em]">
      <img 
        src="../assets/images/book.png" 
        class="md:w-[23em] md:h-[20em] w-[10em] h-[11em]">
     </div> 
      
      <form class="m-2 md:ml-5 w-full p-5 rounded-md shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] ">
          <h1 class="text-base font-medium">Nouveau livre</h1>
          
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
                <label class="text-sm font-medium">ISBN</label>
                <div class="lg:pr-8 lg:pt-4 flex items-center"> 
                  <form class="flex items-center">
                    <div class="relative mr-2 w-full">
                      <input type="text" name="isbn" class="border border-gray-300 text-sm rounded-lg h-[2em]" required>
                    </div>
                    <button type="submit" class="p-2.5 text-sm font-medium ml-auto duration-700 hover:bg-rose-400 rounded-full ">
                        <IconSearch/>
                    </button>
                  </form>
                </div>
              </div>
      
            <div class="sm:col-span-4">
              <label for="titre" class="text-sm font-medium">Titre</label>
              <div class="mt-2">
                <input type="text" name="titre" class="w-full p-2 rounded-md py-1.5 ring-1 ring-inset ring-gray-300 sm:text-sm">
              </div>
            </div>
    
            <div class="sm:col-span-2">
              <label for="num-maison" class="text-sm font-medium">Maison de publication</label>
              <div class="mt-2">
                <input type="text" name="maison" class="w-full p-2 rounded-md py-1.5 ring-1 ring-inset ring-gray-300 sm:text-sm">
              </div>
            </div>

            <div class="sm:col-span-1">
                <label class="text-sm font-medium">Quanité</label>
                <div class="mt-2">
                  <input type="number" name="quantite" class="w-full p-2 rounded-md border-0 py-1.5 ring-1 ring-inset ring-gray-300 sm:text-sm">
                </div>
              </div>
      
              <div class="sm:col-span-3">
                <label class="text-sm font-medium">Catégorie</label>
                <div class="mt-2">
                  <input type="text" name="categorie" class="w-full p-2 rounded-md border-0 py-1.5 ring-1 ring-inset ring-gray-300">
                </div>
              </div>

              <div class="sm:col-span-2">
                <label class="text-sm font-medium">Année de publication</label>
                <div class="mt-2">
                  <input type="year" name="publication"  class="w-full p-2 rounded-md border-0 py-1.5 ring-1 ring-inset ring-gray-300 sm:text-sm">
                </div>
              </div>

              <div class="sm:col-span-6">
                <label for="note" class="text-sm font-medium">Note</label>
                <div class="mt-2">
                    <textarea 
                      name="note" id="note" cols="6" rows="4"
                      class="w-full p-2 rounded-md border-0 py-1.5 ring-1 ring-inset ring-gray-300  sm:text-sm"></textarea>
                </div>
              </div>

              <div class="sm:col-span-6">
                <label class="text-sm font-medium">Description</label>
                <div class="mt-2">
                    <textarea name="descripton" id="description" cols="6" rows="7"
                class="w-full p-2 rounded-md border-0 py-1.5 ring-1 ring-inset ring-gray-300  sm:text-sm"></textarea>
                </div>
              </div>
          </div>
          <div class="mt-10">
            <ButtonItem>
              <template #text>Se connecter</template>
            </ButtonItem>
          </div>    
    </form>
  </div>
  </template>


  <script>
    export default {
        name: "AddBookPage", // Change the name if needed
        methods: {
        handleSubmit() {
            // Handle form submission logic here
            console.log("Form submitted");
        },
        handleCancel() {
            // Handle cancel button logic here
            console.log("Form cancelled");
        },
        },
    };
  </script>
  
  <style scoped>
  /* Your scoped styles here */
  </style>

