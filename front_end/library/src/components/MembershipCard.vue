


<template>

    <div class="m-5 grid grid-cols-3 gap-5">
        <div class="w-full  rounded-lg shadow-lg p-6">
            
                <div class="flex justify-between items-center mb-4">
                  <h2 class="text-xl font-semibold"><span class="text-green-400">Member</span><span class="text-teal-500">ship </span><span class="text-sky-400"> Card</span></h2>
                  <img src="../assets/images/cardImageBibliotheque.jpeg" alt="Library Logo" class="w-12 h-12">
                </div>
                <div class="border-t border-gray-300 py-4">
                  <div class="flex items-center mb-2">
                    <div class="w-16 h-16 bg-gray-300 rounded-full flex-shrink-0 mr-4">
                      <img src="../assets/images/cardImage.jpg" alt="User Avatar" class="w-full h-full rounded-full">
                    </div>
                    <div>
                      <h3  class="text-lg font-semibold">Anicet Jonhia</h3>
                      <p class="text-gray-600">Member since {{ membershipDate }}</p>
                    </div>
                  </div>
                  <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-600 mr-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                      <path d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                    <p class="text-gray-600">{{ membershipType }}</p>
                  </div>
                </div>
              
        </div>
        
        <div class="w-full  rounded-lg shadow-lg p-6">
            
            <div class="flex justify-between items-center mb-4">
              <h2 class="text-xl font-semibold"><span class="text-green-400">Member</span><span class="text-teal-500">ship </span><span class="text-sky-400"> Card</span></h2>
              <img src="../assets/images/cardImageBibliotheque.jpeg" alt="Library Logo" class="w-12 h-12">
            </div>
            <div class="border-t border-gray-300 py-4">
              <div class="flex items-center mb-2">
                <div class="w-16 h-16 bg-gray-300 rounded-full flex-shrink-0 mr-4">
                  <img src="../assets/images/cardImage.jpg" alt="User Avatar" class="w-full h-full rounded-full">
                </div>
                <div>
                  <h3  class="text-lg font-semibold">Lydien Mamitiana</h3>
                  <p class="text-gray-600">Member since {{ membershipDate }}</p>
                </div>
              </div>
              <div class="flex items-center">
                <svg class="w-6 h-6 text-gray-600 mr-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                </svg>
                <p class="text-gray-600">{{ membershipType }}</p>
              </div>
            </div>
          
    </div>
    <div class="w-full  rounded-lg shadow-lg p-6">
            
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-xl font-semibold"><span class="text-green-400">Member</span><span class="text-teal-500">ship </span><span class="text-sky-400"> Card</span></h2>
          <img src="../assets/images/cardImageBibliotheque.jpeg" alt="Library Logo" class="w-12 h-12">
        </div>
        <div class="border-t border-gray-300 py-4">
          <div class="flex items-center mb-2">
            <div class="w-16 h-16 bg-gray-300 rounded-full flex-shrink-0 mr-4">
              <img src="../assets/images/cardImage.jpg" alt="User Avatar" class="w-full h-full rounded-full">
            </div>
            <div>
              <h3  class="text-lg font-semibold">Malcovys Beanjara</h3>
              <p class="text-gray-600">Member since {{ membershipDate }}</p>
            </div>
          </div>
          <div class="flex items-center">
            <svg class="w-6 h-6 text-gray-600 mr-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
            </svg>
            <p class="text-gray-600">{{ membershipType }}</p>
          </div>
        </div>
      
    </div>

    <div class="w-full  rounded-lg shadow-lg p-6">
            
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-xl font-semibold"><span class="text-green-400">Member</span><span class="text-teal-500">ship </span><span class="text-sky-400"> Card</span></h2>
          <img src="../assets/images/cardImageBibliotheque.jpeg" alt="Library Logo" class="w-12 h-12">
        </div>
        <div class="border-t border-gray-300 py-4">
          <div class="flex items-center mb-2">
            <div class="w-16 h-16 bg-gray-300 rounded-full flex-shrink-0 mr-4">
              <img src="../assets/images/cardImage.jpg" alt="User Avatar" class="w-full h-full rounded-full">
            </div>
            <div>
              <h3  class="text-lg font-semibold">Antsaniraina Elinah</h3>
              <p class="text-gray-600">Member since {{ membershipDate }}</p>
            </div>
          </div>
          <div class="flex items-center">
            <svg class="w-6 h-6 text-gray-600 mr-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
            </svg>
            <p class="text-gray-600">{{ membershipType }}</p>
          </div>
        </div>
      
    </div>  

        
    </div>

</template>
  
  <script>
  export default {
    data() {
      return {
        membershipDate: "2023-08-11",
        membershipType: "ADR",
      };
    },
  };
  </script>
  
  <style scoped>
  /* Custom styles for the card */
  </style>
  