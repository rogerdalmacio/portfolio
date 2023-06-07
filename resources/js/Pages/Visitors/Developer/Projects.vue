<script setup>
import { computed, ref } from '@vue/reactivity';
import { onBeforeUnmount, onMounted, reactive } from 'vue';
import PrevIcon from '@/Icons/PrevIcon.vue';
import NextIcon from '@/Icons/NextIcon.vue';
import Spinner from '@/Components/Spinner.vue';
import { useProjectModalStore } from '@/stores/ProjectModalStore';
import { debounce } from 'lodash';

const ProjectModalStore = useProjectModalStore();

const screenWidth = ref(window.innerWidth);

const updateScreenSize = debounce(() => {
    screenWidth.value = window.innerWidth;
    console.log(screenWidth.value);
}, 150);

const props = defineProps({
    projects: [Array, Object]
});

const currentProject = reactive({
    firstItem: 1,
    lastItem: 3,
});

const showProject = computed(() => {
    return props.projects.filter((item) => props.projects.indexOf(item) >= currentProject.firstItem - 1 && props.projects.indexOf(item) + 1 <= currentProject.lastItem)
})

const prev = () => {
    currentProject.firstItem === 1 ? '' : currentProject.lastItem--;
    currentProject.firstItem === 1 ? '' : currentProject.firstItem--;
}

const next = () => {
    currentProject.lastItem === props.projects.length ? '' : currentProject.firstItem++;
    currentProject.lastItem === props.projects.length ? '' : currentProject.lastItem++;
}

const loader = ref([]);

const changeLoaderState = (id) => {
    loader.value[id] = true;
}

const openProjectModal = (project) => {
    ProjectModalStore.openProjectModal(project)
}

onMounted(() => {
    window.addEventListener('resize', updateScreenSize)
});

onBeforeUnmount(() => {
    window.removeEventListener('resize', updateScreenSize)
})
</script>

<template>
    <div class="font-inconsolata h-80 w-full md:h-1/2 flex flex-col justify-center items-center">
        <div class="overflow-y-auto md:w-full md:flex md:justify-between md:items-center md:px-4 md:py-8">
            <button 
                @click="prev" 
                :disabled="currentProject.firstItem === 1"
                :class="[currentProject.firstItem === 1 ? 'fill-gray-300' : '', screenWidth < 760 ? 'hidden' : '']"
            >
                <PrevIcon />
            </button>
            <div
                class="mt-2 relative group border border-black md:flex md:flex-col md:justify-around md:items-center md:mx-4 md:p-2 md:h-full md:w-full cursor-pointer"
                v-for="project in (screenWidth < 760 ? props.projects : showProject)"
                @click="openProjectModal(project)"
            >
                <div class="">
                    <img
                        class="drop-shadow-md h-40 w-full"
                        :class="!loader[project.id] ? 'hidden' : ''"
                        :src="`storage/projects/` + project.photo"
                        alt=""
                        @load="changeLoaderState(project.id)"
                    >
                </div>
                <Spinner
                    v-show="!loader[project.id]"
                    class="p-2"
                />
                <div class="absolute -top-2 opacity-0 group-hover:-top-8 group-hover:opacity-100 transition-all duration-300 hidden md:block">
                    <ul class="flex flex-row items-start justify-center gap-1 flex-wrap pt-1">
                        <li v-for="techStack in project.tech_stack.slice(0,5)" class="px-1.5 py-0.5 text-xs border border-1 rounded-md text-gray-500 flex justify-between items-center gap-2 hover:bg-green-400 hover:text-white">
                            <p class="pointer-events-none">{{ techStack }}</p>
                        </li>
                    </ul>
                </div>
                <p class="group-hover:text-green-500 transition duration-300">{{ project.title }}</p>
            </div>
            <button 
                @click="next" 
                :disabled="currentProject.lastItem === props.projects?.length || currentProject.lastItem > props.projects.length"
                :class="[currentProject.lastItem === props.projects?.length || currentProject.lastItem > props.projects.length ? 'fill-gray-300' : '', screenWidth < 760 ? 'hidden' : '']"
            >
                <NextIcon />
            </button>
        </div>
        <div class="p-1 text-center hidden md:block">
            <p>Showing {{ currentProject.firstItem }} - {{ currentProject.lastItem }} out of {{ props.projects.length }}</p>
        </div>
    </div>
</template>