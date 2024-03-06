<script setup>
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { faPenToSquare } from "@fortawesome/free-solid-svg-icons";
import Modal from "@/Components/Modal.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import Form from "../Components/Form.vue";
import { useForm } from "@inertiajs/vue3";

import { onMounted, ref } from "vue";
const emit = defineEmits(["list"]);
const props = defineProps({
    item: {
        type: Object,
    },
});
const show = ref(false);
const form = useForm({
    name: props.item.name,
    email: props.item.email,
    address: props.item.address,
});

const submit = () => {
    form.patch(route("phonebooks.update", props.item.id), {
        onSuccess: () => {
            form.reset();
            emit("list");
            show.value = false;
        },
    });
};
</script>

<template>
    <div>
        <FontAwesomeIcon
            title="Edit"
            @click="show = true"
            :icon="faPenToSquare"
            class="text-xl hover:text-green-600 hover:scale-125 cursor-pointer transition-all ease-in-out delay-100 duration-300"
        />
        <Modal :show="show" closeable @close="show = false">
            <div class="px-4 py-2 border-b border-slate-200 font-extrabold">
                Edit
            </div>
            <div class="p-4">
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
