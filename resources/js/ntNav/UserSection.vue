<template>
    <div v-if="user" class="mx-auto flex w-full max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
        <nav class="w-3/4 flex flex-row justify-center">
            <navGroup></navGroup>
        </nav>
        <profileNavComponent :user="user"></profileNavComponent>
    </div>
    <div v-else class="mx-auto flex w-full max-w-7xl justify-end items-center align-end px-4 sm:px-6 lg:px-8">
        <NavGroupGuest></NavGroupGuest>
    </div>
    <slot />

</template>

<script>
    import profileNavComponent from './profileNavComponent.vue';
    import profileNavComponentMobile from './profileNavComponentMobile.vue';
    import navGroup from './navGroup.vue';
    import navGroupMobile from './NavGroupMobile.vue';
    import NavGroupGuest from './NavGroupGuest.vue';

    export default {
        props: {
            user: Object,
        },
        components: {
            profileNavComponent,
            profileNavComponentMobile,
            navGroup,
            navGroupMobile,
            NavGroupGuest,
        }
    }
</script>