<script setup>
import BookIn from "@/Components/BookIn.vue";
import BookOut from "@/Components/BookOut.vue";
import BookableCard from "@/Components/BookableCard.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { ref, watch } from "vue";

const props = defineProps({
    bookables: Object,
    books: Object,
    book: Object,
    booked: Array,
});

const loading = ref(false);
const bookedBookables = ref(props.booked);
const bookInHour = ref(9);
const form = useForm({
    bookIn: new Date(props.book.book_in),
    bookOut: new Date(props.book.book_out),
    bookable: props.book.bookable_id,
    status: props.book.status,
});

watch(
    () => form.bookable,
    (value) => {
        if (value === 0) {
            bookedBookables.value = props.booked;
        } else {
            bookedBookables.value = props.booked.filter(
                (v) => v.bookable_id === value,
            );
        }
    },
    { deep: true },
);
watch(
    () => form.bookIn,
    (value) => {
        if (value) {
            bookInHour.value = value.getHours();
        } else {
            bookInHour.value = 9;
        }
    },
);

const handleSelect = (id) => {
    if (form.bookable === id) {
        form.bookable = 0;
    } else {
        form.bookable = id;
    }
};

const handleBook = () => {
    if (form.bookable === 0) {
        throw Error("The bookable item is required");
    }
    form.put(route("booking.update", { id: props.book.id }));
};
</script>

<template>
    <Head title="Edit Booking" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Booking | Book an Item
            </h2>
        </template>

        <section class="py-12 container mx-auto">
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-1">
                    <h4 class="p-3 border border-gray-300">Pick an Item</h4>

                    <BookableCard
                        v-for="bookable in bookables.data"
                        :key="`bookable-item-${bookable.id}`"
                        class="mb-3"
                        v-bind="bookable"
                        :selected="form.bookable === bookable.id"
                        @select="handleSelect"
                    />
                </div>

                <div class="col-span-1">
                    <div class="flex flex-col w-full">
                        <div class="flex-grow">
                            <h4 class="p-3 border border-gray-300">
                                Pick a Date
                            </h4>

                            <VDatePicker
                                v-model="form.bookIn"
                                mode="date"
                                :min-date="new Date()"
                                expanded
                            />
                        </div>

                        <div class="grid grid-cols-2 gap-4 my-3">
                            <div class="col-span-1">
                                <BookIn
                                    v-model="form.bookIn"
                                    :booked-bookables="bookedBookables"
                                />
                            </div>

                            <div class="col-span-1">
                                <BookOut
                                    v-model="form.bookOut"
                                    :book-in="form.bookIn"
                                    :book-in-hour="bookInHour"
                                    :booked-bookables="bookedBookables"
                                />
                            </div>
                        </div>

                        <PrimaryButton
                            class="w-20 mx-auto text-center"
                            @click.prevent="handleBook"
                        >
                            Book
                        </PrimaryButton>
                    </div>
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>
