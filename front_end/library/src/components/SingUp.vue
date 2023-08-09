<template>
    <div v-if="user">
        {{ user }}
    </div>
    <form 
        v-else
        @submit.prevent="handleSubmit"
        class="flex flex-col justify-center items-center h-scree mt-10">
        <div 
            class="border-solid border-2 shadow-lg w-[30em] px-5 pt-5 rounded-lg flex flex-col">

                <label class="py-2">Email:</label>
                <input 
                    class="border-b mx-2 duration-700 hover:border-green-600" 
                    type="email" required v-model="email">

                <label class="py-2 mt-2">Password:</label>
                <input 
                    class="border-b mx-2 duration-700 hover:border-green-600" 
                    type="password" required v-model="password">
                
                <div class="flex justify-center my-10">
                    <button 
                        class="bg-blue-500 text-white font-bold rounded py-2 px-4 hover:bg-blue-700" 
                        type="submit">Se connecter</button>
                </div>

        </div>

    </form>
</template>

<script>
import { API_URL } from '../config';


export default {
    data(){
        return {
            email: '',
            password: '',
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
            this.fetchUserData()
        }
    }
}
</script>