<script setup>
import { Link, usePage } from '@inertiajs/vue3';

const props = defineProps({
    href: String,
    link: String,
});

const page = usePage();
</script>

<template>
    <Link
        :href="href" 
        :class="page.url === props.link
            ? 'inline-flex items-center px-1 pt-1 border-b border-black text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out' 
            : 'inline-flex items-center px-1 pt-1 border-b border-transparent hover:border-black duration-150 ease-in-out' " 
        class="font-inconsolata text-lg">
        <slot />
    </Link>
</template>
