<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Checkbox from "@/Components/Checkbox.vue";
import SelectInput from "@/Components/SelectInput.vue";
import { Head, useForm } from "@inertiajs/vue3";

const props = defineProps({
    bookable: {
        type: Object,
    },
    bookableTypes: {
        type: Array,
    },
});

const form = useForm({
    name: props.bookable.name,
    perHourRate: String(props.bookable.per_hour_rate),
    bookableType: props.bookable.bookable_type_id,
    status: props.bookable.status === 1,
    image: props.bookable.image ?? "",
});

const submit = () => {
    form.put(route("bookable.update", { id: props.bookable.id }));
};
</script>

<template>
    <Head title="Edit Bookable" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Bookable | Edit
            </h2>
        </template>

        <div class="py-12 container mx-auto">
            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="bookable-type" value="Bookable Type" />

                    <SelectInput
                        v-model="form.bookableType"
                        id="bookable-type"
                        class="mt-1 block w-full"
                        required
                    >
                        <template #options>
                            <option
                                v-for="bookableType in bookableTypes"
                                :key="`bookable-type-${bookableType.id}`"
                                :value="bookableType.id"
                                v-text="bookableType.name"
                            />
                        </template>
                    </SelectInput>

                    <InputError
                        class="mt-2"
                        :message="form.errors.bookableType"
                    />
                </div>

                <div>
                    <InputLabel for="bookable-type" value="Name" />

                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                        autofocus
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div>
                    <InputLabel for="per-hour-rate" value="Per Hour Rate" />

                    <TextInput
                        id="per-hour-rate"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.perHourRate"
                        required
                    />

                    <InputError
                        class="mt-2"
                        :message="form.errors.perHourRate"
                    />
                </div>

                <div>
                    <InputLabel for="image" value="Image" />

                    <TextInput
                        id="image"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.image"
                    />

                    <InputError
                        class="mt-2"
                        :message="form.errors.perHourRate"
                    />
                </div>

                <div class="block mt-4">
                    <label class="flex items-center">
                        <Checkbox name="status" v-model:checked="form.status" />
                        <span class="ms-2 text-sm text-gray-600">
                            {{ form.status ? "Active" : "Deactive" }}
                        </span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <PrimaryButton
                        class="ms-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Submit
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
