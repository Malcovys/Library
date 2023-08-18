<script setup>
import topComponentHome from '../../components/home/topComponentHome.vue';
import PopularComponent from '../../components/home/PopularComponent.vue';
import NewCollection from '../../components/home/NewCollection.vue';
import Comment from '../../components/home/Comment.vue';
import Calendar from '../../components/home/Calendar.vue';
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
                <Calendar class="sm:ml-[7rem] mt-10 rounded-lg
                shadow-[rgba(0,_0,_0,_0.25)_0px_25px_50px_-12px]"/>
                <Comment class="sm:ml-[3rem] mt-10"/>
            </div> 
        </div>
    </div>
</template>