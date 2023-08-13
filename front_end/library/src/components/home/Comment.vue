<script setup>
import CommentScrollable from '../items/CommentScrollable.vue';
</script>
<template>
     <div class="sm:w-full">
      <p class="text-2xl font-bold">Avis</p>
      <div class="flex flex-col overflow-x-auto mt-5 h-[10em]">
        <CommentScrollable
            imageSrc="src/assets/images/logo.jpg"
            name="Ansta"
            comment="Tres bon livre, j'adore"
            time="5mn"/>
          <CommentScrollable
          imageSrc="src/assets/images/logo.jpg"
          name="Ansta"
          comment="Tres bon livre, j'adore"
          time="5mn"/>
          <CommentScrollable
            imageSrc="src/assets/images/logo.jpg"
            name="Ansta"
            comment="Tres bon livre, j'adore"
            time="5mn"/>
      </div>
    </div>
</template>