import{k as a,s as d,x as u,o as c,d as l,r as i,O as p}from"./app-b12ef7d3.js";const v={class:"h-screen w-full"},m={__name:"AppLayout",setup(w){const s=()=>{p.post(route("logout"))},o=a([]),r=e=>{e.Control&&e.c==!0&&s()},t=e=>{o.value[e.key]=!0,r(o.value)},n=e=>{o.value[e.key]=!1};return d(()=>{window.addEventListener("keydown",t),window.addEventListener("keyup",n)}),u(()=>{window.removeEventListener("keydown",t),window.removeEventListener("keyup",n)}),(e,_)=>(c(),l("div",v,[i(e.$slots,"default")]))}};export{m as _};
