<template>
  <div>
      <div 
        class="flex items-center justify-center mb-5 text-white"
      >mamitiana.hajaniaina@esti.mg</div>
      <div class="flex flex-col items-center">
          <img class="rounded-full bg-white w-[5em]" 
            src="../../assets/images/user.png" alt="user">
          <p class="text-white">Full name</p>
          <p class="text-white">UID : id</p>
          <button @click="handleLogOut" 
            class="bg-gray-100 m-5 w-[6em] h-10 rounded-lg hover:bg-gray-400"
          >Log out</button>
      </div>
      
  </div>
</template>

<script>
import { items } from '../../composables/useLocaleStorageItems';

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