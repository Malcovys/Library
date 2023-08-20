<template>
    <button
              class="mb-5 w-full bg-slate-700 
                rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase text-white
                shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition 
                duration-300 ease-in-out 
                hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]"
              type="submit"><slot name="text"></slot></button>
</template>