<script setup>
import ScrollableHorizontalItemVue from "../items/ScrollableHorizontalItem.vue";
</script>
<template>
    <div class="flex-col sm:w-[39em]">
        <p class="md:text-2xl sm:text-2xl text-1xl top-5 font-bold mobile-title">Nouvelle collection</p>
        <div class="flex flex-col overflow-x-auto mt-5 h-[10em]">
            <ScrollableHorizontalItemVue
            imageSrc="src/assets/images/71OZY035QKL._AC_UF1000,1000_QL80_.jpg"
            title="Le petit prince"
            chapter="5"
            />
            <ScrollableHorizontalItemVue
            imageSrc="src/assets/images/71OZY035QKL._AC_UF1000,1000_QL80_.jpg"
            title="Le petit prince"
            chapter="5"
            />
            <ScrollableHorizontalItemVue
            imageSrc="src/assets/images/71OZY035QKL._AC_UF1000,1000_QL80_.jpg"
            title="Le petit prince"
            chapter="5"
            /> 
        </div>        
</div>
</template>

<script>

</script>