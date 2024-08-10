<script setup>
import { router } from "@inertiajs/vue3";
import Badge from "@/Components/Badge.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";

const props = defineProps({
    id: Number,
    bookable: Object,
    status: Number,
    book_in: String,
    book_out: String,
    dateFormatter: Intl.DateTimeFormat,
});

const handleConvertMiliSecondsToHour = (bookIn, bookOut) => {
    const time = (new Date(bookOut) - new Date(bookIn)) / 1000 / 60 / 60;
    return parseFloat(time.toFixed(2));
};

const handleDelete = () => {
    router.delete(route("booking.destroy", { id: props.id }));
};

const handleEdit = () => {
    router.get(route("booking.edit", { id: props.id }));
};
</script>

<template>
    <div class="flow-root">
        <h4 class="p-3 border border-gray-300">Booked Item Information</h4>
        <dl class="p-3 my-3 divide-y divide-gray-100 text-sm">
            <div
                class="grid grid-cols-1 gap-1 py-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4"
            >
                <dt class="font-medium text-gray-900">Booked Item Type</dt>
                <dd class="text-gray-700 sm:col-span-2">
                    {{ bookable?.type?.name }}
                </dd>
            </div>

            <div
                class="grid grid-cols-1 gap-1 py-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4"
            >
                <dt class="font-medium text-gray-900">Booked Item Name</dt>
                <dd class="text-gray-700 sm:col-span-2">
                    {{ bookable?.name }}
                </dd>
            </div>

            <div
                class="grid grid-cols-1 gap-1 py-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4"
            >
                <dt class="font-medium text-gray-900">Booked Item Status</dt>
                <dd class="text-gray-700 sm:col-span-2">
                    <Badge v-if="status === 0" type="warning" text="Pendeing" />
                    <Badge v-if="status === 1" type="success" text="Confirm" />
                    <Badge v-if="status === 2" type="danger" text="Cancel" />
                </dd>
            </div>

            <div
                class="grid grid-cols-1 gap-1 py-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4"
            >
                <dt class="font-medium text-gray-900">Book In</dt>
                <dd class="text-gray-700 sm:col-span-2">
                    {{ dateFormatter.format(new Date(book_in)) }}
                </dd>
            </div>

            <div
                class="grid grid-cols-1 gap-1 py-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4"
            >
                <dt class="font-medium text-gray-900">Book Out</dt>
                <dd class="text-gray-700 sm:col-span-2">
                    {{ dateFormatter.format(new Date(book_out)) }}
                </dd>
            </div>

            <div
                class="grid grid-cols-1 gap-1 py-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4"
            >
                <dt class="font-medium text-gray-900">Book Time</dt>
                <dd class="text-gray-700 sm:col-span-2">
                    {{ handleConvertMiliSecondsToHour(book_in, book_out) }}
                    Hour/s
                </dd>
            </div>

            <div
                class="grid grid-cols-1 gap-1 py-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4"
            >
                <dt class="font-medium text-gray-900">Per-Hour Rate</dt>
                <dd class="text-gray-700 sm:col-span-2">
                    ${{ bookable.per_hour_rate }}
                </dd>
            </div>

            <div
                class="grid grid-cols-1 gap-1 py-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4"
            >
                <dt class="font-medium text-gray-900">Payable amount</dt>
                <dd class="text-gray-700 sm:col-span-2">
                    ${{
                        handleConvertMiliSecondsToHour(book_in, book_out) *
                        bookable.per_hour_rate
                    }}
                </dd>
            </div>
        </dl>

        <div
            v-if="
                handleConvertMiliSecondsToHour(
                    new Date().toString(),
                    new Date(book_in),
                ) >= 1
            "
            class="my-3"
        >
            <SecondaryButton class="mx-2" @click.prevent="handleEdit">
                Edit
            </SecondaryButton>
            <DangerButton class="mx-2" @click.prevent="handleDelete">
                Delete
            </DangerButton>
        </div>
    </div>
</template>
