<script setup>
import Datepicker from 'vue3-datepicker';
import { ref } from 'vue';

const props = defineProps({
    modelValue: {
        String,
    },
});

const emit = defineEmits('update:modelValue');

const date = ref();

const test = () => {
    console.log('fired');
}


</script>

<template>
    <Datepicker @input="test"/>
</template>