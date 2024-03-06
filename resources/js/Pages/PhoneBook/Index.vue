<script setup>
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import { Head } from "@inertiajs/vue3";
import Table from "./Person/Components/Table.vue";
</script>

<template>
    <Head title="Phonebook" />

    <DefaultLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Phonebook
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <Table />
                    </div>
                </div>
            </div>
        </div>
    </DefaultLayout>
</template>
./Components/Person/Table.vue
