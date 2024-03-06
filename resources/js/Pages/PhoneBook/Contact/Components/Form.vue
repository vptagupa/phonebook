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
            <InputLabel for="contact_no" value="Contact No." :required="true" />

            <TextInput
                id="contact_no"
                type="text"
                class="mt-1 block w-full"
                v-model="form.contact_no"
                required
                autofocus
                autocomplete="contact_no"
            />

            <InputError class="mt-2" :message="form.errors.contact_no" />
        </div>
        <div class="p-4">
            <InputLabel for="website" value="Website" />

            <TextInput
                id="website"
                type="text"
                class="mt-1 block w-full"
                v-model="form.website"
                required
                autofocus
                autocomplete="website"
            />

            <InputError class="mt-2" :message="form.errors.website" />
        </div>
        <div class="p-4">
            <InputLabel for="address_1" value="Address 1" :required="true" />

            <TextInput
                id="address_1"
                type="text"
                class="mt-1 block w-full"
                v-model="form.address_1"
                autofocus
                autocomplete="address_1"
            />

            <InputError class="mt-2" :message="form.errors.address_1" />
        </div>
        <div class="p-4">
            <InputLabel for="address_2" value="Address 2" />

            <TextInput
                id="address_2"
                type="text"
                class="mt-1 block w-full"
                v-model="form.address_2"
                autofocus
                autocomplete="address_2"
            />

            <InputError class="mt-2" :message="form.errors.address_2" />
        </div>
    </form>
</template>
