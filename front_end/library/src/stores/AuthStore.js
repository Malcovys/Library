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
            const postData = { email: email, password: password };

            const url = API_URL+'adherent/auth'
            const requestOption = {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/json',
                },
                body: JSON.stringify(postData)
            }

            fetch(url, requestOption)
                .then(response => response.json())
                .then(data => {
                    this.treate(data);
                    // console.log('Réponse du serveur :', data);
                  })
                .catch(error => {
                    console.error('Erreur lors de l\'envoi POST :', error);
                  })
        },
        setAuthenticated(state) {
            this.isAuthenticated = state
        },
        treate(responseData) {
            if(responseData.message){
                this.message = responseData.message
            } else {
                this.token = responseData.token
                this.setAuthenticated(true)
                window.localStorage.setItem('token', responseData.token);
                window.localStorage.setItem('authenticated', true);
            }
        }
    }
})