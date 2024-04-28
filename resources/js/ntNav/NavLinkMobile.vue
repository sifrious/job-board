<template>
    <Link :href="href" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">{{ $label }}</Link>
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