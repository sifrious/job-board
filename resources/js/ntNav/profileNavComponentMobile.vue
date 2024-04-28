<template>
    <h1>Hello </h1>
    <Link :href="href">{{ $label }}</Link>
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