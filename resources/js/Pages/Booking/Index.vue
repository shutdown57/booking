<script setup>
import BookInfo from "@/Components/BookInfo.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import BookCard from "@/Components/BookCard.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm, router } from "@inertiajs/vue3";
import { ref } from "vue";

const intlOptions = {
    year: "numeric",
    month: "numeric",
    day: "numeric",
    hour: "numeric",
    minute: "numeric",
};
const dateFormatter = new Intl.DateTimeFormat("en-Us", intlOptions);

const props = defineProps({
    bookables: {
        type: Object,
    },
    books: {
        type: Object,
    },
});

const loading = ref(false);
const selectedBook = ref();
const form = useForm({
    bookable: 0,
});

const handleSelect = (id) => {
    if (form.bookable === id) {
        form.bookable = 0;

        selectedBook.value = undefined;
    } else {
        form.bookable = id;
        selectedBook.value = props.books?.data.find((v) => v.id === id);
    }
};
</script>

<template>
    <Head title="Booking" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Booking
            </h2>
        </template>

        <section class="py-12 container mx-auto">
            <div class="p-5 bg-white">
                <PrimaryButton
                    @click.prevent="() => router.visit(route('booking.create'))"
                >
                    Book a new item
                </PrimaryButton>
            </div>

            <div class="grid grid-cols-3 gap-4 bg-white p-5">
                <div class="col-span-1">
                    <h4 class="p-3 border border-gray-300 mb-3">
                        Select a booked item to view
                    </h4>

                    <BookCard
                        v-for="book in books.data"
                        :key="`bookable-item-${book.id}`"
                        class="mb-3"
                        v-bind="book"
                        :selected="form.bookable === book.id"
                        @select="handleSelect"
                    />

                    <!-- TODO: Add paginate -->
                </div>

                <div class="col-span-2 border p-5">
                    <div v-if="!selectedBook">
                        To view booked item information, please select an item
                    </div>
                    <BookInfo
                        v-else
                        v-bind="selectedBook"
                        :date-formatter="dateFormatter"
                    />
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>
