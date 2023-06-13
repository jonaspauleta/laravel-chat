<template>
    <div class="flex flex-col h-screen">
        <div class="flex-grow p-4 bg-gray-100">
            <div class="flex flex-col h-full">
                <div class="flex-grow overflow-y-auto">
                    <div v-for="(message, index) in messages" :key="index" class="mb-2">
                        <div v-if="message.isSent" class="text-right">
                            <span class="inline-block px-4 py-2 rounded-lg bg-blue-500 text-white">
                                {{ message.text }}
                            </span>
                        </div>

                        <div v-else>
                            <span class="inline-block px-4 py-2 rounded-lg bg-gray-200">
                                {{ message.text }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-4 bg-gray-200">
            <div class="flex">
                <input v-model="newMessage" @keydown.enter="sendMessage" type="text" class="flex-grow p-2 mr-2 border rounded-lg focus:outline-none" placeholder="Type a message..." />

                <button @click="sendMessage" class="px-4 py-2 text-white bg-blue-500 rounded-lg">
                    Send
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { router } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import { useEcho } from "@/Hooks/useEcho/index.js";

const page = usePage();
const echo = useEcho();
const messages = ref([]);
const newMessage = ref('');

function sendMessage() {
    if (newMessage.value.trim() === '') return;

    router.post('/chat',{
        message: newMessage.value
    });

    newMessage.value = '';
}

echo.channel('public')
    .listen('ChatMessageEvent', (e) => {
        messages.value.push({
            text: e.message,
            isSent: page.props.auth.user.id === e.user_id,
        });
    });
</script>
