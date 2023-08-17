<template>
    <div class="h-max-screen">
      <div class="grid md:grid-cols-2 items-center">
        <div class="mx-auto md:basis-1/2 lg:basis-2/5 animate-movingY">
            <img class="md:lg:sm:absolute z-1 top-20 md:w-[200px] sm:w-[200px] w-[150px]
            shadow-[rgba(0,_0,_0,_0.25)_0px_25px_50px_-12px] 
            " src="../assets/images/Potter.webp" alt="coverBook">
          </div>
          <div class="text-center md:pl-[6.5em] md:basis-1/2 md:text-start lg:basis-3/5">
            <h1 class="md:text-4xl text-2xl font-bold font-pacifico">Harry Potter: Half Blood Prince</h1>
            <p class="text-gray-700 py-2">JK Rowling</p>
            <p class="pr-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, libero magni? Fugiat perspiciatis eius, sequi aliquid ullam dolorem temporibus voluptate corrupti fugit saepe sunt unde culpa? Tenetur quos quod laudantium.</p>
          </div>

      </div>
      <div class="pt-[0em]">
        <div class="container bg-white h-screen
        shadow-[0px_10px_1px_rgba(221,_221,_221,_1),_0_10px_20px_rgba(204,_204,_204,_1)]
         rounded-2xl md:lg:sm:mt-[7rem] md:lg:sm:m-[7rem] flex md:justify-between md:pt-[6em]" >
        <div class="flex flex-row ml-16">
          <div>
            <p class="font-bold">Description</p>
            <p class="md:lg:sm:mr-8 pt-8 mr-8" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure explicabo eius ab earum sint quod soluta!
              <br/>
              Autem doloribus deleniti exercitationem dignissimos illo ad, eligendi hic ducimus distinctio aliquid animi nam!</p>
              <div>
                <div class=" container flex flex-row pt-10">
                <img class="w-[50px] h-[50px] rounded-full gap-2" src="../assets/images/deadpool.jpg" alt="">
                <div class="flex flex-col">
                  <p class="pl-10 font-semibold" >Mamitiana</p>
                <p class="text-center pl-10 pt-5">Comments</p>
                </div>
              </div>
              </div>
          </div>
  
          <div>
            <p class="font-bold">Editors</p>
            <br/>
            <p>Jk Rowling [author] , Christopher Reath</p>
            <br/>
            <p class="font-bold">Languages</p>
            <br/>
            <p>Standard English and French</p>
            <br/>
            <p class="font-bold">Paperback</p>
            <br/>
            <p>Paper textutred, full colour , 345 pages </p>
            <p>ISBN :40798249849840984</p>
          </div>
        </div>
      </div>
      </div>
    </div>
</template>

<script>
export default {
    props: ['id'],
}
</script>
<style>
.font-pacifico {
  font-family: 'Pacifico', cursive;
}
</style>