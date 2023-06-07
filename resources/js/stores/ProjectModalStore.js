import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useProjectModalStore = defineStore('projectModalStore', () => {
    const displayProjectModal = ref(false);
    const currentProject = ref(null);

    const openProjectModal = (project) => {
        currentProject.value = project;
        displayProjectModal.value = true;
    }

    const closeProjectModal = () => {
        currentProject.value = null;
        displayProjectModal.value = false;
    }

    return { openProjectModal, closeProjectModal, displayProjectModal, currentProject }
});