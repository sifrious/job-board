<template>
    <Head title="Jobs" />
    <layout :user=user>
        <Info :jobs="user_jobs" :user="user"></Info>
        <List :jobs="jobs"></List>
    </layout>

</template>

<script>
import layout from '@/Shared/layout.vue';
import {useForm, Head} from '@inertiajs/inertia-vue3';
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
        layout,
        Head,
        Info,
        List,
    }
};
</script>