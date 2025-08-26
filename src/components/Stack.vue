<template>
  <section class="w-full bg-primary-1 py-10 -mb-1">
    <div class="relative default-container default-padding h-full">
      <p id="tech-stack" class="text-white text-2xl sm:text-5xl md:text-7xl font-krona text-center">
        <span class="tech-stack-title">Using </span>
        <span class="tech-stack-title">Modern </span>
        <span class="tech-stack-title">Frameworks </span>
        <span class="tech-stack-title">and </span>
        <span class="tech-stack-title">Tools</span>
      </p>
      <Buffer class="h-[50px] md:h-[100px]" />
      <div class="text-stack-wrapper flex gap-4 sm:gap-10 md:gap-20 items-center justify-center sm:py-2 md:py-6">
        <laravel class="w-12 md:w-[100px] tech-stack-icons" />
        <nuxt class="w-12 md:w-[100px] tech-stack-icons" />
        <vue class="w-12 md:w-[100px] tech-stack-icons" />
        <tailwind class="w-12 md:w-[100px] tech-stack-icons" />
        <typescript class="w-12 md:w-[100px] tech-stack-icons" />
      </div>
      <div class="text-stack-wrapper flex gap-4 sm:gap-10 md:gap-20 items-center justify-center sm:py-2 md:py-6">
        <mysql class="w-12 md:w-[100px] tech-stack-icons" />
        <php class="w-12 md:w-[100px] tech-stack-icons" />
        <inertia class="w-12 md:w-[100px] tech-stack-icons" />
        <git class="w-12 md:w-[100px] tech-stack-icons" />
      </div>
      <buffer class="h-[200px]" />
    </div>
  </section>
</template>

<script setup lang="ts">

import Git from '@/components/SVG/git.vue'
import Inertia from '@/components/SVG/inertia.vue'
import Laravel from '@/components/SVG/laravel.vue'
import Vue from '@/components/SVG/vue.vue'
import Tailwind from '@/components/SVG/tailwind.vue'
import Typescript from '@/components/SVG/typescript.vue'
import Nuxt from '@/components/SVG/nuxt.vue'
import Php from '@/components/SVG/php.vue'
import Mysql from '@/components/SVG/mysql.vue'
import Buffer from '@/components/Buffer.vue'
import { onMounted } from 'vue'
import gsap from 'gsap'

onMounted(() => {
  gsap.from('.tech-stack-title', {
    scrollTrigger: {
      trigger: '#tech-stack',
      start: 'top center',
    },
    alpha: 0,
    duration: 0.3,
    stagger: 0.18,
    ease: "power4.inOut"
  });

  gsap.from('.tech-stack-icons', {
    scrollTrigger: {
      trigger: '.text-stack-wrapper',
      start: 'top center',
    },
    alpha: 0,
    duration: 0.3,
    stagger: 0.18,
    ease: "power4.inOut"
  });
})
</script>
