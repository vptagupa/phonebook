<script setup>
import Edit from "../Actions/Edit.vue";
import Delete from "../Actions/Delete.vue";
import NewContact from "../../Contact/Actions/New.vue";
import New from "../Actions/New.vue";
import Filter from "../Actions/Filter.vue";
import View from "../../Contact/Actions/View.vue";
import Pagination from "./Pagination.vue";
import { onMounted, ref } from "vue";

const data = ref([]);

const list = async (query = "", page = null) => {
    const res = await axios.post(route("phonebooks.list"), {
        query: query,
        page,
        per_page: 10,
    });
    if (res?.data) {
        data.value = res.data;
    }
};

onMounted(async () => {
    await list();
});
</script>

<template>
    <table class="w-full">
        <thead>
            <tr>
                <th :colspan="5">
                    <div
                        class="w-full flex xs:max-md:flex-col items-center justify-between p-2"
                    >
                        <div class="w-full md:w-1/2">
                            <Filter :list="list" />
                        </div>
                        <div class="w-full md:w-1/2 text-end">
                            <New @list="list" />
                        </div>
                    </div>
                </th>
            </tr>
            <tr class="bg-slate-200/70">
                <th class="p-4 w-[70px]">ID #</th>
                <th class="p-4">Name</th>
                <th class="p-4">Email</th>
                <th class="p-4 w-[20px] text-center">Contacts</th>
                <th class="p-4 w-[150px]">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr
                v-for="row in data.data"
                class="bg-slate-100 border-b border-slate-200 text-sm"
            >
                <td class="p-4">{{ row.id }}</td>
                <td class="p-4">{{ row.name }}</td>
                <td class="p-4">{{ row.email }}</td>
                <td class="p-4 text-center">
                    <View :person="row" @personList="list" />
                </td>
                <td class="p-4 flex items-center justify-end gap-x-2">
                    <Edit @list="list" :item="row" />
                    <Delete @list="list" :item="row" />
                    <NewContact @personList="list" :item="row" />
                </td>
            </tr>
            <tr v-if="data.data?.length <= 0">
                <td :colspan="6" class="p-4 text-center">No record found.</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td :colspan="5" class="p-2">
                    <Pagination
                        :list="list"
                        :page="data?.meta?.current_page ?? 1"
                        :next="data?.links?.next ? true : false"
                        :prev="data?.links?.prev ? true : false"
                    />
                </td>
            </tr>
        </tfoot>
    </table>
</template>
