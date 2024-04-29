<template>
    <Head>About Template</Head>
    <h1 class="hidden">About Template</h1>
    <layout>
        This is a Template for the /about Pages
    </layout>
</template>

<script>
    import layout from '@/Shared/layout.vue';
    import { Head } from '@inertiajs/inertia-vue3';
    export default {
        props: {},
        components: {
            layout,
        }
    }
</script>