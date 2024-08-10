<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Badge from "@/Components/Badge.vue";
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { Head, router } from "@inertiajs/vue3";

defineProps({
    bookable: {
        type: Object,
    },
});

const handleDelete = (id) => {
    router.delete(route("bookable.destroy", { id }));
};
const handleEdit = (id) => {
    router.visit(route("bookable.edit", { id }), { only: ["bookable"] });
};
</script>

<template>
    <Head title="Show Bookable" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Bookable | {{ bookable.name }}
            </h2>
        </template>

        <div class="py-12 container mx-auto">
            <div v-if="bookable" class="shadow bg-white p-7">
                <div>
                    <SecondaryButton
                        class="m-4"
                        @click.prevent="() => handleEdit(bookable.id)"
                        >Edit</SecondaryButton
                    >
                    <DangerButton
                        class="m-4"
                        @click.prevent="() => handleDelete(bookable.id)"
                        >Delete</DangerButton
                    >
                </div>
                <div
                    class="flow-root rounded-lg border border-gray-100 py-3 shadow-sm"
                >
                    <dl class="-my-3 divide-y divide-gray-100 text-sm">
                        <div
                            class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4"
                        >
                            <dt class="font-medium text-gray-900">Name</dt>
                            <dd class="text-gray-700 sm:col-span-2">
                                {{ bookable.name }}
                            </dd>
                        </div>

                        <div
                            class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4"
                        >
                            <dt class="font-medium text-gray-900">Type</dt>
                            <dd class="text-gray-700 sm:col-span-2">
                                {{ bookable.type.name }}
                            </dd>
                        </div>

                        <div
                            class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4"
                        >
                            <dt class="font-medium text-gray-900">Creator</dt>
                            <dd class="text-gray-700 sm:col-span-2">
                                {{ bookable.user.name }}
                            </dd>
                        </div>

                        <div
                            class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4"
                        >
                            <dt class="font-medium text-gray-900">Status</dt>
                            <dd class="text-gray-700 sm:col-span-2">
                                <Badge
                                    v-if="bookable.status === 1"
                                    type="success"
                                    text="Active"
                                />
                                <Badge v-else type="error" text="Deactive" />
                            </dd>
                        </div>

                        <div
                            class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4"
                        >
                            <dt class="font-medium text-gray-900">
                                Per-Hour Rate
                            </dt>
                            <dd class="text-gray-700 sm:col-span-2">
                                ${{ bookable.per_hour_rate }}
                            </dd>
                        </div>

                        <div
                            class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4"
                        >
                            <dt class="font-medium text-gray-900">
                                Created At
                            </dt>
                            <dd class="text-gray-700 sm:col-span-2">
                                {{ bookable.created_at }}
                            </dd>
                        </div>

                        <div
                            class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4"
                        >
                            <dt class="font-medium text-gray-900">
                                Updated At
                            </dt>
                            <dd class="text-gray-700 sm:col-span-2">
                                {{ bookable.updated_at }}
                            </dd>
                        </div>

                        <div
                            class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4"
                        >
                            <dt class="font-medium text-gray-900">Image</dt>
                            <dd class="text-gray-700 sm:col-span-2">
                                <img
                                    v-if="bookable.image"
                                    :src="bookable.image"
                                />
                                <template v-else>
                                    <span>There is no image.</span>
                                </template>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
