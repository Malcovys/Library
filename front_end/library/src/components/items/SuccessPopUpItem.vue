<script setup>
import { ref } from 'vue';
import IconCheck from '../icons/IconCheck.vue';

const show = ref(true)

function handleSubmit() {
   window.location.reload();
}

</script>
<template>
    <div v-if="show" class="w-full h-full top-0 z-20 fixed bg-slate-500 bg-opacity-70">
        <div class="absolute top-[10%] left-[37%]">
            <div class="flex flex-col items-center 
             rounded-lg bg-white
             shadow-[rgba(0,_0,_0,_0.2)_0px_60px_40px_-7px]
             w-[29rem] h-sreen">
                <div class="flex flex-col py-12 space-y-3 items-center">
                    <div class="flex items-center justify-center rounded-full bg-green-100 w-[3rem] h-[3rem]">
                    <IconCheck class="text-green-600"/>
                    </div>
                    <div class="flex items-center justify-center flex-col">
                        <h1 class="font-bold text-xl">
                            <slot name="title"></slot>
                        </h1>
                        <div class="text-gray-700">
                            <slot name="content"></slot>
                        </div>
                    </div>
                </div>
                
                <button 
                    @click="handleSubmit"
                    class="bg-slate-700 
                        my-5
                        transition 
                        duration-300 ease-in-out 
                        hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]
                        py-1.5 px-[10rem] rounded-md font-bold text-white"
                >
                <slot name="btn-legent"></slot>
                </button>
            </div>
        </div>
    </div>
</template>