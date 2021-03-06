<template>
    <TransitionRoot as="template" :show="open">
        <Dialog
            as="div"
            class="fixed z-10 inset-0 overflow-y-auto"
            @close="close()"
        >
            <div
                class="
                    flex
                    items-end
                    justify-center
                    min-h-screen
                    pt-4
                    px-4
                    pb-20
                    text-center
                    sm:block sm:p-0
                "
            >
                <TransitionChild
                    as="template"
                    enter="ease-out duration-300"
                    enter-from="opacity-0"
                    enter-to="opacity-100"
                    leave="ease-in duration-200"
                    leave-from="opacity-100"
                    leave-to="opacity-0"
                >
                    <DialogOverlay
                        class="
                            fixed
                            inset-0
                            bg-gray-500 bg-opacity-75
                            transition-opacity
                        "
                    />
                </TransitionChild>
                <span
                    class="hidden sm:inline-block sm:align-middle sm:h-screen"
                    aria-hidden="true"
                    >&#8203;</span
                >
                <TransitionChild
                    as="template"
                    enter="ease-out duration-300"
                    enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    enter-to="opacity-100 translate-y-0 sm:scale-100"
                    leave="ease-in duration-200"
                    leave-from="opacity-100 translate-y-0 sm:scale-100"
                    leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                >
                    <div
                        class="
                            inline-block
                            align-bottom
                            bg-white
                            rounded-lg
                            text-left
                            overflow-hidden
                            shadow-xl
                            transform
                            transition-all
                            sm:my-8 sm:align-middle sm:max-w-lg sm:w-full
                        "
                    >
                        <form @submit.prevent="submit">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div
                                    class="
                                        mt-3
                                        text-center
                                        sm:mt-0 sm:ml-4 sm:text-left
                                    "
                                >
                                    <DialogTitle
                                        as="h3"
                                        class="
                                            text-lg
                                            leading-6
                                            font-medium
                                            text-gray-900
                                        "
                                    >
                                    </DialogTitle>
                                    <div class="mt-2">
                                        <div class="py-6">
                                            <BreezeLabel
                                                for="url"
                                                value="Url"
                                            />
                                            <BreezeInput
                                                id="url"
                                                type="text"
                                                class="mt-1 block w-full"
                                                v-model="form.url"
                                                required
                                                placeholder="http://test.com"
                                            />
                                            <BreezeValidationErrors
                                                v-if="form.errors.url"
                                                class="mb-4"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="
                                    bg-gray-50
                                    px-4
                                    py-3
                                    sm:px-6 sm:flex sm:flex-row-reverse
                                "
                            >
                                <button
                                    type="submit"
                                    :disabled="disabled"
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
                                    @click="submit()"
                                >
                                    Save
                                </button>
                                <button
                                    type="button"
                                    class="
                                        mt-3
                                        w-full
                                        inline-flex
                                        justify-center
                                        rounded-md
                                        border border-gray-300
                                        shadow-sm
                                        px-4
                                        py-2
                                        bg-white
                                        text-base
                                        font-medium
                                        text-gray-700
                                        hover:bg-gray-50
                                        focus:outline-none
                                        focus:ring-2
                                        focus:ring-offset-2
                                        focus:ring-indigo-500
                                        sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm
                                    "
                                    @click="close()"
                                    ref="cancelButtonRef"
                                >
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </TransitionChild>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script>
import {
    Dialog,
    DialogOverlay,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";

export default {
    props: ["open", "item"],
    components: {
        Dialog,
        DialogOverlay,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
    },
    setup() {},
    data() {
        return {
            disabled: false,
            form: this.$inertia.form({
                url: "",
            }),
            title: "",
        };
    },
    methods: {
        close() {
            this.$emit("rClose", false);
            this.disabled = false;
            this.form.reset("url");
            this.form.clearErrors();
        },
        submit() {
            this.disabled = true;
            this.form.post(this.route("website.store"), {
                onSuccess: () => this.close(),
                onError: () => (this.disabled = false),
            });
        },
    },
};
</script>
