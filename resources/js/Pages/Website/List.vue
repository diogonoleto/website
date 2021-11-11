<template>
    <tr v-for="(w, k) in $page.props.websites" :key="k">
        <td class="px-2 py-2 text-center whitespace-nowrap">
            {{ w.id }}
        </td>
        <td class="px-4 py-2 whitespace-nowrap">
            <div class="flex items-center">
                <div class="flex-shrink-0 h-10 w-10">
                    <!-- <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt=""> -->
                </div>
                <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                        {{ w.url }}
                    </div>
                </div>
            </div>
        </td>
        <td class="px-4 py-2 whitespace-nowrap">
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
        <td class="px-6 py-2 whitespace-nowrap text-right text-sm font-medium">
            <a
                :href="route('website.edit', w.id)"
                class="text-indigo-600 hover:text-indigo-900 mr-2"
                >Edit</a
            >
            <a
                :href="route('website.show', w.id)"
                class="text-indigo-600 hover:text-indigo-900"
                >Show</a
            >
        </td>
    </tr>
</template>