<script setup>
import { onMounted, ref } from "vue";

const model = defineModel({
    type: Number,
    required: true,
});

const selected = ref(null);

onMounted(() => {
    if (selected.value.hasAttribute("autofocus")) {
        selected.value.focus();
    }
});

defineExpose({ focus: () => selected.value.focus() });
</script>

<template>
    <select
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        v-model="model"
        ref="selected"
    >
        <slot name="options" />
    </select>
</template>
