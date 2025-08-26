import gsap from 'gsap'
import type { Ref } from 'vue'

const tl = gsap.timeline({paused: true});

function toggleMenu() {
  const hamburger = document.querySelector('#hamburger');
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
    .to('#logo', {
      alpha: 0,
      duration: 1
    }, '<')
    .to('#menu-overlay', {
      y: 0,
      ease: 'power4.inOut',
      duration: 1,
    }, '<')


  if (hamburger?.getAttribute('aria-expanded') === "false") {
    hamburger?.setAttribute('aria-label', "close-menu")
    hamburger?.setAttribute('aria-expanded', "true");
    tl.play()
  } else {
    hamburger?.setAttribute('aria-label', "open-menu")
    hamburger?.setAttribute('aria-expanded', "false");
    tl.reverse()
  }
}

export default function useMenu() {
  return {
    toggleMenu
  }
}
