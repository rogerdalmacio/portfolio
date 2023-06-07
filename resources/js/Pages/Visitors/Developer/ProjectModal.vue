<script setup>
import Modal from '@/Components/Modal.vue';
import { useProjectModalStore } from '@/stores/ProjectModalStore';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { useToastStore } from '@/stores/ToastStore';
import { ref } from 'vue';
import { router } from '@inertiajs/core';

const toast = useToastStore();

const ProjectModalStore = useProjectModalStore();

const props = defineProps({
    show: Boolean,
    currentProject: [Array, Object]
});

const closeProjectModal = () => {
    ProjectModalStore.closeProjectModal();
}

const disableVisitWebsiteButton = ref(false);

const visitWebsite = () => {
    disableVisitWebsiteButton.value = true;
    toast.setParams('thank you for having interest with my project, please wait 3 seconds to be redirected.', 'success');
    setTimeout(() => {
        window.open(props.currentProject?.url, '_blank');
        disableVisitWebsiteButton.value = false;
        ProjectModalStore.closeProjectModal();
    }, 3000);
    router.get(route('web.visitors.count-visitor', { id: props.currentProject?.id }));
}

</script>

<template>
    <Modal
        :show="props.show"
        @close="closeProjectModal"
    >
        <div class="h-full w-full p-2 bg-white border border-black font-inconsolata">
            <img 
                :src="`storage/projects/` + props.currentProject?.photo" 
                :alt="props.currentProject?.title"
                class="drop-shadow-md m-auto"
            >
            <p class="text-xs">Project Span: {{ props.currentProject.date_started }} - {{ props.currentProject.date_finished }}</p>
            <p class="text-xs">Url click count: {{ props.currentProject?.visitor_counter }}</p>
            <h3 class="text-2xl">Project Title: {{ props.currentProject?.title }}</h3>
            <div class="flex items-center">
                <h3>Tech stack: </h3>
                <ul class="flex flex-row items-center gap-1">
                    <li 
                        v-for="techStack in props.currentProject.tech_stack"
                        class="px-1.5 py-0.5 text-xs border border-1 rounded-md text-gray-500 flex justify-between items-center gap-2 hover:bg-green-400 hover:text-white"
                    >
                        {{ techStack }}
                    </li>
                </ul>
            </div>
            <h3>Project Type: {{ props.currentProject.project_type }}</h3>
            <h3>Description: {{ props.currentProject.project_description }}</h3>
            <div class="flex justify-between mt-4">
                <SecondaryButton @click="closeProjectModal">close</SecondaryButton>
                <PrimaryButton @click="visitWebsite" :disabled="disableVisitWebsiteButton">Visit Website</PrimaryButton>
            </div>
        </div>
    </Modal>
</template>