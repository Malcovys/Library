<script setup>
import IconArrowRight from '../icons/IconArrowRight.vue';
import IconArrowLeft from '../icons/IconArrowLeft.vue';
import EnlargableItem from './items/EnlargableItem.vue';
</script>
<template>
  <div>
    <div class="scroll-controls">
      <button id="prevButton" class="border-solid border-2 rounded-full hover:bg-gray-300">
          <IconArrowLeft/>
      </button>
      <button id="nextButton" class="border-solid border-2 rounded-full hover:bg-gray-300">
          <IconArrowRight/>
      </button>
    </div>
    <section class="text-gray-600 body-font md:ml-[6em]">
    <div class="px-5 py-10 scrolling-container flex">
          <EnlargableItem
            imageSrc="src/assets/images/1200px-Fire_and_Blood.webp"
            title="Fire and Bold"/>
          <EnlargableItem
          imageSrc="src/assets/images/1200px-Fire_and_Blood.webp"
          title="Fire and Bold"/>
          <EnlargableItem
          imageSrc="src/assets/images/1200px-Fire_and_Blood.webp"
          title="Fire and Bold"/>
          <EnlargableItem
          imageSrc="src/assets/images/1200px-Fire_and_Blood.webp"
          title="Fire and Bold"/>
          <EnlargableItem
          imageSrc="src/assets/images/1200px-Fire_and_Blood.webp"
          title="Fire and Bold"/>
          <EnlargableItem
            imageSrc="src/assets/images/1200px-Fire_and_Blood.webp"
            title="Fire and Bold"/>
          <EnlargableItem
          imageSrc="src/assets/images/1200px-Fire_and_Blood.webp"
          title="Fire and Bold"/>
          <EnlargableItem
          imageSrc="src/assets/images/1200px-Fire_and_Blood.webp"
          title="Fire and Bold"/>
          <EnlargableItem
          imageSrc="src/assets/images/1200px-Fire_and_Blood.webp"
          title="Fire and Bold"/>
          <EnlargableItem
          imageSrc="src/assets/images/1200px-Fire_and_Blood.webp"
          title="Fire and Bold"/>
      </div>
  </section>
  </div>
</template>

<style scoped>
.scrolling-container {
  overflow-x: scroll;
  white-space: nowrap;
}

@keyframes movingY {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-10px);
  }
}

/* Ajout de la classe pour l'effet d'agrandissement */
.enlarge-image {
  transition: transform 1s ease-in-out;
}

.enlarge-image:hover {
  transform: scale(1.2);
}

.scroll-controls {
  position: sticky;
  display: flex;
  justify-content: flex-end;
  background-color: transparent;
  padding: 8px;
}

.scroll-controls button {
  margin-left: 8px;
}
</style>
<script>
export default {

  mounted() {
    const images = document.querySelectorAll('.enlarge-image');
    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');
    let currentIndex = 0;

    function scrollLeft() {
      if (currentIndex > 0) {
        currentIndex--;
        images[currentIndex].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'start' });
      }
    }

    function scrollRight() {
      if (currentIndex < images.length - 1) {
        currentIndex++;
        images[currentIndex].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'start' });
      }
    }

    prevButton.addEventListener('click', scrollLeft);
    nextButton.addEventListener('click', scrollRight);

    images.forEach((image, index) => {
      image.addEventListener('mouseenter', () => {
        image.style.transform = 'scale(1.2)';
      });

      image.addEventListener('mouseleave', () => {
        image.style.transform = 'scale(1)';
      });
    });
  },

};
</script>