<script setup>
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    title: {
        type: String,
    },
    status: {
        type: String,
    },
});
</script>

<template>
        <div v-if="title">
            <Head title="title" />
            <h1 class="hidden">{{ props.title }}</h1>
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
</template>