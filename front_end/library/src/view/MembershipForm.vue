<script setup>
import ButtonItem from '../components/items/ButtonItem.vue';
</script>

<template>
  <div class="mx-auto p-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2 rounded-md border-0 py-1.5 shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)]">
    
    <img src="../assets/images/membership.avif" class="mt-6" width="2432" height="1442">
    <div class="lg:pr-8 lg:pt-4">
    <form class="m-2 w-full p-5 rounded-md shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px]">

      <div class="border-b border-gray-900/10 pb-12">

        <h1 class="text-base font-medium leading-7">Fiche d'inscription</h1>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

          <div class="sm:col-span-3">
            <label class="text-sm font-medium">Nom</label>
            <div class="mt-2">
              <input type="text" name="nom" class="w-full p-2 rounded-md py-1.5 ring-1 ring-inset ring-gray-300 sm:text-sm">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label class="text-sm font-medium">Prénom</label>
            <div class="mt-2">
              <input type="text" name="prenom" class="w-full p-2 rounded-md py-1.5 ring-1 ring-inset ring-gray-300 sm:text-sm">
            </div>
          </div>

          <div class="sm:col-span-4">
            <label class="text-sm font-medium">E-mail</label>
            <div class="mt-2">
              <input name="email" type="email" class="w-full p-2 rounded-md py-1.5 ring-1 ring-inset ring-gray-300 sm:text-sm">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="country" class="text-sm font-medium">Type de compte</label>
            <div class="mt-2">
              <select name="type_compte" autocomplete="country-name" class="w-full p-2 rounded-md py-1.5 ring-1 ring-inset ring-gray-300 sm:text-sm">
                <option value="ADR">Adherent</option>
                <option value="ADM">Bibliothequère</option>
              </select>
            </div>
          </div>

          <div class="col-span-full flex">
            <div class="sm:col-span-3 flex">
              <label class="text-sm font-medium self-center">Lot:</label>
              <input type="text" name="nom" class="w-full p-2  py-1.5 border-1 border-b">
            </div>
            <div class="sm:col-span-3 flex">
              <label class="text-sm font-medium self-center">Quartier:</label>
              <input type="text" name="prenom" class="w-full p-2  py-1.5 border-1 border-b">
            </div>
          </div>
  
          <div class="sm:col-span-6 sm:col-start-1">
            <label class="block text-sm font-medium leading-6">Abonnement</label>
            <div class="mt-2">
              <input type="text" name="abonnement" 
              class="block w-full p-2 rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset  sm:text-sm sm:leading-6">
            </div>
          </div>
        </div>
        <div class="pt-10">
          <ButtonItem>
              <template #text>Enregister</template>
            </ButtonItem>
        </div>
        
      </div>
    </form>
  </div>
</div>

</template>

<script>
export default {
  name: 'MemberInfoPage', // Remplacez 'MemberInfoPage' par le nom de votre composant si nécessaire
  data() {
    return {
      nom: '',
      prenom: '',
      email: '',
      type_compte: '',
      lot: '',
      quartier: '',
      abonnement:'',
    };
  },
  methods: {
    handleSubmit() {
      // Logique de traitement du formulaire ici
      // Vous pouvez accéder aux données via this.firstName, this.lastName, etc.
      console.log('Formulaire soumis !');
      console.log('Prénom:', this.firstName);
      console.log('Nom de famille:', this.lastName);
      console.log('Email:', this.email);
      console.log('Type de compte:', this.accountType);
      console.log('Adresse:', this.streetAddress);
      console.log('Ville:', this.city);
    },
    handleCancel() {
      // Logique d'annulation du formulaire ici
      console.log('Formulaire annulé.');
    }
  }
};
</script>

<style scoped>
/* Vos styles ici si nécessaire */
</style>
