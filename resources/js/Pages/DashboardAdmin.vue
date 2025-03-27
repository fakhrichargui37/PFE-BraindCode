<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link, useForm, usePage } from '@inertiajs/vue3';
const user = usePage().props.auth.user;

const form = useForm({
    first_name: user.first_name,
    last_name: user.last_name,
    email: user.email,
});
</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-black dark:text-gray-200">
                Dashboard_Admin
            </h2>
        </template>
        <div class="py-12">
<<<<<<< HEAD
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div>
                            <h1 class="text-2xl font-semibold">Welcome back, {{ form.first_name }}!</h1>
                        </div>
                    </div>
=======
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <!-- E-learning Page -->
                <div class="mt-6">
                    
>>>>>>> a81829e (nfadelkouch ya fakhrouch)
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
