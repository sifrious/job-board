<template>
    <Layout :user=user :home="true">
        <Status :title="'New Job Listing'">
            </Status>
        <JobCreateLayout :user="user">
        </JobCreateLayout>
    </Layout>
</template>

<script>
import Layout from '../Shared/layout.vue';
import PrimaryButtonLg from '@/Components/PrimaryButtonLg.vue';
// import Status from '@/Components/Status.vue';
// import JobCreateLayout from '@/Layouts/JobCreateLayout.vue';
import {Head} from '@inertiajs/vue3';

export default {
    props: {
        user: Object,
        required: True,
    },
    components: {
        Layout,
        PrimaryButtonLg,
        Head,
    }
};
</script>
