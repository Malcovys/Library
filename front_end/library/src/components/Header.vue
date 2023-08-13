<script setup>
import IconSearch from './icons/IconSearch.vue';
import IconNotification from './icons/IconNotification.vue';
</script>

<template>
    <header class="sm:pl-[4em] pl-[2em]">  
        <div class="flex flex-row py-2">
            <div class="w-full px-3">
                <nav class="relative flex flex-row items-center justify-between px-1 py-3">
                    <div class="container px-4 mx-auto flex flex-row items-center justify-between">

                        <div class="relative max-w-md w-full">
                            <div class="absolute top-1 left-2 inline-flex items-center p-2">
                                <IconSearch/>
                            </div>
                            <input class="w-full h-10 pl-10 pr-4 py-1 text-base 
                                placeholder-gray-500 border rounded-full" type="search" placeholder="Chercher un livre">
                        </div>

                        <div class="flex lg:flex-grow items-center">
                            <ul class="flex flex-row lg:flex-row list-none ml-auto">
                                <li class="nav-item">
                                    <span class="mx-2 text-xs uppercase font-bold leading-snug text-black hover:opacity-75">Mamitiana</span>
                                </li>
                                <li class="nav-item">
                                    <button><IconNotification/></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
</template>