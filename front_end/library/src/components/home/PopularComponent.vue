<script setup>
import ScrollableItem from '../items/ScrollableItem.vue';
</script>

<template>
  <div>
    <div>
      <p class="md:text-2xl sm:text-2xl text-1xl top-5 font-bold mobile-title">Popular Now</p>
    </div>
    <div class="px-5 py-10 
      sm:h-[16em] sm:w-[39em]
      flex flex-row overflow-y-auto rounded-lg">
      <div class="flex flex-row sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">
        <ScrollableItem
          imageSrc="src/assets/images/71OZY035QKL._AC_UF1000,1000_QL80_.jpg"
          title="Chronics of Narnia"
        />
        <ScrollableItem
          class="items"
          imageSrc="src/assets/images/71OZY035QKL._AC_UF1000,1000_QL80_.jpg"
          title="Chronics of Narnia"
        />
        <ScrollableItem
          imageSrc="src/assets/images/beauty-and-the-beast-poster-2.jpg"
          title="The Beauty and the Beast"
        />
        <ScrollableItem
          imageSrc="src/assets/images/71OZY035QKL._AC_UF1000,1000_QL80_.jpg"
          title="Chronics of Narnia"
        />
        <ScrollableItem
          imageSrc="src/assets/images/71OZY035QKL._AC_UF1000,1000_QL80_.jpg"
          title="Chronics of Narnia"
        />
        <ScrollableItem
          imageSrc="src/assets/images/71OZY035QKL._AC_UF1000,1000_QL80_.jpg"
          title="Chronics of Narnia"
        />
        <ScrollableItem
          imageSrc="src/assets/images/71OZY035QKL._AC_UF1000,1000_QL80_.jpg"
          title="Chronics of Narnia"
        />
        <ScrollableItem
          imageSrc="src/assets/images/71OZY035QKL._AC_UF1000,1000_QL80_.jpg"
          title="Chronics of Narnia"
        />
      </div>
    </div>
  </div>
</template>
