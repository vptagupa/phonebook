<script setup>
import Modal from "@/Components/Modal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import Table from "../Components/Table.vue";
import { ref } from "vue";

const emit = defineEmits(["personList"]);
const props = defineProps({
    person: {
        type: Object,
    },
    count: {
        type: Number,
    },
});

const show = ref(false);
</script>

<template>
    <div>
        <span
            title="View Contacts"
            @click="show = true"
            class="cursor-pointer underline decoration-black underline-offset-4 decoration-2 hover:decoration-slate-300 hover:scale-125"
        >
            {{ props.person.contacts_count }}
        </span>

        <Modal :show="show" closeable @close="show = false">
            <div
                class="px-4 py-2 flex items-center justify-between border-b border-slate-200 font-extrabold"
            >
                <div>Contact List</div>
            </div>
            <div class="p-4">
                <Table
                    :person="props.person"
                    @personList="emit('personList')"
                />
                <div
                    class="flex items-center justify-end gap-x-2 border-t border-slate-200 p-2"
                >
                    <SecondaryButton @click="show = false">
                        Close</SecondaryButton
                    >
                </div>
            </div>
        </Modal>
    </div>
</template>
../Components/Contact/Contact.vue
