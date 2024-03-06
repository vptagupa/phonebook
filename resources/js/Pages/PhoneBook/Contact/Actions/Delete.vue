<script setup>
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { faCircleMinus } from "@fortawesome/free-solid-svg-icons";
import { onMounted, ref } from "vue";
import { router } from "@inertiajs/vue3";

const emit = defineEmits(["list", "personList"]);
const props = defineProps({
    item: {
        type: Object,
    },
    person: {
        type: Object,
    },
});

const remove = (id) => {
    router.delete(
        route("phonebooks.contacts.destroy", {
            person: props.person.id,
            contact: props.item.id,
        }),
        {
            onSuccess: () => {
                emit("list");
                emit("personList");
            },
        }
    );
};
</script>

<template>
    <div>
        <FontAwesomeIcon
            @click="remove(item.id)"
            title="Delete"
            :icon="faCircleMinus"
            class="text-xl hover:text-red-600 hover:scale-125 cursor-pointer transition-all ease-in-out delay-100 duration-300"
        />
    </div>
</template>
