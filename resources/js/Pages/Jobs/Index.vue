<template>
    <Head title="Jobs" />
    <LayoutUnaltered :user=user>
        <div class="mt-20">
            <Info :list_items="user_jobs" :user="user" display_type="Job Listings"></Info>
            <List :list_items="jobs" display_type="Job Listings"></List>
        </div>
    </LayoutUnaltered>

</template>

<script>
import LayoutUnaltered from '@/Shared/LayoutUnaltered.vue';
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
        LayoutUnaltered,
        Head,
        Info,
        List,
    }
};
</script>