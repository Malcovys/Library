<template>
    <!--Follow link for animation in action https://play.tailwindcss.com/IpRdROqEoQ -->
   <div class="bg-white min-h-screen flex items-center justify-center px-16">
     <div class="relative w-full max-w-lg">
       <div class="absolute top-0 -left-4 w-72 h-72 bg-stone-400 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob "></div>
       <div class="absolute top-0 -right-4 w-72 h-72 bg-stone-400 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
       <div class="absolute -bottom-32 left-20 w-72 h-72 bg-stone-400 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
       <div class="m-8 relative space-y-4">
         <div class="p-7 bg-stone-100 rounded-lg flex items-center justify-between space-x-8">
           <div class="flex-1 flex justify-between items-center">
             <div class="h-6 w-48 bg-white rounded">
                   <p class="mb-2 text-xl font-serif tracking-tight text-gray-50 dark:text-black pl-8">Change Password</p>
             </div>
             <div class="w-24 h-6 rounded-lg bg-white">
               <a href="../components/ChangePassword.vue">
                   <svg class="w-5 h-5 text-gray-800 dark:text-black pl-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
                   </svg>
               
               </a>
             </div>
           </div>
         </div>
         
         <div class="p-7 bg-stone-100 rounded-lg flex items-center justify-between space-x-8">
           <div class="flex-1 flex justify-between items-center">
             <div class="h-6 w-48 bg-white rounded">
               <p class="mb-2 text-xl font-serif tracking-tight text-gray-50 dark:text-black pl-8">Edit Profil Photo</p>
             </div>
             <div class="w-24 h-6 rounded-lg bg-white">
               <a href="../components/ChangeCoverPhoto.vue">
                   <svg class="w-5 h-5 text-gray-800 dark:text-black pl-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 13 5.7-5.326a.909.909 0 0 0 0-1.348L1 1"/>
                   </svg>
               </a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>  
    
   
   </template>
   