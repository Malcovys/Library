import { onMounted, ref, watch } from "vue";

export default function (initialValue, key){
    
    const value = ref(initialValue);

    onMounted(() => {

        const storageValue = window.localStorage.getItem(key);

        if(storageValue) { value.value = JSON.parse(storageValue); }

        watch (value, value => { window.localStorage.setItem(key, JSON.stringify(value)) }, { deep: true });

        return value;

    }) 
}