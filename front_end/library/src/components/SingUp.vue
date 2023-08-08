<template>
    <div v-if="user">
        {{ user.id_adherent }}
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
import axios from 'axios';


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
            try {
                const response = await axios.post(API_URL+'auth', {
                    email: this.email,
                    password: this.password
                });
                
                this.user = response.data;

            } catch (error) {
                alert(error);
            }
        },
        handleSubmit() {
            this.fetchUserData()
        }
    }
}
</script>