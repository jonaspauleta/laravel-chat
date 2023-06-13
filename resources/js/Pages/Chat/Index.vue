<script setup lang="ts">
import { PropType } from "vue";
import { Head, router } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ChatMessages from "@/Components/Chat/ChatMessages.vue";
import ChatInput from "@/Components/Chat/ChatInput.vue";
import { useEcho } from "@/Hooks/useEcho";
import { Chat } from "@/types/Chat";

const props = defineProps({
    messages: {
        type: Array<Chat>,
        required: true,
    } as PropType<Array<Chat>>,
});

const echo = useEcho();

echo.private("private-chat").listen("ChatMessageEvent", () => {
    router.reload({
        preserveScroll: true,
        preserveState: true,
    });
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex flex-col h-screen">
                            <ChatMessages :messages="props.messages" />
                            <ChatInput />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
