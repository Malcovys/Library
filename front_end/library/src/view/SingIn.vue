<script setup>
import IconEyeVue from '../components/icons/IconEye.vue';
import ButtonItem from '../components/items/ButtonItem.vue';
</script>

<template>
    <div class="px-4 flex items-center justify-center">
      <div class="md:mx-6 md:p-12">
        <div class="text-center">
          <h4 class="mt-12 pb-1 text-xl font-semibold text-slate-700">Library</h4>
        </div>

        <form class="p-10 rounded-lg lg:w-[30em] md:w-[40em] shadow-[0_35px_60px_-15px_rgba(0,0,0,0.3)]"
          @submit.prevent="handleSubmit">
          <!-- Email input -->
          <div class="mt-8">
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
  import { API_URL } from '../config';

  export default {
    data() {
      return {
        email: '',
        password: '',
        showPassword: false,
        user: null,
      };
    },
    methods: {
      async fetchUserData() {
        const data = { email: this.email, password: this.password };

        try {
          const response = await fetch(API_URL + 'auth', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
          });

          if (response.ok) {
            this.user = await response.json();
          } else {
            console.error('Login failed');
          }
        } catch (error) {
          console.error('Error:', error);
        }
      },

      handleSubmit() {
        this.fetchUserData();
      },
    },
  };
</script>
