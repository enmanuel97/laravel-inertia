<template>
    <Head title="Create User" />

    <div class="flex items-center">
        <h1 class="text-3xl">Create New User</h1>
        <Link class="text-blue-500 text-sm ml-2" href="/users">Users List</Link>
    </div>

    <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
        <div class="mb-6">
            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Name
            </label>

            <input type="text" name="name" v-model="form.name" id="name" class="border border-gray-400 p-2 w-full">
            <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs mt-1" />
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Email
            </label>

            <input type="email" v-model="form.email" name="email" id="email" class="border border-gray-400 p-2 w-full">
            <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1" />
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Password
            </label>

            <input type="password" v-model="form.password" name="password" id="password" class="border border-gray-400 p-2 w-full">
            <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1" />
        </div>

        <div class="mb-6">
            <button :disabled="form.processing" type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
        </div>
    </form>
</template>

<script setup>
    import { useForm } from "@inertiajs/inertia-vue3";

    let form = useForm({
        name: '',
        email: '',
        password: '',
    });

    let submit = () => {
        form.post('/users', form);
    }
</script>
