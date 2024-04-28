<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import PrimaryNavLinkDiv from './PrimaryNavLinkDiv.vue';
</script>

<template>
    <Link
        :href="route('logout')"
        method="post"
        as="button"
        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >Log Out</Link
    >
    <PrimaryNavLinkDiv :href="'/jobs/new'" :failedSlackLogin="false">Post</PrimaryNavLinkDiv>
</template>
