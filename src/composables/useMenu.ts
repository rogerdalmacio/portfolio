import gsap from 'gsap'
import type { Ref } from 'vue'

const tl = gsap.timeline({paused: true});

function toggleMenu(menuBtn: Ref<HTMLElement|null>) {
  const x = document.querySelectorAll(".x");
  tl.to('#hamburger', {
    rotate: "360",
    duration: 1.2,
    ease: 'circ.inOut'
  })
    .to('#tree', {
      delay: 0.4,
      scale: 0,
    }, '<')
    .to(x[0], {
      scale: 1,
      rotate: "45",
      transformOrigin: "center center",
      duration: 1,
      alpha: 1,
    }, '<')
    .to(x[1], {
      scale: 1,
      rotate: "135",
      transformOrigin: "center center",
      duration: 1,
      ease: 'circ.inOut',
      alpha: 1,
    }, '<')


  if (menuBtn.value?.getAttribute('aria-expanded') === "false") {
    menuBtn.value?.setAttribute('aria-label', "close-menu")
    menuBtn.value?.setAttribute('aria-expanded', "true");
    tl.play()
  } else {
    menuBtn.value?.setAttribute('aria-label', "open-menu")
    menuBtn.value?.setAttribute('aria-expanded', "false");
    tl.reverse()
  }
}

export default function useMenu() {
  return {
    toggleMenu
  }
}
