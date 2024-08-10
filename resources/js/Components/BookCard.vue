<script setup>
const props = defineProps({
    id: Number,
    book_in: String,
    book_out: String,
    status: Number,
    created_at: String,
    updated_at: String,
    user: Object,
    bookable: Object,
    selected: Boolean,
});

const emit = defineEmits(["select"]);

const handleClick = () => {
    emit("select", props.id);
};
</script>

<template>
    <article
        class="flex transition border"
        :class="[selected ? 'bg-gray-200 shadow-xl' : 'bg-white']"
        @click.prevent="handleClick"
    >
        <div v-if="bookable?.image" class="hidden sm:block sm:basis-56">
            <img
                :alt="`bookable-${bookable?.name}`"
                :src="bookable?.image"
                class="aspect-square h-full w-full object-cover"
            />
        </div>

        <div class="flex flex-1 flex-col justify-between">
            <div class="sm:flex sm:items-start sm:justify-start">
                <span
                    class="block bg-yellow-300 px-5 py-3 text-center text-xs font-bold uppercase text-gray-900 transition"
                >
                    {{ bookable?.type?.name }}
                </span>

                <span
                    v-if="selected"
                    class="block bg-green-700 px-5 py-3 text-center text-xs font-bold uppercase text-white transition"
                >
                    Selected
                </span>
            </div>
            <div
                class="border-s border-gray-900/10 p-4 sm:border-l-transparent sm:p-6"
            >
                <a href="#">
                    <h3 class="font-bold uppercase text-gray-900">
                        {{ bookable?.name }}
                    </h3>
                </a>
            </div>
        </div>
    </article>
</template>
