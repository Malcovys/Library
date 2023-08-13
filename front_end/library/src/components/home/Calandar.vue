<template>
    <div class="w-[30rem] h-[15rem]
        bg-white 
        shadow-xl 
        overflow-hidden rounded-lg 
        mx-auto mt-8 text-gray-900 font-semibold text-center">
      <div class="flex items-center justify-around px-4 py-6">
        <button class="p-4 rounded-md bg-indigo-200 text-indigo-600">
          <svg class="w-4 h-4 stroke-current" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"></path></svg>
        </button>
        <div class="text-lg">aoûy, 2023</div>
        <button class="p-4 rounded-md bg-indigo-200 text-indigo-600">
          <svg class="w-4 h-4 stroke-current" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"></path></svg>
        </button>
      </div>
      <div class="grid grid-cols-7 grid-col-dense grid-rows-6 p-6 gap-1">
        <div class="text-indigo-600">Lun</div>
        <div class="text-indigo-600">Mar</div>
        <div class="text-indigo-600">Mer</div>
        <div class="text-indigo-600">Jeu</div>
        <div class="text-indigo-600">Ven</div>
        <div class="text-indigo-600">Sam</div>
        <div class="text-indigo-600">Dim</div>
        <a href="#" class="hover:bg-indigo-100 rounded-md p-2">14</a>
        <a href="#" class="hover:bg-indigo-100 rounded-md p-2">15</a>
        <a href="#" class="hover:bg-indigo-100 rounded-md p-2">16</a>
        <a href="#" class="hover:bg-indigo-100 rounded-md p-2">17</a>
        <a href="#" class="hover:bg-indigo-100 rounded-md p-2">18</a>
        <a href="#" class="hover:bg-indigo-100 rounded-md p-2">19</a>
        <a href="#" class="hover:bg-indigo-100 rounded-md p-2">20</a>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'CalendarComponent',
  };
  </script>
  