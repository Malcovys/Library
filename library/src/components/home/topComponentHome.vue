<script setup>
import RandomBook from './RandomBook.vue';
</script>

<template>
  <div class="container flex sm:flex-row flex-col items-center">
    <div class="md:basis-1/2 lg:basis-2/5 sm:basis-3/5 basisi-4/5">
        <h1 class="md:text-6xl sm:text-5xl text-3xl 
          font-bold font-serif  mobile-title font-dancing">{{ owner }}</h1>
        <p class="text-gray-700- py-2 ">{{ quote }}</p>
    </div>
    <RandomBook/>
</div>  
</template>

<script>
export default {
data() {
  return {
    quote: 'The phoenix must to emerge',
    owner: 'Janet Fitch',
  };
},
mounted() {
  this.fetchQuote();
},
methods: {
  async fetchQuote() {
    try {
      const response = await fetch('https://quote-garden.onrender.com/api/v3/quotes');

      if (response.ok) {
        const data = await response.json();
        const quotes = data.data;

        if (quotes.length > 0) {
          const randomIndex = Math.floor(Math.random() * quotes.length);
          const randomQuote = quotes[randomIndex];
          
          this.quote = randomQuote.quoteText.trim();
          this.owner = randomQuote.quoteAuthor.trim();
        }
      }
    } catch (error) {
      console.error('Error:', error);
    }
  },
},
};
</script>
<style>
.font-dancing {
  font-family: 'Dancing Script', cursive;
}
</style>