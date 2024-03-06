<script setup>
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import { onMounted, ref } from "vue";

const props = defineProps({
    form: {
        type: Object,
    },
    submit: {
        type: Function,
    },
});
</script>

<template>
    <form @submit.prevent="submit">
        <div class="p-4">
            <InputLabel for="name" value="Name" :required="true" />

            <TextInput
                id="name"
                type="text"
                class="mt-1 block w-full"
                v-model="form.name"
                required
                autofocus
                autocomplete="name"
            />

            <InputError class="mt-2" :message="form.errors.name" />
        </div>
        <div class="p-4">
            <InputLabel for="email" value="Email" :required="true" />

            <TextInput
                id="email"
                type="email"
                class="mt-1 block w-full"
                v-model="form.email"
                required
                autofocus
                autocomplete="email"
            />

            <InputError class="mt-2" :message="form.errors.email" />
        </div>
        <div class="p-4">
            <InputLabel for="address" value="Address" />

            <TextInput
                id="address"
                type="text"
                class="mt-1 block w-full"
                v-model="form.address"
                autofocus
                autocomplete="address"
            />

            <InputError class="mt-2" :message="form.errors.address" />
        </div>
    </form>
</template>
