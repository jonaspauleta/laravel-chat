<script setup lang="ts">
import { ref } from "vue";
import { router } from "@inertiajs/vue3";

const newMessage = ref("");

function sendMessage() {
    if (newMessage.value.trim() === "") return;

    router.post(
        "/chat",
        {
            message: newMessage.value,
        },
        {
            preserveScroll: true,
        }
    );

    newMessage.value = "";
}
</script>

<template>
    <div class="p-4 bg-gray-200 dark:bg-gray-800">
        <div class="flex">
            <input
                v-model="newMessage"
                @keydown.enter="sendMessage"
                type="text"
                class="flex-grow p-2 mr-2 border rounded-lg focus:outline-none text-gray-900"
                placeholder="Type a message..."
            />

            <button
                @click="sendMessage"
                class="px-4 py-2 text-white bg-blue-500 rounded-lg dark:bg-gray-900"
            >
                Send
            </button>
        </div>
    </div>
</template>
