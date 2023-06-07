<script setup>
import { ref } from 'vue';
import Toast from '@/Components/Toast.vue';
import Projects from '@/Pages/Visitors/Developer/Projects.vue'
import SelfIntroduction from '@/Pages/Visitors/Developer/SelfIntroduction.vue';
import ProjectModal from '@/Pages/Visitors/Developer/ProjectModal.vue';
import { usePage, Head } from '@inertiajs/vue3';
import { useProjectModalStore } from '@/stores/ProjectModalStore';
import { computed } from '@vue/reactivity';

const ProjectModalStore = useProjectModalStore();

const props = defineProps({
    projects: [Array, Object]
});

const page = usePage();

const currentProject = computed(() => {
    return ProjectModalStore.currentProject;
})

const displayProjectModal = computed(() => {
    return ProjectModalStore.displayProjectModal;
})

</script>

<template>
    <Head>
        <title>Roger Dalmacio</title>
        <meta name="description" content="Your page description">
    </Head>
    <div class="relative w-full h-screen">
        <div class="h-full border border-black px-2 py-8 md:px-18 lg:px-32">
            <!-- Self introduction -->
            <SelfIntroduction />
            <!-- Personal projects -->
            <Projects
                :projects="props?.projects.data"
            />
        </div>
        <div class=" md:absolute px-4 py-2 bottom-0 md:border-t border-black h-20 w-full flex items-center font-inconsolata">
            <div>
                <p>Visitor Count: {{ page.props.visitorCounter }}</p>
            </div>
        </div>
    </div>
    <ProjectModal
        :show="displayProjectModal"
        :currentProject="currentProject"
    />
    <Toast />
</template>