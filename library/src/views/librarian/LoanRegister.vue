<script setup>
import ButtonItem from '../../components/items/ButtonItem.vue';
import SuccessPopUpItem from '../../components/items/SuccessPopUpItem.vue';
</script>

<template>
  <div>
    <SuccessPopUpItem v-if="success">
        <template #title>Loan registred</template>
        <template #content>
          <p>UID : #{{ success.uid }}</p>
          <p>Copy ID : #{{ success.copybook }}</p>
          <p>Deadline : {{ success.deadline }}</p>
          <p>By Librarian ID: #{{ success.staff }}</p>
        </template>
        <template #btn-legent>OK</template>
      </SuccessPopUpItem>

    <div class="flex items-center justify-center">
    <form @submit.prevent="handleSubmit" 
      class="flex-col space-y-5
        bg-white
        rounded-md sm:w-[50rem] p-5
        shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px]">
      <h1 class="text-lg font-extrabold">Loan register</h1>

      <span v-if="message" class="text-red-500 font-bold">{{ message }}</span>

      <div class="flex-col space-y-[2rem]">
          <div>
              <label class="font-medium text-gray-900 text-lg">Adherent ID</label>
              <div class="mt-2">
                <input v-model="id_adherent"
                  type="number" 
                  class="w-full p-2 rounded-md border-0 py-1.5 text-gray-900 
                    shadow-sm ring-1 ring-inset ring-gray-300"
                  required/>
              </div>
          </div>
          <div>
            <label class="font-medium text-gray-900 text-lg">Book Copy ID</label>
            <div class="mt-2">
              <input v-model="num_exemplaire"
                type="number" 
                class="w-full p-2 rounded-md border-0 py-1.5 text-gray-900 
                  shadow-sm ring-1 ring-inset ring-gray-300"
                required/>
            </div>
          </div>
          <div>
            <label class="font-medium text-gray-900 text-lg">Deadline</label>
            <div class="mt-2">
              <input v-model="date_echeance"
                type="date" 
                class="w-full p-2 rounded-md border-0 py-1.5
                  shadow-sm ring-1 ring-inset ring-gray-300"
              required/>
            </div>
          </div>   
      </div> 
      <div class="pt-6">
        <ButtonItem>
          <template #text>Validate</template>
        </ButtonItem>
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
      id_adherent: null,
      num_exemplaire: null,
      date_echeance: null,
      message: null,
      success: null,
    }
  },
  methods: {
    async handleSubmit() {
      const inputData = {
        id_adherent: this.id_adherent,
        num_exemplaire: this.num_exemplaire,
        date_echeance: this.date_echeance,
      };

      const authStore = useAuthStore();
      const token = authStore.token;

      const postData = {
        'emprunt': inputData,
        'staff': token,
      };

      // console.log(postData);

      const url = API_URL + 'livre/emprunt';

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

            } else if (data.success) {

              this.success = data.success;
            
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
  

