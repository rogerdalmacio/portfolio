<template>
  <section class="w-full bg-primary-1 py-10 -mb-1">
    <div class="relative default-container default-padding h-full">
      <p id="contact-title" class="text-white text-2xl sm:text-5xl md:text-7xl font-krona text-center">
        <span class="contact-title-text">Ready to ride </span>
        <span class="contact-title-text">the train ?</span>
      </p>
      <Buffer class="h-[50px] md:h-[100px]" />
      <div id="contact-wrapper" class="flex items-center justify-center gap-5">
        <Dialog>
          <DialogTrigger as-child>
            <button class="contact-item cursor-pointer flex items-center">
              <Telephone class="w-12 md:w-[96px]"  />
            </button>
          </DialogTrigger>
          <DialogContent class="bg-white">
            <div class="flex items-center justify-center gap-10">
              <div class="flex flex-col items-center">
                <img class="h-[120px] w-[120px]" src="../../public/images/viberqr.png" alt="viberqr" />
                <p class="font-krona">VIBER</p>
              </div>
              <div class="flex flex-col items-center">
                <img class="h-[120px] w-[120px]" src="../../public/images/whatsappqr.png" alt="whatsappqr" />
                <p class="font-krona">WHATSAPP</p>
              </div>
            </div>
          </DialogContent>
        </Dialog>
        <a href="https://www.linkedin.com/in/rogerdalmacio/" class="contact-item" target="_blank">
          <Linkedin class="w-12 md:w-[96px]" />
        </a>
      </div>
    </div>
    <Buffer class="h-[300px]" />
  </section>
</template>
<script setup lang="ts">
import Telephone from '@/components/SVG/Telephone.vue'
import Linkedin from '@/components/SVG/Linkedin.vue'
import Buffer from '@/components/Buffer.vue'
import { Dialog, DialogTrigger, DialogContent } from '@/components/ui/dialog'
import gsap from 'gsap'
import { onMounted } from 'vue'

onMounted(() => {
  gsap.from('.contact-title-text', {
    scrollTrigger: {
      trigger: '#contact-title',
      start: 'top center',
    },
    alpha: 0,
    duration: 0.3,
    stagger: 0.18,
    ease: "power4.inOut"
  });

  gsap.from('.contact-item', {
    alpha: 0,
    y: '50px',
    stagger: 0.2,
    scrollTrigger: {
      trigger: '#contact-wrapper',
      start: 'top center',
      end: 'bottom top',
    }
  })
})
</script>
