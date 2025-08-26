<template>
  <Nav />
  <Main />
  <Footer />
  <MenuOverlay />
</template>

<script setup lang="ts">
import Nav from '@/components/Nav.vue'
import Main from '@/components/Main.vue'
import { onMounted } from 'vue'
import gsap from 'gsap'
import Footer from '@/components/Footer.vue'
import MenuOverlay from '@/components/MenuOverlay.vue'

onMounted(() => {
  const div = document.querySelector("#hero");
  const rect = div?.getBoundingClientRect();

  if (rect) {
    gsap.to('#logo', {
      scrollTrigger: {
        trigger: '#logo',
        start: `+=${rect?.bottom - 600} top`,
        end: 'max',
        toggleActions: 'play pause resume reverse',
        toggleClass: 'hide'
      }
    });
  }
})
</script>

<style>
.hide {
  display: none;
}
</style>
