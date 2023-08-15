import { defineStore } from 'pinia'
import { API_URL } from '../config'

export const useAuthStore = defineStore("authStore", {
    state: () => ({ 
        isAuthenticated: null,
        token: null,
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

            this.data = await response.json()

            if(this.data.message){

                this.message = this.data.message

            } else {

                this.token = this.data.token
                
            }
            
        },
        setAuthenticated(state) {

            this.isAuthenticated = state
        }
    }
})