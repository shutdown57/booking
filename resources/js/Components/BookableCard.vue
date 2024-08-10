<script setup>
const props = defineProps({
    id: Number,
    name: String,
    per_hour_rate: Number,
    image: String | null,
    type: Object,
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
        <div v-if="image" class="hidden sm:block sm:basis-56">
            <img
                :alt="`bookable-${name}`"
                :src="image"
                class="aspect-square h-full w-full object-cover"
            />
        </div>

        <div class="flex flex-1 flex-col justify-between">
            <div class="sm:flex sm:items-start sm:justify-start">
                <span
                    class="block bg-yellow-300 px-5 py-3 text-center text-xs font-bold uppercase text-gray-900 transition"
                >
                    {{ type.name }}
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
                        {{ name }}
                    </h3>
                </a>
            </div>
        </div>
    </article>
</template>
