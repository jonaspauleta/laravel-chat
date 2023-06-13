<script setup lang="ts">
import { PropType } from "vue";
import { Chat } from "@/types/Chat";
import { usePage } from "@inertiajs/vue3";

const props = defineProps({
    messages: {
        type: Array<Chat>,
        required: true,
    } as PropType<Array<Chat>>,
});

const page = usePage();
</script>

<template>
    <div class="flex-grow p-4 bg-gray-100 dark:bg-gray-900">
        <div class="flex flex-col h-full">
            <div class="flex-grow overflow-y-auto">
                <div
                    v-for="(message, index) in props.messages"
                    :key="index"
                    class="mb-2"
                >
                    <div
                        :class="{
                            'text-right':
                                message.user_id === page.props.auth.user.id,
                        }"
                    >
                        <span
                            :class="{
                                'inline-block px-4 py-2 rounded-lg bg-blue-500 text-white':
                                    message.user_id === page.props.auth.user.id,
                                'inline-block px-4 py-2 rounded-lg bg-gray-200':
                                    message.user_id !== page.props.auth.user.id,
                                'dark:bg-gray-800': true,
                            }"
                        >
                            {{ message.message }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
