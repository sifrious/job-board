<script setup>
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    href: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Link
        :href="href"
        class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:nepa-orange-highlight focus:outline-none focus:nepa-orange-light transition duration-150 ease-in-out"
    >
        <slot />
    </Link>
</template>
