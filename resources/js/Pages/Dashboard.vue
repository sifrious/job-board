<template>
    <Head title="Dashboard | NEPA Tech Jobs" />
    <LayoutUnaltered :user="user">
        <DashboardLayout :user="user" :listings="listings" :jobs="jobs"></DashboardLayout>
    </LayoutUnaltered>
</template>

<script>
import LayoutUnaltered from '@/Shared/LayoutUnaltered.vue';
import { Head } from '@inertiajs/inertia-vue3';
import DashboardLayout from '@/Shared/DashboardLayout.vue';

export default {
    props: {
        user: Object,
        listings: Object,
        jobs: Object,
    },
    components: {
        Head,
        LayoutUnaltered,
        DashboardLayout,
    },
};
</script>