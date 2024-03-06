<script setup>
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <div v-show="message" class="bg-teal-600 p-3 rounded-lg">
        <p class="text-sm text-white">
            {{ message }}
        </p>
    </div>
</template>
