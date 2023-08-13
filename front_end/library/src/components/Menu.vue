<script setup>
import IconHome from '../components/icons/IconHome.vue';
import IconHistory from '../components/icons/IconHistory.vue';
import IconSetting from '../components/icons/IconSetting.vue';
import IconBars from '../components/icons/IconBars.vue';
import MenuItem from '../components/items/MenuItem.vue';
</script>

<template>
     <MenuItem
        homeLink="#f0"
        historyLink="#H"
        settingsLink="#ST">
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