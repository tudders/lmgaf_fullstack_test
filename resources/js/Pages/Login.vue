<template>
    <div class="h-screen bg-gray-50 p-10">
        <div
            class="bg-white mx-9 p-5 drop-shadow-xl w-content max-w-max border border-grey-100 rounded-xl"
        >
            <div class="">
                <span class="text-xl flex">
                    Sign in to

                    <img
                        class="h-10 h-8 w-8 ms-3"
                        src="/images/logo.png"
                        alt="Logo"
                    />
                    <span class="text-2xl text-bold text-indigo-900"
                        >POSTR</span
                    >
                </span>

                <form @submit.prevent="submit">
                    <label
                        for="email"
                        class="block text-sm font-medium leading-6 text-gray-900 mx-5 my-2"
                        >Email Address</label
                    >
                    <div class="mx-5">
                        <input
                            v-model="form.email"
                            type="email"
                            required="true"
                            name="email"
                            id="email"
                            class="w-96 ring-slate-100 rounded hover:rounded-lg block flex-1 border border-slate-300 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                        />
                    </div>
                    <label
                        for="password"
                        class="block text-sm font-medium leading-6 text-gray-900 mx-5 my-2"
                        >Password</label
                    >
                    <div class="mx-5">
                        <input
                            v-model="form.password"
                            type="password"
                            name="password"
                            id="password"
                            required="true"
                            class="w-96 ring-slate-100 rounded hover:rounded-lg block flex-1 border border-slate-300 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                        />
                    </div>
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold mx-5 my-3 py-2 px-4 rounded"
                        type="submit"
                    >
                        Sign in
                    </button>
                </form>
            </div>
            <div class="mt-5">
                <Link href="/" class="text-gray-500"
                    ><i class="fa-solid fa-arrow-left"></i> BACK TO MAIN
                    PAGE</Link
                >
            </div>
        </div>
    </div>
</template>

<script setup>
import { reactive } from "vue";
import { router, Link } from "@inertiajs/vue3";

defineProps({
    error: {
        type: String,
        default: null,
    },
});

const form = reactive({
    email: null,
    password: null,
});

async function hash(password) {
    const utf8 = new TextEncoder().encode(password);
    return crypto.subtle.digest("SHA-256", utf8).then((hashBuffer) => {
        const hashArray = Array.from(new Uint8Array(hashBuffer));
        const hashHex = hashArray
            .map((bytes) => bytes.toString(16).padStart(2, "0"))
            .join("");
        return hashHex;
    });
}

async function submit() {
    //password hashing

    form.password = await hash(form.password);
    router.post("/loginsubmit", form);
}
</script>
