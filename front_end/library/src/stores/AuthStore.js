import { defineStore } from 'pinia'
import { API_URL } from '../composables/useApiUrl'

export const useAuthStore = defineStore("authStore", {
    state: () => ({ 
        isAuthenticated: JSON.parse(window.localStorage.getItem('authenticated')) || null,
        token: window.localStorage.getItem('token') || null,
        message: null,
    }),
    actions: {
        async getToken(email, password) {

            const data = { email: email, password: password };

            const response = await fetch(API_URL + 'adherent/auth', {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/json',
                },
                body: JSON.stringify(data)
            })

            const responseData = await response.json()

            if(responseData.message){

                this.message = responseData.message

            } else {

                this.token = responseData.token
                this.setAuthenticated(true)

                window.localStorage.setItem('token', responseData.token);
                window.localStorage.setItem('authenticated', true);

            }
            
        },
        setAuthenticated(state) {

            this.isAuthenticated = state
        }
    }
})