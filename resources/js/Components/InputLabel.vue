<script setup>
defineProps({
    value: String,
    labelFor: String,
});
</script>

<template>
    <label :for="labelFor" class="block font-medium text-sm text-gray-700 mb-2">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
