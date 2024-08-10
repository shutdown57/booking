<script setup>
import { ref, watch, computed } from "vue";

const props = defineProps({
    modelValue: Date,
    bookIn: Date,
    bookInHour: Number,
    bookedBookables: Array,
});

const emit = defineEmits(["update:modelValue"]);

const date = ref(props.modelValue);
const loading = ref(false);
const hours = computed(() => {
    return [...Array(23 - 10 + 1).keys()].map((v) => v + 10);
});

const rules = ref({
    hours: hours.value,
    minutes: 0,
});

watch(
    date,
    (value) => {
        console.log(value, rules.value.hours);
        emit("update:modelValue", value);
    },
    { deep: true, immediate: true },
);

watch(
    [() => props.bookIn, () => props.bookInHour, () => props.bookedBookables],
    ([dValue, hValue]) => {
        if (!dValue) return false;
        loading.value = true;
        const h = date.value.getHours();
        // Update rules.value.hours with a new array of hours that have been checked for conflicts.
        rules.value.hours = hours.value.map((hour) => {
            // Create a Date object at midnight (00:00:00:000) to compare with bookable start times.
            const current = new Date(dValue);
            current.setHours(0, 0, 0, 0); // Set the time to midnight
            // Find any booked bookables that have a conflicting hour
            const delta = props.bookedBookables.find((v) => {
                // Create a Date object at midnight (00:00:00:000) for the start and end times of each bookable.
                const start = new Date(v.book_in);
                start.setHours(0, 0, 0, 0);
                // Check if the current hour conflicts with a booked bookable.
                // If it does, return true (delta) so we can exclude this hour from the rules.value.hours array.
                if (current.getTime() === start.getTime()) {
                    const end = new Date(v.book_out);
                    current.setHours(hour, 0, 0, 0);
                    start.setHours(new Date(v.book_in).getHours(), 0, 0, 0);
                    end.setHours(new Date(v.book_out).getHours(), 0, 0, 0);
                    return hour > start.getHours() && hour <= end.getHours();
                } else {
                    return !(hour >= hValue + 1);
                }
            });
            if (delta) {
                return false;
            }
            return hour;
        });
        const latest = [...rules.value.hours];
        const len = rules.value.hours.length;
        let restFalse = false;
        for (let i = 1; i < rules.value.hours.length - 1; i++) {
            const b = rules.value.hours[i - 1];
            const c = rules.value.hours[i];
            const a = rules.value.hours[i + 1];
            if (restFalse) {
                latest[i] = false;
                if (len === i + 2) {
                    latest[i + 1] = false;
                }
                continue;
            }
            if (b === false && c === false && a === false) {
                continue;
            }
            if (b !== false && c === false) {
                restFalse = true;
            }
        }
        rules.value.hours = latest;

        date.value = new Date(dValue);
        date.value.setHours(h);
        setTimeout(() => (loading.value = false), 300);
    },
    { deep: true },
);
</script>

<template>
    <h4 class="p-3 border border-gray-300">Book Out</h4>

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
