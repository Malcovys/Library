<script setup>
import topComponentHome from '../components/home/topComponentHome.vue';
import PopularComponent from '../components/home/PopularComponent.vue';
import NewCollection from '../components/home/NewCollection.vue';
import Comment from '../components/home/Comment.vue';
import Calandar from '../components/home/Calandar.vue';
</script>

<template>
    <div class="sm:ml-[7rem]">
        <topComponentHome/> 
        <div class="sm:flex">
            <div>
                <PopularComponent/>
                <NewCollection/>
            </div>
            <div>
                <Calandar class="sm:ml-[5rem]"/>
                <Comment class="sm:ml-[3rem] mt-10"/>
            </div> 
        </div>
    </div>
</template>