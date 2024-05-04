<template>
    <div class="hidden md:flex md:gap-x-11 md:text-sm md:font-semibold md:leading-6 md:text-gray-700">
        <NavLink href="jobs.index" label="Jobs"></NavLink>
        <NavLink href="listings.index " label="Listings"></NavLink>
        <NavLink href="userDrafts.index" label="Drafts"></NavLink>
        <NavLink href="ListingsIndex" label="Saved"></NavLink>
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