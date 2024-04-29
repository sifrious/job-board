<template>
    <Head title="Dashboard" />

    <layout :user="user">
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template> -->
    </layout>
</template>

<script>
import layout from '@/Shared/layout.vue';
import { Head } from '@inertiajs/inertia-vue3';

export default {
    props: {
        user: Object
    },
    components: {
        layout,
        Head,
    },
};
</script>