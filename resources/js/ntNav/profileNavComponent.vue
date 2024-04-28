<template>
    <!-- {{ user.slack_avatar }} -->
    <!-- {{ user }} -->
    <div class="flex flex-1 items-center justify-end gap-x-8">
        <button type="button" class="-m-2.5 p-2.5 text-gray-400 hover:text-gray-500">
        <!-- <span class="sr-only">View notifications</span> -->
        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
        </svg>
        </button>
        <!-- {{ user }} -->
        <a href="/profile" class="-m-1.5 p-1.5">
        <span class="sr-only">Your profile</span>
        <img class="h-10 w-10 rounded-full bg-gray-800" :src='user.slack_avatar' :alt="user.name+'\'s profile picture'">
        </a>
    </div>
</template>

<script>
    export default {
        props: {
            user: Object,
        },
        data() {
            return this.user;
        }
    }

    // const slack_avatar = user["slack_avatar"];
</script>