<script setup>
import { DatePicker } from 'v-calendar';
import { ref, watch } from 'vue';
import 'v-calendar/style.css';
import TextInput from '@/Components/TextInput.vue';
import moment from 'moment';

const props = defineProps({
    modelValue: {
        type: String,
        default: '',
    },
    placeholder: {
        type: String,
        default: 'Select Date',
    },
    inputId: {
        type: String,
        default: 'id',
    },
    format: {
        type: String,
        default: 'YYYY-MM-DD',
    },
    mode: {
        type: String,
        default: 'date',
    }
});

const emit = defineEmits([
  'update:modelValue',
])

const date = ref(props.modelValue);

watch(date, (value) => {
    emit('update:modelValue', value ? moment(value).format(props.format) : null);
});

</script>

<template>
    <DatePicker
        is-required
        v-model.string="date"
        :mode="mode"
        :popover="{ visibility: 'focus' }"
        :masks="{modelValue: format}"
    >
        <template #default="{ inputValue, inputEvents }">
            <TextInput
                :id="props.inputId"
                :placeholder="placeholder"
                type="text"
                :value="inputValue"
                v-on="inputEvents"
                class="w-full"    
            />
        </template>
    </DatePicker>
</template>