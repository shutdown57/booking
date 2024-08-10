<script setup>
import { ref } from "vue";

const props = defineProps({
    type: {
        type: String,
        default: "success",
    },
    text: String,
});

const classes = ref([]);

switch (props.type) {
    case "success":
        classes.value = ["bg-emerald-100", "text-emerald-700"];
        break;
    case "warning":
        classes.value = ["bg-amber-100", "text-amber-700"];
        break;
    case "info":
        classes.value = ["bg-purple-100", "text-purple-700"];
        break;
    case "error":
        classes.value = ["bg-red-100", "text-red-700"];
        break;
}
</script>

<template>
    <span
        class="inline-flex items-center justify-center rounded-full px-2.5 py-0.5"
        :class="classes"
    >
        <slot name="icon" />

        <p class="whitespace-nowrap text-sm" v-text="text" />
    </span>
</template>
