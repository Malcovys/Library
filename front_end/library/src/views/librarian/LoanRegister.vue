<script setup>
import ButtonItem from '../../components/items/ButtonItem.vue';
</script>

<template>
          <form class=" ml-[10rem] p-[5rem] rounded-md shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] w-[50rem]">
     
            <div class="border-b border-gray-900/10 pb-12">
              <h1 class="text-base font-extrabold leading-7"> Enregisterement d'un prêt</h1>
              
              <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="num-adherent" class="block text-sm font-medium leading-6 text-gray-900">Numéro de l'adhérent</label>
                    <div class="mt-2">
                      <input type="text" name="num-adherent" id="num-adherent"  class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                  </div>
          
                  <div class="sm:col-span-4">
                    <label for="isbn" class="block text-sm font-medium leading-6 text-gray-900">ISBN du livre</label>
                    <div class="mt-2">
                      <input type="text" name="isbn" id="isbn" class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                  </div>

                  <div class="sm:col-span-4">
                    <label for="date" class="block text-sm font-medium leading-6 text-gray-900">Date d'échéance</label>
                    <div class="mt-2">
                      <input type="date" name="date-echeance" id="date-echeance"  class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                  </div>                               
              </div>
                <ButtonItem class="mt-[5rem]">
                  <template #text>Validate</template>
                </ButtonItem>
            </div> 
        </form>
</template>


<script>
  
</script>
  
  <style scoped>
  /* Your scoped styles here */
  </style>

