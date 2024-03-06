<script setup>
import Edit from "../Actions/Edit.vue";
import Delete from "../Actions/Delete.vue";
import Filter from "../Actions/Filter.vue";
import Pagination from "./Pagination.vue";
import New from "../Actions/New.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { onMounted, ref } from "vue";

const emit = defineEmits(["personList"]);
const props = defineProps({
    person: {
        type: Object,
    },
});

const data = ref([]);

const list = async (query = "", page = null) => {
    const res = await axios.post(
        route("phonebooks.contacts.list", props.person.id),
        {
            query: query,
            page,
            per_page: 10,
        }
    );
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
                <th :colspan="6">
                    <div
                        class="w-full flex xs:max-md:flex-col items-center justify-between p-2"
                    >
                        <div class="w-[90%]">
                            <Filter :list="list" />
                        </div>
                        <div class="grow flex items-center justify-end">
                            <span class="text-sm leading-4">Add New</span>
                            <New
                                :item="props.person"
                                @list="list"
                                @personList="emit('personList')"
                            />
                        </div>
                    </div>
                </th>
            </tr>
            <tr class="bg-slate-200/70">
                <th class="p-4">ID #</th>
                <th class="p-4">Name</th>
                <th class="p-4">Email</th>
                <th class="p-4">Contact No.</th>
                <th class="p-4">Actions</th>
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
                <td class="p-4">{{ row.contact_no }}</td>

                <td class="p-4 flex items-center justify-end gap-x-2">
                    <Edit :person="props.person" :item="row" @list="list" />
                    <Delete
                        :person="props.person"
                        :item="row"
                        @list="list"
                        @personList="emit('personList')"
                    />
                </td>
            </tr>
            <tr v-if="data.data?.length <= 0">
                <td :colspan="5" class="p-4 text-center">No record found.</td>
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
