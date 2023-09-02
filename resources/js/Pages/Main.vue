<template>
    <div class="sm:w-3/5 w-full sm:mx-auto mx-5">
        <div>
            <div class="my-8">
                <div class="flex w-full justify-between">
                    <div class="py-2 flex">
                        <img
                            class="h-10 h-8 w-8"
                            src="/images/logo.png"
                            alt="Logo"
                        />
                        <span class="text-2xl text-bold text-indigo-900"
                            >POSTR</span
                        >
                    </div>
                    <div>
                        <button
                            class="bg-white hover:bg-blue-50 text-blue-500 font-bold py-2 px-4 rounded-full w-24 border border-1 border-blue-500"
                            @click="logout()"
                        >
                            Logout
                        </button>
                    </div>
                </div>
            </div>
            <div>
                <postWidget
                    @submitPost="submitPost"
                    :user="user"
                    :posting="posting"
                />
            </div>

            <template v-for="post in posts">
                <timelineCard
                    :post="post"
                    :user="user"
                    @deletePost="deletePost"
                />
            </template>
        </div>
    </div>
</template>

<script>
import layout from "../../views/layout/mainlayout.vue";
export default {};
</script>

<script setup>
import { defineProps, ref } from "vue";

import { router } from "@inertiajs/vue3";

import timelineCard from "../components/timelineCard.vue";
import postWidget from "../components/postWidget.vue";

defineProps({
    posts: {
        type: Array,
        default: null,
    },
    user: {
        type: Array,
        default: null,
    },
});

const posting = ref(false);

function submitPost(e) {
    router.post("/submitpost", e);
}

function deletePost(e) {
    router.post("/deletepost", e);
}

function logout(e) {
    router.get("/logout", e);
}
</script>
