<template>
    <Link :href="href" class="text-l">{{ label }}</Link>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        props: {
            href: String,
            label: String,
        },
        components: {
            Link,
        },
    }
</script>