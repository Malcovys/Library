<script setup>
import ButtonItem from '../../components/items/ButtonItem.vue';
import SuccessPopUpItem from '../../components/items/SuccessPopUpItem.vue';
</script>

<template>
  <div>
    <SuccessPopUpItem v-if="success">
        <template #title>Member registred</template>
        <template #content>
          <p>Email : {{ mail }}</p>
          <p>password : {{ success }}</p>
        </template>
        <template #btn-legent>OK</template>
      </SuccessPopUpItem>
      <div  class="flex items-center justify-center ml-7">
      
      <img 
        src="../../assets/images/add_adherent.png" >

      <form 
      @submit.prevent="handleSubmit" 
      class=" w-full
        p-5 rounded-md shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] bg-white"
      >
        <div class="border-gray-900/10">
          <h1 class="text-lg font-medium leading-7">Member register</h1>

          <span v-if="message" class="text-red-500 font-bold">{{ message }}</span>

          <div class="mt-10 ">
            <div>
              <label class="text-sm font-medium">Fist name</label>
              <div class="mt-2">
                <input v-model="nom"
                  type="text" 
                  class="w-full p-2 rounded-md py-1.5 ring-1 ring-inset ring-gray-300 sm:text-sm"
                  required/>
              </div>
            </div>
  
            <div>
              <label class="text-sm font-medium">Last name</label>
              <div class="mt-2">
                <input v-model="prenom"
                  type="text"  
                  class="w-full p-2 rounded-md py-1.5 ring-1 ring-inset ring-gray-300 sm:text-sm"
                  required/>
              </div>
            </div>
  
            <div>
              <label class="text-sm font-medium">Email</label>
              <div class="mt-2">
                <input v-model="mail" 
                  type="email"
                  class="w-full p-2 rounded-md py-1.5 ring-1 ring-inset ring-gray-300 sm:text-sm"
                  required/>
              </div>
            </div>
  
            <div>
              <label class="text-sm font-medium">Privilege</label>
              <div class="mt-2">
                <select v-model="type_compte"
                   class="w-full p-2  py-1.5  sm:text-sm">
                  <option value="ADR">Simple member</option>
                  <option  value="ADM">Librarian</option>
                </select>
              </div>
            </div>
  
            <div class="flex">
              <div class=" flex">
                <label class="text-sm font-medium self-center">Batch:</label>
                <input v-model="lot"
                  type="text" 
                  class="w-full p-2  py-1.5 border-1 border-b"
                required/>
              </div>
              <div class="flex">
                <label class="text-sm font-medium self-center">Neighborhood:</label>
                <input v-model="quartier"
                  type="text" class="w-full p-2  py-1.5 border-1 border-b"
                required/>
              </div>
            </div>
    
            <div>
              <label class="block text-sm font-medium leading-6">Subscription (Month)</label>
              <div class="mt-2">
                <input v-model="abonnement"
                  type="number"  
                  class="w-full p-2 rounded-md border-0 py-1.5 ring-1 ring-inset ring-gray-300 
                  focus:ring-2 focus:ring-inset  sm:text-sm sm:leading-6"
                required/>
              </div>
            </div>
          </div>
          <div class="pt-10">
            <ButtonItem>
                <template #text>validate</template>
              </ButtonItem>
          </div>
          
        </div>
      </form>
  </div>
  </div>
</template>

<script>
import { API_URL } from '../../composables/useApiUrl';
import { useAuthStore } from '../../stores/AuthStore';

export default {
  data() {
    return {
      nom: '',
      prenom: '',
      mail: '',
      type_compte: 'ADR',
      lot:'',
      quartier: '',
      abonnement: null,
      success: null,
      message:null,
    }
  },
  methods: {
    async handleSubmit() {
      const inputData = {
      nom: this.nom,
      prenom: this.prenom,
      email: this.mail,
      type_compte: this.type_compte,
      adresse: this.lot + ' ' + this.quartier,
      abonement: this.abonnement
      };

      const authStore = useAuthStore();
      const token = authStore.token;

      const postData = {
        'adherent': inputData,
        'staff': token
      };

      const url = API_URL + 'adherent/inscription';

      const requestOption = {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(postData)
      };

      await fetch(url, requestOption)
      .then(response => response.json())
      .then(data => {

          // console.log(data);

          if(data.message){

              this.message = data.message;

            } else if (data.password) {

              this.success = data.password;

            } else {

              this.message = 'Une erreur est survenue.';

            }
          })
          .catch(error => { console.error('Error fetching data:', error); 
        }
      );
    }
  }
}
</script>