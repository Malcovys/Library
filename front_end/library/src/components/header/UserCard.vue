<script setup>
import { useAuthStore } from '../../stores/AuthStore';
import { onMounted, ref } from 'vue';

const user = ref(null);

onMounted(async () => {
  const authStore = useAuthStore();
  const url = API_URL + 'adherent?token=' + authStore.token;
  
  fetch(url)
    .then(response => response.json())
    .then(data => {

      if(data.user) {
        user.value = {
        id: data.user.id_adherent, 
        nom: data.user.nom,
        prenom: data.user.prenom,
        email: data.user.mail,
        }

      } else if (data.message) {
        console.log(data.message);
      } else {
        console.log('UserCard: Une erreur est survenue.');
      }
    })
    .catch(error => {
      console.error('UserCard: Erreur lors de l\'envoi GET :', error);
    });
})
</script>

<template>
  <div>
      <div 
        class="flex items-center justify-center mb-5 text-white"
      >{{ user.email }}</div>
      <div class="flex flex-col items-center">
          <img class="rounded-full bg-white w-[5em]" 
            src="../../assets/images/user.png" alt="user">
          <p class="text-white">{{ user.nom + ' ' + user.prenom }}</p>
          <p class="text-white">UID : {{ user.id }}</p>
          <button @click="handleLogOut" 
            class="bg-gray-100 m-5 w-[6em] h-10 rounded-lg hover:bg-gray-400"
          >Log out</button>
      </div>
      
  </div>
</template>

<script>
import { items } from '../../composables/useLocaleStorageItems';
import { useAuthStore } from '../../stores/AuthStore';
import { ref } from 'vue';
import { API_URL } from '../../composables/useApiUrl';

export default {
  methods: {
    handleLogOut() {
      let i;

      for(i=0; i < items.length ; i++){

        window.localStorage.removeItem(items[i]);

        window.location.reload();
      }
    }
  }
}
</script>