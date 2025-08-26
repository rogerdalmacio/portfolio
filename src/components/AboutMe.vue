<template>
  <section id="about-me" class="w-full bg-primary-1 py-10 -mb-1">
    <div class="relative default-container default-padding h-full">
      <div class="relative flex flex-col justify-between items-center lg:items-start py-10">
        <p class="intro text-white font-krona max-w-4xl text-2xl md:text-5xl">
          <span class="intro-text">Hello I'm Roger Dalmacio and </span>
          <span class="intro-text">I'm a full-stack Laravel </span>
          <span class="intro-text">developer with a </span>
          <span class="intro-text">passion for turning </span>
          <span class="intro-text">ideas into scalable web </span>
          <span class="intro-text">applications.</span>
        </p>
      </div>
      <svg id="svgLine" class="absolute top-0 sm:-top-20 md:top-40 left-0 px-10 w-full" height="722" viewBox="0 0 1117 722" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path id="linePath" d="M1106.5 10.5C1106.5 711.5 10.5 10.5 10.5 711.5" stroke="white" stroke-width="20" stroke-miterlimit="1.00187" stroke-linecap="round"/>
      </svg>
      <buffer class="h-[150px] md:h-[300px]" />
      <div class="relative flex flex-col lg:flex-row-reverse justify-between items-center lg:items-start py-10">
        <p class="outro text-white font-krona max-w-4xl text-2xl md:text-5xl text-right">
          <span class="outro-text">I’ve built solutions for </span>
          <span class="outro-text">both local businesses </span>
          <span class="outro-text">and international </span>
          <span class="outro-text">clients, helping them </span>
          <span class="outro-text">bring their vision to </span>
          <span class="outro-text">life on the web.</span>
        </p>
      </div>
      <Buffer class="h-[200px]" />
    </div>
  </section>
</template>
<script setup lang="ts">

import { onMounted } from 'vue'
import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import Buffer from '@/components/Buffer.vue'
import DrawSVGPlugin from 'gsap/DrawSVGPlugin'


onMounted(() => {
  const svgLine = document.querySelector('#svgLine');
  const linePath = svgLine?.querySelector('#linePath');
  // eslint-disable-next-line @typescript-eslint/ban-ts-comment
  // @ts-expect-error
  const linePathLength = linePath?.getTotalLength();
  gsap.registerPlugin(ScrollTrigger);
  gsap.registerPlugin(DrawSVGPlugin);

  gsap.from('.intro-text', {
    scrollTrigger: {
      trigger: '.intro',
      start: 'top center',
    },
    alpha: 0,
    duration: 0.3,
    stagger: 0.18,
    ease: "power4.inOut"
  });

  if (linePath) {
    gsap.set(linePath, {
      strokeDasharray: linePathLength
    });

    gsap.fromTo(linePath, {
      alpha: 0,
      strokeDashoffset: linePathLength
    }, {
      alpha: 1,
      strokeDashoffset: 0,
      duration: 10,
      ease: 'none',
      scrollTrigger: {
        trigger: '#svgLine',
        start: 'top center',
        end: 'bottom bottom',
        scrub: 1,
      }
    })
  }

  gsap.from('.outro-text', {
    scrollTrigger: {
      trigger: '.outro',
      start: 'top center',
    },
    alpha: 0,
    duration: 0.3,
    stagger: 0.18,
    ease: "power4.inOut"
  });
});
</script>
