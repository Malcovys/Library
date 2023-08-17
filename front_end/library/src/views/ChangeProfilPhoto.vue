<template>
<div 
class="absolute right-[10rem] py-12 px-4 sm:px-6 lg:px-8 bg-gray-500"
style="background-color: #CBD5E1;">
    <div class="p-10 bg-white rounded-xl">
        <form class="mt-8 space-y-3">    
        <div class="grid grid-cols-1 space-y-2">
        <label class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
            <div class="text-center flex flex-col justify-center items-center  ">
                <p class="pointer-none text-gray-500 ">
                    <span class="text-sm">Drag and drop</span> files here <br /> or 
                    <a class="text-rose-400 hover:underline">select a file</a> from your computer
                </p>
            </div>
            <input type="file" class="hidden">
        </label>
        </div>
        <p class="text-sm text-gray-400">
            <span>File type: PNG, JPG, GIF up to 10MB</span>
        </p>
        <div>
            <button type="submit" 
            class="my-5 w-full flex justify-center bg-slate-700 text-gray-100 p-4  
                rounded-full tracking-wide font-semibold  focus:outline-none 
                focus:shadow-outline hover:bg-black  shadow-lg cursor-pointer transition ease-in duration-300"
        >Upload</button>
        </div>
        </form>
    </div>
</div>
</template>

<style scoped>
.has-mask {
    position: absolute;
    clip: rect(10px, 150px, 130px, 10px);
}
</style>