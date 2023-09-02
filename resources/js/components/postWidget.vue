<template>
    <div class="flex border border-1 border-slate-100 my-4">
        <div class="w-1/5 my-4">
            <div
                class="rounded-full bg-sky-400 text-white h-14 w-14 mx-auto my-4"
            >
                <span class="flex justify-center pt-2 text-3xl">
                    {{ user.name.charAt(0) }}</span
                >
            </div>
        </div>
        <div class="w-4/5 my-4">
            <label
                for="message"
                class="block mb-2 text-md font-bold text-gray-900 dark:text-white"
                >Tell us something new
            </label>
            <textarea
                id="message"
                rows="2"
                v-model="message"
                class="my-2 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="What's happening?!"
            ></textarea>
        </div>
        <div
            class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600"
        ></div>
    </div>
    <div class="w-full">
        <div class="flex justify-end">
            <button
                @click="submitPost(posting)"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold mb-3 py-2 px-4 rounded-full w-48"
            >
                <span v-if="posting"
                    ><i class="fa-solid fa-rotate fa-spin"></i> Posting</span
                ><span v-else>Post comment</span>
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";

const emit = defineEmits(["submitPost"]);

const props = defineProps({
    user: {
        type: Array,
        default: null,
    },
});

//place holder - use this to show a loading icon when posting - todo put inside function
const posting = ref(false);

const message = ref("");

function submitPost(posting) {
    emit("submitPost", { message: message.value });
    message.value = "";
}
</script>
