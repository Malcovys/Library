import { defineStore } from "pinia";

export const useSuccessStore = defineStore("successStore", {
    state: () => ({
        isSuccess: false,
        infos:null,
        message: null,
    }),
    actions: {
        setSuccess(state) {
            this.isSuccess = state;
        },
        setInfos(infos){
            this.infos = infos;
        }
    }
})