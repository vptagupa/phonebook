<script setup>
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { faPlus } from "@fortawesome/free-solid-svg-icons";
import Modal from "@/Components/Modal.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import AlertSuccess from "@/Components/AlertSuccess.vue";
import Form from "../Components/Form.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const emit = defineEmits(["list"]);
const show = ref(false);
const message = ref(null);
const form = useForm({
    name: "",
    email: "",
    address: "",
});

const submit = () => {
    form.post(route("phonebooks.store"), {
        onSuccess: () => {
            form.reset();
            emit("list");
            message.value = "Successfully Saved.";

            setTimeout(() => {
                message.value = null;
            }, 5000);
        },
    });
};
</script>

<template>
    <div>
        <PrimaryButton class="space-x-2" @click="show = true">
            <FontAwesomeIcon
                title="Edit"
                :icon="faPlus"
                class="text-xl hover:text-green-600 hover:scale-125 cursor-pointer transition-all ease-in-out delay-100 duration-300"
            />
            <span>Add New</span></PrimaryButton
        >
        <Modal :show="show" closeable @close="show = false">
            <div class="px-4 py-2 border-b border-slate-200 font-extrabold">
                Add New
            </div>
            <div class="p-4">
                <div v-if="message" class="p-4">
                    <AlertSuccess :message="message" />
                </div>
                <Form :form="form" :submit="submit" />
                <div
                    class="flex items-center justify-end gap-x-2 border-t border-slate-200 p-2"
                >
                    <SecondaryButton @click="show = false">
                        Cancel</SecondaryButton
                    >
                    <PrimaryButton @click="submit">Save</PrimaryButton>
                </div>
            </div>
        </Modal>
    </div>
</template>
../Components/Person/Form.vue
