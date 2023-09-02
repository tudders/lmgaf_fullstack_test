<template>
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div>
            <img
                class="block h-10 w-auto m-auto h-64 w-64 md:h-96 md:w-96 mt-16"
                src="/images/logo.png"
                alt="Logo"
            />
        </div>
        <div>
            <div class="font-mono text-6xl">
                <div class="mt-8 pt-8 px-8">
                    <span class="text-7xl text-bold text-indigo-900"
                        >POSTR</span
                    >
                </div>
                <div class="mb-8 py-3 px-8">
                    See what's happening in the world right now.
                </div>
            </div>

            <div class="my-8 py-8 px-8">
                <div class="w-full">
                    <div
                        class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-full h-14 w-80 md:mr-auto"
                    >
                        <div class="flex justify-center pt-1 text-xl">
                            <Link href="/createaccount">Create Account</Link>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-8 text-lg">Have an account already?</div>
                <div class="my-1 py-3 text-lg">
                    <div class="w-full">
                        <div
                            class="bg-white hover:bg-blue-50 text-blue-500 font-bold py-2 px-4 h-14 rounded-full w-80 border border-1 border-blue-500"
                        >
                            <div class="flex justify-center pt-1 text-xl">
                                <Link href="/login">Log In</Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>
