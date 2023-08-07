<script setup>
import IconHome from './icons/IconHome.vue';
import IconHistory from './icons/IconHistory.vue';
import IconSetting from './icons/IconSetting.vue';
import IconBars from './icons/IconBars.vue';
import MenuItem from './MenuItem.vue';
</script>

<template>

     <MenuItem>
        <template #container_icon>
            <IconBars />
        </template>

        <template #home_icon>
            <IconHome />
        </template>

        <template #history_icon>
            <IconHistory />
        </template>

        <template #setting_icon>
            <IconSetting />
        </template>
     </MenuItem>
     
</template>