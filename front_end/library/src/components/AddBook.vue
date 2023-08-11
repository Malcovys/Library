<template>

    <div class="overflow-hidden bg-white py-2 sm:py-32 ">
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto p-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2 rounded-md border-0 py-1.5 text-gray-900 shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)]">
         <div class="lg:pr-8 lg:pt-4">
          <form class="m-2 w-full p-5 rounded-md shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] ">
     
    
            <div class="border-b border-gray-900/10 pb-12">
              <h1 class="text-base font-extrabold leading-7"> <span class="text-green-400">Add</span><span class="text-teal-500"> a b</span><span class="text-sky-400">ook</span></h1>
              
        
              <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="isbn" class="block text-sm font-medium leading-6 text-gray-900">ISBN</label>
                    <div class="lg:pr-8 lg:pt-4 flex items-center">
                      <!-- <input id="isbn" name="email" type="text"  class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"> -->
                        
                      <form class="flex items-center">   
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative mr-2 w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
                                </svg>
                            </div>
                            <input type="text" id="isbn" name="isbn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search IBN..." required>
                        </div>
                        <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-auto">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </form>
                    
                    </div>
                  </div>
          
                <div class="sm:col-span-4">
                  <label for="titre" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                  <div class="mt-2">
                    <input type="text" name="titre" id="titre"  class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>
        
                <div class="sm:col-span-2">
                  <label for="num-maison" class="block text-sm font-medium leading-6 text-gray-900">Publishing house</label>
                  <div class="mt-2">
                    <input type="text" name="num-maison" id="num-maison" class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                </div>

                <div class="sm:col-span-1">
                    <label for="quantite" class="block text-sm font-medium leading-6 text-gray-900">Quanity</label>
                    <div class="mt-2">
                      <input type="text" name="quantite" id="quantite"  class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                  </div>
          
                  <div class="sm:col-span-3">
                    <label for="categorie" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                    <div class="mt-2">
                      <input type="text" name="categorie" id="categorie" class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                  </div>

                  <div class="sm:col-span-2">
                    <label for="date" class="block text-sm font-medium leading-6 text-gray-900">Publishing Year</label>
                    <div class="mt-2">
                      <input type="year" name="date" id="date"  class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                  </div>
          
                 
        
                
        
                
                
              
              </div>
              <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900"  @click="handleCancel">Cancel</button>
                <button type="submit" class="rounded-md bg-gradient-to-r from-green-600  to-blue-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" @click="handleSubmit">Add</button>
              </div>
            </div>
        
           
        </form>
      
        </div>
  
        <div class="flex justify-center">
            <img src="../assets/images/addBook.jpeg" class="" alt="">
           
          
        </div>
        
        </div>
      </div>
    </div>
  
  </template>


  <script>
    export default {
        name: "AddBookPage", // Change the name if needed
        methods: {
        handleSubmit() {
            // Handle form submission logic here
            console.log("Form submitted");
        },
        handleCancel() {
            // Handle cancel button logic here
            console.log("Form cancelled");
        },
        },
    };
  </script>
  
  <style scoped>
  /* Your scoped styles here */
  </style>

