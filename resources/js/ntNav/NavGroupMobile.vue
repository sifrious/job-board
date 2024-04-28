<template>
    <NavLinkMobile href="JobsIndex" label="Jobs"></NavLinkMobile>
    <NavLinkMobile href="UserListingsIndex" label="Listings"></NavLinkMobile>
    <NavLinkMobile href="UserDraftsIndex" label="Drafts"></NavLinkMobile>
    <NavLinkMobile href="ListingsIndex" label="Saved"></NavLinkMobile>
</template>

<script>
import NavLinkMobile from './NavLinkMobile.vue';

export default {
    props: {
        user: Object,
    },
    components: {
        NavLinkMobile,
    }
}
</script>