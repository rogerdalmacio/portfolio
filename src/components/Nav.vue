<template>
  <nav class="sticky top-0 w-full z-1">
    <div class="default-container default-padding flex items-center justify-between py-10">
      <a href="/" class="px-4">
        <Logo id="logo" class="w-[80px] text-white" />
      </a>
      <div class="bg-white rounded-full h-16 w-16 flex items-center justify-center drop-shadow-sm">
        <button
          ref="menuBtn"
          id="hamburger"
          @click="toggle"
          class="cursor-pointer relative"
          aria-label="open-menu"
          aria-expanded="false"
          aria-controls="main-navigation"
        >
          <img id="tree" class="w-4" src="/images/pinetree.png" alt="pinetree">
          <span class="x scale-0 absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 bar w-5 h-[3px] bg-black rounded opacity-0"></span>
          <span class="x scale-0 absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 bar w-5 h-[3px] bg-black rounded opacity-0"></span>
        </button>
      </div>
    </div>
  </nav>
</template>

<script setup lang="ts">

import Logo from '@/components/Logo.vue'
import { onMounted, ref } from 'vue'
import useMenu from '@/composables/useMenu.ts'

const menuBtn = ref<HTMLElement|null>(null);
const {toggleMenu} = useMenu();

const toggle = () => {
  toggleMenu(menuBtn)
}

onMounted(() => {

})
</script>
