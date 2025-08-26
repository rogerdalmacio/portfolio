<template>
  <div id="menu-overlay" class="fixed -translate-y-full inset-0 h-screen w-full bg-white z-10 flex items-center justify-center">
    <ul class="text-4xl md:text-8xl font-krona flex flex-col items-start gap-6">
      <li class="menu-overlay-items">
        <button @click="scrollTo('#about-me')" class="w-full relative cursor-pointer">
          About Me
          <span class="underline h-[4px] md:h-[8px]"></span>
        </button>
      </li>
      <li class="menu-overlay-items">
        <button @click="scrollTo('#tech-stack')" class="w-full relative cursor-pointer">
          Tech Stack
          <span class="underline h-[4px] md:h-[8px]"></span>
        </button>
      </li>
      <li class="menu-overlay-items">
        <button @click="scrollTo('#projects')" class="w-full relative cursor-pointer">
          Projects
          <span class="underline h-[4px] md:h-[8px]"></span>
        </button>
      </li>
      <li class="menu-overlay-items">
        <button @click="scrollTo('#contacts')" class="w-full relative cursor-pointer">
          Contacts
          <span class="underline h-[4px] md:h-[8px]"></span>
        </button>
      </li>
    </ul>
  </div>
</template>

<script setup lang="ts">
import { onMounted } from 'vue'
import gsap from 'gsap'
import { ScrollToPlugin } from 'gsap/ScrollToPlugin'
import useMenu from '@/composables/useMenu.ts'

const { toggleMenu } = useMenu();

const scrollTo = (target: string) => {
  gsap.to(window, {duration: 2, scrollTo: {y: target}});
  toggleMenu();
}

onMounted(() => {
  gsap.registerPlugin(ScrollToPlugin);
  const menuOverlayItems = document.querySelectorAll('.menu-overlay-items');
  menuOverlayItems.forEach((item) => {
    const underline = item.querySelector('.underline');

    item.addEventListener('mouseenter', () => {
      gsap.to(underline, {
        scaleX: 1,
        duration: 0.3
      })
    })

    item.addEventListener('mouseleave', () => {
      gsap.to(underline, {
        scaleX: 0,
        duration: 0.3
      })
    })
  })
})
</script>

<style>
.underline {
  content: "";
  position: absolute;
  left: 0;
  bottom: -2px;
  width: 100%;
  background: black;
  transform: scaleX(0);
  transform-origin: left center;
}
</style>
