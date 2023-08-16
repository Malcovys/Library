<template>
    <div>
        <div class="container grid md:grid-cols-2 items-center gap-3">
          <div class="mx-auto md:basis-1/2 lg:basis-2/5 animate-movingY">
            <img class="md:lg:sm:absolute z-1 top-20 md:w-[200px] sm:w-[200px] w-[150px]" src="../assets/images/Potter.webp" alt="coverBook">
          </div>

          <div class="text-center md:basis-1/2 md:text-start lg:basis-3/5">
            <h1 class="text-2xl font-bold">Harry Potter: Half Blood Prince</h1>
            <p class="text-gray-700 py-2">JK Rowling</p>
            <p class="pb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, libero magni? Fugiat perspiciatis eius, sequi aliquid ullam dolorem temporibus voluptate corrupti fugit saepe sunt unde culpa? Tenetur quos quod laudantium.</p>
          </div>
      </div>
      <div class="container bg-white rounded-2xl md:lg:sm:mt-[7rem] md:lg:sm:m-[7rem] flex md:justify-between py-20" >
        <div class="flex flex-row mx-16">
          <div>
            <p class="font-bold">Description</p>
            <p class="md:lg:sm:mr-8 mr-8" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure explicabo eius ab earum sint quod soluta!
              <br/>
              Autem doloribus deleniti exercitationem dignissimos illo ad, eligendi hic ducimus distinctio aliquid animi nam!</p>
              <div class=" container flex flex-1">
                <img class="w-[50px] rounded-full gap-2" src="/src/assets/logo.jpg" alt="">
                <p >Mamitiana</p>
              </div>
              <p class="text-center">Comments</p>
              
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
</template>

<script>
export default {
    props: ['id'],
}
</script>