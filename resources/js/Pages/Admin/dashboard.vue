<script setup>
import { reactive, ref } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import AddIcon from '@/Icons/AddIcon.vue';
import ProjectModal from '@/Pages/Admin/Partials/ProjectModal.vue';

defineProps({
    projects: [Array, Object],
});

const displayModal = ref(false);

const reactiveData = reactive({
    currentProject: null,
});

const openCurrentProject = (project) => {
    reactiveData.currentProject = project;
    displayModal.value = true;
}

const openModal = () => {
    reactiveData.currentProject = null;
    displayModal.value = true;
}

const closeModal = () => {
    reactiveData.currentProject = null;
    displayModal.value = false;
}
</script>

<template>
    <AppLayout>
        <div class="grid grid-cols-4 h-full px-24 py-8 gap-12">
            <div class="group max-h-72 shadow-md border rounded-md hover:shadow-2xl duration-300">
                <button @click="openModal" type="button" class="h-full w-full flex justify-center items-center">
                    <AddIcon 
                        class="transition group-hover:rotate-90 rotate group-hover:fill-green-400 duration-300"
                    />
                </button>
            </div>
            <div class="group max-h-72 shadow-md border rounded-md hover:shadow-2xl duration-300 p-4" v-for="project in projects.data" :key="project.id">
                <button 
                    type="button"
                    class="flex flex-col justify-between items-center h-full w-full"
                    @click="openCurrentProject(project)"
                >
                    <img 
                        class="drop-shadow-md h-52 w-full"
                        :src="`/storage/projects/` + project.photo" alt=""
                    >
                    <div>
                        <h1 class="text-center text-lg group-hover:text-green-400 transition duration-300">{{ project.title }}</h1>
                        <ul class="flex flex-row gap-1 flex-wrap truncate">
                            <li class="px-1.5 py-0.5 text-xs border border-1 rounded-md text-gray-500 flex justify-between items-center gap-2 hover:bg-green-400 hover:text-white" v-for="techStack in project.tech_stack.slice(0, 5)">
                                {{ techStack }}
                            </li>
                        </ul>
                    </div>
                </button>
            </div>
        </div>
    </AppLayout>
    <ProjectModal 
        @close="closeModal"
        :show="displayModal"
        :currentProject="reactiveData?.currentProject"
    />
</template>