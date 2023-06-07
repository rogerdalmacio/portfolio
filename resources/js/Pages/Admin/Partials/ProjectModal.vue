<script setup>
import { ref, watch } from 'vue';
import XIcon from '@/Icons/XIcon.vue';
import Modal from '@/Components/Modal.vue';
import { router, useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue'
import Datepicker from 'vue3-datepicker'
import moment from 'moment';
import { useToastStore } from '@/stores/toastStore';
import Toast from '@/Components/Toast.vue';
import InputError from '@/Components/InputError.vue';

const toast = useToastStore();

const props = defineProps({
    show: Boolean,
    currentProject: {
        type: [Array, null],
        default: null,
    },
});

const emit = defineEmits(['close']);

const closeModal = () => {
    projectForm.reset();
    projectForm.clearErrors();
    techStacks.value = [];
    emit('close');
}

const image = ref();

const setImagePath = (tempImage) => {
    image.value = URL.createObjectURL(tempImage);
    console.log(image.value);
}

const techStacks = ref([]);

watch(
    techStacks.value, 
    (oldData, newData) => {
    projectForm.tech_stack = newData;
})

const checkIfTechStackIsExisting = (tech) => {
    return techStacks.value?.includes(tech);
}

const checkIfTechStackEmpty = (tech) => {
    if(tech.length < 1) {
        return true;
    }
}

const addTechStack = (tech) => {
    if(checkIfTechStackIsExisting(tech) || checkIfTechStackEmpty(tech)) {
        return;
    } else {
        techStacks.value.push(tech);
    }
}

const removeTechStack = (tech) => {
    techStacks.value.splice(techStacks.value.indexOf(tech), 1);
}

const dateStarted = ref();
const dateFinished = ref();

watch(
    () => dateStarted.value,
    (newValue) => {
        projectForm.date_started = moment(newValue).format('YYYY-MM-DD');
    }
)

watch(
    () => dateFinished.value,
    (newValue) => {
        projectForm.date_finished = moment(newValue).format('YYYY-MM-DD');
    }
)

const projectForm = useForm({
    id: props.currentProject?.id ?? "",
    title: props.currentProject?.title ?? "",
    tech_stack: techStacks.value,
    photo: image.value,
    url: props.currentProject?.url ?? "",
    date_started: props.currentProject?.date_started ?? "",
    date_finished: props.currentProject?.date_finished ?? "",
    project_type: props.currentProject?.project_type ?? "",
    project_description: props.currentProject?.project_description ?? "",
});

watch(
    () => props.currentProject,
    (newValue) => {
        projectForm.id = newValue?.id;
        projectForm.title = newValue?.title;
        techStacks.value = newValue?.tech_stack;
        projectForm.tech_stack = newValue?.tech_stack;
        projectForm.date_started = newValue?.date_started;
        projectForm.date_finished = newValue?.date_finished;
        projectForm.url = newValue?.url;
        projectForm.project_type = newValue?.project_type;
        projectForm.project_description = newValue?.project_description;
    }
)

const handleSaveButton = () => {
    if(props.currentProject?.id) {
        updateProject();
    } else {
        saveProject();
    }
}
 
const saveProject = () => {
    projectForm.post(route('web.admins.project.store'), {
        onSuccess: () => {
            closeModal();
            toast.setParams(
                'Project Uploaded Successfully.',
                'success'
            );
        },
        onError: () => {
            toast.setParams(
                'There are some errors',
                'danger'
            );
        }
    });
}

const updateProject = () => {
    projectForm.post(route('web.admins.project.update', { id: props.currentProject?.id, _method: 'patch' }), {
        onSuccess: () => {
            closeModal();
            toast.setParams(
                'Project Uploaded Successfully.',
                'success'
            );
        },
        onError: () => {
            toast.setParams(
                'There are some errors',
                'danger'
            );
        }
    });
}

const deleteProject = () => {
    router.delete(route('web.admins.project.delete', { id: props.currentProject?.id }), {
        onSuccess: () => {
            closeModal();
            toast.setParams(
                'Project Deleted Successfully.',
                'success'
            );
        },
        onError: () => {
            toast.setParams(
                'There something went wrong',
                'danger'
            );
        }
    })
}

</script>

<template>
    <Modal
        :show="props.show"
        @close="closeModal"
        :closeable="true"
    >
        <div class="bg-white h-full w-full p-8 rounded-lg shadow-2xl">
            <form enctype="multipart/form-data">
                <div class="mb-4">
                    <InputLabel 
                        value="Title"
                        labelFor="title"
                    />
                    <TextInput 
                        :model-value="projectForm.title"
                        @update:modelValue="newValue => projectForm.title = newValue"
                        inputId="title"
                    />
                    <InputError
                        :message="projectForm.errors?.title"
                    />
                </div>
                <div class="mb-4">
                    <InputLabel 
                        value="Input Tech Stack/s"
                        labelFor="techstack"
                    />
                    <TextInput 
                        inputId="techstack"
                        @keydown.enter.prevent="addTechStack($event.target.value.trim()), $event.target.value = ''"
                    />
                    <InputError
                        :message="projectForm.errors?.tech_stack"
                    />
                    <ul class="flex flex-row my-2 gap-2 flex-wrap">
                        <li 
                            v-for="techStack in techStacks"
                            class="px-2 py-1 border border-1 rounded-md text-gray-500 flex justify-between items-center gap-2"
                        >
                            <p>{{ techStack }}</p>
                            <button @click="removeTechStack(techStack)" type="button">
                                <XIcon
                                    class="h-3 w-3 fill-gray-500"
                                />
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
                    <input @input="projectForm.photo = $event.target.files[0]" @change="setImagePath($event.target.files[0])" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                    <div v-show="image || props.currentProject?.photo" class="flex justify-center items-center my-4 bg-gray-100">
                        <img
                            class="h-64"
                            :src="image ?? `storage/projects/` + props.currentProject?.photo" 
                            alt="temp-image"
                        >
                    </div>
                </div> 
                <div class="mb-4 flex gap-4">
                    <div>
                        <InputLabel 
                            value="Date Started"
                        />
                        <p class="text-xs text-gray-400" v-if="props.currentProject?.id">old : {{ props.currentProject?.date_started }}</p>
                        <Datepicker v-model="dateStarted"/>
                        <InputError
                            :message="projectForm.errors?.date_started"
                        />
                    </div>
                    <div>
                        <InputLabel 
                            value="Date Finished"
                        />
                        <p class="text-xs text-gray-400" v-if="props.currentProject?.id">old : {{ props.currentProject?.date_finished }}</p>
                        <Datepicker v-model="dateFinished" :lowerLimit="dateStarted" />
                        <InputError
                            :message="projectForm.errors?.date_finished"
                        />
                    </div>
                </div>
                <div class="mb-4">
                    <InputLabel 
                        value="URL"
                        labelFor="url"
                    />
                    <TextInput 
                        :model-value="projectForm.url"
                        @update:modelValue="newValue => projectForm.url = newValue"
                        inputId="url"
                    />
                    <InputError
                        :message="projectForm.errors?.url"
                    />
                </div>
                <div class="mb-4">
                    <InputLabel 
                        value="Project Type"
                        labelFor="project-type"
                    />
                    <TextInput 
                        :model-value="projectForm.project_type"
                        @update:modelValue="newValue => projectForm.project_type = newValue"
                        inputId="project-type"
                    />
                    <InputError
                        :message="projectForm.errors?.project_type"
                    />
                </div>
                <div class="mb-4">
                    <InputLabel 
                        value="Project Description"
                        labelFor="project-description"
                    />
                    <TextInput 
                        :model-value="projectForm.project_description"
                        @update:modelValue="newValue => projectForm.project_description = newValue"
                        inputId="project-description"
                    />
                    <InputError
                        :message="projectForm.errors?.project_description"
                    />
                </div>
                <div :class="props.currentProject?.id ? 'flex justify-between' : 'flex justify-end'">
                    <div
                        v-if="props.currentProject?.id"
                    >
                        <DangerButton
                            @click="deleteProject"
                        >
                            Delete
                        </DangerButton>
                    </div>
                    <div class="space-x-2">
                        <SecondaryButton
                            @click="closeModal"
                        >
                            Close
                        </SecondaryButton>
                        <PrimaryButton
                            type="button"
                            @click="handleSaveButton"
                        >
                            Save
                        </PrimaryButton>
                    </div>
                </div>
            </form>
        </div>
    </Modal>
    <Toast />
</template>