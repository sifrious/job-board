<template>
    <Head>Listing & Pricing</Head>
    <h1 class="hidden">Pricing</h1>
    <layout>
        <div class="text-xl mb-4">
            So you want to pay to subscribe to a demo?
        </div>
        <div class="mb-4">
            I'm not going to let you do that. But hey, here's a page! It exists!
        </div>
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