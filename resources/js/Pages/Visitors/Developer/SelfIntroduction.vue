<script setup>
import { usePage } from '@inertiajs/vue3';
import TechStack from './TechStack.vue';

const page = usePage();
</script>

<template>
    <div class="w-full flex justify-center p-4">
        <div class="flex flex-col items-center font-inconsolata w-full">
            <div class="relative flex h-48 w-48 border border-black hover:drop-shadow-hover hover:-top-1 hover:-left-1">
                <img 
                    :src="page.props.path + 'self/self-pic.jpg'" 
                    alt="developer"
                >
                <div class="absolute h-full w-full top-0 left-0 cursor-pointer flex justify-center items-center opacity-0 bg-gray-200 transition duration-300 hover:opacity-80">
                    <a class="text-xl text-white font-inconsolata bg-black px-4" :href="page.props.socialAccounts.linkedIn" target="_blank">See more</a>
                </div>
            </div>
            <p class="text-4xl font-bold">Roger Dalmacio</p>
            <p>Web developer</p>
            <hr class="border-1 border-black w-full my-2">
            <div class="flex flex-row justify-center xl:justify-between items-center w-full">
                <p class="text-4xl tracking-widest font-light hidden xl:block">TECH</p>
                <TechStack />
                <p class="text-4xl tracking-widest font-light hidden xl:block">STACK</p>
            </div>
            <hr class="border-1 border-black w-full my-2">
        </div>
    </div>
</template>