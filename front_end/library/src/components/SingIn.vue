

<template>
    
          
      <!-- SignIn form -->
    <div class="relative bg-gradient-to-r from-slate-100 to-gray-300 flex flex-row justify-center min-h-screen overflow-hidden">
        
        <div
            class="w-1.2 m-auto p-6  bg-slate-800  border-gray-700 rounded shadow-lg shadow-slate-800/50 lg:max-w-md">
            <div class="w-full relative flex flex-row text-3xl font-semibold justify-center text-center ">
                <div>
                    <img class="rounded-full w-10 h-10 mr-2" src="../assets/images/logo.jpg" alt=""> 
                </div>
                <div>
                    <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white" href="#pablo">
                    <span class="text-green-400">Li</span><span class="text-teal-500">bra</span><span class="text-sky-400">rY</span>
                </a>
                </div>
                
                
    
                
              </div>
            
            <hr class="w-2/3 m-auto rounded-md bg-gradient-to-r from-green-600 to-blue-800 h-1">

            <div v-if="user">
                {{ user }}
            </div>

            <form class="mt-6" v-else
            @submit.prevent="handleSubmit"
            >
                <div class="mt-8">
                    <label for="email" class="block text-sm text-gray-100">Email</label>
                    <input type="email" id="email" name="email"
                        class="block w-full px-4 py-2  text-gray-100 bg-gray-900  rounded-md focus:border-pink-600 focus:ring-pink-600 focus:outline-none focus:ring focus:ring-opacity-40" required v-model="email">

                    </div>
                <div class="mt-8">
                    <div>
                        <label for="password" class="block text-sm text-gray-100">Your Password</label>
                        <div class="relative">
                            <input 
                            
                                id="password"  
                                name="password"
                                class="block w-full px-4 py-2  text-gray-100 bg-gray-900  rounded-md  focus:outline-none "
                                :type="showPassword ? 'text' : 'password'"
                                 placeholder="Password"
                                v-model="password"
                            >
                            
                            <button
                                type="button"
                                class="absolute top-2 right-2 text-gray-400"
                                @click="showPassword = !showPassword"
                                    >
                                <svg
                                    class="w-5 h-5"
                                    :class="{ 'text-green-500': showPassword, 'text-gray-400': !showPassword }"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path d="M12 22s8-4 10-10-8-10-10-10-10 4-10 10 8 10 10 10z"></path>
                                    <path d="M12 16l4-4-4-4m0 8"></path>
                                </svg>
                                
                            </button>
                    
                        </div>
                   </div>
                    <!-- <a href="#" class="text-xs text-gray-600 hover:underline">Forget Password?</a> -->
                    <div class="mt-12">
                        <button
                            class="w-full px-4 py-2 tracking-wide text-white font-semibold transition-colors duration-200 transform bg-gradient-to-r from-green-600  to-blue-800 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500"
                            type="submit">
                            Login
                        </button>
                    </div>
                </div>
            </form>
            <p class="mt-8 text-xs font-light text-center text-gray-400"> 
                Don't have an account? 
                <a href="#"
                    class="font-medium hover:underline"><span class="text-green-400">Si</span><span class="text-teal-500">ng</span><span class="text-sky-400"> up</span>
                </a></p>
        </div>
    </div>
</template>



<script>
import { API_URL } from '../config';
import axios from 'axios';

export default {
  data() {
    return {
      email: '',
      password: '',
      showPassword: false,
      user: null,
    }
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
                
                this.user = await response.json();
            } catch (error) {
                console.error('Error:', error);
            }

        },

    handleSubmit() {
      this.fetchUserData();
    }
  }
}
</script>
