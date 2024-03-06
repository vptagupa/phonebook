<script setup>
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import {
    faChevronLeft,
    faChevronRight,
} from "@fortawesome/free-solid-svg-icons";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

import { onMounted, ref, computed } from "vue";

const props = defineProps({
    list: {
        type: Function,
    },
    page: {
        type: Number,
    },
    next: {
        type: Boolean,
    },
    prev: {
        type: Boolean,
    },
});
</script>

<template>
    <div class="w-full flex items-center justify-center gap-x-1">
        <SecondaryButton
            class="disabled:bg-slate-200"
            :disabled="!props.prev"
            type="button"
            @click="props.prev ? list('', props.page - 1) : null"
        >
            <FontAwesomeIcon
                title="Previous"
                :icon="faChevronLeft"
                class="text-xl hover:text-green-600 hover:scale-125 cursor-pointer transition-all ease-in-out delay-100 duration-300"
            />
        </SecondaryButton>
        <PrimaryButton
            class="disabled:bg-slate-200"
            type="button"
            :disabled="!props.next"
            @click="props.next ? list('', props.page + 1) : null"
        >
            <FontAwesomeIcon
                title="Next"
                :icon="faChevronRight"
                class="text-xl hover:text-green-600 hover:scale-125 cursor-pointer transition-all ease-in-out delay-100 duration-300"
            />
        </PrimaryButton>
    </div>
</template>
