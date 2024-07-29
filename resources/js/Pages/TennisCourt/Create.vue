<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
</script>

<template>
    <AuthenticatedLayout>
        <div
            class="max-w-md mx-auto py-6 px-4 bg-white border border-gray-200 rounded-lg shadow-md"
        >
            <h3 class="text-2xl font-bold text-center mb-4">
                Add New Employee
            </h3>

            <form class="space-y-4" id="employeeForm">
                <div class="grid grid-cols-1 gap-y-6">
                    <div class="col-span-1">
                        <label
                            for="name"
                            class="block mb-2 text-sm font-medium text-gray-700"
                            >Name</label
                        >
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="John Doe"
                        />
                    </div>

                    <div class="col-span-1">
                        <label
                            for="per_hour_rate"
                            class="block mb-2 text-sm font-medium text-gray-700"
                            >Per Hour Rate</label
                        >
                        <input
                            type="number"
                            name="per_hour_rate"
                            id="per_hour_rate"
                            step="0.01"
                            min="0"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        />
                    </div>

                    <div class="col-span-1">
                        <label
                            for="image"
                            class="block mb-2 text-sm font-medium text-gray-700"
                            >Image</label
                        >
                        <input
                            type="file"
                            name="image"
                            id="image"
                            accept=".jpg, .jpeg, .png"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        />
                    </div>
                </div>

                <button
                    type="submit"
                    id="submitButton"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 dark:text-gray-400"
                >
                    Submit
                </button>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
