<template>
  <section id="hero" class="relative h-screen max-w-full overflow-hidden -mb-1">
    <div class="layer mountains absolute w-full object-contain -z-1"></div>
    <div class="layer trees absolute w-full object-contain"></div>
    <LottieAnimation
      id="rocket1"
      class="absolute top-1/4 right-1/3 w-86 z-10"
      :animation-data="BirdsJson"
      :auto-play="true"
      :loop="true"
      :speed="1"
      ref="anim"
    />
    <div class="default-container default-padding h-full py-10 flex flex-col items-center">
      <h1 class="font-krona text-7xl md:text-8xl text-center max-w-lg text-[#22272C]">
        <span class="headerText block tracking-tighter">FULL</span>
        <span class="headerText block tracking-tighter">STACK</span>
        <span class="headerText block tracking-tighter">DEV</span>
      </h1>
      <button></button>
    </div>
  </section>
</template>

<script setup lang="ts">
import { onMounted } from 'vue'
import gsap from 'gsap'
import BirdsJson from '@/components/Lottie/birds.json'
import { LottieAnimation } from 'lottie-web-vue'

onMounted(() => {
  gsap
    .timeline()
    .from(".trees", {
      y: "25%", // Move background slower than scroll
      ease: "sine.out",
      duration: 3,
      scrollTrigger: {
        trigger: ".trees",
        start: "top top",
        end: "bottom top",
        scrub: true, // Smooth scrubbing
      },
    })
    .from('.headerText', {
      y: '50px',
      alpha: 0,
      duration: 1,
      stagger: 0.2,
      ease: "power4.inOut"
    }, '<')
    .from(".mountains", {
      alpha: 0.15,
      y: "25%", // Move background slower than scroll
      ease: "sine.out",
      duration: 6,
      scrollTrigger: {
        trigger: ".mountains",
        start: "top top",
        end: "bottom top",
        scrub: true, // Smooth scrubbing
      },
    }, '<')
    .to(".mountains", {
      y: `+=30`,
      duration: 10,
      repeat: -1,   // infinite loop
      yoyo: true,   // back-and-forth movement
      ease: "sine.inOut",
      delay: 6,
    }, '<')
    .to(".trees", {
      z: `100`,
      y: `+=15`,
      x: `+=30`,
      duration: 10,
      repeat: -1,   // infinite loop
      yoyo: true,   // back-and-forth movement
      ease: "sine.inOut",
      delay: 0.5,
    }, '<')
})
</script>

<style scoped>
.mountains {
  background: url("/images/mountains.png") no-repeat;
  background-size: cover;
  width: 105%; /* bigger to avoid edges showing */
  height: 100%;
}

.trees {
  background: url("/images/trees.png") no-repeat;
  background-size: cover;
  width: 120%; /* bigger to avoid edges showing */
  height: 100%;
}

.layer {
  position: absolute;
  left: 50%;
  transform: translateX(-50%) ;
  background-size: cover;
  background-position: center;
}
</style>
