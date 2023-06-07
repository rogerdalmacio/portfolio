<script setup>
import GithubIcon from '@/Icons/GithubIcon.vue';
import GitIcon from '@/Icons/GitIcon.vue';
import GitlabIcon from '@/Icons/GitlabIcon.vue';
import HtmlIcon from '@/Icons/HtmlIcon.vue';
import JsIcon from '@/Icons/JsIcon.vue';
import LaravelIcon from '@/Icons/LaravelIcon.vue';
import PhpIcon from '@/Icons/PhpIcon.vue';
import SqlIcon from '@/Icons/SqlIcon.vue';
import TailwindIcon from '@/Icons/TailwindIcon.vue';
import VueIcon from '@/Icons/VueIcon.vue';
import InertiaJs from '@/Icons/InertiaJs.vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
</script>

<template>
    <div class="flex flex-row flex-wrap justify-center items-center gap-x-2 gap-y-2">
        <div class="group" title="HTML">
            <HtmlIcon class="p-2 border border-black bg-white group-hover:drop-shadow-hover"/>
        </div>
        <div class="group" title="Tailwind CSS">
            <TailwindIcon class="p-2 border border-black bg-white group-hover:drop-shadow-hover"/>
        </div>
        <div class="group" title="Javascript">
            <JsIcon class="p-2 border border-black bg-white group-hover:drop-shadow-hover"/>
        </div>
        <div class="group" title="Inertia Js">
            <InertiaJs class="p-2 border border-black bg-white group-hover:drop-shadow-hover"/>
        </div>
        <div class="group" title="Vue Js">
            <VueIcon class="p-2 border border-black bg-white group-hover:drop-shadow-hover"/>
        </div>
        <div class="group" title="PHP">
            <PhpIcon class="p-2 border border-black bg-white group-hover:drop-shadow-hover"/>
        </div>
        <div class="group" title="Laravel">
            <LaravelIcon class="p-2 border border-black bg-white group-hover:drop-shadow-hover"/>
        </div>
        <div class="group" title="SQL">
            <SqlIcon class="p-2 border border-black bg-white group-hover:drop-shadow-hover"/>
        </div>
        <div class="group" title="Git">
            <GitIcon class="p-2 border border-black bg-white group-hover:drop-shadow-hover"/>
        </div>
        <div class="relative group" title="Github">
            <GithubIcon class="p-2 border border-black bg-white group-hover:drop-shadow-hover"/>
            <p class="absolute -top-8 text-center text-xs animate-bounce hidden md:block">Hover me!</p>
            <div class="absolute text-xs tracking-tighter top-0 left-0 invisible h-full w-full group-hover:bg-white group-hover:visible">
                <a :href="page.props.socialAccounts.github" target="_blank" class="h-full w-full flex justify-center items-center">profile</a>
            </div>
        </div>
        <div class="relative group" title="Gitlab">
            <GitlabIcon class="h-12 w-12 p-2 border border-black bg-white group-hover:drop-shadow-hover"/>
            <p class="absolute -top-8 text-center text-xs animate-bounce hidden md:block">Hover me!</p>
            <div class="absolute text-xs tracking-tighter top-0 left-0 invisible h-full w-full group-hover:bg-white group-hover:visible">
                <a :href="page.props.socialAccounts.gitlab"  target="_blank" class="h-full w-full flex justify-center items-center">profile</a>
            </div>
        </div>
    </div>
</template>