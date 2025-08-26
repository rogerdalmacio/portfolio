<template>
  <section class="w-full bg-primary-1 py-10 -mb-1">
    <div class="relative default-container default-padding h-full">
      <p id="project-title" class="text-white text-2xl sm:text-5xl md:text-7xl font-krona text-center">
        <span class="project-text">To take part </span>
        <span class="project-text">in creating and </span>
        <span class="project-text">contributing to projects </span>
        <span class="project-text">like these</span>
      </p>
      <Buffer class="h-[100px]" />
      <ul id="project-wrapper" class="flex flex-col h-full">
        <template v-for="project in projects" :key="project.title">
          <li class="project-item flex flex-col items-center justify-center gap-4 md:gap-6 bg-primary-1 h-screen">
            <img class="object-cover rounded-lg" v-lazy="project.image" :alt="project.title">
            <p class="text-center text-2xl sm:text-5xl md:text-7xl text-white font-krona">{{ project.title }}</p>
          </li>
        </template>
      </ul>
      <Buffer class="h-screen" />
    </div>
    <Buffer class="h-[300px]" />
  </section>
</template>

<script setup lang="ts">

import Buffer from '@/components/Buffer.vue'
import { onMounted } from 'vue'
import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'

interface Project {
  title: string,
  image: string
}

const projects : Project[] = [
  {
    title: 'MARLBORO PH',
    image: 'images/projects/marlboro.png'
  },
  {
    title: '44PRO',
    image: 'images/projects/44pro.png'
  },
  {
    title: 'CE PLACE',
    image: 'images/projects/ceplace.png'
  },
  {
    title: 'FRONTLINE CEU',
    image: 'images/projects/fronlineceu.png'
  },
  {
    title: 'MTAP',
    image: 'images/projects/mtap.png'
  },
  {
    title: 'SOUTHWEST ANTENNAS',
    image: 'images/projects/swa.png'
  },
  {
    title: 'LTFRB - QMS',
    image: 'images/projects/qms.png'
  },
];

onMounted(() => {
  const projectItems = document.querySelectorAll('.project-item')

  gsap.registerPlugin(ScrollTrigger);
  gsap.from('.project-text', {
    scrollTrigger: {
      trigger: '#project-title',
      start: 'top center',
    },
    alpha: 0,
    duration: 0.3,
    stagger: 0.18,
    ease: "power4.inOut"
  });

  projectItems.forEach((projectItem) => {
    gsap.from(projectItem, {
      alpha: 0,
      scrollTrigger: {
        trigger: projectItem,
        start: 'top top',
        end: '+=' + window.innerHeight,
        toggleActions: 'play pause resume reverse',
        pin: projectItem,
      },
    });
  })
})
</script>
