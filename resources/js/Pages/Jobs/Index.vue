<template>
    <Head title="Jobs" />
    <Layout :user=user>
        <Info :jobs="user_jobs" :user="user"></Info>
        <List :jobs="jobs"></List>
    </Layout>

</template>

<script>
import Layout from '@/Shared/layout.vue';
import {useForm, Head} from '@inertiajs/vue3';
import Info from './Components/Info.vue';
import List from './Components/List.vue';

export default {
    props: {
        user: Object,
        status: String,
        jobs: Object,
        user_jobs: Object,
    },
    components: {
        Layout,
        Head,
        Info,
        List,
    }
};
</script>