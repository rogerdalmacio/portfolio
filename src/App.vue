<template>
  <Nav />
  <Main />
  <Footer />
</template>

<script setup lang="ts">
import Nav from '@/components/Nav.vue'
import Main from '@/components/Main.vue'
import { onMounted } from 'vue'
import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import Footer from '@/components/Footer.vue'

onMounted(() => {
  gsap.registerPlugin(ScrollTrigger);
  const div = document.querySelector("#hero");
  const rect = div?.getBoundingClientRect();

  if (rect) {
    gsap.to('#logo', {
      alpha: 0,
      scrollTrigger: {
        trigger: '#logo',
        start: `+=${rect?.bottom - 200} top`,
        end: 'max',
        toggleActions: 'play pause resume reverse',
      }
    });
  }
})
</script>
