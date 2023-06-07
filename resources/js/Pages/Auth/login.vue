<script setup>
import { useForm } from '@inertiajs/vue3';
import Spinner from '@/Components/Spinner.vue'

const form = useForm({
    email: null,
    password: null,
});

const login = () => {
    form.post(route('web.login'));
}

</script>

<template>
    <div
        v-show="form.processing"
        class="absolute z-20 top-0 left-0 h-screen w-full bg-gray-400 flex opacity-25 transition-all duration-500 ease-in-out"
    >
    </div>
    <Spinner
        class="z-10 absolute top-1/2 left-1/2"
        v-show="form.processing"
    />
    <div class="flex justify-center items-center h-screen w-full">
        <form
            class="w-1/5"
            @submit.prevent="login"
        >
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                <input 
                    v-model="form.email" 
                    type="email" 
                    id="email" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                    :class="form?.errors.email ? 'border-red-400' : ''"
                    placeholder="admin@email.com" 
                    required
                >
            </div>
            <div class="mb-2">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                <input 
                    v-model="form.password" 
                    type="password" 
                    id="password" 
                    :class="form?.errors.email ? 'border-red-400' : ''"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                    required
                >
            </div>
            <div class="mb-4">
                <p>
                    {{ form.errors.email }}
                </p>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
        </form>
    </div>
</template>