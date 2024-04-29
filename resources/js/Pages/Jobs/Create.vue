<template>
    <Layout :user=user :home="true">
        <Status :title="'New Job Listing'">
            </Status>
        <!-- <JobCreateLayout :user="user">
        </JobCreateLayout> -->
        <CreateJobForm></CreateJobForm>
    </Layout>
</template>

<script>
import Layout from '@/Shared/layout.vue';
import PrimaryButtonLg from '@/Components/PrimaryButtonLg.vue';
import Status from '@/Components/Status.vue';
import CreateJobForm from '@/Pages/Jobs/Partials/CreateJobForm.vue';
import {Head} from '@inertiajs/inertia-vue3';

export default {
    props: {
        user: Object,
        required: Boolean,
    },
    components: {
        Layout,
        PrimaryButtonLg,
        Head,
        Status,
        CreateJobForm,
    }
};
</script>
