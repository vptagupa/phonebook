<script setup>
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { faSearch } from "@fortawesome/free-solid-svg-icons";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

import { onMounted, ref } from "vue";

const props = defineProps({
    list: {
        type: Function,
    },
});
const search = ref("");
const handle = () => {
    props.list(search.value);
};
</script>

<template>
    <div class="flex items-center justify-end gap-x-1">
        <TextInput
            type="text"
            class="mt-1 block w-full"
            v-model="search"
            autofocus
            autocomplete="Search"
            placeholder="Search"
        />
        <SecondaryButton type="button" @click="handle">
            <FontAwesomeIcon
                title="Search"
                :icon="faSearch"
                class="text-3xl hover:text-green-600 hover:scale-125 cursor-pointer transition-all ease-in-out delay-100 duration-300"
            />
        </SecondaryButton>
    </div>
</template>
