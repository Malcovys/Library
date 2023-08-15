<template>

    <div class="overflow-hidden bg-white py-2 sm:py-32 ">
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto p-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2 rounded-md border-0 py-1.5 text-gray-900 shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)]">
         <div class="lg:pr-8 lg:pt-4">
          <form class="m-2 w-full p-5 rounded-md shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] ">
     
    
            <div class="border-b border-gray-900/10 pb-12">
              <h1 class="text-base font-extrabold leading-7"> <span class="text-green-400">Enregistr</span><span class="text-teal-500">ement d'un </span><span class="text-sky-400">prêt</span></h1>
              
        
              <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                          
            

                <div class="sm:col-span-4">
                    <label for="num-adherent" class="block text-sm font-medium leading-6 text-gray-900">Numéro de l'adhérent</label>
                    <div class="mt-2">
                      <input type="text" name="num-adherent" id="num-adherent"  class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                  </div>
          
                  <div class="sm:col-span-4">
                    <label for="isbn" class="block text-sm font-medium leading-6 text-gray-900">ISBN du livre</label>
                    <div class="mt-2">
                      <input type="text" name="isbn" id="isbn" class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                  </div>

                  <div class="sm:col-span-4">
                    <label for="date" class="block text-sm font-medium leading-6 text-gray-900">Date d'échéance</label>
                    <div class="mt-2">
                      <input type="date" name="date-echeance" id="date-echeance"  class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                  </div>
                  
                 
                  
          
                 
        
                
        
                
                
              
              </div>
              <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900"  @click="handleCancel">Annuler</button>
                <button type="submit" class="rounded-md bg-gradient-to-r from-green-600  to-blue-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" @click="handleSubmit">Enregister</button>
              </div>
            </div>
        
           
        </form>
      
        </div>
  
        <div class="flex justify-center">
            <img src="../assets/images/loanRegister.avif" class=" m-auto rounded-b-lg lg:w-full h-full lg:rounded-r-lg lg:rounded-bl-none" alt="">
           
          
        </div>
        
        </div>
      </div>
    </div>
  
  </template>


  <script>
    export default {
        name: "LoanRegisterPage", // Change the name if needed
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

