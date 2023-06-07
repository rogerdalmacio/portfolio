<script setup>
import { onMounted, ref, watch, reactive, onUnmounted } from 'vue';
import { router } from '@inertiajs/vue3';

const logout = () => {
    router.post(route('logout'));
};

const keys = ref([]);

const logoutAction = (keys) => {
    if(keys['Control'] && keys['c'] == true) {
        logout();
    }
}

const addPressedKey = (e) => {
    keys.value[e.key] = true;
    logoutAction(keys.value);
}

const removePressedKey = (e) => {
    keys.value[e.key] = false;
}
onMounted(() => {
    window.addEventListener('keydown', addPressedKey)
    window.addEventListener('keyup', removePressedKey);
});

onUnmounted(() => {
    window.removeEventListener('keydown', addPressedKey);
    window.removeEventListener('keyup', removePressedKey);
})
</script>

<template>
    <div class="h-screen w-full">
        <slot></slot>
    </div>
</template>
