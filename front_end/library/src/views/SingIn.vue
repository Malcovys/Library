<script setup>
import IconEyeVue from '../components/icons/IconEye.vue';
import ButtonItem from '../components/items/ButtonItem.vue';
</script>

<template>
    <div class="px-4 flex items-center justify-center">
      <div class="md:mx-6 md:p-12 flex flex-col justify-self-center items-center">
        <div class="flex flex-col">
          <img
            class="w-[5rem] h-[5rem]"
            src="../assets/images/logo.png">
          <h4 class="pb-1 text-xl font-semibold text-slate-700">Library</h4>
        </div>
        <form class="p-10 rounded-lg lg:w-[30em] md:w-[40em] shadow-[0_35px_60px_-15px_rgba(0,0,0,0.3)]"
          @submit.prevent="handleSubmit">
          <div v-if="error"
            class="mt-2 text-red-600 font-bold sm:ml-[4rem]">{{ error }}</div>
          <!-- Email input -->
          <div class="mt-4">
            <label class="text-sm">Email</label>
            <input type="email" name="email" class="w-full px-4 py-2 bg-gray-100 rounded-md" placeholder="E-mail" required
              v-model="email"/>
          </div>
          <div class="mt-8">
            <label class="text-sm">Mot de passe</label>
            <div class="relative">
              <input name="password" class="w-full px-4 py-2 bg-gray-100 rounded-md" placeholder="Password"
                :type="showPassword ? 'text' : 'password'"
                v-model="password"/>
              <button type="button" class="absolute top-2 right-2"
                @click="showPassword = !showPassword">
                <IconEyeVue :class="{'text-black-500': !showPassword, 'text-gray-400': showPassword}"/>
              </button>
            </div>
          </div>
          <div class="mt-10 text-center">
            <ButtonItem>
              <template #text>Se connecter</template>
            </ButtonItem>
          </div>
        </form>
      </div>
    </div>
</template>

<script>
import { useAuthStore } from '../stores/AuthStore';

export default {
  data() {
    return {
      email: '', password: '', showPassword: false, error: null
    };
  },
  methods: {
    async handleSubmit() {
      const authStore = useAuthStore()

      await authStore.getToken(this.email, this.password)
      
      if(authStore.isAuthenticated) {

        this.$router.push({ name: "Home"})
        
      } else {
        this.error = authStore.message
      }
    },
  },
};
</script>
