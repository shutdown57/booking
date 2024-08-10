<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm, Link, usePage } from "@inertiajs/vue3";

defineProps({
    paginated: {
        type: Object,
    },
});

const page = usePage();
const form = useForm({});

const handleDelete = (id) => {
    form.delete(route("bookable-type.destroy", { id }));
};
</script>

<template>
    <Head title="Bookable Type" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Bookable Type
            </h2>
        </template>

        <div class="py-12 container mx-auto">
            <div v-if="paginated?.data" class="shadow bg-white p-7">
                <div class="mb-3">
                    <Link
                        v-if="page.props.auth?.roles?.includes('admin')"
                        :href="route('bookable-type.create')"
                        class="text-black bg-blue-400 hover:bg-blue-600 hover:text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-3"
                    >
                        Create
                    </Link>
                </div>

                <table class="table-auto border w-full">
                    <thead>
                        <tr>
                            <th class="border border-slate-600">#</th>
                            <th class="border border-slate-600">Name</th>
                            <th class="border border-slate-600">Created at</th>
                            <th class="border border-slate-600">Updated at</th>
                            <th class="border border-slate-600">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="(item, idx) in paginated?.data" class="h-14">
                            <td class="border border-slate-600 text-center">
                                {{ idx + 1 }}
                            </td>
                            <td class="border border-slate-600 text-center">
                                {{ item.name }}
                            </td>
                            <td class="border border-slate-600 text-center">
                                {{ item.created_at }}
                            </td>
                            <td class="border border-slate-600 text-center">
                                {{ item.updated_at }}
                            </td>
                            <td class="border border-slate-600 text-center">
                                <Link
                                    v-if="
                                        page.props.auth?.roles?.includes(
                                            'admin',
                                        )
                                    "
                                    :href="
                                        route('bookable-type.edit', {
                                            id: item.id,
                                        })
                                    "
                                    class="text-black bg-yellow-400 hover:bg-yellow-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-3 mx-2"
                                >
                                    Edit
                                </Link>
                                <button
                                    v-if="
                                        page.props.auth?.roles?.includes(
                                            'admin',
                                        )
                                    "
                                    class="text-black bg-red-400 hover:bg-red-600 hover:text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-3 mx-2"
                                    @click.prevent="() => handleDelete(item.id)"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- TODO: Add pagination -->
            </div>
        </div>
    </AuthenticatedLayout>
</template>
