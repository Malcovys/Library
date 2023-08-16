<script setup>
import IconUserAdd from './icons/IconUserAdd.vue';
import IconAddBook from './icons/IconAddBook.vue';
import IconActivities from './icons/IconActivities.vue';
import IconPlus from './icons/IconPlus.vue';
import PlusItem from './PlusItem.vue';
</script>

<template>

     <PlusItem>
        <template #container_icon>
            <IconPlus />
        </template>

        <template #useradd_icon>
            <IconUserAdd />
        </template>

        <template #addbook_icon>
            <IconAddBook />
        </template>

        <template #activities_icon>
            <IconActivities />
        </template>
     </PlusItem>
     
</template>