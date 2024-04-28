<template>
    <div class="hidden md:flex md:gap-x-11 md:text-sm md:font-semibold md:leading-6 md:text-gray-700">
        <NavLink href="/jobs" label="Jobs"></NavLink >
        <NavLink href="/about/membership" label="Membership"></NavLink >
        <NavLink href="/about/pricing" label="List Here"></NavLink >
        <NavLink href="/prompt" label="Log In"></NavLink >
    </div>
</template>

<script>
import NavLink from './NavLink.vue';

export default {
    props: {
        user: Object,
    },
    components: {
        NavLink,
    }
}
</script>