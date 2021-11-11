<template>
    <Head title="Websites" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <nav
                aria-label="Global"
                class="max-w-container mx-auto px-4 sm:px-6 lg:px-8"
            >
                <div class="flex items-center flex-wrap sm:flex-nowrap">
                    <h2
                        class="
                            flex-none
                            font-semibold
                            text-xl text-gray-800
                            leading-tight
                        "
                    >
                        Websites
                    </h2>
                    <div
                        class="
                            w-full
                            flex-none
                            mt-4
                            sm:mt-0 sm:w-auto sm:ml-auto
                            flex
                            items-center
                        "
                    >
                        <a
                            class="
                                w-full
                                inline-flex
                                justify-center
                                rounded-md
                                border border-transparent
                                shadow-sm
                                px-4
                                py-2
                                bg-green-600
                                text-base
                                font-medium
                                text-white
                                hover:bg-green-700
                                focus:outline-none
                                focus:ring-2
                                focus:ring-offset-2
                                focus:ring-green-500
                                sm:ml-3 sm:w-auto sm:text-sm
                            "
                            @click="
                                dialogCreate = true;
                                website = w;
                            "
                            >Add</a
                        >
                    </div>
                </div>
            </nav>
        </template>
        <div class="flex flex-col bg-white" style="height: calc(100vh - 151px)">
            <div class="overflow-x-auto">
                <div class="align-middle inline-block min-w-full">
                    <div
                        class="shadow overflow-hidden border-b border-gray-200"
                    >
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        scope="col"
                                        class="
                                            px-4
                                            py-2
                                            text-center text-xs
                                            font-medium
                                            text-gray-500
                                            uppercase
                                            tracking-wider
                                        "
                                    >
                                        #
                                    </th>
                                    <th
                                        scope="col"
                                        class="
                                            px-4
                                            py-3
                                            text-left text-xs
                                            font-medium
                                            text-gray-500
                                            uppercase
                                            tracking-wider
                                        "
                                    >
                                        Url
                                    </th>
                                    <th
                                        scope="col"
                                        class="
                                            px-4
                                            py-3
                                            text-center text-xs
                                            font-medium
                                            text-gray-500
                                            uppercase
                                            tracking-wider
                                        "
                                    >
                                        Status
                                    </th>
                                    <th
                                        scope="col"
                                        class="
                                            px-4
                                            py-3
                                            text-center text-xs
                                            font-medium
                                            text-gray-500
                                            uppercase
                                            tracking-wider
                                        "
                                    >
                                        Updated At
                                    </th>
                                    <th
                                        scope="col"
                                        class="
                                            px-4
                                            py-3
                                            text-center text-xs
                                            font-medium
                                            text-gray-500
                                            uppercase
                                            tracking-wider
                                        "
                                    >
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr
                                    v-for="(w, k) in $page.props.websites"
                                    :key="k"
                                >
                                    <td
                                        class="
                                            px-2
                                            py-2
                                            text-center
                                            whitespace-nowrap
                                        "
                                    >
                                        {{ w.id }}
                                    </td>
                                    <td class="px-4 py-2 whitespace-nowrap">
                                        <div class="ml-4">
                                            <div
                                                class="
                                                    text-sm
                                                    font-medium
                                                    text-gray-900
                                                "
                                            >
                                                <a
                                                    class="hover:text-blue-700"
                                                    :href="w.url"
                                                    target="_blank"
                                                    >{{ w.url }}</a
                                                >
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 text-center whitespace-nowrap">
                                        <span
                                            class="
                                                px-2
                                                inline-flex
                                                text-xs
                                                leading-5
                                                font-semibold
                                                rounded-full
                                                bg-green-100
                                                text-green-800
                                            "
                                        >
                                            {{ w.status }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 whitespace-nowrap">
                                        {{ updated(w.updated_at) }}
                                    </td>
                                    <td
                                        class="
                                            px-6
                                            py-2
                                            whitespace-nowrap
                                            text-right text-sm
                                            font-medium
                                        "
                                    >
                                        <a
                                            href="#"
                                            class="
                                                w-full
                                                inline-flex
                                                justify-center
                                                rounded-md
                                                border border-transparent
                                                shadow-sm
                                                px-2
                                                py-1
                                                bg-blue-600
                                                text-base
                                                font-medium
                                                text-white
                                                hover:bg-blue-700
                                                focus:outline-none
                                                focus:ring-2
                                                focus:ring-offset-2
                                                focus:ring-blue-500
                                                sm:ml-3 sm:w-auto sm:text-sm
                                                mr-2
                                            "
                                            @click="
                                                dialogCreate = true;
                                                website = w;
                                            "
                                            >Edit</a
                                        >
                                        <a
                                            href="#"
                                            @click="
                                                dialogDelete = true;
                                                website = w;
                                            "
                                            class="
                                                w-full
                                                inline-flex
                                                justify-center
                                                rounded-md
                                                border border-transparent
                                                shadow-sm
                                                px-2
                                                py-1
                                                bg-red-600
                                                text-base
                                                font-medium
                                                text-white
                                                hover:bg-red-700
                                                focus:outline-none
                                                focus:ring-2
                                                focus:ring-offset-2
                                                focus:ring-red-500
                                                sm:ml-3 sm:w-auto sm:text-sm
                                            "
                                            >Delete</a
                                        >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <Create
            :open="dialogCreate"
            @rClose="
                dialogCreate = $event;
                website = {};
            "
            :item="website"
        />
        <Delete
            :open="dialogDelete"
            @rClose="
                dialogDelete = $event;
                website = {};
            "
            :item="website"
        />
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import List from "@/Pages/Website/List";
import Create from "@/Pages/Website/Create";
import Delete from "@/Pages/Website/Delete";
import { Inertia } from "@inertiajs/inertia";
import moment from "moment";

export default {
    components: {
        BreezeAuthenticatedLayout,
        List,
        Head,
        Create,
        Delete,
    },
    setup() {},
    data() {
        return {
            dialogCreate: false,
            dialogDelete: false,
            website: {},
        };
    },
    created() {
        Echo.channel("my-channel").listen(".list-update-website", (n) => {
            Inertia.reload({ only: ["websites"] });
        });
    },
    methods: {
        updated(d) {
            return moment(d).format("YY-MM-DD HH:mm:ss");
        },
    },
};
</script>
