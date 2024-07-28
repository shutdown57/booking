<script setup>
// import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div
        class="flex flex-col items-center pt-6 min-h-screen bg-gray-100 sm:justify-center sm:pt-0"
    >
        <div>
            <Link href="/"> Home Page </Link>
        </div>

        <div
            class="overflow-hidden py-4 px-6 mt-6 w-full bg-white shadow-md sm:max-w-md sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
</template>
