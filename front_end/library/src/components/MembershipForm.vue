<template>

  <div class="overflow-hidden bg-white py-2 sm:py-32 ">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto p-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2 rounded-md border-0 py-1.5 text-gray-900 shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)]">
       <div class="lg:pr-8 lg:pt-4">
        <form class="m-2 w-full p-5 rounded-md shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] ">
   
  
          <div class="border-b border-gray-900/10 pb-12">
            <h1 class="text-base font-extrabold leading-7"> <span class="text-green-400">Member's</span><span class="text-teal-500"> personal</span><span class="text-sky-400"> information</span></h1>
            <p class="mt-1 text-sm leading-6 text-gray-600">Your personal information for your membership</p>
      
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                <div class="mt-2">
                  <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>
      
              <div class="sm:col-span-3">
                <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                <div class="mt-2">
                  <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>
      
              <div class="sm:col-span-4">
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                <div class="mt-2">
                  <input id="email" name="email" type="email" autocomplete="email" class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>
      
              <div class="sm:col-span-3">
                <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Account type</label>
                <div class="mt-2">
                  <select id="country" name="country" autocomplete="country-name" class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option>ADM</option>
                    <option>ADR</option>
                    
                  </select>
                </div>
              </div>
      
              <div class="col-span-full">
                <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Street address</label>
                <div class="mt-2">
                  <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>
      
              <div class="sm:col-span-6 sm:col-start-1">
                <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Subscription</label>
                <div class="mt-2">
                  <input type="text" name="city" id="city" autocomplete="address-level2" class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>
      
              
            
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
              <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
              <button type="submit" class="rounded-md bg-gradient-to-r from-green-600  to-blue-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
          </div>
      
         
      </form>
    
      </div>

      <img src="../assets/images/membership.avif" alt="" width="2432" height="1442">
        
      
      </div>
    </div>
  </div>

</template>