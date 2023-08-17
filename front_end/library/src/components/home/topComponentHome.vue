<template>
  <div class="container flex 
      sm:flex-row 
      flex-col items-center
      ml-auto">
    <div class="md:basis-1/2 
      lg:basis-2/5 sm:basis-3/5 
      basisi-4/5">
            <h1 class="md:text-6xl sm:text-5xl text-3xl 
              font-bold font-serif  mobile-title font-dancing">{{ owner }}</h1>
            <p class="text-gray-700- py-2 ">{{ quote }}</p>
    </div>

    <div class="sm:pl-[2em] sm:pt-9 sm:ml-[5em]">
      <img class="
          sm:h-[10em] lg:h-[17em] sm:w-[17em]
          w-[10em] h-[14em] items-center 
          justify-center" 
          src="../../assets/images/Potter.webp">
    </div>
    <div class="flex flex-col 
      sm:ml-[10em]
      md:basis-1/2 
      lg:basis-2/5 sm:basis-3/5 basisi-4/5">
        <div class="flex flex-row">
            <div class="mx-2">
                <p class="text-2xl font-bold">The Cambres of secrets </p>
                <div class="flex-col py-2">
                 <div class="flex">
                  <p>154/</p><span class="text-red-700">300pages</span>
                 </div>
                </div>
                <div class="">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates est fugit dicta error alias cumque illum optio, numquam maxime dolores!</p>
              </div>
            </div>
        </div>
    </div>
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