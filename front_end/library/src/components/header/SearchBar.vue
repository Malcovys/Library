<script setup>
import ScrollableHorizontalItem from '../items/ScrollableHorizontalItem.vue';
</script>

<template>
<div class="search-items">
    <form>
        <input @input="handleInput" v-model="itemSearched"
            class="w-full h-10 pl-10 pr-4 py-1 text-base placeholder-gray-500 border 
            rounded-full bg-stone-200
            focus:shadow-[rgba(50,50,93,0.25)_0px_6px_12px_-2px,_rgba(0,0,0,0.3)_0px_3px_7px_-3px]
            transition duration-300 ease-in-out" 
            type="search" placeholder="Chercher un livre"
        required/>
    </form>
    <div v-show="showResultSpace"
        class="fixed top-[4rem] sm:w-[36em] overflow-x-auto h-[17rem] items-center bg-white rounded-lg">
        <ScrollableHorizontalItem 
            class="flex ml-2 space-x-10 p-5 mt-2 sm:h-[7em] mb-5 sm:w-[35em]
                    rounded-lg transition duration-300
                    hover:shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)]"
            :imageSrc="sdddd"
            :title="title"
            :page="page"/>

        <ScrollableHorizontalItem 
        class="flex ml-2 space-x-10 p-5 mt-2 sm:h-[7em] mb-5 sm:w-[35em]
                rounded-lg transition duration-300
                hover:shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)]"
        :imageSrc="sdddd"
        :title="title"
        :page="page"/>

        <ScrollableHorizontalItem 
            class="flex ml-2 space-x-10 p-5 mt-2 sm:h-[7em] mb-5 sm:w-[35em]
                    rounded-lg transition duration-300
                    hover:shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)]"
            :imageSrc="sdddd"
            :title="title"
            :page="page"/>

    </div>
</div>  
</template>

<script>
export default {
    data(){
        return{
            itemSearched: '',
            showResultSpace: false,
        }
    },
    methods: {
        handleInput() {
            if(this.itemSearched !== '') {
                this.showResultSpace = true;
            }
            else {
                this.showResultSpace = false;
            }
        },
        handleOut() {
            this.showResultSpace = false;
        }
    }
}
</script>