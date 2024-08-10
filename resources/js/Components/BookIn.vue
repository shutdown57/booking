<script setup>
import { ref, watch, computed } from "vue";

const props = defineProps({
    bookedBookables: Array,
});

const date = defineModel();
const loading = ref(false);
const hours = computed(() => {
    return [...Array(23 - 9 + 1).keys()].map((v) => v + 9);
});

const rules = ref({
    hours: hours.value,
    minutes: 0,
});

watch(
    [date, () => props.bookedBookables],
    ([dValue]) => {
        if (!dValue) return false;
        loading.value = true;
        rules.value.hours = hours.value.map((hour) => {
            const current = new Date(dValue);
            current.setHours(0, 0, 0, 0);
            const delta = props.bookedBookables.find((v) => {
                const start = new Date(v.book_in);
                start.setHours(0, 0, 0, 0);
                if (current.getTime() === start.getTime()) {
                    const end = new Date(v.book_out);
                    current.setHours(hour, 0, 0, 0);
                    start.setHours(new Date(v.book_in).getHours(), 0, 0, 0);
                    end.setHours(new Date(v.book_out).getHours(), 0, 0, 0);
                    return hour >= start.getHours() && hour < end.getHours();
                }
            });
            if (delta) {
                return false;
            }
            return hour;
        });
        setTimeout(() => (loading.value = false), 300);
    },
    { immediate: true, deep: true },
);
</script>

<template>
    <h4 class="p-3 border border-gray-300">Book In</h4>

    <VDatePicker
        v-if="!loading"
        v-model="date"
        mode="time"
        :rules="rules"
        :time-accuracy="1"
        is24hr
        hide-time-header
    />
    <div v-else>Loading...</div>
</template>
