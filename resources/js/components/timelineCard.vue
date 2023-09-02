<template>
    <div
        class="flex border border-l-1 border-r-1 border-b-1 border-slate-100 py-4"
    >
        <div class="flex flex-row w-full">
            <div class="w-1/5 my-4">
                <div
                    class="rounded-full bg-sky-400 text-white h-14 w-14 mx-auto my-4"
                >
                    <span class="flex justify-center pt-2 text-3xl">
                        {{ post.name.charAt(0) }}</span
                    >
                </div>
            </div>
            <div class="w-4/5 my-4">
                <span class="font-bold">{{ post.name }}</span>
                <span class="text-slate-500 mx-3">{{
                    calculateSince(post.created)
                }}</span>
                <span
                    v-if="post.userID == user.id"
                    class="float-right mx-3 text-red-400 text-sm"
                >
                    <button class="btn" @click="deletepost(post)">
                        delete this post
                    </button>
                </span>
                <div class="text-gray-700 my-3">{{ post.message }}</div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from "vue";

const emit = defineEmits(["deletePost"]);

defineProps({
    post: {
        type: Array,
        default: null,
    },
    user: {
        type: Array,
        default: null,
    },
});

function deletepost(post) {
    emit("deletePost", { mid: post.mid });
}

//totally ripped of the web.
function calculateSince(datetime) {
    var tTime = new Date(datetime);
    var cTime = new Date();
    var sinceMin = Math.round((cTime - tTime) / 60000);
    if (sinceMin == 0) {
        var sinceSec = Math.round((cTime - tTime) / 1000);
        if (sinceSec < 10) var since = "less than 10 seconds ago";
        else if (sinceSec < 20) var since = "less than 20 seconds ago";
        else var since = "half a minute ago";
    } else if (sinceMin == 1) {
        var sinceSec = Math.round((cTime - tTime) / 1000);
        if (sinceSec == 30) var since = "half a minute ago";
        else if (sinceSec < 60) var since = "less than a minute ago";
        else var since = "1 minute ago";
    } else if (sinceMin < 45) var since = sinceMin + " minutes ago";
    else if (sinceMin > 44 && sinceMin < 60) var since = "about 1 hour ago";
    else if (sinceMin < 1440) {
        var sinceHr = Math.round(sinceMin / 60);
        if (sinceHr == 1) var since = "about 1 hour ago";
        else var since = "about " + sinceHr + " hours ago";
    } else if (sinceMin > 1439 && sinceMin < 2880) var since = "1 day ago";
    else {
        var sinceDay = Math.round(sinceMin / 1440);
        var since = sinceDay + " days ago";
    }
    return since;
}
</script>
